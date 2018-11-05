<?php

namespace App\Repository;

use App\Table\LikedPostTable;
use App\Table\PostTable;
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
     * PostRepository constructor.
     * @param Container $container
     * @throws ContainerException
     */
    public function __construct(Container $container)
    {
        $this->postTable = $container->get(PostTable::class);
        $this->likedPostTable = $container->get(LikedPostTable::class);
    }

    /**
     * Get posts ordered by their submission.
     *
     * @param int $offset
     * @return array
     */
    public function getNewPosts(int $offset = 0)
    {
        $query = $this->postTable->newSelect();
        $query->select('*')
            ->orderDesc('created_at')
            ->offset($offset)
            ->limit(20);

        $posts = $query->execute()
            ->fetchAll('assoc');

        foreach ($posts as $key => $post) {
            $likeQuery = $this->likedPostTable->newSelect(false);
            $likeQuery->select(['count' => $query->func()->count('*')])
                ->where(['post_id' => $post['id']]);

            $posts[$key]['likes'] = $likeQuery->execute()->fetch();
        }

        return $posts;
    }

    /**
     * Get posts ordered by their votes.
     *
     * @param int $offset
     * @return array
     */
    public function getHotPosts(int $offset = 0)
    {
        $query = $this->likedPostTable->newSelect(false);
        $query->select([
            'count' => $query->func()->count('post_id'),
            'post_id' => 'id',
        ])
            ->group(['post_id'])
            ->offset($offset)
            ->limit(20);

        $likes = $query->execute()
            ->fetchAll('assoc');

        $posts = [];
        foreach ($likes as $key => $like) {
            $postQuery = $this->postTable->newSelect();
            $postQuery->select('*')->where(['id' => $like['post_id']]);
            $post = $postQuery->execute()->fetch('assoc');
            $post['likes'] = $like['count'];
            $posts[] = $post;
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
        return (bool)$this->postTable->archive($postId, $userId);
    }

    /**
     * Check if post exists.
     *
     * @param string $postId
     * @return bool
     */
    public function existPost(string $postId): bool
    {
        return $this->postTable->exist('id', $postId);
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
}
