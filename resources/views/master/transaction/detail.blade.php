@extends('template/header')

@section('content')
<div class="prose">
    <h1 class="text-4xl font-bold mb-4">Detail Transaksi</h1>
</div>
<div class="rounded bg-accent p-4 my-5 shado">
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
    <br>
    <div class="flex flex-wrap justify-between">
        <div class="basis-3/5 bg-secondary text-white p-4 rounded-md shadow-lg">
            <div class="text-2xl font-medium">Nomor Nota : {{ $trans->id }}</div>
            <div class="text-xl font-medium">Nama Customer : {{ $trans->customer }}</div>
        </div>
        <div class="basis-2/6 bg-secondary text-white p-4 rounded-md shadow-lg">
            <div class="text-xl">Grand Total: Rp {{ number_format($trans->grandtotal) }}</div>
            <div class="">Diskon: Rp {{ number_format($trans->diskon) }}</div>
            <div class="">{{ $trans->user->nama }}</div>
        </div>
    </div>
    <br>
    <h1 class="text-3xl">List Pesanan</h1>
    @foreach ($trans->dtrans as $detail)
        <div class="py-2 rounded-md my-2 px-2 bg-green-100">
            <div class="flex flex-wrap">
                <div class="grow">
                    <div class="font-bold">{{ $detail->nama }}</div>
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
