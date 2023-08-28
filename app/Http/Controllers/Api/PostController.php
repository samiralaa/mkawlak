<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Http\Resources\Post\PostResource;
use App\Http\Requests\Api\Post\StoreRequest;
use App\Http\Requests\Api\Post\UpdateRequest;
use App\Mail\Offermail;
use App\Mail\Postmail;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
class PostController extends Controller
{
    public function index()
    {
        $posts = PostResource::collection(Post::with('user', 'category', 'offers', 'offers.company')
        ->where('client_type',Auth::guard('company')->user()->company_type)->get());
        return successResponseData($posts);
    }

    public function store(StoreRequest $request)
    {

        $post = Post::create([
            'user_id' => auth('api')->id()
        ] + $request->validated());



        foreach ($request->image as $image) {
            $post->addMedia($image)->toMediaCollection();
        }
        if($request->plan == 'plan'){
         foreach ($request->image_plan as $image) {
             $post->addMedia($image)->toMediaCollection('plan');
         }
        }
        $companies=Company::where('company_type',$post->client_type)->get();
        foreach($companies as $company){
          Mail::to($company->email, $company->name)->send(new Postmail($post));
        }
        $post = PostResource::make($post->load('user', 'category', 'offers'));
        return successResponseData($post);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $post = PostResource::make($post->where('client_type',Auth::guard('company')->user()->company_type)->load('user', 'category', 'offers'));
        return successResponseData($post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Post $post)
    {
        $post->update($request->validated());

        if ($request->image) {
            $post->clearMediaCollection('default');
            foreach ($request->image as $image) {
                $post->addMedia($image)->toMediaCollection();
            }
        }

        $post = PostResource::make($post->refresh()->load('category'));
        return successResponseData($post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        $post = PostResource::make($post);
        return successResponseData($post);
    }

    public function self()
    {
        $posts = Post::where('user_id', auth('api')->id())->with('user', 'category', 'offers', 'offers.company')->get();
        $posts = PostResource::collection($posts);
        return successResponseData($posts);
    }
}
