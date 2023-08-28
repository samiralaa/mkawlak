<?php

namespace App\Http\Controllers\Api\User\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\Auth\SendVerificationEmail;
use App\Http\Resources\User\Auth\LoginResource;
use App\Http\Requests\Api\Auth\User\LoginRequest;
use App\Http\Requests\Api\Auth\User\UpdateRequest;
use App\Http\Resources\User\Auth\RegisterResource;
use App\Http\Requests\Api\Auth\User\RegisterRequest;
use App\Http\Requests\Api\Auth\User\VerifiedRequest;
use App\Http\Resources\User\UserResource;
use App\Mail\Otp;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'password'  => Hash::make($request->password),
            'code'      => random_int(100000, 999999)
        ] + $request->validated());

        $user->addMedia($request->personal_photos)->toMediaCollection();
        $user->addMedia($request->id_photo)->toMediaCollection('id_photo');

        $user['token']            = auth('api')->login($user);
        $user['expiration_token'] = auth('api')->payload()['exp'];
        $user                     = RegisterResource::make($user);

        if (app()->environment() == 'production')
            Mail::to($user->email, $user->name)->send(new SendVerificationEmail($user));

        return successResponseData($user, 'Created User Successfully', 201);
    }

    public function login(LoginRequest $request)
    {
        if (!$token = Auth::guard('api')->attempt(['email' => $request->email, 'password' => $request->password]))
            return errorResponseMessage('Verify your email and password', 401);

         $user                     = auth('api')->user();
        //  $user['expiration_token'] = auth('api')->payload()['exp'];
        //  $user['token']            = $token;
        //  $user                     = LoginResource::make($user);
        $otp=random_int(100000, 999999);

        $user->update(['otp'=>$otp]);
        
         if (app()->environment() == 'production'){
           Mail::to($user->email, $user->name)->send(new Otp($user));
         }



      //  return successResponseData($user, 'User Login Successfully');
        return successResponseData([], 'Otp Send');
    }

    public function verifyOtp(Request $request)
    {

        $user=User::where('email',$request->email)->where('otp',$request->otp)->whereNotNull('otp')->first();
        $users=User::where('email',$request->email)->where('otp',$request->otp)->whereNotNull('otp')->first();
        if(!$user){
            return errorResponseMessage('Wrong Otp', 401);
        }


        $user['token']            = auth('api')->login($user);
        $user['expiration_token'] = auth('api')->payload()['exp'];
        $user                     = RegisterResource::make($user);


        if (app()->environment() == 'production'){
          Mail::to($user->email, $user->name)->send(new Otp($user));
        }

        $users->update(['otp'=>null]);

        return successResponseData($user, 'User Login Successfully');
    }

    public function logout()
    {
        auth('api')->logout();
        return successResponseMessage('Logout Successfully');
    }

    public function verified(VerifiedRequest $request)
    {
        $user = User::find(auth('api')->id());

        if ($user->code != $request->code)
            return errorResponseMessage('The verification code is incorrect', 401);

        $user->update(['code' => null, 'email_verified_at' => now()]);
        return successResponseMessage('The code has been verified to succeed');
    }

    public function show(User $user)
    {
        $user = UserResource::make(User::find(auth('api')->id()));
        return successResponseData($user, 'The code has been verified to succeed');
    }

    public function update(UpdateRequest $request)
    {
        $user = User::find(auth('api')->id());
        $user->update($request->validated());

        if ($request->personal_photos)
            $user->addMedia($request->personal_photos)->toMediaCollection();

        if ($request->id_photo)
            $user->addMedia($request->id_photo)->toMediaCollection('id_photo');

        return successResponseMessage('The  User Update succeed');
    }

    public function destroy()
    {
        $user = User::find(auth('api')->id());
        $user->delete();
        return successResponseMessage('The code has been verified to succeed');
    }

    function notifications()
    {
        $notifications = auth('api')->user()->notifications;
        return successResponseData($notifications, 'User Notifications Successfully');
    }
}
