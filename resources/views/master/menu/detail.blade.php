@extends('template/header')

@section('content')
<div class="text-xl breadcrumbs">
    <ul>
        <li><a href="{{ url('menu') }}">Menu</a></li>
        <li class="font-bold"><h1>Detail Menu</h1></li>
    </ul>
</div>
<div class="rounded bg-accent p-4 my-5">
    <form method="POST">
        @csrf
        <input type="hidden" value="{{ $menu->id }}" name="id">
        <div class="flex flex-wrap my-5">
            <div class="form-control w-full">
                <label class="label">
                    <span class="label-text text-lg font-bold">Nama Menu</span>
                    <span class="label-text-alt"></span>
                </label>
                <input type="text" name="nama" placeholder="Nama..." class="input input-bordered w-full" name="part" value="{{ $menu->nama }}" required/>
            </div>
            <div class="form-control w-full md:w-1/2 md:pe-2">
                <label class="label">
                    <span class="label-text text-lg font-bold">Kategori</span>
                    <span class="label-text-alt"></span>
                </label>
                <select name="kategori" class="select" required>
                    <option value="" selected disabled>Pilih Kategori...</option>
                    <option value="0" {{ $menu->kategori == '0' ? 'selected' : '' }}>Makanan</option>
                    <option value="1" {{ $menu->kategori == '1' ? 'selected' : '' }}>Minuman</option>
                </select>
            </div>
            <div class="form-control w-full md:w-1/2">
                <label class="label">
                    <span class="label-text text-lg font-bold">Harga Jual (Rp)</span>
                    <span class="label-text-alt"></span>
                </label>
                <input type="number" name="harga" placeholder="1000" class="input input-bordered w-full" name="harga" value="{{ $menu->harga }}" required/>
            </div>
        </div>
        <button class="btn btn-primary">Simpan</button>
    </form>
</div>

@endsection
