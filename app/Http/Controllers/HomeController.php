<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        /*$default_params = [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
        ];*/

        return Inertia::render('Home/Index');
    }

    public function sendMessage()
    {
        ContactUs::create([
            'first_name' => \request()->first_name,
            'last_name' => \request()->last_name,
            'subject' => \request()->subject,
            'email' => \request()->email,
            'message' => \request()->message
                          ]);

        $mail = new \App\Mail\ContactUs([
                                            'first_name' => \request()->first_name,
                                            'last_name' => \request()->last_name,
                                            'subject' => \request()->subject,
                                            'email' => \request()->email,
                                            'message' => \request()->message
                                        ]);

        Mail::to('info@creamcosmetics.co.za')->send($mail);

        return response()->json(['success' => true]);
    }
}
