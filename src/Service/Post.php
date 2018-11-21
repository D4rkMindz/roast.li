<?php

namespace App\Service;


use App\Repository\PostRepository;
use App\Repository\UserRepository;
use Interop\Container\Exception\ContainerException;
use Slim\Container;

/**
 * Class Post
 */
class Post
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @var PostRepository
     */
    private $postRepository;

    /**
     * Post constructor.
     * @param Container $container
     * @throws ContainerException
     */
    public function __construct(Container $container)
    {
        $this->userRepository = $container->get(UserRepository::class);
        $this->postRepository = $container->get(PostRepository::class);
    }

    public function createPost(string $text, string $userId)
    {
        $this->postRepository->createPost($text, $userId);
    }
}
