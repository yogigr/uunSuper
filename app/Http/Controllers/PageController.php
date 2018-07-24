<?php

namespace App\Http\Controllers;
use App\Product;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
    	$products = Product::all();
    	return view('page.index', compact('products'));
    }
 
}
