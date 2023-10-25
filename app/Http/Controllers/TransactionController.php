<?php

namespace App\Http\Controllers;

use App\Models\Dtrans;
use App\Models\Htrans;
use App\Models\Menu;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class TransactionController extends Controller
{
    //
    public function transactionView(){
        $user = Session::get('user');
        $htrans = Htrans::where('divisi', '=', $user->divisi)->get();
        $htrans = Htrans::paginate(5);
        return view('master.transaction.view', [
            'data' => $htrans
        ]);

    }

    public function transactionAddView()
    {
        return view('master.transaction.add');
    }

    public function transactionDetailView($id){
        $htrans = Htrans::find($id);
        return view('master.transaction.detail', [
            'trans' => $htrans
        ]);
    }

    public function getTransaction($divisi){
        $currentDate = Carbon::today();
        $htrans = Htrans::where('divisi', '=', $divisi)->whereDate('created_at', $currentDate)->orderBy('status', 'asc')->orderBy('id', 'desc')->get();
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

    public function finishTransaction(Request $request, $id){
        $htrans = Htrans::find($id);
        $status = $htrans->status;
        if ($status == 0) {
            $htrans->status = 1;
            $htrans->save();

            return response()->json([
                'error' => false,
                'message' => "Berhasil Melunaskan Transaksi",
                'data' => ""
            ], 200);
        }else{
            return response()->json([
                'error' => true,
                'message' => "Transaksi Gagal",
                'data' => ""
            ], 200);
        }
    }

    public function deleteTransaction($id){
        $htrans = Htrans::find($id);
        $result = $htrans->delete();
        if ($result) {
            $dtrans = DB::table('dtrans')->where('htrans_id', $htrans->id)->delete();
            return response()->json([
                'error' => false,
                'message' => "Berhasil Hapus Transaksi $id",
                'data' => ""
            ], 200);
        }else{
            return response()->json([
                'error' => true,
                'message' => "Gagal Hapus Transaksi $id",
                'data' => ""
            ], 200);
        }
    }

    public function createTransaction(Request $request){
        $grandTotal = $request->input('grandTotal');
        $customer = $request->input('customer');
        $user_id = $request->input('user_id');
        $divisi = $request->input('divisi');
        $diskon = $request->input('diskon');
        $items = $request->input('items');

        try {
            $htrans = new Htrans();
            $htrans->user_id = $user_id;
            $htrans->customer = $customer;
            $htrans->divisi = $divisi;
            $htrans->grandtotal = $grandTotal;
            $htrans->diskon = $diskon;
            $htrans->status = 0;
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

    public function getTransactionByDateRange(Request $request){
        $data = $request->json()->all();
        $dateStart = $data['dateStart'];
        $dateEnd = $data['dateEnd'];

        $result = Htrans::whereBetween('created_at', [$dateStart, $dateEnd])->get();
        $unqiue_orderedMenu = [];
        $grandTotal = 0;
        foreach ($result as $key => $value) {
            $value->details = $value->dtrans;
            foreach ($value->dtrans as $key => $detail) {
                $unqiue_orderedMenu[] = $detail->nama;
            }
            $grandTotal += $value->grandtotal;
        }
        $unqiue_orderedMenu = array_unique($unqiue_orderedMenu);

        $orderedMenu = [];
        foreach ($unqiue_orderedMenu as $key => $value) {
            $orderedMenu[] = $value;
        }
        $countOrderedMenu = array_fill(0, count($orderedMenu),0);

        foreach ($result as $key => $header) {
            foreach ($header->details as $key => $detail) {
                $nama = $detail->nama;
                $qty = $detail->qty;

                for ($i = 0; $i < count($orderedMenu); $i++) {
                    if ($orderedMenu[$i] == $nama) {
                        $countOrderedMenu[$i] += $qty;
                    }
                }
            }
        }

        return response([
            'data' => $result,
            'date-start' => $dateStart,
            'date-end' => $dateEnd,
            'grandTotal' => $grandTotal,
            'menu' => $orderedMenu,
            'count_menu' => $countOrderedMenu,
        ], 200);
    }
}
