<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Sell;
use App\Models\Buy;
use App\Models\Bill;
use App\Models\Pay;


class DashboardController extends Controller
{
    public function index()
    {
        return view(
            'dashboard.index',
            [
                'categories' => Category::all(),
                'sells' => Sell::all(),
                'buys' => Buy::all(),
                'bills' => Bill::all(),
                'pays' => Pay::all()

            ]
        );
    }
}
