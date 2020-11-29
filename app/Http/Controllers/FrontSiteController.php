<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontSiteController extends Controller
{
    //
    public function showHome()
    {
        return view('frontSite.home');
    }
    public function showBlog()
    {
        return view('frontSite.blog');
    }
    public function showSingle()
    {
        return view('frontSite.single');
    }
    public function showContact()
    {
        return view('frontSite.contact');
    }
}
