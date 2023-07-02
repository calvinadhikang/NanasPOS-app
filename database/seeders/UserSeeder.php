<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user = new User();
        $user->divisi = 1;
        $user->nama = "Admin Babiku";
        $user->username = "babiku";
        $user->password = "babiku";
        $user->telp = 0;
        $user->role = 0;
        $user->save();

        $user = new User();
        $user->divisi = 0;
        $user->nama = "Admin BaliLais";
        $user->username = "balilais";
        $user->password = "balilais";
        $user->telp = 0;
        $user->role = 0;
        $user->save();
    }
}
