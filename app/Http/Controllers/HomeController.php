<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class HomeController 
{
    public function index()
    {
        return view('home');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        return view('search_results', compact('query'));
    }
}
