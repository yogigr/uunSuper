@extends('master')
@section('title', 'Konfirmasi Pembelian')
@section('content')
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				@include('cart.nav')
			</div>
			<div class="panel-body">
				{{--Alamat Pengiriman--}}
				<div class="table-responsive">
					<table class="table table-bordered table-hover">
						<tbody>
							<tr>
								<td>
									<strong>Alamat Pengiriman</strong><br>
									{{ $user->address->address }}<br>
									{{ $user->address->city }}
									{{ $user->address->province }}
									{{ $user->address->postal_code }}<br>
									Telp. {{ $user->address->phone }}
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				{{--Keranjang--}}
				<div class="table-responsive">
					<table class="table table-bordered table-hover">
						<tbody>
							<tr>
								<td colspan="2">
									<strong>Keranjang</strong>
								</td>
							</tr>
							@foreach($carts as $cart)
								<tr>
									<td>
										<h5 class="text-primary" style="margin:0">{{ $cart->name }}</h5>
										{{ $cart->qty }} x Rp {{ number_format($cart->price, 0, '', '.') }}<br>
									</td>
									<td class="text-right">
										<strong>Rp {{ $cart->subtotal(0, '', '.') }}</strong>
									</td>
								</tr>
							@endforeach
							<tr>
								<td colspan="2" class="text-right">
									<strong>Subtotal<br>Rp {{ Cart::subtotal(0, '', '.') }}</strong>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<button class="btn btn-default btn-lg"
						onclick="window.location='{{ url('alamat-pengiriman') }}'">
							<i class="fa fa-angle-left"></i>
							Alamat Pengiriman
						</button>
					</div>
					<div class="col-sm-6 text-right">
						<button id="btnKonfirmasiPembelian" class="btn btn-warning btn-lg">
							Pembayaran
							<i class="fa fa-angle-right"></i>
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@include('cart.modal_konfirmasi_pembelian')
@endsection
@push('scripts')
<script>
	$(function(){
		$('#btnKonfirmasiPembelian').on('click', function(){
			$('#modalKonfirmasiPembelian').modal('show');
		});
	});
</script>
@endpush