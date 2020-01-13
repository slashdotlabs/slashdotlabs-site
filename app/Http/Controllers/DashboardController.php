<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Display dashboard
     *
     * @return Factory|View
     */
    public function index()
    {
        return view('dashboard');
    }

}
