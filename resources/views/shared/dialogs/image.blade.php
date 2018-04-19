<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <!-- <h4 class="modal-title">Modal Header</h4> -->
      
        <h4 class="modal-title">Gambar Produk : <span  id="product_name"></span></h4>
       
      </div>
      <div class="modal-body">
        <!-- <p>Some text in the modal.</p> -->

          <img id="full_image" src="#" class="img-rounded" />
          <p>
          <span id="producttype_name"></span>
          <span id="supplier_name"></span>
          @if($product->unit_new <= 0)
                            <b>RM <span id="unit_price"></span></b>
                        @else
                            <strike>RM <span id="unit_price"></span></strike>
                            <b>RM <span id="unit_new"></span></b>
                        @endif
          
        </p>
      </div>
      <div class="modal-footer">
      <a class="btn btn-info" href="/products/{{$product->id}}/buy" data-toggle="tooltip" title="Beli">
                            <span class="glyphicon glyphicon-shopping-cart"></span> </a>
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
      </div>
    </div>

  </div>
</div>