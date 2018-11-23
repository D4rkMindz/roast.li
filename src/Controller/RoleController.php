<?php

namespace App\Controller;

use App\Repository\RoleRepository;
use Psr\Http\Message\ResponseInterface;
use Slim\Container;
use Slim\Http\Request;
use Slim\Http\Response;

/**
 * RoleController
 */
class RoleController extends AppController
{
    /**
     * @var RoleRepository
     */
    private $roleRepository;

    /**
     * RoleController constructor.
     *
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        parent::__construct($container);
        $this->roleRepository = $container->get(RoleRepository::class);
    }

    /**
     * Get all roles.
     *
     * @param Request $request
     * @param Response $response
     * @return ResponseInterface
     */
    public function getAllRolesAction(Request $request, Response $response): ResponseInterface
    {
        $roles = $this->roleRepository->getRoles();
        return $this->json($response, $roles);
    }
}
