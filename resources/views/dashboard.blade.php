@extends('template.header')

@section('content')
<h1 class="mb-5 font-medium text-xl">Grafik Penjualan Menu</h1>
<div class="p-4 rounded shadow bg-accent">
    <div class="grid grid-cols-2 gap-5 mb-2">
        <div class="grid">
            <label class="font-medium">Dari Tanggal</label>
            <input type="date" class="input" id="date-start">
        </div>
        <div class="grid">
            <label class="font-medium">Hingga Tanggal</label>
            <input type="date" class="input" id="date-end">
        </div>
    </div>
    <button class="btn btn-secondary mb-5" id="btnLaporan">Buat Laporan</button>
    <canvas id="grafik-menu" class="bg-white p-4 rounded w-full"></canvas>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{ asset('js/chart.js') }}"></script>

@endsection
