@extends('template/header')

@section('content')
<div class="text-xl breadcrumbs">
    <ul>
        <li><a href="{{ url('transaksi') }}">Transaksi</a></li>
        <li class="font-bold"><h1>Detail Transaksi</h1></li>
    </ul>
</div>
<div class="rounded bg-stone-200 p-10 my-5 shadow-md">
    <?php
    $status = 'bg-green-500';
    $teks = "Lunas";
    if ($trans->status == 0) {
        $status = 'bg-rose-500';
        $teks = "Belum Lunas";
    }
    ?>
    <div class="{{ $status }} p-4 rounded-lg">
        <h1 class="text-xl font-bold text-center rounded text-white">{{ $teks }}</h1>
    </div>
    <h1 class="text-xl font-bold mt-5">Detail Transaksi</h1>
    <div class="grid grid-cols-2">
        <h1 class="text-lg">Nomor Nota</h1>
        <h1 class="text-lg font-medium text-right">{{ $trans->id }}</h1>
        <h1 class="text-lg">Nama Customer</h1>
        <h1 class="text-lg font-medium text-right">{{ $trans->customer }}</h1>
        <h1 class="text-lg">Tanggal Transaksi</h1>
        <h1 class="text-lg font-medium text-right">{{ date_format($trans->created_at, 'd M Y') }}</h1>
    </div>
    <div class="divider"></div>
    <div class="grid grid-cols-2 mt-2">
        <h1>Diskon</h1>
        <h1 class="text-right">Rp {{ number_format($trans->diskon) }}</h1>
        <h1 class="text-lg">Grand Total</h1>
        <h1 class="text-lg font-medium text-right">Rp {{ number_format($trans->grandtotal) }}</h1>
    </div>
    <h1 class="text-xl font-bold mt-10">List Pesanan</h1>
    @foreach ($trans->dtrans as $detail)
        <div class="my-2 pb-2 border-b border-b-gray-400">
            <div class="flex flex-wrap">
                <div class="grow">
                    <div class="font-semibold">{{ $detail->nama }}</div>
                    <div class="">Rp {{ number_format($detail->harga) }} x {{ $detail->qty }}</div>
                </div>
                <div class="pt-4">
                    Rp {{ number_format($detail->subtotal) }}
                </div>
            </div>

        </div>
    @endforeach
</div>

@endsection