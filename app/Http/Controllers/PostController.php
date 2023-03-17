<?php

namespace App\Http\Controllers;

use App\Models\RedirectUrl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(string $slug)
    {
        return view('new_page', ['slug' => $slug]);
    }
}
