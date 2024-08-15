<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\Inspection;

class StatusChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\RadialChart
    {
        // Menghitung jumlah Positive dan Negative di kolom category
        $totalInspections = Inspection::count();
        $positiveCount = Inspection::where('category', 'Positive')->count();
        $negativeCount = Inspection::where('category', 'Negative')->count();

        // Menghitung persentase Positive dan Negative
        $positivePercentage = $totalInspections > 0 ? ($positiveCount / $totalInspections) * 100 : 0;
        $negativePercentage = $totalInspections > 0 ? ($negativeCount / $totalInspections) * 100 : 0;

        // Membuat grafik radial dengan data persentase yang sudah dihitung
        return $this->chart->radialChart()
            ->setTitle('Category Distribution')
            ->setSubtitle('Percentage of Positive vs Negative Inspections')
            ->addData([$positivePercentage, $negativePercentage])
            ->setLabels(['Positive', 'Negative'])
            ->setColors(['#4CAF50', '#F44336']);
    }
}
