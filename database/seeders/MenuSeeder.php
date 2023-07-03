<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Seed Menu
        $menu = new Menu();
        $menu->divisi = 1;
        $menu->nama = "Nasi Be Genyol Special";
        $menu->harga = 35000;
        $menu->kategori = 0;
        $menu->save();

        $menu = new Menu();
        $menu->divisi = 1;
        $menu->nama = "Nasi Be Genyol Biasa";
        $menu->harga = 30000;
        $menu->kategori = 0;
        $menu->save();

        $menu = new Menu();
        $menu->divisi = 1;
        $menu->nama = "Nasi Be Genyol Hemat";
        $menu->harga = 25000;
        $menu->kategori = 0;
        $menu->save();

        $menu = new Menu();
        $menu->divisi = 1;
        $menu->nama = "Nasi Bicap";
        $menu->harga = 30000;
        $menu->kategori = 0;
        $menu->save();

        $menu = new Menu();
        $menu->divisi = 1;
        $menu->nama = "Nasi Babi Sambal Matah";
        $menu->harga = 35000;
        $menu->kategori = 0;
        $menu->save();

        $menu = new Menu();
        $menu->divisi = 1;
        $menu->nama = "Sate Babi Manis";
        $menu->harga = 6000;
        $menu->kategori = 0;
        $menu->save();

        $menu = new Menu();
        $menu->divisi = 1;
        $menu->nama = "Sate Babi Bawah Pohon";
        $menu->harga = 6000;
        $menu->kategori = 0;
        $menu->save();
    }
}
