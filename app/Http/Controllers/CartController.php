<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;
use Auth;
use Cart;


class CartController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth')->only([
			'alamatPengiriman', 'updateAlamatPengiriman', 'konfirmasiPembelian'
		]);
	}

	public function index()
	{
		$carts = Cart::content();
		return view('cart.index', compact('carts'));
	}

    public function store(Request $request, Product $product)
    {
    	if (!$request->ajax()) {
    		abort(404);
    	}
    	Cart::add($product->id, $product->name, $request->quantity, $product->price);
    	return ;
    }

    public function edit(Request $request, $rowId)
    {
    	if (!$request->ajax()) {
    		abort(404);
    	}
    	$cart = Cart::get($rowId);
    	return view('cart.edit', compact('cart'));
    }

    public function update(Request $request, $rowId)
    {
    	Cart::update($rowId, $request->quantity);
    	return back();
    }

    public function destroy($rowId)
    {
    	Cart::remove($rowId);
    	return back();
    }

    public function clear()
    {
    	Cart::destroy();
    	return back();
    }

    public function alamatPengiriman()
    {
    	if (Cart::count() < 1) {
    		abort(404);
    	}
    	$user = Auth::user();
    	return view('cart.alamat_pengiriman', compact('user'));
    }

    public function updateAlamatPengiriman(Request $request, User $user)
    {
    	$request->validate([
    		'address' => 'required',
    		'city' => 'required',
    		'province' => 'required',
    		'postal_code' => 'required',
    		'phone' => 'required'
    	]);

    	$address = $user->address()->firstOrFail();
    	$address->address = $request->address;
    	$address->city = $request->city;
    	$address->province = $request->province;
    	$address->postal_code = $request->postal_code;
    	$address->phone = $request->phone;
    	$address->save();

    	return redirect()->route('cart.konfirmasi.pembelian');
    }

    public function konfirmasiPembelian()
    {
    	if (Cart::count() < 1) {
    		abort(404);
    	}

    	$user = Auth::user();
    	$carts = Cart::content();
    	return view('cart.konfirmasi_pembelian', compact('user', 'carts'));
    }
}
