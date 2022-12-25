<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Sell;
use App\Models\Buy;
use App\Models\Report;
use App\Models\Order;
use App\Models\Customer;


class ReportController extends Controller
{
    public function index()
    {


      
        return view('dashboard.report.index', [
            'orders' =>  Order::all(),
            'buys' => Buy::all(),
            'customers'=> Customer::all()

        ]);
    }
}
