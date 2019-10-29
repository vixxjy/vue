<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Arrear;
use App\Comment;


class PagesController extends Controller
{

    public function index(Request $request) {
        $datas = Arrear::orderBy('id','DESC')->where('arrears_state', '=', 'verified')->get();
        return view('welcome',compact('datas'))
        ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function show($id) {
        $arrear = Arrear::find($id);
        $comments = Comment::orderBy('id','DESC')->paginate(3);
        return view('arrears')->with(compact('arrear'))->with(compact('comments'));
    }

    public function showPosts($slug) {
        $post = $this->repos->findBySlug($slug);
        return view('fivepoints.humancapital')->with('post', $post);
    }
}
