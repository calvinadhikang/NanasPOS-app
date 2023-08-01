<?php

namespace App\Http\Controllers;

use App\Models\Htrans;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    //
    public function viewLaporanTest(Request $request){

        $transactions = Htrans::select(
            DB::raw('DATE(created_at) AS transaction_day'),
            DB::raw('SUM(grandtotal) AS total_transactions')
        )
        ->whereYear('created_at', 2023)
        ->whereMonth('created_at', 7)
        ->groupBy(DB::raw('DATE(created_at)'))
        ->orderBy(DB::raw('DATE(created_at)'))
        ->get();

        return response()->json([
            "data" => $transactions
        ]);
    }

    public function viewLaporan(){
        return view('laporan');
    }

    public function generateLaporan(Request $request){
        $bulan = $request->input('bulan');
        $tahun = $request->input('tahun');

        $bulanArray = ["Januari", "Febuari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
        $bulanText = $bulanArray[$bulan-1];

        $transactions = Htrans::select(
            DB::raw('DATE(created_at) AS transaction_day'),
            DB::raw('SUM(grandtotal) AS total_transactions')
        )
        ->whereYear('created_at', $tahun)
        ->whereMonth('created_at', $bulan)
        ->groupBy(DB::raw('DATE(created_at)'))
        ->orderBy(DB::raw('DATE(created_at)'))
        ->get();

        $total = 0;
        foreach ($transactions as $key => $value) {
            $total += $value->total_transactions;
        }

        $pdf = Pdf::loadView('template.laporan.laporan_penjualan', [
            'bulan' => $bulanText,
            'tahun' => 2023,
            'data' => $transactions,
            'total' => $total
        ]);

        return $pdf->download("laporan_$bulanText.pdf");
    }
}
