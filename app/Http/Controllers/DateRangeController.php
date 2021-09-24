<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DateRangeController extends Controller
{
    function index()
    {
     return view('date_range');
    }

    function fetch_data(Request $request)
    {
     if($request->ajax())
     {
      if($request->from_date != '' && $request->to_date != '')
      {
       $data = DB::table('sale')
         ->whereBetween('fechaEmision', array($request->from_date, $request->to_date))
         ->get();
      }
      else
      {
       $data = DB::table('post')->orderBy('fechaEmision', 'desc')->get();
      }
      echo json_encode($data);
     }
    }
}
