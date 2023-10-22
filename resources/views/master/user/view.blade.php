@extends('template/header')

@section('content')
<h1 class="text-4xl font-bold mb-4">Data User</h1>
<div class="rounded bg-accent p-4 w-full">
    <div class="flex justify-end w-full">
        <a class="btn btn-primary" href="{{url('user/add')}}">Tambah</a>
    </div>
    <div class="overflow-x-auto">
        <table class="table">
            <thead>
                <tr>
                    <th class="text-2xl"><h3 class="font-bold">ID</h3></th>
                    <th class="text-2xl"><h3 class="font-bold">Divisi</h3></th>
                    <th class="text-2xl"><h3 class="font-bold">Nama</h3></th>
                    <th class="text-2xl"><h3 class="font-bold">Username</h3></th>
                    <th class="text-2xl"><h3 class="font-bold">Password</h3></th>
                    <th class="text-2xl"><h3 class="font-bold">Telp</h3></th>
                    <th class="text-2xl"><h3 class="font-bold">Role</h3></th>
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
                <?php
                $divisi = "Bali Lais";
                if ($item->divisi == 1) {
                    $divisi = "Babiku Genyol";
                }

                $role = "Karyawan";
                if ($item->role == 1) {
                    $role = "Super Admin";
                }
                ?>
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $divisi }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->username }}</td>
                        <td>{{ $item->password }}</td>
                        <td>{{ $item->telp }}</td>
                        <td>{{ $role }}</td>
                        <td>
                            <a href="{{ url("user/detail/$item->id") }}">
                                <i class="fa-solid fa-circle-info text-base hover:text-secondary"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
    {{ $data->links('pagination::tailwind') }}
</div>

@endsection
