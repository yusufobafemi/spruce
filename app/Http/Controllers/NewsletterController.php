<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $email = $request->input('email');

        $existing = Subscriber::where('email', $email)->latest()->first();

        // Check if subscribed
        if (Subscriber::where('email', $email)->exists()) {
            return response()->json(['message' => 'You have already subscribed with this email.'], 409);
        }

        Subscriber::create(['email' => $email]);

        return response()->json(['message' => 'Thanks for subscribing!']);
    }
}
