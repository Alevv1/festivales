<?php

namespace App\Http\Controllers;

use App\Http\Models\Festival;

class FestivalController extends Controller
{
    public function index()
    {
        $festivals = Festival::all();
        return view('tours.index', compact('festivals'));
    }
}
