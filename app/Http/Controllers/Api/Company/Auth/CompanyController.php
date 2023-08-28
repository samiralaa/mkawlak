<?php

namespace App\Http\Controllers\Api\Company\Auth;

use App\Models\Company;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\Auth\SendVerificationEmail;
use App\Http\Resources\Company\CompanyResource;
use App\Http\Resources\Company\Auth\LoginResource;
use App\Http\Requests\Api\Auth\Company\LoginRequest;
use App\Http\Requests\Api\Auth\Company\UpdateRequest;
use App\Http\Resources\Company\Auth\RegisterResource;
use App\Http\Requests\Api\Auth\Company\RegisterRequest;
use App\Http\Requests\Api\Auth\Company\VerifiedRequest;
use App\Mail\Otp;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $companys = CompanyResource::collection(Company::get());
        return successResponseData($companys);
    }

    public function register(RegisterRequest $request)
    {
        $company = Company::create([
            'password'  => Hash::make($request->password),
            'code'      => random_int(100000, 999999)
        ] + $request->validated());

        $company->addMedia($request->personal_photos)->toMediaCollection();
        $company->addMedia($request->id_photo)->toMediaCollection('id_photo');
        $company->addMedia($request->company_profile)->toMediaCollection('company_profile');
        $company->addMedia($request->commercial_registration_file)->toMediaCollection('commercial_registration_file');

        $company['token']            = auth('company')->login($company);
        $company['expiration_token'] = auth('company')->payload()['exp'];
        $company                     = RegisterResource::make($company);

        if (app()->environment() == 'production')
            Mail::to($company->email, $company->name)->send(new SendVerificationEmail($company));

        return successResponseData($company, 'Created Company Successfully', 201);
    }

    public function login(LoginRequest $request)
    {
        if (!$token = Auth::guard('company')->attempt(['email' => $request->email, 'password' => $request->password]))
            return errorResponseMessage('Verify your email and password', 401);

        $company                     = auth('company')->user();
        // $company['token']            = $token;
        // $company['expiration_token'] = auth('company')->payload()['exp'];
        // $company                     = LoginResource::make($company);

        $otp=random_int(100000, 999999);
        $company->update(['otp'=>$otp]);
        if (app()->environment() == 'production'){
            Mail::to($company->email, $company->name)->send(new Otp($company));
          }



        //return successResponseData($company, 'User Login Successfully');
        return successResponseData([], 'Otp Send');
    }

    public function verifyOtp(Request $request)
    {

        $user=Company::where('email',$request->email)->where('otp',$request->otp)->whereNotNull('otp')->first();
        $users=Company::where('email',$request->email)->where('otp',$request->otp)->whereNotNull('otp')->first();
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
        auth('company')->logout();
        return successResponseMessage('Logout Successfully');
    }

    public function verified(VerifiedRequest $request)
    {
        $company = Company::find(auth('company')->id());
        if ($company->code != $request->code)
            return errorResponseMessage('The verification code is incorrect', 401);

        $company->update(['code' => null, 'email_verified_at' => now()]);
        return successResponseMessage('The code has been verified to succeed');
    }

    public function show(Company $company)
    {
        $company = CompanyResource::make($company->load('projects'));
        return successResponseData($company, 'The company data succeed');
    }

    public function self()
    {
        $company = CompanyResource::make(Company::find(auth('company')->id()));
        return successResponseData($company, 'The code has been verified to succeed');
    }

    public function update(UpdateRequest $request)
    {
        $company = Company::find(auth('company')->id());
        $company->update($request->validated());

        if ($request->personal_photos)
            $company->addMedia($request->personal_photos)->toMediaCollection();

        if ($request->personal_photos)
            $company->addMedia($request->id_photo)->toMediaCollection('id_photo');

        if ($request->personal_photos)
            $company->addMedia($request->company_profile)->toMediaCollection('company_profile');

        if ($request->personal_photos)
            $company->addMedia($request->commercial_registration_file)->toMediaCollection('commercial_registration_file');

        return successResponseMessage('The company has update to succeed');
    }

    public function destroy()
    {
        $company = Company::find(auth('company')->id());
        $company->delete();

        return successResponseMessage('The code has been verified to succeed');
    }

    public function top()
    {
        $companys = CompanyResource::collection(Company::limit(5)->get());
        return successResponseData($companys);
    }
}
