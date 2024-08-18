<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\Inspection;
use Illuminate\Support\Facades\Auth;

class CategoryChartUser
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

        // Ambil jumlah inspeksi berdasarkan status dan user_id yang sama dengan ID pengguna yang login
        $closeCount = Inspection::where('status', 'Close')
            ->where('user_id', $user->id)
            ->count();
        $openCount = Inspection::where('status', 'Open')
            ->where('user_id', $user->id)
            ->count();
        
        // Hitung total inspeksi
        $totalInspections = $closeCount + $openCount;
        
        // Hitung persentase
        $closePercentage = $totalInspections ? ($closeCount / $totalInspections) * 100 : 0;
        $openPercentage = $totalInspections ? ($openCount / $totalInspections) * 100 : 0;

        // Bangun grafik radial dengan persentase
        return $this->chart->radialChart()
            ->setTitle('Persentase Status Inspeksi')
            ->setSubtitle('Open vs Close')
            ->addData([round($closePercentage, 2), round($openPercentage, 2)])
            ->setLabels(['Close', 'Open'])
            ->setColors(['#D32F2F', '#03A9F4']);
    }
}
