<?php

namespace App\Http\Controllers;

use Gate;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Http\Request;

class RequestsController extends Controller
{
    public function create()
    {
        // abort_if(Gate::denies('order_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // $products = Product::all();

        return view('request.create');
    }
}
