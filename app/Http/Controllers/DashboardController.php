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

        $categories = Category::paginate(10);
        foreach ($categories as $index => $category) {

            $categories[$index]->weight = $category->buy->sum('weight') - $category->sell->sum('weight');
        }

        return view(
            'dashboard.index',
            [
                'categories' => $categories,
                'sells' => Sell::all(),
                'buys' => Buy::all(),
                'bills' => Bill::all(),
                'pays' => Pay::all()

            ]
        );
    }
}
