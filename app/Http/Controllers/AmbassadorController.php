<?php

namespace App\Http\Controllers;

use App\Models\Ambassador;
use Illuminate\Http\Request;

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
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Ambassador $ambassador)
    {
        //
    }

    public function edit(Ambassador $ambassador)
    {
        //
    }

    public function update(Request $request, Ambassador $ambassador)
    {
        //
    }

    public function destroy(Ambassador $ambassador)
    {
        //
    }
}
