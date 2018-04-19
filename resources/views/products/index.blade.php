@extends('index')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h3>Senarai Produk Jualan 
        @auth
        <a class="btn btn-success pull-right" href="products/create" data-toggle="tooltip" title="Tambah Produk"><span class="glyphicon glyphicon-plus"></span></a> 
        {!! link_to_action('ProductsController@create' , 
            'Tambah Produk', [],
            ["class"=>"btn btn-success"] 
        ) !!}
        @endauth
        </h3> 
    </div>
</div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th align="center">No.</th>
                    <th>Foto</th>
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th>Pembekal</th>
                    <th>Harga (RM)</th>
                    @if( Auth::check() )
                    <th>Tindakan</th>
                    @endif
                </tr>
            </thead>
            <tbody>
               
                @foreach( $products as $product )
                
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td><a href="#" data-toggle="modal" data-target="#myModal" 
                        onclick="loadProductDetails({{ $product->id }})">
                        <img src="{{ $product->foto ? url($product->foto):"" }}" class="img-thumbnail"  style="width:60px"></a></td>
                    <td><a href="products/{{ $product->id }}">{{ $product->name }}</td>
                    <td>{{ $product->producttype->name }}</a></td>
                    <td>{!! $product->supplier->name .  ", " .
                           $product->supplier->address !!}</td>
                    <td>
                        @if($product->unit_new <= 0)
                            <b>{{ number_format($product->unit_price,2) }}</b>
                        @else
                            <strike>{{ number_format($product->unit_price,2) }}</strike>
                            <b>{{ number_format($product->unit_new,2) }}</b>
                        @endif
                    </td>
                    @if( Auth::check() )
                    <td>
                        <!-- <button type="button" class="btn btn-warning" 
                                onclick="window.location.replace('/products/" >
                                Kemas Kini !</button> -->
                        

                        <form action="/products/{{ $product->id }}/destroy" method="POST">
                            <a class="btn btn-info" href="/products/{{$product->id}}/buy" data-toggle="tooltip" title="Beli">
                            <span class="glyphicon glyphicon-shopping-cart"></span> </a>

                            @can('update',$product)
                            <a class="btn btn-warning" href="/products/{{$product->id}}/edit" data-toggle="tooltip" title="Kemas Kini">
                            <span class="glyphicon glyphicon-pencil"></span> </a>
                            @endcan

                            {{csrf_field() }}
                            @can('delete',$product)
                            <button type="button" class="btn btn-danger" 
                                onclick="confirm('Anda pasti untuk padam ?') && this.parentNode.submit()" data-toggle="tooltip" title="Padam!" ><span class="glyphicon glyphicon-trash"></span></button>
                            @endcan
                        </form>
                        
                    </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@include("shared/dialogs/image")

@endsection

@section("script")
    <script type="text/javascript">
        function loadProductDetails(product_id)
        {
            $.get("/products/" + product_id + "/details")
                .then(function(data) {
                    $('#product_name').html(data.name);
                    $('#producttype_name').html(data.producttype);
                    $('#supplier_name').html(data.supplier);
                    $('#unit_price').html(data.unit_price);
                    $('#unit_new').html(data.unit_new);
                    $('#full_image').attr('src',data.foto);
                });
        }
        
    </script>
@endsection