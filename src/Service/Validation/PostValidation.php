<?php

namespace App\Service\Validation;


use App\Repository\PostRepository;
use App\Util\ValidationResult;
use Interop\Container\Exception\ContainerException;
use Slim\Container;

/**
 * Class PostValidation
 */
class PostValidation extends AppValidation
{
    /**
     * @var PostRepository
     */
    private $postRepository;

    /**
     * PostValidation constructor.
     *
     * @param Container $container
     * @throws ContainerException
     */
    public function __construct(Container $container)
    {
        parent::__construct($container);
        $this->postRepository = $container->get(PostRepository::class);
    }

    /**
     * Validate post creation.
     *
     * @param string $post
     * @param string $userId
     * @return ValidationResult
     */
    public function validateCreate(string $post, string $userId): ValidationResult
    {
        $validationResult = new ValidationResult(__('Please check your submission'));

        $this->validateUser($userId, $validationResult);

        $this->validateLengthMax($post, 'post', $validationResult, 1000);
        $this->validateLengthMin($post, 'post', $validationResult);
        return $validationResult;
    }

    /**
     * Validate if a user can like a post.
     *
     * @param string $postId
     * @param string $userId
     * @return ValidationResult
     */
    public function validateLike(string $postId, string $userId): ValidationResult
    {
        $validationResult = new ValidationResult(__('Like not possible'));

        $this->validateUser($userId, $validationResult);

        $existsPost = $this->postRepository->existPost($postId);
        if (!$existsPost) {
            $message = __('Post does not exist');
            $validationResult->setError('like', $message);
            $validationResult->setMessage($message);
            return $validationResult;
        }

        $isOwner = $this->postRepository->isPostOwner($postId, $userId);
        if ($isOwner) {
            $message = __('You can not like your own posts');
            $validationResult->setError('like', $message);
            $validationResult->setMessage($message);
            return $validationResult;
        }

        $hasAlreadyLiked = $this->postRepository->hasAlreadyLiked($postId, $userId);
        if ($hasAlreadyLiked) {
            $message = __('You already liked this post');
            $validationResult->setError('like', $message);
            $validationResult->setMessage($message);
            return $validationResult;
        }

        return $validationResult;
    }

    /**
     * Validate if a user can like a post.
     *
     * @param string $postId
     * @param string $userId
     * @return ValidationResult
     */
    public function validateUnlike(string $postId, string $userId): ValidationResult
    {
        $validationResult = new ValidationResult(__('Like not possible'));

        $this->validateUser($userId, $validationResult);

        $existsPost = $this->postRepository->existPost($postId);
        if (!$existsPost) {
            $message = __('Post does not exist');
            $validationResult->setError('like', $message);
            $validationResult->setMessage($message);
            return $validationResult;
        }

        $isOwner = $this->postRepository->isPostOwner($postId, $userId);
        if ($isOwner) {
            $message = __('You can not like your own posts');
            $validationResult->setError('like', $message);
            $validationResult->setMessage($message);
            return $validationResult;
        }

        $hasAlreadyLiked = $this->postRepository->hasAlreadyLiked($postId, $userId);
        if (!$hasAlreadyLiked) {
            $message = __('You have not already liked this post');
            $validationResult->setError('like', $message);
            $validationResult->setMessage($message);
            return $validationResult;
        }

        return $validationResult;
    }
}
