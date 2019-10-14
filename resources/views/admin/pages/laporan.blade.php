<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Catalog</title>
    <style>
        @page { size: 21,0cm  29,7cm  landscape; }

        body{
            font-family: 'Times New Roman', Times, serif;
        }

        .container{
            width: 960px;
            margin: auto;
        }

        .d-flex{
            display: flex;
        }

        .justify-content-between{
            justify-content: space-between;
        }

        .justify-content-end{
            justify-content: flex-end;
        }

        .border-bottom{
            border-bottom: 2px solid black;
        }

        .bg-info{
            background-color: red;
        }

        .bg-primary{
            background-color: blue;
        }
        table{
            width: 100%;
        }

        .mt-30{
            margin-top: 20px;
        }

        table,tr,td,th{
            border: 1px solid black;
            padding: 10px;
            text-align: center;
            border-collapse: collapse;
            border-spacing: 0px;
            font-size: 12pt
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .float-left{
            float: left;
        }

        .float-right{
            float: right;
        }

        .clearfix{
            content: "";
            clear: both !important;
        }
    </style>
</head>
<body>
    <div class="container">
        <div>
            <div class="d-flex border-bottom justify-content-between clearfix">
                    <div class="float-left">
                        <img src="{{ asset('img/core-img/logo.png') }}" class="img-fluid">
                    </div>
                    <div class="float-right bg">
                        <h1>Laporan Produk Rumah Karawo</h1>
                    </div>
            </div>
        </div>
        <div class="mt-30 clearfix">
            <hr>
            <h2>Data Produk</h2>
            <table>
               <tr>
                    <th>No.</th>    
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th>Jenis Kain</th>
                    <th>Harga</th>
               </tr>
               @foreach ($produks as $produk)
               <tr>
                    <td>{{ $loop->iteration }}</td>    
                    <td>{{ $produk->nama_produk }}</td>
                    <td>{{ $produk->kategori->nama_kategori }}</td>
                    <td>{{ $produk->jenisKain->jenis_kain }}</td>
                    <td>{{ 'IDR. '.number_format($produk->harga) }}</td>
               </tr>
               @endforeach
            </table>
        </div>
        <div class="mt-30">
            <h2>Statistik Kategori Per Produk</h2>
            <table>
                <tr>
                    <th>No.</th>
                    <th>Kategori</th>
                    <th>Jumlah Kategori Per Produk</th>
                </tr>
                @foreach ($produksStatistikKategori as $kategori => $jumlah)
                <tr>
                     <td>{{ $loop->iteration }}</td>    
                     <td>{{ $kategori }}</td>
                     <td>{{ $jumlah }}</td>
                </tr>
                @endforeach
            </table>
        </div>
        <div class="mt-30">
            <h2>Statistik Jenis Kain Per Produk</h2>
            <table>
                <tr>
                    <th>No.</th>
                    <th>Jenis Kain</th>
                    <th>Jumlah Jenis Kain Per Produk</th>
                </tr>
                @foreach ($produksStatistikJenis as $jenis => $jumlah)
                <tr>
                        <td>{{ $loop->iteration }}</td>    
                        <td>{{ $jenis }}</td>
                        <td>{{ $jumlah }}</td>
                </tr>
                @endforeach
            </table>
        </div>
        <div class="mt-30">
            <div class="d-flex justify-content-end">
                <p class="float-right">Dicetak Oleh {{ Session::get('username') }} Pada Tanggal {{ Carbon\Carbon::now()->format('d M Y - H:i:s') }}</p>
            </div>
        </div>
    </div>
</body>
</html>