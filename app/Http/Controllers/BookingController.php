<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        // dd($request);
        // $valData = $request->validate([
        //     'name'=> 'required|unique:products|min:3|max:100',
        //     'email'=> 'required|unique:products|min:3|max:100',
        //     'phone'=> 'required|unique:products|min:3|max:100',
        //     'age'=> 'required|unique:products|min:3|max:100',
        //     'dietry'=> 'nullable',

        //     Border
        //     'name' => [],
        //     'email'=> [],
        //     'phone'=> [],
        //     'age'=> [],
        //     'dietry'=> [],
        // ]);

        $valData = $request->validate([
            'name' => [],
            'email'=> [],
            'phone'=> [],
            'age'=> [],
            'dietary'=> [],
        ]);

        Booking::create($valData);
        print_r($valData);
        return back()->with('success', 'New product was added!');
    }
}
