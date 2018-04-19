@extends('index')

@section('content')
<p><h3>Tambah Produk </h3> <a href="/products">[Senarai]</a></p>

<form action="/products" method="POST"  enctype="multipart/form-data">
    {{ csrf_field() }}
    <fieldset>
        <div class="row">
            <div class="col-md-6">
                <label>
                    Nama Produk  
                </label>
                <input type="text" class="form-control" name="product[name]">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label>
                    Kategori Produk  
                </label>
                <select class="form-control" name="product[producttype_id]">
                @foreach($producttypes as $producttype)
                    <option value="{{$producttype->id}}">{{$producttype->name}}</option>
                @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label>
                    Pembekal  
                </label>
                <select class="form-control" name="product[supplier_id]">
                @foreach($suppliers as $supplier)
                    <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label>
                    Harga Asal (RM)  
                </label>
                <input type="text" class="form-control" mask="999999.99" name="product[unit_price]">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label>
                    Harga Diskaun (RM)  
                </label>
                <input type="text" class="form-control" mask="999999.99" name="product[unit_new]">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label>
                    URL Foto  
                </label>
                <input type="file" name="foto">
            </div>
        </div>
        <p>
        <div class="row">
            <div class="actions">
               <input type="submit" value="HANTAR" class="btn btn-danger pull-left" >
               <input type="button" value="RESET" class="btn btn-warning" >
            </div>
        </div>
        </p>
    </fieldset>
</form>
    

@endsection