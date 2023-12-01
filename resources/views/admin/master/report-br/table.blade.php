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
            <th style="border: 1px solid black; text-align: center" colspan="2">
                <img src="././assets/images/user/pertamina.png" height="80" width="80" alt="">
            </th>
            <th style="border: 1px solid black; text-align: center" colspan="2">
                <h1>Surat Barang Return</h1>
            </th>
            <th style="border: 1px solid black; text-align: center">
                <img src="././assets/images/user/pertamina.png" height="80" width="80" alt="">
            </th>
        </tr>
    </thead>
</table>

<br>
<table class="static" align="center" rules="all" border="1px">
    <thead>
        <tr>
            <th style="text-align: center; border: 1px solid black;" colspan="5">
                <h3>PT. PERTAMINA HULU ENERGI <br> Lokasi : Lima F/S dan Echo E/S <br> RADIO PROJECT 2023 </h3>
            </th>
        </tr>
    </thead>
</table>

<br>
<table class="static" align="center" rules="all" border="1px">
    <thead>
        <tr>
            <th style="border: 1px solid black; text-align: center; background-color:#dddddd94;">No</th>
            <th style="border: 1px solid black; text-align: center; background-color:#dddddd94;">Nama Barang</th>
            <th style="border: 1px solid black; text-align: center; background-color:#dddddd94;">Type</th>
            <th style="border: 1px solid black; text-align: center; background-color:#dddddd94;">No. Seri</th>
            <th style="border: 1px solid black; text-align: center; background-color:#dddddd94;">Keterangan</th>
        </tr>
    </thead>
    <tbody>
        @php
        $no = 1;
    @endphp
    @foreach ($data_bm as $row)
    <tr>
        <td style="border: 1px solid black; text-align: center">{{ $no++ }} </td>
        <td style="border: 1px solid black; text-align: left; padding-left: 6px;"s>{{ $row->nama_barang }}</td>
        <td style="border: 1px solid black; text-align: center">{{ $row->type }}</td>
        <td style="border: 1px solid black; text-align: center">{{ $row->serial_no }}</td>
        <td style="border: 1px solid black; text-align: center">{{ $row->text }}</td>
    </tr>
    @endforeach
    <tr>
        <td style="border: 1px solid black; text-align: left; padding-left: 6px;" colspan="5">Note :</td>
    </tr>
    </tbody>
</table>

<br>
<table class="static" align="center" rules="all" border="1px">
<thead>
    <tr>
        <th style="border: 1px solid black; background-color:#dddddd94;" colspan="2">Pengirim</th>
        <th style="border: 1px solid black; background-color:#dddddd94;" colspan="2">Disetujui</th>
        <th style="border: 1px solid black; background-color:#dddddd94;" >Yang Menerima</th>
    </tr>
</thead>
<tbody>
    <tr>
        <td style="border: 1px solid black; padding-left:10px" colspan="2">Nama :</td>
        <td style="border: 1px solid black; padding-left:10px" colspan="2">Nama :</td>
        <td style="border: 1px solid black; padding-left:10px">Nama :</td>
    </tr>
    <tr>
        <td style="border: 1px solid black; padding-left:10px" colspan="2">Tanggal :</td>
        <td style="border: 1px solid black; padding-left:10px" colspan="2">Tanggal :</td>
        <td style="border: 1px solid black; padding-left:10px">Tanggal :</td>
    </tr>
    <tr>
        <td class="sign" style="border: 1px solid black; padding-left:10px; vertical-align:top; position:relative;" colspan="2">Tanda Tangan :</td>
        <td class="sign" style="border: 1px solid black; padding-left:10px; vertical-align:top; position:relative;" colspan="2">Tanda Tangan :</td>
        <td class="sign" style="border: 1px solid black; padding-left:10px; vertical-align:top; position:relative;">Tanda Tangan :</td>
    </tr>
</tbody>
</table>