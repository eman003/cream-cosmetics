<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductTypeRequest;
use App\Models\ProductType;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ProductTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'verified']);
    }

    public function index()
    {
        return \response()->json(ProductType::all());
    }


    public function create()
    {
        return Inertia::render('ProductType/Create');
    }


    public function store(ProductTypeRequest $request)
    {
        ProductType::create([
            'name' => $request->name,
            'status_id' => $request->status_id,
            'creator_id' => Auth::id()
                            ]);

        return redirect()->route('dashboard');
    }


    public function show(ProductType $producttype)
    {
        //
    }


    public function edit(ProductType $producttype)
    {
        return Inertia::render('ProductType/Edit', ['producttype' => $producttype]);
    }


    public function update(ProductTypeRequest $request, ProductType $producttype)
    {
        $producttype->name = $request->name;
        $producttype->status_id = $request->status_id;
        $producttype->creator_id = $request->creator_id;
        $producttype->save();

        return redirect()->route('dashboard');
    }


    public function destroy(ProductType $producttype)
    {
        //TODO: delete related data

        $producttype->delete();

        return redirect()->route('dashboard');
    }
}
