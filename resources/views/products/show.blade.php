@extends("index")

@section("content")
<h3>Info : {{ $product->name }}</h3>
<table class="table">
    <tr>
        <td rowspan="10"><img src="{{ $product->foto ? url($product->foto):"" }}" class="img-rounded" ></td>
    </tr>
    <tr>
        <th>Nama Produk</th>
        <td>{{ $product->name }}</td>
    </tr>
    <tr>
        <th>Kategori</th>
        <td>{{ $product->producttype->name }}</td>
    </tr>
    <tr>
        <th>Pembekal</th>
        <td>{!! $product->supplier->name .  ", " .
                           $product->supplier->address !!}</td>
    </tr>
    <tr>
        <th>Harga Terkini (RM)</th>
        <td>@if($product->unit_new <= 0)
                            <b>{{ number_format($product->unit_price,2) }}</b>
                        @else
                            <strike>{{ number_format($product->unit_price,2) }}</strike>
                            <b>{{ number_format($product->unit_new,2) }}</b>
                        @endif</td>
    </tr>
</table>
<a class="btn btn-info" href="./"><span class="glyphicon glyphicon-chevron-left"></span> Kembali</a>
<a class="btn btn-warning" href="/products/{{$product->id}}/edit" data-toggle="tooltip" title="Kemas Kini">
<span class="glyphicon glyphicon-pencil"></span> Kemas Kini</a>
@endsection