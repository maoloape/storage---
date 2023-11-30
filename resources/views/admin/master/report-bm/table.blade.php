<br>
<table>
    <thead>
        <tr>
            <th style="border: 1px solid black; padding: 8px text-align: center;" colspan="2">
                <img src="././assets/images/user/pertamina.png" height="80" width="80" alt="">
            </th>
            <th style="border: 1px solid black; padding: 8px; text-align: center; font-weight: bold;" colspan="2"><h1>Surat Barang Masuk</h1></th>
            <th style="border: 1px solid black; padding: 8px text-align: center;" colspan="2">
                <img src="././assets/images/user/pertamina.png" height="80" width="80" alt="">
            </th>
        </tr>
    </thead>
</table>

<br>
<table>
    <thead>
        <tr>
            <th style="border: 1px solid black; padding: 8px; text-align: center; font-weight: bold;" colspan="6">PT. PERTAMINA HULU ENERGI <br> Lokasi : Lima F/S dan Echo E/S <br> RADIO PROJECT 2023 </th>
        </tr>
    </thead>
</table>

<br>
<table>
    <thead>
        <tr>
            <th style="border: 1px solid black; padding: 8px; text-align: center; font-weight: bold;">No</th>
            <th style="border: 1px solid black; padding: 8px; font-weight: bold;">Nama Barang</th>
            <th style="border: 1px solid black; padding: 8px; font-weight: bold;">Type</th>
            <th style="border: 1px solid black; padding: 8px; font-weight: bold;">No. Seri</th>
            <th style="border: 1px solid black; padding: 8px; font-weight: bold;">No. Produk</th>
            <th style="border: 1px solid black; padding: 8px; font-weight: bold;">No. Kontrak</th>
        </tr>
    </thead>
    <tbody>
        @php
        $no = 1;
    @endphp
    @foreach ($data_bm as $row)
    <tr>
        <td style="border: 1px solid black; padding: 8px; text-align: center;">{{ $no++ }} </td>
        <td style="border: 1px solid black; padding: 8px;">{{ $row->nama_barang }}</td>
        <td style="border: 1px solid black; padding: 8px;">{{ $row->type }}</td>
        <td style="border: 1px solid black; padding: 8px;">{{ $row->serial_no }}</td>
        <td style="border: 1px solid black; padding: 8px;">{{ $row->no_produk }}</td>
        <td style="border: 1px solid black; padding: 8px;">{{ $row->no_kontrak }}</td>
    </tr>
    @endforeach
    <tr>
        <td style="border: 1px solid black; padding: 8px;" colspan="6">Note :</td>
    </tr>
    </tbody>
</table>

<br>
<table>
<thead>
    <tr>
        <th style="border: 1px solid black; padding: 8px; font-weight: bold;" colspan="2">Pengirim</th>
        <th style="border: 1px solid black; padding: 8px; font-weight: bold;" colspan="2">Disetujui</th>
        <th style="border: 1px solid black; padding: 8px; font-weight: bold;" colspan="2">Yang Menerima</th>
    </tr>
</thead>
<tbody>
    <tr>
        <td style="border: 1px solid black; padding: 8px;" colspan="2">Nama :</td>
        <td style="border: 1px solid black; padding: 8px;" colspan="2">Nama :</td>
        <td style="border: 1px solid black; padding: 8px;" colspan="2">Nama :</td>
    </tr>
    <tr>
        <td style="border: 1px solid black; padding: 8px;" colspan="2">Tanggal :</td>
        <td style="border: 1px solid black; padding: 8px;" colspan="2">Tanggal :</td>
        <td style="border: 1px solid black; padding: 8px;" colspan="2">Tanggal :</td>
    </tr>
    <tr>
        <td style="border: 1px solid black; padding: 8px;" colspan="2">Tanda Tangan :</td>
        <td style="border: 1px solid black; padding: 8px;" colspan="2">Tanda Tangan :</td>
        <td style="border: 1px solid black; padding: 8px;" colspan="2">Tanda Tangan :</td>
    </tr>
</tbody>
</table>