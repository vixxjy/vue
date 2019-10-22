<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Arrear;


class PagesController extends Controller
{

    public function index(Request $request) {
        $datas = Arrear::orderBy('id','DESC')->get();
        return view('welcome',compact('datas'))
        ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function show($slug) {
        $arrear = Arrear::where('slug', $slug)->get();
        return view('arrears')->with(compact('arrear'));
    }

    public function showPosts($slug) {
        $post = $this->repos->findBySlug($slug);
        return view('fivepoints.humancapital')->with('post', $post);
    }
}
