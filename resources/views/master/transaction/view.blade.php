@extends('template/header')

@section('content')
<h1 class="text-4xl font-bold mb-4">Data Transaksi</h1>
<div class="rounded bg-accent p-4 w-full">
    <div class="flex justify-end w-full">
        <a class="btn btn-primary" href="{{url('menu/add')}}">Tambah</a>
    </div>
    <div class="overflow-x-auto">
        <table class="table">
            <thead>
                <tr>
                    <th class="text-2xl"><h3 class="font-bold">ID</h3></th>
                    <th class="text-2xl"><h3 class="font-bold">Nama</h3></th>
                    <th class="text-2xl"><h3 class="font-bold">Grand Total</h3></th>
                    <th class="text-2xl"><h3 class="font-bold">Tanggal</h3></th>
                    <th class="text-2xl"><h3 class="font-bold">Aksi</h3></th>
                </tr>
            </thead>
            <tbody>
            @if (count($data) <= 0)
                <tr>
                    <th class="text-error text-lg">Tidak ada data...</th>
                </tr>
            @else
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->customer }}</td>
                        <td>Rp {{ number_format($item->grandtotal) }}</td>
                        <td>{{ date_format($item->created_at, 'd-M-Y')  }}</td>
                        <td>
                            <a href="{{ url("transaksi/detail/$item->id") }}">
                                <i class="fa-solid fa-circle-info text-base hover:text-secondary"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
</div>

@endsection
