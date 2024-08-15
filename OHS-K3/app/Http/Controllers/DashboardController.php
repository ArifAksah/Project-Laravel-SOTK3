<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\ExpensesChart;
use App\Charts\CategoryChart;
use App\Charts\PlantGrafik;
use App\Charts\StatusChart;

class DashboardController extends Controller
{
    public function index(ExpensesChart $expensesChart, CategoryChart $categoryChart,PlantGrafik $plantgrafik,StatusChart $statusChart)
    {
        return view('dashboard', [
            'expensesChart' => $expensesChart->build(),
            'categoryChart' => $categoryChart->build(),
            'plantgrafik' => $plantgrafik->build(),
            'statusChart' => $statusChart->build()
        ]);
    }
}
