<?php

namespace App\Repository;

use App\Table\LikedPostTable;
use App\Table\PostTable;
use App\Table\UserTable;
use Interop\Container\Exception\ContainerException;
use Slim\Container;

/**
 * Class PostRepository
 */
class PostRepository extends AppRepository
{
    /**
     * @var PostTable
     */
    private $postTable;

    /**
     * @var LikedPostTable
     */
    private $likedPostTable;

    /**
     * @var UserTable
     */
    private $userTable;

    /**
     * PostRepository constructor.
     *
     * @param Container $container
     * @throws ContainerException
     */
    public function __construct(Container $container)
    {
        $this->postTable = $container->get(PostTable::class);
        $this->likedPostTable = $container->get(LikedPostTable::class);
        $this->userTable = $container->get(UserTable::class);
    }

    /**
     * Get single post.
     *
     * @param string $postId
     * @param string $currentUserId
     * @return array
     */
    public function getPost(string $postId, string $currentUserId): ?array
    {
        $query = $this->postTable->newSelect();
        $query->select('*')->where(['id' => $postId]);
        $post = $query->execute()->fetch('assoc');
        if (empty($post)) {
            return null;
        }
        $post['likes'] = $this->getLikes($post['id']);
        $post['user'] = $this->getPostOwner($post['created_by']);
        $post['liked_by_user'] = $this->hasAlreadyLiked($post['id'], $currentUserId);

        return $post;
    }

    /**
     * Get posts ordered by their submission.
     *
     * @param string $userId
     * @param int $offset
     * @return array
     */
    public function getNewPosts(string $userId, int $offset = 0): array
    {
        $query = $this->postTable->newSelect();
        $query->select('*')
            ->orderDesc('created_at')
            ->offset($offset)
            ->limit(5);

        $posts = $query->execute()
            ->fetchAll('assoc');

        foreach ($posts as $key => $post) {
            $posts[$key]['likes'] = $this->getLikes($post['id']);
            $posts[$key]['liked_by_user'] = $this->hasAlreadyLiked($post['id'], $userId);
            $posts[$key]['user'] = $this->getPostOwner($post['created_by']);
        }

        return $posts;
    }

    /**
     * Get posts ordered by their votes.
     *
     * @param string $userId
     * @param int $offset
     * @return array
     */
    public function getHotPosts(string $userId, int $offset = 0): array
    {
        $query = $this->likedPostTable->newSelect(false);
        $query->select([
            'post_id' => 'post_id',
            'like_count' => $query->func()->count('*')
        ])
            ->orderDesc('like_count')
            ->group(['post_id'])
            ->offset($offset)
            ->limit(5);

        $likes = $query->execute()
            ->fetchAll('assoc');

        $posts = [];
        foreach ($likes as $key => $like) {
            $posts[] = $this->getPost($like['post_id'], $userId);
        }

        return $posts;
    }

    /**
     * Create a post.
     *
     * @param string $text
     * @param string $userId
     * @return bool
     */
    public function createPost(string $text, string $userId): bool
    {
        $row = [
            'content' => $text,
            'created_by' => $userId,
            'created_at' => date('Y-m-d H:i:s'),
        ];

        return (bool)$this->postTable->insert($row);
    }

    /**
     * Delete a post.
     *
     * @param string $postId
     * @param string $userId
     * @return bool
     */
    public function deletePost(string $postId, string $userId): bool
    {
        $deletedPost = (bool)$this->postTable->archive($postId, $userId);

        $query = $this->likedPostTable->newSelect(false);
        $query->select(['id'])->where(['post_id' => $postId]);
        $rows = $query->execute()->fetchAll('assoc');
        foreach ($rows as $row) {
            $this->likedPostTable->delete($row['id']);
        }
        return $deletedPost;
    }

    /**
     * Check if post exists.
     *
     * @param string $postId
     * @return bool
     */
    public function existPost(string $postId): bool
    {
        return $this->postTable->exist('id', (int)$postId);
    }

    /**
     * Get the owner of a post
     *
     * @param string $userId
     * @return null
     */
    public function getPostOwner(string $userId)
    {
        $userQuery = $this->userTable->newSelect(false);
        $userQuery->select(['username', 'thumbnail_url', 'id'])->where(['id' => $userId]);

        return $userQuery->execute()->fetch('assoc') ?: null;
    }

    /**
     * Check if the user is the owner of a post.
     *
     * @param string $postId
     * @param string $userId
     * @return bool
     */
    public function isPostOwner(string $postId, string $userId): bool
    {
        $query = $this->postTable->newSelect();
        $query->select(1)->where(['id' => $postId, 'created_by' => $userId]);
        $row = $query->execute()->fetch();

        return !empty($row);
    }

    /**
     * Check if the user already liked a post.
     *
     * @param string $postId
     * @param string $userId
     * @return bool
     */
    public function hasAlreadyLiked(string $postId, string $userId): bool
    {
        $query = $this->likedPostTable->newSelect(false);
        $query->select(1)->where(['post_id' => $postId, 'user_id' => $userId]);
        $row = $query->execute()->fetch();

        return !empty($row);
    }

    /**
     * Get likes of a post
     *
     * @param string $postId
     * @return int
     */
    public function getLikes(string $postId): int
    {
        $query = $this->likedPostTable->newSelect(false);
        $query->select(['count' => $query->func()->count('*')])->where(['post_id' => $postId]);
        $row = $query->execute()->fetch('assoc');

        return array_key_exists('count', (array)$row) ? $row['count'] : 0;
    }

    /**
     * Like a post.
     *
     * @param string $postId
     * @param string $userId
     * @return bool
     */
    public function like(string $postId, string $userId): bool
    {
        $row = [
            'user_id' => $userId,
            'post_id' => $postId,
            'liked_at' => date('Y-m-d H:i:s'),
        ];

        return (bool)$this->likedPostTable->insert($row);
    }

    /**
     * Like a post.
     *
     * @param string $postId
     * @param string $userId
     * @return bool
     */
    public function unlike(string $postId, string $userId): bool
    {
        $query = $this->likedPostTable->newSelect(false);
        $query->select(['id'])->where(['post_id' => $postId, 'user_id' => $userId]);
        $row = $query->execute()->fetch('assoc');
        if (empty($row)) {
            return false;
        }

        return (bool)$this->likedPostTable->delete($row['id']);
    }

    /**
     * Remove a given like.
     *
     * @param string $postId
     * @param string $userId
     * @return bool
     */
    public function removeLike(string $postId, string $userId): bool
    {
        $query = $this->likedPostTable->newSelect(false);
        $query->select(['id'])->where(['post_id' => $postId, 'user_id' => $userId]);
        $row = $query->execute()->fetch('assoc');
        if (empty($row)) {
            return false;
        }

        return (bool)$this->likedPostTable->delete($row['id']);
    }

    /**
     * Get the likes count of a post
     *
     * @param string $postId
     * @return string
     */
    private function getLikesForPost(string $postId)
    {
        $query = $this->likedPostTable->newSelect(false);
        $query->select(['count' => $query->func()->count('*')])
            ->where(['post_id' => $postId]);

        return $query->execute()->fetch('assoc')['count'] ?: '0';
    }
}
