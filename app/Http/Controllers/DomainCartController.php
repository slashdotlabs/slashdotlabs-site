<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DomainCartController extends Controller
{
    public function index()
    {
        return view('domaincart.index');
    }

}
