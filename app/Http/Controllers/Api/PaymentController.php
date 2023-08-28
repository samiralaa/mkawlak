<?php

namespace App\Http\Controllers\Api;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\Api\payment\StorePaymentRequest;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePaymentRequest $request)
    {
        Payment::create($request->validated());
        return successResponseMessage('تم الدفع بي نجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {

        $payment = Payment::whereCompanyId(auth('company')->id())->first();
        if (! $payment)
            return errorResponseMessage('لم يتم الدفع بعد', 404);

        $token = base64_encode('sk_test_7uMQEpKELWCrvFTGYcxatgjjq3tu6ypszUn5w68D' . ':' . '');

        $response = Http::asForm()->withHeaders([
            'Authorization' => 'Basic ' . $token,
            'Content-Type'  => 'application/x-www-form-urlencoded',
        ])->get("https://api.moyasar.com/v1/payments/{$payment->payment_id}");

        return successResponseData($response->json());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
