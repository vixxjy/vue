<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Arrear;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        try {
            // $arrears = Arrear::all();
            // // dd(empty($arrears));
            // if (!$arrears) {
                $arrears_by_outstanding1 = Arrear::where('arrears_type', '=', 'outstanding')
                    ->where('economic_category', '=', 'Contractor\'s Arrears')->get();
                $arrears_by_incurred1 = Arrear::where('arrears_type', '=', 'incurred')
                    ->where('economic_category', '=', 'Contractor\'s Arrears')->get();
                $arrears_by_settled1 = Arrear::where('arrears_type', '=', 'settled')
                    ->where('economic_category', '=', 'Contractor\'s Arrears')->get();

                    $incurred_amount = 0;
                    $outstanding_amount = 0;
                    $settled_amount = 0;
            
                    foreach($arrears_by_outstanding1 as $outstanding) {
                        $outstanding_amount += $outstanding->amount_settled;
                    }
            
                    foreach($arrears_by_incurred1 as $incurred) {
                        $incurred_amount += $incurred->amount_settled;
                    }
            
                    foreach($arrears_by_settled1 as $settled) {
                        $settled_amount += $settled->amount_settled;
                    }

                    $total1_changes = $outstanding_amount + $incurred_amount + $settled_amount;

                $arrears_by_outstanding2 = Arrear::where('arrears_type', '=', 'outstanding')
                    ->where('economic_category', '=', 'Pension And Gratuity Arrears')->get();
                $arrears_by_incurred2 = Arrear::where('arrears_type', '=', 'incurred')
                    ->where('economic_category', '=', 'Pension And Gratuity Arrears')->get();
                $arrears_by_settled2 = Arrear::where('arrears_type', '=', 'settled')
                    ->where('economic_category', '=', 'Pension And Gratuity Arrears')->get();

                    $incurred_amount1 = 0;
                    $outstanding_amount1 = 0;
                    $settled_amount1 = 0;
            
                    foreach($arrears_by_outstanding2 as $outstanding) {
                        $outstanding_amount1 += $outstanding->amount_settled;
                    }
            
                    foreach($arrears_by_incurred2 as $incurred) {
                        $incurred_amount1 += $incurred->amount_settled;
                    }
            
                    foreach($arrears_by_settled2 as $settled) {
                        $settled_amount1 += $settled->amount_settled;
                    }

                    $total2_changes = $outstanding_amount1 + $incurred_amount1 + $settled_amount1;

                $arrears_by_outstanding3 = Arrear::where('arrears_type', '=', 'outstanding')
                    ->where('economic_category', '=', 'Salary Arrears And Other Staff Claims Arrears')->get();
                $arrears_by_incurred3 = Arrear::where('arrears_type', '=', 'incurred')
                    ->where('economic_category', '=', 'Salary Arrears And Other Staff Claims Arrears')->get();
                $arrears_by_settled3 = Arrear::where('arrears_type', '=', 'settled')
                    ->where('economic_category', '=', 'Salary Arrears And Other Staff Claims Arrears')->get();

                $incurred_amount2 = 0;
                $outstanding_amount2 = 0;
                $settled_amount2 = 0;

                foreach($arrears_by_outstanding3 as $outstanding) {
                    $outstanding_amount2 += $outstanding->amount_settled;
                }

                foreach($arrears_by_incurred3 as $incurred) {
                    $incurred_amount2 += $incurred->amount_settled;
                }

                foreach($arrears_by_settled3 as $settled) {
                    $settled_amount2 += $settled->amount_settled;
                }

                $total3_changes = $outstanding_amount2+ $incurred_amount2 + $settled_amount2;
                
                
                return view('admin.reports.index',compact('incurred_amount', 'settled_amount',
                'outstanding_amount', 'incurred_amount1', 'settled_amount1', 'outstanding_amount1'
                , 'incurred_amount2', 'settled_amount2', 'outstanding_amount2', 'total1_changes',
                'total2_changes', 'total3_changes'));
            // }else{
            //     return view('admin.reports.index');
            // }
        
       
        }catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}
