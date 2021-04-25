<?php

namespace App\Http\Controllers;

use App\Models\ProductType;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'verified']);
    }

    public function index()
    {
        //
    }


    public function create()
    {
        return Inertia::render('ProductType/Create');
    }


    public function store(Request $request)
    {

    }


    public function show(ProductType $producttype)
    {
        //
    }


    public function edit(ProductType $producttype)
    {
        //
    }


    public function update(Request $request, ProductType $producttype)
    {
        //
    }


    public function destroy(ProductType $producttype)
    {
        //
    }
}
