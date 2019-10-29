<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Repositories\News\NewsContract;
use App\Repositories\Posts\PostContract;
use App\Repositories\Slider\SliderContract;
use App\User;
use App\Comment;
use App\MDA;
use App\EconomicCategory;
use App\Arrear;

class DashbaordController extends Controller
{
    protected $repo;
        public function __construct(NewsContract $NewsContract, PostContract $postContract, SliderContract $sliderContract) {
        $this->repo = $NewsContract;
        $this->repos = $postContract;
        $this->reposi = $sliderContract;
        $this->middleware('auth');
    }
    public function index(Request $request){
        $comments = Comment::orderBy('id','DESC')->get();
        $mdas = MDA::orderBy('id','DESC')->get();
        $economy = EconomicCategory::orderBy('id','DESC')->get();
        $datas = Arrear::orderBy('id','DESC')->get();
        // dd($comments);
        return view('admin.dashboard', compact('comments', 'mdas', 'economy', 'datas'))
        ->with('i', ($request->input('page', 1) - 1) * 5);
    }
}
