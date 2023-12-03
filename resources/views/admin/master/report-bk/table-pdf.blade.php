<style>
    table {
        font-family: Arial, sans-serif;
        }

    table.static {
        position: relative;
        border: 1px solid black;
        width: 95%;
    }
    
    th {
            padding: 10px;
            text-align: left;
            font-size: 12px;
    }

    td {
        font-size: 12px;
        padding-top: 3px;
        padding-bottom: 3px;
    }

    td.sign {
        font-size: 12px;
        height: 80px;

    }
    
</style>

<br>
<table class="static" align="center" rules="all" border="1px">
    <thead>
        <tr>
            <th style="text-align: center">
                <img src="././assets/images/user/sigma.png" height="80" width="80" alt="">
            </th>
            <th style="text-align: center">
                <h1>Surat Barang Keluar</h1>
            </th>
            <th style="text-align: center">
                {{ now()->format('Y-m-d') }}
            </th>
        </tr>
    </thead>
</table>

<br>
<table class="static" align="center" rules="all" border="1px">
    <thead>
        <tr>
            <th style="text-align: center">
                <h3>PT. SIGMA CIPTA UTAMA <br> Taman Tekno Blok B5-7, BSD Tanggerang Selatan <br> {{ $project }} </h3>
            </th>
        </tr>
    </thead>
</table>

<br>
<table class="static" align="center" rules="all" border="1px">
    <thead>
        <tr>
            <th style="text-align: center; background-color:#dddddd94;">No</th>
            <th style="text-align: center; background-color:#dddddd94;">Nama Barang</th>
            <th style="text-align: center; background-color:#dddddd94;">Type</th>
            <th style="text-align: center; background-color:#dddddd94;">No. Seri</th>
        </tr>
    </thead>
    <tbody>
        @php
        $no = 1;
    @endphp
    @foreach ($data_bm as $row)
    <tr>
        <td style="text-align: center">{{ $no++ }} </td>
        <td style="text-align: left; padding-left: 6px;"s>{{ $row->nama_barang }}</td>
        <td style="text-align: center">{{ $row->type }}</td>
        <td style="text-align: center">{{ $row->serial_no }}</td>
    </tr>
    @endforeach
    <tr>
        <td style="text-align: left; padding-left: 6px;" colspan="4">Note :</td>
    </tr>
    </tbody>
</table>

<br>
<table class="static" align="center" rules="all" border="1px">
<thead>
    <tr>
        <th style="background-color:#dddddd94;">Pengirim</th>
        <th style="background-color:#dddddd94;">Disetujui</th>
        <th style="background-color:#dddddd94;">Yang Menerima</th>
    </tr>
</thead>
<tbody>
    <tr>
        <td style="padding-left:10px">Nama :</td>
        <td style="padding-left:10px">Nama :</td>
        <td style="padding-left:10px">Nama :</td>
    </tr>
    <tr>
        <td style="padding-left:10px">Tanggal :</td>
        <td style="padding-left:10px">Tanggal :</td>
        <td style="padding-left:10px">Tanggal :</td>
    </tr>
    <tr>
        <td class="sign" style="padding-left:10px; vertical-align:top; position:relative;">Tanda Tangan :</td>
        <td class="sign" style="padding-left:10px; vertical-align:top; position:relative;">Tanda Tangan :</td>
        <td class="sign" style="padding-left:10px; vertical-align:top; position:relative;">Tanda Tangan :</td>
    </tr>
</tbody>
</table>