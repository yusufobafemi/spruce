<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AppLink;

class AppLinkController extends Controller
{
    public function save(Request $request)
    {
        $request->validate([
            'apple_link' => 'required|url',
            'google_link' => 'required|url',
        ]);

        AppLink::updateOrCreate(['platform' => 'apple'], ['url' => $request->apple_link]);
        AppLink::updateOrCreate(['platform' => 'google'], ['url' => $request->google_link]);

        return response()->json(['message' => 'Links saved successfully!']);
    }

    public function showLanding()
    {
        $appLinks = AppLink::pluck('url', 'platform')->toArray();

        return view('landing', compact('appLinks'));
    }
}
