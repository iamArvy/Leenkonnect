<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        return inertia('Admin/Dashboard', [
            'title' => 'Dashboard',
        ]);
    }

    public function profile()
    {
        return view('store.profile');
    }

    public function orders()
    {
        return view('store.orders');
    }

    public function products()
    {
        return view('store.products');
    }

}
