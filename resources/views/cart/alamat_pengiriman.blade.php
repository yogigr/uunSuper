@extends('master')
@section('title', 'Alamat Pengiriman')
@section('content')
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					@include('cart.nav')
				</div>
				<div class="panel-body">
					<form id="formUpdateAlamatPengiriman" method="post" action="{{ url('alamat-pengiriman/'.$user->id) }}">
						{{ csrf_field() }}
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
									<label>Alamat</label>
									<textarea rows="8" name="address" class="form-control">{{ $user->address->address }}</textarea>
									@if($errors->has('address'))
										<span class="help-block">
											{{ $errors->first('address') }}
										</span>
									@endif
								</div>
								<div class="form-group {{ $errors->has('city') ? 'has-error' : '' }}">
									<label>Kota / Kabupaten</label>
									<input type="text" name="city" class="form-control" value="{{ $user->address->city }}">
									@if($errors->has('city'))
										<span class="help-block">
											{{ $errors->first('city') }}
										</span>
									@endif
								</div>
								<div class="form-group {{ $errors->has('province') ? 'has-error' : '' }}">
									<label>Propinsi</label>
									<input type="text" name="province" class="form-control" value="{{ $user->address->province }}">
									@if($errors->has('province'))
										<span class="help-block">
											{{ $errors->first('province') }}
										</span>
									@endif
								</div>
								<div class="form-group {{ $errors->has('postal_code') ? 'has-error' : '' }}">
									<label>Kode Pos</label>
									<input type="text" name="postal_code" class="form-control" value="{{ $user->address->postal_code }}">
									@if($errors->has('postal_code'))
										<span class="help-block">
											{{ $errors->first('postal_code') }}
										</span>
									@endif
								</div>
								<div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
									<label>Telpon</label>
									<input type="text" name="phone" class="form-control" value="{{ $user->address->phone }}">
									@if($errors->has('phone'))
										<span class="help-block">
											{{ $errors->first('phone') }}
										</span>
									@endif
								</div>
							</div>
							<div class="col-sm-6">
								<img src="{{ asset('image/web/address-icon.png') }}" class="img-responsive">
							</div>
						</div>
					</form>
				</div>
				<div class="panel-footer">
					<div class="row">
						<div class="col-sm-6">
							<button class="btn btn-default btn-lg"
							onclick="window.location='{{ url('cart') }}'">
								<i class="fa fa-angle-left"></i>
								Edit Keranjang
							</button>
						</div>
						<div class="col-sm-6 text-right">
							<button class="btn btn-primary btn-lg"
							onclick="getElementById('formUpdateAlamatPengiriman').submit()">
								Konfirmasi Pembelian
								<i class="fa fa-angle-right"></i>
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection