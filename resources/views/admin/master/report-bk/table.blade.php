<br>
<table>
    <thead>
        <tr>
            <th>
                <img src="././assets/images/user/pertamina.png" height="120" width="120" alt="">
            </th>
            <th><h1>Surat Barang Keluar</h1></th>
            <th>
                <img src="././assets/images/user/pertamina.png" height="120" width="120" alt="">
            </th>
        </tr>
    </thead>
    <br>
</table>
<br>
<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Type</th>
            <th>No. Seri</th>
        </tr>
    </thead>
    <tbody>
        @php
        $no = 1;
    @endphp
    @foreach ($data_bm as $row)
    <tr>
        <td>{{ $no++ }} </td>
        <td>{{ $row->nama_barang }}</td>
        <td>{{ $row->type }}</td>
        <td>{{ $row->serial_no }}</td>
    </tr>
    @endforeach
    </tbody>
</table>