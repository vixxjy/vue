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
            $year = date("Y");
            $a_year_back = $year - 1;
                
                // year 2018
                $arrears_by_outstanding2018 = Arrear::where('arrears_type', '=', 'outstanding')
                    ->where('economic_category', '=', 'Contractor\'s Arrears')
                    ->where('year_of_entry', '=', $a_year_back)->get();
                $arrears_by_settled2018 = Arrear::where('arrears_type', '=', 'settled')
                    ->where('economic_category', '=', 'Contractor\'s Arrears')
                    ->where('year_of_entry', '=', $a_year_back)->get();
                
                    $incurred_amount2018 = 0;
                    $outstanding_amount2018 = 0;
                    $settled_amount2018 = 0;

                    foreach($arrears_by_outstanding2018 as $outstanding) {
                        $outstanding_amount2018 += $outstanding->amount_settled;
                    }

                    foreach($arrears_by_settled2018 as $settled) {
                        $settled_amount2018 += $settled->amount_settled;
                    }

                    $incurred_amount2018 = $outstanding_amount2018 + $settled_amount2018;
                
                // year 2019
                $arrears_by_incurred2019 = Arrear::where('arrears_type', '=', 'incurred')
                    ->where('economic_category', '=', 'Contractor\'s Arrears')
                    ->where('year_of_entry', '=', $year)->get();
                $arrears_by_settled2019 = Arrear::where('arrears_type', '=', 'settled')
                    ->where('economic_category', '=', 'Contractor\'s Arrears')
                    ->where('year_of_entry', '=', $year)->get();      
                    
                    $incurred_amountx = 0;
                    // $outstanding_amount = 0;
                    $settled_amount = 0;
            
                    foreach($arrears_by_incurred2019 as $incurred) {
                        $incurred_amountx += $incurred->amount_settled;
                    }
            
                    foreach($arrears_by_settled2019 as $settled) {
                        $settled_amount += $settled->amount_settled;
                    }

                    $incurred_amount = $outstanding_amount2018 + $incurred_amountx;
                    $outstanding_amount =  $incurred_amount - $settled_amount;

                    $total1_diff = $outstanding_amount2018 - $outstanding_amount;
                    // $percentage1 = ($total1_diff/$outstanding_amount2018)  * 100;
                   
                    // pension gratuity 
                    $arrears_by_outstanding2018 = Arrear::where('arrears_type', '=', 'outstanding')
                        ->where('economic_category', '=', 'Pension And Gratuity Arrears')
                        ->where('year_of_entry', '=', $a_year_back)->get();
                    $arrears_by_settled2018 = Arrear::where('arrears_type', '=', 'settled')
                        ->where('economic_category', '=', 'Pension And Gratuity Arrears')
                        ->where('year_of_entry', '=', $a_year_back)->get();

                    $incurred_amount12018 = 0;
                    $outstanding_amount12018 = 0;
                    $settled_amount12018 = 0;
            
                    foreach($arrears_by_outstanding2018 as $outstanding) {
                        $outstanding_amount12018 += $outstanding->amount_settled;
                    }
            
                    foreach($arrears_by_settled2018 as $settled) {
                        $settled_amount12018 += $settled->amount_settled;
                    }
             
                    $incurred_amount12018 = $outstanding_amount12018 + $settled_amount12018;

                $arrears_by_incurred2019 = Arrear::where('arrears_type', '=', 'incurred')
                    ->where('economic_category', '=', 'Pension And Gratuity Arrears')
                    ->where('year_of_entry', '=', $year)->get();
                $arrears_by_settled2019 = Arrear::where('arrears_type', '=', 'settled')
                    ->where('economic_category', '=', 'Pension And Gratuity Arrears')
                    ->where('year_of_entry', '=', $year)->get();
                
                    $incurred_amount1x = 0;
                    $outstanding_amount1 = 0;
                    $settled_amount1 = 0;
            
                    foreach($arrears_by_incurred2019 as $incurred) {
                        $incurred_amount1x += $incurred->amount_settled;
                    }
            
                    foreach($arrears_by_settled2019 as $settled) {
                        $settled_amount1 += $settled->amount_settled;
                    }

                    $incurred_amount1 = $outstanding_amount12018 + $incurred_amount1x;
                    $outstanding_amount1 = $incurred_amount1 - $settled_amount1;
            
                    $total2_diff = $outstanding_amount12018 - $outstanding_amount1;
                    // $percentage2 = ( $total2_diff/$outstanding_amount12018 )  * 100;

                // Salary Arrears
                $arrears_by_outstanding32018 = Arrear::where('arrears_type', '=', 'outstanding')
                    ->where('economic_category', '=', 'Salary Arrears And Other Staff Claims Arrears')
                    ->where('year_of_entry', '=', $a_year_back)->get();
                $arrears_by_settled32018 = Arrear::where('arrears_type', '=', 'settled')
                    ->where('economic_category', '=', 'Salary Arrears And Other Staff Claims Arrears')
                    ->where('year_of_entry', '=', $a_year_back)->get();

                $incurred_amount22018 = 0;
                $outstanding_amount22018 = 0;
                $settled_amount22018 = 0;

                foreach($arrears_by_outstanding32018 as $outstanding) {
                    $outstanding_amount22018 += $outstanding->amount_settled;
                }

                foreach($arrears_by_settled32018 as $settled) {
                    $settled_amount22018 += $settled->amount_settled;
                }
             
                $incurred_amount22018 = $outstanding_amount22018 + $settled_amount22018;

            //    2019
                $arrears_by_incurred3 = Arrear::where('arrears_type', '=', 'incurred')
                    ->where('economic_category', '=', 'Salary Arrears And Other Staff Claims Arrears')
                    ->where('year_of_entry', '=', $year)->get();
                $arrears_by_settled3 = Arrear::where('arrears_type', '=', 'settled')
                    ->where('economic_category', '=', 'Salary Arrears And Other Staff Claims Arrears')
                    ->where('year_of_entry', '=', $year)->get();

                    $incurred_amount2x = 0;
                    $outstanding_amount2 = 0;
                    $settled_amount2 = 0;

                    foreach($arrears_by_incurred3 as $incurred) {
                        $incurred_amount2x += $incurred->amount_settled;
                    }
                    foreach($arrears_by_settled3 as $settled) {
                        $settled_amount2 += $settled->amount_settled;
                    }

                    $incurred_amount2 = $outstanding_amount22018 + $incurred_amount2x;
         
                    $outstanding_amount2 = $incurred_amount2 - $settled_amount2;

                $total3_diff = $outstanding_amount22018 - $outstanding_amount2;
                // $percentage3 = ( $total3_diff/$outstanding_amount22018 )  * 100;

                // judgement Debt
                $arrears_by_outstanding42018 = Arrear::where('arrears_type', '=', 'outstanding')
                    ->where('economic_category', '=', 'Judgement Debt')
                    ->where('year_of_entry', '=', $a_year_back)->get();
                $arrears_by_settled42018 = Arrear::where('arrears_type', '=', 'settled')
                    ->where('economic_category', '=', 'Judgement Debt')
                    ->where('year_of_entry', '=', $a_year_back)->get();

                $incurred_amount32018 = 0;
                $outstanding_amount32018 = 0;
                $settled_amount32018 = 0;

                foreach($arrears_by_outstanding42018 as $outstanding) {
                    $outstanding_amount32018 += $outstanding->amount_settled;
                }

                foreach($arrears_by_settled42018 as $settled) {
                    $settled_amount32018 += $settled->amount_settled;
                }

                $incurred_amount32018 = $outstanding_amount32018 + $settled_amount32018;

                $arrears_by_incurred4 = Arrear::where('arrears_type', '=', 'incurred')
                    ->where('economic_category', '=', 'Judgement Debt')
                    ->where('year_of_entry', '=', $year)->get();
                $arrears_by_settled4 = Arrear::where('arrears_type', '=', 'settled')
                    ->where('economic_category', '=', 'Judgement Debt')
                    ->where('year_of_entry', '=', $year)->get();

                    $incurred_amount3x = 0;
                    $outstanding_amount3 = 0;
                    $settled_amount3 = 0;
                 
                    foreach($arrears_by_incurred4 as $incurred) {
                        $incurred_amount3x += $incurred->amount_settled;
                    }

                    foreach($arrears_by_settled4 as $settled) {
                        $settled_amount3 += $settled->amount_settled;
                    }

                    $incurred_amount3 = $outstanding_amount32018 + $incurred_amount3x;
                    $outstanding_amount3 = $incurred_amount3 - $settled_amount3;

                $total4_diff = $outstanding_amount32018 - $outstanding_amount3;
                // $percentage4 = ( $total4_diff/$outstanding_amount32018 )  * 100;
                
            return view('admin.reports.index',compact(
                'incurred_amount', 'settled_amount','outstanding_amount',
                'incurred_amount2018', 'settled_amount2018', 'outstanding_amount2018', 
                'incurred_amount1', 'settled_amount1', 'outstanding_amount1',
                'incurred_amount12018', 'settled_amount12018', 'outstanding_amount12018',
                'incurred_amount2', 'settled_amount2', 'outstanding_amount2',
                'incurred_amount22018', 'settled_amount22018', 'outstanding_amount22018', 
                'incurred_amount3', 'settled_amount3', 'outstanding_amount3',
                'incurred_amount32018', 'settled_amount32018', 'outstanding_amount32018', 
                'total1_diff', 'total2_diff', 'total3_diff', 'total4_diff'
                // 'percentage1', 'percentage2', 'percentage3', 'percentage4'
            ));
        
       
        }catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}
