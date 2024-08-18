<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\ExpensesChart;
use App\Charts\ExpensesChartUser;
use App\Charts\CategoryChart;
use App\Charts\CategoryChartUser;
use App\Charts\PlantGrafik;
use App\Charts\PlantGrafikUser;
use App\Charts\StatusChart;
use App\Charts\StatusChartUser;

class DashboardController extends Controller
{
    public function index(
        ExpensesChart $expensesChart,
        ExpensesChartUser $expensesChartUser,
        CategoryChart $categoryChart,
        CategoryChartUser $categoryChartUser,
        PlantGrafik $plantgrafik,
        StatusChart $statusChart,
        PlantGrafikUser $plantgrafikUser,
        StatusChartUser $statusChartUser
    )
    {
        // Mengembalikan view dashboard dengan data chart yang dibangun
        return view('dashboard', [
            'expensesChart' => $expensesChart->build(),
            'expensesChartUser' => $expensesChartUser->build(),
            'categoryChart' => $categoryChart->build(),
            'categoryChartUser' => $categoryChartUser->build(),
            'plantgrafik' => $plantgrafik->build(), 
            'statusChart' => $statusChart->build(), 
            'plantGrafikUser' => $plantgrafikUser->build(), 
            'statusChartUser' => $statusChartUser->build() 

        ]);
    }
}
