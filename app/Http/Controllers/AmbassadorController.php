<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAmbassadorRequest;
use App\Http\Requests\UpdateAmbassadorRequest;
use App\Models\Ambassador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Intervention\Image\Facades\Image;

class AmbassadorController extends Controller
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
        return Inertia::render('Ambassador/Create');
    }

    public function store(StoreAmbassadorRequest $request)
    {
        if (!Storage::exists('public'.DIRECTORY_SEPARATOR.'ambassadors')){
            Storage::makeDirectory('public'.DIRECTORY_SEPARATOR.'ambassadors');
        }

        $file = $request->file('image');
        /*
         * TODO: move this to a trait
         */
        $image = Image::make($file);
        $path = storage_path().DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'ambassadors'.DIRECTORY_SEPARATOR;
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


        Ambassador::create([
                            'name' => $request->name,
                            'status_id' => $request->status_id,
                            'image' => 'ambassador'.DIRECTORY_SEPARATOR.$file_name,
                            'creator_id' => auth()->id()
                        ]);

        return Redirect::route('dashboard');
    }

    public function show(Ambassador $ambassador)
    {
        //
    }

    public function edit(Ambassador $ambassador)
    {
        return Inertia::render('Ambassador/Edit', ['ambassador' => $ambassador]);
    }

    public function update(UpdateAmbassadorRequest $request, Ambassador $ambassador)
    {
        if ($request->hasFile('image')){
            $file = $request->file('image');
            /*
             * TODO: move this to a trait
             */
            $image = Image::make($file);
            $path = storage_path().DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'ambassador'.DIRECTORY_SEPARATOR;
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
        }

        $ambassador->update([
            'name' => $request->name,
            'status_id' => $request->status_id,
            'image' => $request->hasFile('image') ? 'ambassadors'.DIRECTORY_SEPARATOR.$file_name : $ambassador->image
                            ]);

        return Redirect::route('dashboard');
    }

    public function destroy(Ambassador $ambassador)
    {
        //
    }
}
