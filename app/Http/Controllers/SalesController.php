<?php

namespace App\Http\Controllers;

use App\Sales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SalesController extends Controller
{
    public function store(Request $request)
    {
        $sales = Sales::where('user_id', Auth::user()->id)->whereDate('created_at', \Carbon\Carbon::today())->first();
        if ($sales){
            $notification = array(
                'messege' => 'You already creayed todat record!',
                'alert-type' => 'error'
            );
        }else{
            $sale = new Sales();
            $sale->sales = $request->sales;
            $sale->visitor = $request->visitor;
            $sale->user_id = Auth::user()->id;
            $sale->save();
            $notification = array(
                'messege' => 'Sale Created Successfully!',
                'alert-type' => 'success'
            );
        }
        return Redirect()->back()->with($notification);
    }
}
