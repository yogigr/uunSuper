<ul class="nav nav-pills">
  	<li role="presentation" class="{{ \Request::segment(1) == 'cart' ? '' : 'disabled'}}">
  		<a href="javascript:void(0)">
	  		<i class="fa fa-shopping-cart"></i>
	  		Keranjang
  		</a>
 	 </li>
  	<li role="presentation" class="{{ \Request::segment(1) == 'alamat-pengiriman' ? '' : 'disabled'}}">
  		<a href="javascript:void(0)">
  			<i class="fa fa-map-marker"></i>
  			Alamat Pengiriman
  		</a>
  	</li>
  	<li role="presentation" class="{{ \Request::segment(1) == 'konfirmasi-pembelian' ? '' : 'disabled'}}">
  		<a href="javascript:void(0)">
  			<i class="fa fa-check-circle-o"></i>
  			Konfirmasi Pembelian
  		</a>
  	</li>
</ul>