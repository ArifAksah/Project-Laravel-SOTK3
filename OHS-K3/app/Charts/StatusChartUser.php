<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\Inspection;
use Illuminate\Support\Facades\Auth;

class StatusChartUser
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\RadialChart
    {
        // Ambil pengguna yang sedang login
        $user = Auth::user();

        // Ambil data inspeksi berdasarkan user_id yang sama dengan ID pengguna yang login
        $inspections = Inspection::where('user_id', $user->id)->get();

        // Menghitung jumlah Positive dan Negative di kolom category
        $totalInspections = $inspections->count();
        $positiveCount = $inspections->where('category', 'Positive')->count();
        $negativeCount = $inspections->where('category', 'Negative')->count();

        // Menghitung persentase Positive dan Negative dengan 2 angka di belakang koma
        $positivePercentage = $totalInspections > 0 ? number_format(($positiveCount / $totalInspections) * 100, 2) : 0;
        $negativePercentage = $totalInspections > 0 ? number_format(($negativeCount / $totalInspections) * 100, 2) : 0;

        // Membuat grafik radial dengan data persentase yang sudah dihitung
        return $this->chart->radialChart()
            ->setTitle('Category Distribution')
            ->setSubtitle('Percentage of Positive vs Negative Inspections')
            ->addData([$positivePercentage, $negativePercentage])
            ->setLabels(['Positive', 'Negative'])
            ->setColors(['#4CAF50', '#F44336']);
    }
}
