<?php

namespace App\Http\Controllers;

use App\Models\HomepageModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $trenutnoVreme = date("h:i:s");
        $trenutnoSati = date("h");
        $newestProducts = HomepageModel::select('name', 'description', 'price')->orderby('id', 'desc')->take(6)->get();
        return view("welcome", compact('trenutnoVreme', 'trenutnoSati', 'newestProducts'));
    }
}








