<?php
/**
 * Created by PhpStorm.
 * User: bjorn
 * Date: 05.11.18
 * Time: 22:04
 */

namespace App\Controller;


use App\Repository\PostRepository;
use App\Service\Validation\PostValidation;
use App\Util\ValidationResult;
use Psr\Http\Message\ResponseInterface;
use Slim\Container;
use Slim\Http\Request;
use Slim\Http\Response;

class PostController extends AppController
{
    /**
     * @var PostValidation
     */
    private $postValidation;

    /**
     * @var PostRepository
     */
    private $postRepository;

    public function __construct(Container $container)
    {
        parent::__construct($container);
        $this->postValidation = $container->get(PostValidation::class);
        $this->postRepository = $container->get(PostRepository::class);
    }

    /**
     * Get posts ordered by their votes
     *
     * @param Request $request
     * @param Response $response
     * @return ResponseInterface
     */
    public function getHotPostsAction(Request $request, Response $response): ResponseInterface
    {
        $offset = $request->getQueryParam('offset') ?: 0;
        $posts = $this->postRepository->getHotPosts($offset);
        return $this->json($response, $posts);
    }

    /**
     * Get posts ordered by their submission
     *
     * @param Request $request
     * @param Response $response
     * @return ResponseInterface
     */
    public function getNewPostsAction(Request $request, Response $response): ResponseInterface
    {
        $offset = $request->getQueryParam('offset') ?: 0;
        $posts = $this->postRepository->getNewPosts($offset);
        return $this->json($response, $posts);
    }

    /**
     * Like a post
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return ResponseInterface
     */
    public function likePostAction(Request $request, Response $response, array $args): ResponseInterface
    {
        $postId = $args['post_id'];
        $this->setLoggedIn(2);
        $userId = $this->getUserId();
        $validationResult = $this->postValidation->validateLike($postId, $userId);
        if ($validationResult->fails()) {
            return $this->json($response, $validationResult->toArray());
        }
        $liked = $this->postRepository->like($postId, $userId);
        if ($liked) {
            return $this->json($response, ['success' => true]);
        }

        $message = __('Liking post failed!');
        $valResult = new ValidationResult($message);
        $valResult->setError('post', $message);
        $responseData = [
            'success' => false,
            'validation' => $valResult->toArray(),
        ];
        return $this->json($response, $responseData);
    }

    /**
     * @param Request $request
     * @param Response $response
     * @return ResponseInterface
     */
    public function createPostAction(Request $request, Response $response): ResponseInterface
    {
        $userId = $this->getUserId();
        $json = $request->getBody()->__toString();
        $data = json_decode($json, true);
        $text = $data['text'];

        $validationResult = $this->postValidation->validateCreate($text, $userId);
        if ($validationResult->fails()) {
            $responseData['validation'] = $validationResult->toArray();
            $responseData['success'] = false;
            return $this->json($response, $responseData, 422);
        }

        $created = $this->postRepository->createPost($text, $userId);
        if ($created) {
            return $this->json($response, ['success' => true], 200);
        }

        $message = __('Creating post failed!');
        $valResut = new ValidationResult($message);
        $valResut->setError('post', $message);
        $responseData = [
            'success' => false,
            'validation' => $valResut->toArray(),
        ];
        return $this->json($response, $responseData, 500);
    }
}
