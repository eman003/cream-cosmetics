<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'verified']);
    }

    public function index()
    {
        return response()->json(Product::with('productType')->paginate());
    }

    public function create()
    {
        return Inertia::render('Product/Create', ['product-types' => ProductType::where('status_id', 1)->pluck('name', 'id')]);
    }


    public function store(ProductRequest $request)
    {
        if (!Storage::exists('public'.DIRECTORY_SEPARATOR.'products')){
            Storage::makeDirectory('public'.DIRECTORY_SEPARATOR.'products');
        }
        $file = $request->file('image');
        
        /*
         * TODO: move this to a trait
         */
        $image = Image::make($file);
        $path = storage_path().DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'products'.DIRECTORY_SEPARATOR;
        $file_name = time().'_'.$file->getClientOriginalName();
        if ($image->height() == $image->width() && $image->height() > 1080) {
                $image->resize(1080, 1080);
            $image->save($path.$file_name);
        } else {
            $blur = Image::make($file)->fit(1080, 1080)->blur(20);
            $image->resize(1080, 1080, function ($c) {
                $c->aspectRatio();
                $c->upsize();
            });

            $blur->insert($image, 'center');
            $blur->save($path.$file_name);
        }


        Product::create([
            'name' => $request->name,
            'product_type_id' => $request->product_type_id,
            'url' => $request->url,
            'status_id' => $request->status_id,
            'image' => 'products'.DIRECTORY_SEPARATOR.$file_name,
            'creator_id' => auth()->id()
                        ]);

        return Redirect::route('dashboard');
    }


    public function show(Product $product)
    {
        //
    }


    public function edit(Product $product)
    {
        $parameters = [
            'productTypes' => ProductType::where('status_id', 1)->pluck('name', 'id'),
            'form' => $product
        ];

        return Inertia::render('Product/Edit', $parameters);
    }


    public function update(UpdateProductRequest $request, Product $product)
    {
        if ($request->hasFile('image')){
            $file = $request->file('image');
            /*
             * TODO: move this to a trait
             */
            $image = Image::make($file);
            $path = storage_path().DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'products'.DIRECTORY_SEPARATOR;
            $file_name = time().'_'.$file->getClientOriginalName();
            if ($image->height() == $image->width() && $image->height() > 1080) {
                $image->resize(1080, 1080);
                $image->save($path.$file_name);
            } else {
                $blur = Image::make($file)->fit(1080, 1080)->blur(20);
                $image->resize(1080, 1080, function ($c) {
                    $c->aspectRatio();
                    $c->upsize();
                });

                $blur->insert($image, 'center');
                $blur->save($path.$file_name);
            }

            $product->image = 'products'.DIRECTORY_SEPARATOR.$file_name;
        }

        $product->name = $request->name;
        $product->product_type_id = $request->product_type_id;
        $product->url = $request->url;
        $product->status_id = $request->status_id;
        $product->save();

        return Redirect::route('dashboard');
    }


    public function destroy(Product $product)
    {
        //
    }
}
