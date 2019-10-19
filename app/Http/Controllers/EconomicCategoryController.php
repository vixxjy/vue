<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EconomicCategory;

class EconomicCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $datas = EconomicCategory::orderBy('id','DESC')->get();
        return view('admin.economic_category.index',compact('datas'))
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

            $user = EconomicCategory::create($input);

            return redirect()->route('economic_category.index')
                            ->with('success','Economic Category created successfully');

        }catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function update(Request $request, $slug)
    {
        //    dd($slug);
        $this->validate($request, [
            'name'=>'required|max:120',
        ]);

        try {
            $mda = EconomicCategory::where('slug', $slug)->first();

            $mda->name = $request->get('name');
            $str = strtolower($request->name);
            $slug = preg_replace('/\s+/', '-', $str);
            $mda->slug = $slug;
          
            $mda->save();

            return redirect()->route('economic_category.index')->with('success',
                'Economic Category successfully updated.');

        }catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function destroy($slug)
    {
        try {
        $mda = EconomicCategory::where('slug', $slug)->delete();
        return redirect()->route('economic_category.index')
                        ->with('success','Economic Category deleted successfully');
        }catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}
