@extends('template/header')

@section('content')
<div class="text-xl breadcrumbs">
    <ul>
        <li><a href="{{ url('user') }}">User</a></li>
        <li class="font-bold"><h1>Detail User</h1></li>
    </ul>
</div>
<div class="rounded bg-accent p-4 my-5">
    <form method="POST">
        @csrf
        <input type="hidden" value="{{ $user->id }}" name="id">
        <div class="flex flex-wrap my-5 ">
            <div class="form-control w-full md:w-1/2 md:pe-2">
                <label class="label">
                    <span class="label-text text-lg font-bold">Nama User</span>
                    <span class="label-text-alt"></span>
                </label>
                <input type="text" placeholder="Nama..." class="input input-bordered w-full" name="nama" value="{{ $user->nama }}" required/>
            </div>
            <div class="form-control w-full md:w-1/2">
                <label class="label">
                    <span class="label-text text-lg font-bold">Telp</span>
                    <span class="label-text-alt"></span>
                </label>
                <input type="number" placeholder="1000" class="input input-bordered w-full" name="telp" value="{{ $user->telp }}" required/>
            </div>
            <div class="form-control w-full md:w-1/2 md:pe-2">
                <label class="label">
                    <span class="label-text text-lg font-bold">Username</span>
                    <span class="label-text-alt"></span>
                </label>
                <input type="text" placeholder="1000" class="input input-bordered w-full" name="username" value="{{ $user->username }}" required/>
            </div>
            <div class="form-control w-full md:w-1/2">
                <label class="label">
                    <span class="label-text text-lg font-bold">Password</span>
                    <span class="label-text-alt"></span>
                </label>
                <input type="password" placeholder="1000" class="input input-bordered w-full" name="password" value="{{ $user->password }}"required/>
            </div>
            <div class="form-control w-full md:w-1/2 md:pe-2">
                <label class="label">
                    <span class="label-text text-lg font-bold">Divisi</span>
                    <span class="label-text-alt"></span>
                </label>
                <select name="divisi" class="select" required>
                    <option value="" selected disabled>Pilih Divisi...</option>
                    <option value="0" {{ $user->divisi == '0' ? 'selected' : '' }}>Bali Lais</option>
                    <option value="1" {{ $user->divisi == '1' ? 'selected' : '' }}>Babiku Genyol</option>
                </select>
            </div>
            <div class="form-control w-full md:w-1/2">
                <label class="label">
                    <span class="label-text text-lg font-bold">Role</span>
                    <span class="label-text-alt"></span>
                </label>
                <select name="role" class="select" required>
                    <option value="" selected disabled>Pilih Role...</option>
                    <option value="0" {{ $user->role == '0' ? 'selected' : '' }}>Super Admin</option>
                    <option value="1" {{ $user->role == '1' ? 'selected' : '' }}>Karyawan</option>
                </select>
            </div>
        </div>
        <button class="btn btn-primary">Simpan</button>
    </form>
</div>

@endsection
