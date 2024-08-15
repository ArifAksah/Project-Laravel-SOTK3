<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\Inspection;

class PlantGrafik
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        // Menghitung jumlah inspeksi untuk setiap jenis plant
        $plant2_3 = Inspection::where('plant', 'Plant 2/3')->count();
        $plant4 = Inspection::where('plant', 'Plant 4')->count();
        $plant5 = Inspection::where('plant', 'Plant 5')->count();
        $powerPlant = Inspection::where('plant', 'Power Plant')->count();
        $headOffice = Inspection::where('plant', 'Head Office')->count();
        $tambang = Inspection::where('plant', 'Tambang')->count();

        // Membuat grafik batang dengan data yang sudah diambil
        return $this->chart->barChart()
            ->setTitle('Plant Inspection Count')
            ->setSubtitle('Total inspections per plant')
            ->addData('Inspections', [$plant2_3, $plant4, $plant5, $powerPlant, $headOffice, $tambang])
            ->setXAxis(['Plant 2/3', 'Plant 4', 'Plant 5', 'Power Plant', 'Head Office', 'Tambang']);
    }
}
