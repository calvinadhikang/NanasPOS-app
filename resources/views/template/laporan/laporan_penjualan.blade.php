<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ public_path('css/app.css') }}">
    @vite('resources/css/app.css')
</head>
<style>
    @page {
        size: A4;
    }
    .header {
        text-align: center;
        font-size: 1.2em;
        font-weight: bold;
    }
    .text-center {
        text-align: center;
        margin: 0px;
    }
    table {
        padding-top: 5px;
        width: 100%;
    }
    .btm-row {
        text-align: right;
        font-weight: 200;
    }
</style>
<body class="">
    <h1 class="text-center">Laporan Penjualan</h1>
    <div class="header">
        <span>{{ $bulan }}</span> - <span>{{ $tahun }}</span>
    </div>
    <table border="1">
        <thead>
            <tr class="text-xl">
                <th>Tanggal</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->transaction_day }}</td>
                    <td>Rp {{ number_format($item->total_transactions) }}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="2" class="btm-row">Grand Total Rp {{ number_format($total) }}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>
