<?php

namespace App\Http\Controllers;
use App\Venue;
use Illuminate\Http\Request;

class VenuesController extends Controller
{
    public function index()
    {
        $venues = Venue::all();
        return view('front.venues', compact('venues'));
    }
}
