<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function index()
    {
        $customers = User::ofType('customer')->with('customer_biodata')->get();
        return view('admin.customers', ['customers' => $customers ]);
    }
}
