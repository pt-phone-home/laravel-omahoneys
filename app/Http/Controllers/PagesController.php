<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Careers;
use App\Offer;
use App\News;
use App\Recipe;
use Auth;
class PagesController extends Controller
{
    public function index() {
        return view('index');
    }
    public function about() {
        return view('about');
    }
    public function quality() {
        return view('quality');
    }
    public function careers() {

        $careers = Careers::orderBy('updated_at', 'desc')->get();

        return view('careers')->with('careers', $careers);
    }
    public function contact() {
        return view('contact');
    }
    public function wholesale() {
        return view('wholesale');
    }
    public function retail() {
        return view('retail');
    }
    public function products() {
        return view('products');
    }
    // public function offers() {

    //     $latest_offer = Offer::orderBy('updated_at', 'DESC')->findorfail(1);

    //     // dd($latest_offer);

    //     $offers = Offer::orderBy('updated_at', 'DESC')->take(6)->skip(1)->get();

        
    //     return view('offers')->with([
    //         'latest_offer' => $latest_offer,
    //         'offers' => $offers
    //     ]);
    // }

    public function offers() {

        $latest_offer = Offer::orderBy('updated_at', 'DESC')->first();
        $offers = Offer::orderBy('updated_at', 'DESC')->take(6)->skip(1)->get();
        return view('offers')->with([
            'latest_offer' => $latest_offer,
            'offers' => $offers
        ]);
    }

    public function recipes() {

        $latest_recipe = Recipe::orderBy('updated_at', 'DESC')->first();

        $recipes = Recipe::orderBy('updated_at', 'DESC')->take(6)->skip(1)->get();
        return view('recipes')->with([
            'recipes' => $recipes,
            'latest_recipe' => $latest_recipe
            ]);
    }
    public function news() {

        $latest_news = News::orderBy('updated_at', 'DESC')->first();
        $news = News::orderBy('updated_at', 'DESC')->take(6)->skip(1)->get();
        return view('news')->with([
            'latest_news' => $latest_news,
            'news' => $news
        ]);
    }


    // ADMIN PAGES

    public function admin() {

        $newsitem = News::all();
        $career = Careers::all();
        $offers = Offer::all();
        $recipes = Recipe::all();

        return view('admin')->with([
            'newsitem' => $newsitem,
            'career' => $career,
            'offers' => $offers,
            'recipes' => $recipes
        ]);
    }

    public function login() {
        return view('login');
    }

    public function logincheck(Request $request) {

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Auth Passed

            return redirect()->intended('/admin');
        } else {

            return redirect()->back()->with('failed', 'Sorry your details are not correct');
        }


    }

    public function logout() {

        Auth::logout();

        return redirect('login')->with('success', 'You are logged out');
    }
}
