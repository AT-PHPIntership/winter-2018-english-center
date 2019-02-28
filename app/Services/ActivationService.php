<?php

namespace App\Services;

use DB;
use App\Models\User;
use App\Models\UserProfile;
use Mail;
use App\Services\UserService;
use League\Flysystem\Exception;

class ActivationService
{
    /**
    * Handle user register and send mail
    *
    * @param array $data data
    *
    * @return void
    */
    public function register($data)
    {
        try {
            $user = app(UserService::class)->createUser($data)->toArray();
            $user['link'] = str_random(30);
            DB::table('user_activations')->insert([
                'user_id' => $user['id'],
                'token' => $user['link']
            ]);
            Mail::send('frontend.email.activation', ['user' => $user], function ($message) use ($user) {
                $message->to($user['email']);
                $message->subject(trans('layout_user.register.email.subject'));
            });
            session()->flash('message', __('layout_user.register.email.code'));
        } catch (Exception $ex) {
            session()->flash('warning', __('layout_user.register.email.error', ['attribute' => $ex->getMessage()]));
            return redirect()->back();
        }
    }
    /**
    * Handle activation link from email
    *
    * @param string $token [identify user]
    *
    * @return session
    */
    public function activation($token)
    {
        $check = DB::table('user_activations')->where('token', $token)->first();
        if (!is_null($check)) {
            $user = User::findOrFail($check->user_id);
            if ($user->is_actived == 1) {
                session()->flash('message', __('layout_user.register.email.active'));
                return redirect()->route('user.login');
            }
            $user->update(['is_actived' => 1]);
            DB::table('user_activations')->where('token', $token)->delete();
            session()->flash('message', __('layout_user.register.email.active'));
            return redirect()->route('user.login');
        }
        session()->flash('warning', __('layout_user.register.email.invalid'));
    }
}
