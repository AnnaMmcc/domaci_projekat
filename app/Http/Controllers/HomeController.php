<?php

namespace App\Http\Controllers;

use App\Models\HomepageModel;
use App\Repositories\HomePageRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index()
    {
        $trenutnoVreme = date("h:i:s");
        $trenutnoSati = date("h");
        $newestProducts = HomepageModel::all();

        return view("welcome", compact('trenutnoVreme', 'trenutnoSati', 'newestProducts'));
    }
}








