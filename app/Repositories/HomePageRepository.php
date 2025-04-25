<?php

namespace App\Repositories;

use App\Models\HomepageModel;

class HomePageRepository
{
    private $HomePageModel;

    public function __construct()
    {
        $this->HomePageModel = new HomepageModel();
    }
    public function GetItemsHome()
    {
        return $this->HomePageModel->select('name', 'description', 'price')->orderby('id', 'desc')->take(6)->get();
    }
}
