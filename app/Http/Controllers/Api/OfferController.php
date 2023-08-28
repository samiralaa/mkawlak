<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Offer;
use App\Events\SendNotificationUser;
use App\Http\Controllers\Controller;
use App\Notifications\UserNotification;
use App\Http\Resources\Offer\OfferResource;
use App\Http\Requests\Api\Offer\OfferStoreRequest;
use App\Http\Requests\Api\Offer\OfferUpdateRequest;
use App\Mail\Offermail;
use Illuminate\Support\Facades\Mail;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $offers = OfferResource::collection(Offer::with('post', 'company')->get());
        return successResponseData($offers, 'Success', 201);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OfferStoreRequest $request)
    {
        $offer = Offer::create([
            'name' => auth('company')->user()->name,
            'company_id' => auth('company')->id(),
        ] + $request->validated());

        $offer = OfferResource::make($offer->load('post', 'company'));

        $user = User::whereHas('posts', function ($q) use ($request) {
            $q->where('id', $request->post_id);
        })->first();

        $user->notify(new UserNotification($offer));
        event(new SendNotificationUser($offer));

        Mail::to($user->email, $user->name)->send(new Offermail($offer->company));

        return successResponseData($offer, 'Success', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Offer $offer)
    {
        $offer = OfferResource::make($offer->load('post', 'company'));
        return successResponseData($offer);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OfferUpdateRequest $request, Offer $offer)
    {
        $offer->update([
            'name' => auth('company')->user()->name
        ] + $request->validated());

        $offer->load('post', 'company');
        $offer = OfferResource::make($offer->refresh());

        return successResponseData($offer, 'Success', 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Offer $offer)
    {
        $offer->delete();
        return successResponseMessage();
    }
}
