<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\Inspection;
use Carbon\Carbon;

class ExpensesChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        // Ambil semua data inspeksi
        $inspections = Inspection::all();

        // Format data per hari
        $dailyData = $inspections->groupBy(function ($date) {
            return Carbon::parse($date->created_at)->format('d F Y'); // Hari, Bulan, dan Tahun
        })->map->count();

        // Format data per minggu
        $weeklyData = $inspections->groupBy(function ($date) {
            return Carbon::parse($date->created_at)->format('W Y'); // Minggu dan Tahun
        })->map->count();

        // Ambil hari dan minggu sebagai x-axis
        $days = $dailyData->keys()->toArray();
        $weeks = $weeklyData->keys()->toArray();

        // Ambil jumlah inspeksi sebagai data y-axis
        $dailyCounts = $dailyData->values()->toArray();
        $weeklyCounts = $weeklyData->values()->toArray();

        // Gabungkan label untuk x-axis (misal: gabung hari dan minggu)
        $labels = array_merge($days, $weeks);

        // Bangun grafik dengan dua dataset
        return $this->chart->lineChart()
            ->setTitle('Perbandingan Inspeksi Harian dan Mingguan')
            ->setSubtitle('Data Inspeksi selama Tahun Berjalan')
            ->addData('Inspeksi Harian', $dailyCounts)
            ->addData('Inspeksi Mingguan', $weeklyCounts)
            ->setColors(['#60A5FA', '#1E3A8A']) // Biru muda untuk hari, biru tua untuk minggu
            ->setXAxis($labels);
    }
}
