@extends('template/header')

@section('content')
<div class="prose">
    <h1 class="text-4xl font-bold mb-4">Detail Transaksi</h1>
</div>
<div class="rounded bg-accent p-4 my-5">
    <div class="flex flex-wrap">
        <div class="w-full text-2xl font-bold">Nomor Nota : {{ $trans->id }}</div>
        <div class="w-full text-secondary">{{ $trans->user->nama }}</div>
        <div class="text-xl float-right">Grand Total: Rp {{ number_format($trans->grandtotal) }}</div>
    </div>
    <br>
    <h1 class="text-3xl">List Pesanan</h1>
    @foreach ($trans->dtrans as $detail)
        <div class="py-2 rounded-md border my-2 px-2">
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