<?php

namespace App\Controllers;

use App\Services\HomeService;

class Home extends BaseController
{

    protected $homeService;

    public function __construct()
    {
        $this->homeService = new HomeService();
    }

    public function index()
    {
        return $this->homeService->index();
    }
}
