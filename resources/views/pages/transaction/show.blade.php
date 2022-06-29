<table class="table table-bordered">
    <tr>
        <th>Nama</th>
        <td>{{ $item->name }}</td>
    </tr>
    <tr>
        <th>Email</th>
        <td>{{ $item->email }}</td>
    </tr>
    <tr>
        <th>Nomor</th>
        <td>{{ $item->number }}</td>
    </tr>
    <tr>
        <th>Alamat</th>
        <td>{{ $item->address }}</td>
    </tr>
    <tr>
        <th>Total Transaksi</th>
        <td>{{ $item->transaction_total }}</td>
    </tr>
    <tr>
        <th>Status</th>
        <td>{{ $item->transaction_status }}</td>
    </tr>
    <tr>
        <th>Pembelian Produk</th>
        <td>
            <table class="table table-bordered w-100">
                <tr>
                    <th>Nama</th>
                    <th>Tipe</th>
                    <th>Harga</th>
                </tr>
                @foreach ($product as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->type }}</td>
                        <td>${{ $product->price }}</td>
                    </tr>
                @endforeach
            </table>
        </td>
    </tr>
</table>
{{-- <div class="row">
    <div class="col-4">
        <a href="{{ route('transactionl.status', $item->id) }}?status=SUCCESS" class="btn btn-success btn-block">
            <i class="fa fa-check"></i>Set Sukses
        </a>
    </div>
    <div class="col-4">
        <a href="{{ route('transactionl.status', $item->id) }}?status=FAILLED" class="btn btn-danger btn-block">
            <i class="fa fa-times"></i>Set Gagal
        </a>
    </div>
    <div class="col-4">
        <a href="{{ route('transactionl.status', $item->id) }}?status=PENDING" class="btn btn-info btn-block">
            <i class="fa fa-spinner"></i>Set Pending
        </a>
    </div>
</div> --}}