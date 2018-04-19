@extends("index")

@section("content")
<h3>Kemas Kini Produk </h3>
<table width='100%'><tr><td>
{{ Form::model($product, [
    "action" => ["ProductsController@update", $product->id],
    "files" => true 
    ] ) }}

    <div class="row">
        <div class="col-md-12">
            {{ Form::label('Nama Produk') }}
            {{ Form::text('name', $product->name, ["class"=> "form-control" ] ) }}
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            {{ Form::label('Kategori') }}
            {{ Form::select('producttype_id', $producttypes, $product->producttype_id, ["class"=> "form-control"] ) }}
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            {{ Form::label('Pembekal') }}
            {{ Form::select('supplier_id', $suppliers, $product->supplier_id, ["class"=> "form-control"] ) }}
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            {{ Form::label('Harga Asal (RM)') }}
            {{ Form::text('unit_price', number_format($product->unit_price,2,'.',''), 
            ["class"=> "form-control"] ) }}
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            {{ Form::label('Harga Diskaun (RM)') }}
            {{ Form::text('unit_new', number_format($product->unit_new,2,'.',''), 
            ["class"=> "form-control"] ) }}
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            {{ Form::label('Foto') }}
            {{ Form::text('foto', $product->foto, ["class"=> "form-control"] ) }}
            {{ Form::file('foto') }}
        </div>
    </div>

    <p></p>

    {{ Form::submit('Hantar', ["class"=>"btn btn-success"]) }}

{{ Form::close() }}
</td>
<td width='50%' align='center'>
<img src="{{ $product->foto ? url($product->foto):""  }}" class="img-rounded">
</td>
</tr></table>
@endsection