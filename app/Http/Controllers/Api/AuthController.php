<?php

namespace App\Http\Controllers\Api;

use App\Services\AuthServiceInterface;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $authService;

    /**
     * create a new instance
     *
     * @param AuthServiceInterface $authService
     */
    public function __construct(AuthServiceInterface $authService)
    {
        $this->authService = $authService;
    }

    /**
     * Post login API-LG-010
     *
     * @param Request $request
     * @return json
     */
    public function login(Request $request)
    {
        list($statusCode, $data) = $this->authService->login($request);

        return $this->response($data, $statusCode);
    }

    /**
     * Logout API-LG-020
     *
     * @return json
     */
    public function logout()
    {
        list($statusCode, $data) = $this->authService->logout();
        return $this->response($data, $statusCode);
    }
}
