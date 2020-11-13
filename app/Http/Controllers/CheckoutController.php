<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Painting;

class CheckoutController extends Controller
{
    public function show($id)
    {
        $painting = Painting::findOrFail($id);
        return view('checkout', ['painting' => $painting]);
    }
}
