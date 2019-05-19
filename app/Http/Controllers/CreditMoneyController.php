<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CreditMoneyController extends Controller
{

    public function create(){

        return view('admin.videos.search_tmdb')->with('page', 'videos');
    }
}
