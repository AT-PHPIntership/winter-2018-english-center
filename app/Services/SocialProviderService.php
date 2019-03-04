<?php
namespace App\Services;

use Socialite;
use App\Models\SocialProvider;
use App\Models\User;
use Laravel\Socialite\Two\InvalidStateException;
use DB;
use App\Services\ImageService;

class SocialProviderService
{
    /**
     * Where to receipt users from ImageService.
     *
     * @var $imageService
     */
    private $imageService;

    /**
     * Create a new controller instance.
     *
     * @param ImageService $imageService ImageService
     *
     * @return void
     */
    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    /**
     * Obtain the user information from provider.
     *
     *@param collection $provider [request login]
     *
     * @return Response
     */
    public function createOrGetUser($provider)
    {
        try {
            $socialUser = Socialite::driver($provider)->user();
        } catch (Exception $e) {
            session()->flash('warning', __('common.warning_login'));
            return redirect()->route('user.login');
        }
        //check if we have logged provider
        $socialProvider = SocialProvider::where('provider_id', $socialUser->getId())->first();
        if (!$socialProvider) {
            DB::beginTransaction();
            try {
                if (!(User::where('email', $socialUser->getEmail())->first())) {
                    //create a new user and provider
                    $user = User::firstOrCreate([
                        'email' => $socialUser->getEmail(),
                        'role_id' => 0
                    ]);
                    $user->userProfile()->create([
                        'url' => $socialUser->getAvatar(),
                        'name' => $socialUser->getName(),
                    ]);
                    $user->socialProviders()->create(
                        ['provider_id' => $socialUser->getId(), 'provider' => $provider]
                    );
                    DB::commit();
                } else {
                    throw new InvalidStateException(__('common.error_login'));
                }
            } catch (\Exception $ex) {
                DB::rollback();
                throw new InvalidStateException($ex->getMessage());
            }
        } else {
            $user = $socialProvider->user;
        }
        auth()->login($user);
    }
}
