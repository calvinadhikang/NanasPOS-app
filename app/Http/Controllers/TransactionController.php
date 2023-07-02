<?php

namespace App\Http\Controllers;

use App\Models\Dtrans;
use App\Models\Htrans;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TransactionController extends Controller
{
    //
    public function transactionView(){
        $user = Session::get('user');
        $htrans = Htrans::where('divisi', '=', $user->divisi)->get();
        return view('master.transaction.view', [
            'data' => $htrans
        ]);
    }

    public function transactionDetailView($id){
        $htrans = Htrans::find($id);
        return view('master.transaction.detail', [
            'trans' => $htrans
        ]);
    }

    public function getTransaction($divisi){
        $htrans = Htrans::where('divisi', '=', $divisi)->get();
        return response()->json([
            'error' => false,
            'message' => "Berhasil fetch Transaksi",
            'data' => $htrans
        ], 200);
    }

    public function getTransactionDetail($id){
        $htrans = Htrans::find($id);
        $htrans->dtrans;

        return response()->json([
            'error' => false,
            'message' => "Berhasil fetch Detail Transaksi",
            'data' => $htrans
        ], 200);
    }

    public function createTransaction(Request $request){
        $grandTotal = $request->input('grandTotal');
        $user_id = $request->input('user_id');
        $divisi = $request->input('divisi');
        $items = $request->input('items');

        try {
            $htrans = new Htrans();
            $htrans->user_id = $user_id;
            $htrans->divisi = $divisi;
            $htrans->grandtotal = $grandTotal;
            $htrans->save();

            $lastId = $htrans->id;
            $test = "";

            //insert details
            foreach ($items as $key => $value) {
                $test = $value;
                $dtrans = new Dtrans();
                $dtrans->htrans_id = $lastId;
                $dtrans->nama = $value['nama'];
                $dtrans->harga = $value['harga'];
                $dtrans->qty = $value['qty'];
                $dtrans->subtotal = $value['subtotal'];
                $dtrans->save();
            }

            return response()->json([
                'error' => false,
                'message' => "Transaksi Berhasil",
                'data' => null
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
                'data' => null
            ], 500);
        }
    }
}
