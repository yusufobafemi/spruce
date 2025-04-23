<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function loadSection($section)
    {
        $viewPath = 'admin.partials.' . $section . '-content';
        if (view()->exists($viewPath)) {
            return response()->json([
                'success' => true,
                'html' => view($viewPath)->render()
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Section not found'
        ], 404);
    }
}

