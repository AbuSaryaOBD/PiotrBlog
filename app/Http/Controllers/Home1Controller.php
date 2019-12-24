<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Home1Controller extends Controller
{
    //
    public function home()
    {
        // dd(Auth::id());
        return view('home1');
    }

    public function contact()
    {
        return view('contact');
    }

    public function blogPost($id, $welcomeId = 1)
    {
        $pages = [
            1 => [
                'title' => ' from page 1'
            ],
            2 => [
                'title' => ' from page 2'
            ],
        ];
        $welcome = [1 => 'Hello', 2 => 'Welcome'];
        return view('blog-post',[
            'data' => $pages[$id],
            'welcome' => $welcome[$welcomeId],
        ]);
    }
}
