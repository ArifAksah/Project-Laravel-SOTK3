<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\Inspection;

class CategoryChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\RadialChart
    {
        // Ambil jumlah inspeksi berdasarkan status
        $closeCount = Inspection::where('status', 'Close')->count();
        $openCount = Inspection::where('status', 'Open')->count();
        
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
