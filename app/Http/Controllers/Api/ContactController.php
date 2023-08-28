<?php

namespace App\Http\Controllers\Api;

use App\Models\Contact;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Contact\StoreRequest;

class ContactController extends Controller
{
    public function store(StoreRequest $request)
    {
        Contact::create($request->validated());
        return successResponseMessage();
    }
}
