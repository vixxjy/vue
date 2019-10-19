<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NatureOfDebt;
use App\EconomicCategory;

class NatureOfDebtController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $datas = NatureOfDebt::orderBy('id','DESC')->get();
        $categories = EconomicCategory::orderBy('id','DESC')->get();
        return view('admin.nature_of_debt.index',compact('datas'))
            ->with('i', ($request->input('page', 1) - 1) * 5)->with(compact('categories'));
    }

    public function store(Request $request)
    {
        
        $this->validate($request, [
            'nature_of_debt' => 'required',
            'economic_category' => 'required',
        ]);

        try {
        
            $str = strtolower($request->nature_of_debt);
            $slug = preg_replace('/\s+/', '-', $str);
            $input = $request->all();
            $input['slug'] = $slug;

            $user = NatureOfDebt::create($input);

            return redirect()->route('nature_of_debt.index')
                            ->with('success','Nature of debt created successfully');

        }catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function update(Request $request, $slug)
    {
        $this->validate($request, [
            'nature_of_debt' => 'required',
            'economic_category' => 'required',
        ]);

        try {
            $mda = NatureOfDebt::where('slug', $slug)->first();

            $mda->nature_of_debt = $request->get('nature_of_debt');
            $mda->economic_category = $request->get('economic_category');
            $str = strtolower($request->nature_of_debt);
            $slug = preg_replace('/\s+/', '-', $str);
            $mda->slug = $slug;
          
            $mda->save();

            return redirect()->route('nature_of_debt.index')->with('success',
                'Nature of debt successfully updated.');

        }catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function destroy($slug)
    {
        try {
        $mda = NatureOfDebt::where('slug', $slug)->delete();
        return redirect()->route('nature_of_debt.index')
                        ->with('success','Nature of debt deleted successfully');
        }catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}
