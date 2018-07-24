@extends('master')
@section('title', 'Home')
@section('content')
	<div class="row">
		@if($products->count() > 1)
			@foreach($products as $product)
			<div class="col-sm-4">
				<div class="panel panel-default">
					<div class="panel-body">
						<h4 class="text-center">
							{{ $product->name }}
						</h4>
						<p class="text-center">
							{{ $product->priceFormatted() }}
						</p>
						<button class="btn btn-primary btn-block btnTambahKeranjang"
						url="{{ url('cart/'.$product->id) }}" 
						product-name="{{ $product->name }} ({{ $product->priceFormatted() }})" 
						price="{{ $product->price }}">
							<i class="fa fa-shopping-cart"></i>
							Tambahkan Keranjang
						</button>
					</div>
				</div>
			</div>
			@endforeach
		@else
		<div class="col-sm-12">
			<p>Belum ada Produk</p>
		</div>
		@endif
	</div>
	{{--modal tambah keranjang--}}
	<div class="modal fade" tabindex="-1" role="dialog" id="modalTambahKeranjang">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Tambah Keranjang</h4>
				</div>
				<div class="modal-body">
					<form id="formTambahKeranjang" method="post" action="">
						{{ csrf_field() }}
						<input type="hidden" name="price">
						<div class="form-group">
							<label>Nama Product</label>
							<input type="text" name="nama_product" class="form-control" readonly>
						</div>
						<div class="form-group">
							<label>Jumlah</label>
							<input type="number" id="quantity" name="quantity" class="form-control" min="300" value="300">
							<span class="help-blok">
								minimal Pembelian 300 Item
							</span>
						</div>
						<div class="form-group">
							<label>Total Harga</label>
							<input type="text" name="total_harga" class="form-control" readonly>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-block">
								Tambahkan
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	{{--modal success--}}
	<div class="modal fade" tabindex="-1" role="dialog" id="modalSuksesTambahKeranjang">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Sukses</h4>
				</div>
				<div class="modal-body">
					<p>Sukses Menambahkan ke keranjang</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default"
					onclick="window.location='{{ url('/') }}'">Lanjutkan Belanja</button>
					<button type="button" class="btn btn-primary"
					onclick="window.location='{{ url('cart') }}'">Pembayaran</button>
				</div>
			</div>
		</div>
	</div>
@endsection
@push('scripts')
	<script>
		$(function(){
			$('body').on('click', '.btnTambahKeranjang', function(){
				var productName = $(this).attr('product-name');
				var price = $(this).attr('price');
				var quantity = $('#formTambahKeranjang').find('input[name="quantity"]').val();
				var totalPrice = numeral(price*quantity).format('$ 0,0');
				$('#modalTambahKeranjang #formTambahKeranjang').attr('action', $(this).attr('url'));
				$('#formTambahKeranjang').find('input[name="nama_product"]').val(productName);
				$('#formTambahKeranjang').find('input[name="price"]').val(price);
				$('#formTambahKeranjang').find('input[name="total_harga"]').val(totalPrice);
				$('#modalTambahKeranjang').modal('show');
			});

			$('#quantity').on('keyup change', function(){
				var price = $('#formTambahKeranjang').find('input[name="price"]').val();
				var totalPrice = numeral($(this).val()*price).format('$ 0,0');
				$('#formTambahKeranjang').find('input[name="total_harga"]').val(totalPrice);
			});

			$('#formTambahKeranjang').on('submit', function(e){
				e.preventDefault();
				var url = $(this).attr('action');
				var data = $(this).serialize();
				$.ajax({
					method: 'POST',
					url: url,
					data: data,
					error: function(msg){
						console.log(msg.responseJSON);
					},
					success: function(data){
						$('#modalTambahKeranjang').modal('hide');
						$('#modalSuksesTambahKeranjang').modal({
							backdrop: 'static',
    						keyboard: false
						});
					}
				});
			});
		});
	</script>
@endpush