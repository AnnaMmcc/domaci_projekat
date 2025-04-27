<?php

namespace App\Http\Controllers;

use App\Models\HomepageModel;
use App\Repositories\HomePageRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    private $HomeRepo;

    public function __construct()
    {
        $this->HomeRepo = new HomePageRepository();
    }
    public function index()
    {
        $trenutnoVreme = date("h:i:s");
        $trenutnoSati = date("h");
        $newestProducts = $this->HomeRepo->GetItemsHome();

        return view("welcome", compact('trenutnoVreme', 'trenutnoSati', 'newestProducts'));
    }
}








