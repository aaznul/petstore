<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $products = [1,2,3,4,56,8];
        $i=0;
        $products = \App\Product::all();
        //var_dump($products); //die;
        return view("products/index", ["products" => $products] );//
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $producttypes = \App\Producttype::all();
        $suppliers = \App\Supplier::all();
        return view("products/create", [
            "producttypes" => $producttypes, 
            "suppliers" => $suppliers]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
       // var_dump($request->product); die;

        $params = $request->validate([
            'product.name'=>'required|unique:products,name|max:255',
            'product.producttype_id'=>'required|exists:producttypes,id',
            'product.supplier_id'=>'required|exists:suppliers,id',
            'product.unit_price'=>'required|numeric',
            'product.unit_new'=>'required|numeric'
        ]);
        $params = $params["product"];

        $params = $request->product; 
        $product = new \App\Product;
        $product->name = $params["name"];
        $product->producttype_id = $params["producttype_id"];
        $product->supplier_id = $params["supplier_id"];
        $product->unit_price = $params["unit_price"];
        $product->unit_new = $params["unit_new"];
        

        $file = $request->file('foto');
        if( !!$file ) {
        $request->file('foto')->move(base_path("public/img/produk"),
            $file->getClientOriginalName() );
        
        $product->foto = "img/produk/".$file->getClientOriginalName();;
        }
        if( $product->save() )
        {
            //save success
            return redirect("/products");
        } else {
            // save failed
            return redirect("/products/create");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $product = \App\Product::find($id);
        if(!$product) {
            \Session::flash('error', "Produk ID = ".$id. " tidak dijumpai !");
            return redirect('/products');
        }
        return view("products/show", [
            "product" => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $product = \App\Product::find($id);
        if(!$product) {
            \Session::flash('error', "Produk ID = ".$id. " tidak dijumpai !");
            return redirect('/products');
        }
        // try {
            $this->authorize('update',$product);
        // } catch(Exception $e) {
        //     \Session::flash('error', $e->getMessage());
        //     return redirect('/products');
        // }

        $producttypes = \App\Producttype::all()->pluck('name','id');
        $suppliers = \App\Supplier::all()->pluck('name','id');

        return view("products/edit", 
            compact('product','producttypes','suppliers')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $product = \App\Product::find($id);
        if(!$product) {
            \Session::flash('error', "Produk ID = ".$id." tidak dijumpai !");
            return redirect('/products');
        }
        $this->authorize('update',$product);

        $params = $request->only('name','producttype_id','supplier_id', 'unit_price', 'unit_new', 'foto'); 
        
        // $product->name = $params->name;
        // $product->producttype_id = $params->producttype_id;
        // $product->supplier_id = $params->supplier_id;
        // $product->unit_price = $params->unit_price;
        // $product->unit_new = $params->unit_new;
        // $product->foto = $params->foto;

        $params["unit_price"] = floatval($params["unit_price"]);
        $params["unit_new"] = floatval($params["unit_new"]);

        // var_dump($request->file('foto')); die;
        //$request->file('foto')->move(base_path("public/img/produk"),$product->id);
        $file = $request->file('foto');
        if( !!$file ) {
            $file->move(base_path("public/img/produk"),
                $file->getClientOriginalName() );
            $params["foto"] = "img/produk/".$file->getClientOriginalName();
        }
        if($product->update($params))
        {
            //success
            \Session::flash('notice', "Produk ID = ".$id." telah dikemas kini !");
            return redirect('/products/'.$product->id);
        } else {
            // failed
            \Session::flash('error', "Produk ID = ".$id." GAGAL dikemas kini!");
            return redirect('/products');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $product = \App\Product::find($id);
      //  var_dump($request->product); die;
      if( $product->destroy($id) )
      {
          //save success
          return redirect("/products");
      } else {
          // save failed
          die("Whooppss!. Gagal memadam");
      }
    }

    public function details(Request $request, $id)
    {
        //
       // var_dump($request->product); die;

        $product = \App\Product::find($id);

        return response()->json([
            "id"=>$product->id,
            "name"=>$product->name ,
            "producttype"=>$product->producttype->name,
            "supplier"=>$product->supplier->name,
            "unit_price"=>number_format($product->unit_price,2),
            "unit_new"=>number_format($product->unit_new,2),
            "foto"=>$product->foto ? url($product->foto):""
        ]);
    }
}
