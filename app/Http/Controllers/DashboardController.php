<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Display dashboard
     *
     * @return Factory|View
     */
    public function index()
    {
        return view('dashboard.index');
    }

}
