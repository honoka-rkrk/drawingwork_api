<?php

namespace App\Services;

use App\Repositories\UserContract;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;


class AuthService implements AuthServiceInterface
{
    protected $userRepository;

    /**
     * create a new instance
     *
     * @param UserContract $userRepository
     */
    public function __construct(UserContract $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * login function
     *
     * @param Request $request
     * @return array
     */
    public function login($request)
    {
        $userData = [];
        if ($request->grantType == config('const.grant_type.login')) {
            // login
            if (empty($request->storeKey)) {
                return [Response::HTTP_BAD_REQUEST, ['message' => [trans('auth.failed')]]];
            }

            // check status of user
            $user = $this->userRepository->findByStoreKey($request->storeKey);
            try {
                if (empty($user)) {
                    $user = $this->userRepository->create([
                        'store_key' => $request->storeKey,
                        'description' => $request->description,
                        'photoUrl' => $request->photoUrl,
                        'provider' => $request->provider,
                        'providerUid' => $request->providerUid,
                        'screenName' => $request->screenName,
                        'photoUrl' => $request->photoUrl,
                        'refresh_token' => 'refresh token',
                        'refresh_token_expired_at' => now()->addMinutes(config('const.refresh_token_lifetime')),
                        'last_logged_in_at' => now(),
                    ]);
                }
            } catch (\Throwable $th) {
                \Log::error($th);
                return [Response::HTTP_INTERNAL_SERVER_ERROR, ['message' => [trans('auth.failed')]]];
            }
            $userData['last_logged_in_at'] = now();
        } else { // refresh token
            $user = $this->userRepository->findByRefreshToken($request->refreshToken, true, null);
            if (empty($user)) {
                return [Response::HTTP_REQUEST_TIMEOUT, ['message' => [trans('auth.failed')]]];
            }

            if ($user->refresh_token_expired_at->lt(now())) {
                return [Response::HTTP_REQUEST_TIMEOUT, ['message' => [trans('auth.failed')]]];
            }
        }

        \DB::beginTransaction();
        try {
            // delete all access token of user
            $user->tokens()->delete();
            // create new access token
            $accessToken = $user->createToken('userToken-' . $user->id, ['role:user'])->plainTextToken;
            // update user
            $refreshToken = generateHashToken();
            $this->userRepository->update($user, $userData + [
                'refresh_token' => $refreshToken,
                'refresh_token_expired_at' => now()->addMinutes(config('const.refresh_token_lifetime')),
            ]);
            \DB::commit();
        } catch (\Throwable $th) {
            \DB::rollback();
            \Log::error($th);
            return [Response::HTTP_INTERNAL_SERVER_ERROR, ['message' => [trans('auth.failed')]]];
        }

        return [Response::HTTP_OK, [
            'accessToken' => $accessToken,
            'refreshToken' => $refreshToken,
            'loginId' => $user->id,
            'user' => $user,
        ]];
    }

    /**
     * logout function
     *
     * @return array
     */
    public function logout()
    {
        $user = Auth::user();
        \DB::beginTransaction();
        try {
            // update refresh_token_expired_at
            $this->userRepository->update($user, ['refresh_token_expired_at' => now()->subDay()]);

            // delete all access token of user
            $user->tokens()->delete();
            \DB::commit();
        } catch (\Throwable $th) {
            \DB::rollback();
            \Log::error($th);
            return [Response::HTTP_INTERNAL_SERVER_ERROR, ['message' => [trans('auth.failed')]]];
        }
        return [Response::HTTP_NO_CONTENT, null];
    }
}
