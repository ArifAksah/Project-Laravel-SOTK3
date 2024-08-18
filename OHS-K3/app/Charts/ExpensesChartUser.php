<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\Inspection;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ExpensesChartUser
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        // Ambil user_id dari pengguna yang sedang login
        $userId = Auth::id();

        // Ambil semua data inspeksi yang sesuai dengan user_id
        $inspections = Inspection::where('user_id', $userId)->get();

        // Format data per hari
        $dailyData = $inspections->groupBy(function ($date) {
            return Carbon::parse($date->created_at)->format('d F Y'); // Hari, Bulan, dan Tahun
        })->map->count();

        // Ambil hari sebagai x-axis
        $days = $dailyData->keys()->toArray();

        // Ambil jumlah inspeksi sebagai data y-axis
        $dailyCounts = $dailyData->values()->toArray();

        // Bangun grafik dengan titik point pada dataset harian
        return $this->chart->lineChart()
            ->setTitle('Inspeksi Harian')
            ->setSubtitle('Data Inspeksi selama Tahun Berjalan')
            ->addData('Inspeksi Harian', $dailyCounts)
            ->setColors(['#60A5FA']) // Biru muda untuk hari
            ->setMarkers(['#60A5FA'], 5, 10) // Menambahkan titik point
            ->setXAxis($days);
    }
}
