<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\Inspection;
use Illuminate\Support\Facades\Auth;

class PlantGrafikUser
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        // Ambil pengguna yang sedang login
        $user = Auth::user();

        // Ambil data inspeksi berdasarkan user_id yang sama dengan ID pengguna yang login
        $inspections = Inspection::where('user_id', $user->id)->get();

        // Hitung jumlah setiap jenis plant
        $plantCounts = $inspections->groupBy('plant')->map->count();

        // Ambil jenis plant dan jumlahnya
        $labels = $plantCounts->keys()->toArray();
        $data = $plantCounts->values()->toArray();

        return $this->chart->barChart()
            ->setTitle('Distribusi Inspeksi per Plant')
            ->setSubtitle('Jumlah inspeksi untuk setiap plant')
            ->addData('Jumlah Inspeksi', $data)
            ->setLabels($labels)
            ->setColors(['#FFA41B']); // Sesuaikan warna batang sesuai kebutuhan
    }
}
