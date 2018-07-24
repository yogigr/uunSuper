@extends('master')
@section('title', 'Keranjang')
@section('content')
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				@include('cart.nav')
			</div>
			<div class="panel-body" style="min-height: 400px">
				@if($carts->count() > 0)
				<div class="table-responsive">
					@include('cart.table')
				</div>
				<div class="row">
					<div class="col-sm-6">
						<button class="btn btn-default btn-lg"
						onclick="window.location='{{ url('/') }}'">
							<i class="fa fa-angle-left"></i>
							Lanjutkan Belanja
						</button>
					</div>
					<div class="col-sm-6 text-right">
						<button class="btn btn-primary btn-lg"
						onclick="window.location='{{ url('alamat-pengiriman') }}'">
							Konfirmasi Alamat Pengiriman
							<i class="fa fa-angle-right"></i>
						</button>
					</div>
				</div>
				@else
				<h3 class="text-center">
					<i class="fa fa-shopping-cart"></i>
					keranjang anda Kosong
				</h3>
				<div class="text-center">
					<a href="{{ url('/') }}" class="btn btn-default btn-lg">
						<i class="fa fa-angle-left"></i>
						Lanjutkan Belanja
					</a>
				</div>
				@endif
			</div>
		</div>
	</div>
</div>
@include('cart.modal_edit_keranjang')
@endsection
@push('scripts')
<script>
	$(function(){
		$('body').on('click', '.btnEditKeranjang', function(){
			var url = $(this).attr('url');
			var modal = $('#modalEditKeranjang');
			$.ajax({
				method: 'get',
				url: url,
				error: function(msg){
					console.log(msg.responseJSON);
				},
				success: function(data){
					modal.find('.modal-body').html(data);
					modal.modal('show');

					$('#quantity').on('keyup change', function(){
						var price = $('#formEditKeranjang').find('input[name="price"]').val();
						var totalPrice = numeral($(this).val()*price).format('$ 0,0');
						$('#formEditKeranjang').find('input[name="total_harga"]').val(totalPrice);
					});
				}
			});
		});

		
	});
</script>
@endpush