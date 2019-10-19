<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ArrearsCategory;

class ArrearsCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $datas = ArrearsCategory::orderBy('id','DESC')->get();
        return view('admin.arrears_category.index',compact('datas'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function store(Request $request)
    {
        
        $this->validate($request, [
            'name' => 'required',
        ]);

        try {
        
            $str = strtolower($request->name);
            $slug = preg_replace('/\s+/', '-', $str);
            $input = $request->all();
            $input['slug'] = $slug;

            $user = ArrearsCategory::create($input);

            return redirect()->route('arrears_category.index')
                            ->with('success','Arrears Category created successfully');

        }catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function update(Request $request, $slug)
    {
        $this->validate($request, [
            'name'=>'required|max:120',
        ]);

        try {
            $mda = ArrearsCategory::where('slug', $slug)->first();

            $mda->name = $request->get('name');
            $str = strtolower($request->name);
            $slug = preg_replace('/\s+/', '-', $str);
            $mda->slug = $slug;
          
            $mda->save();

            return redirect()->route('arrears_category.index')->with('success',
                'Arrears Category successfully updated.');

        }catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function destroy($slug)
    {
        try {
        $mda = ArrearsCategory::where('slug', $slug)->delete();
        return redirect()->route('arrears_category.index')
                        ->with('success','Arrears Category deleted successfully');
        }catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}
