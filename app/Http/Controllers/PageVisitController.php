<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PageVisit;
class PageVisitController extends Controller
{
    public function index()
    {
        $visits = PageVisit::latest()->paginate(20);
        return view('admin.page-visits.index', compact('visits'));
    }

}
