<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('posts.contact'); // Pastikan Anda memiliki file contact.blade.php di resources/views
    }
}
