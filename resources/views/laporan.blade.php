@extends('template/header')

@section('content')
<div class="rounded p-2 shadow-md bg-accent">
    <div class="text-2xl font-semibold text-center mb-5">Buat Laporan</div>
    <form method="POST">
        @csrf
        <div class="grid grid-cols-2 gap-2 mb-3">
            <div class="form-control">
                <label class="label-text font-medium">Pilih Bulan</label>
                <select name="bulan" class="select select-bordered">
                    <option value="1">Januari</option>
                    <option value="2">Febuari</option>
                    <option value="3">Maret</option>
                    <option value="4">April</option>
                    <option value="5">Mei</option>
                    <option value="6">Juni</option>
                    <option value="7">Juli</option>
                    <option value="8">Agustus</option>
                    <option value="9">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                </select>
            </div>
            <div class="form-control">
                <label class="label-text font-medium">Pilih Tahun</label>
                <select name="tahun" class="select select-bordered">
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                </select>
            </div>
        </div>
        <button class="btn btn-primary w-full">Buat Laporan !</button>
    </form>
</div>

@endsection
