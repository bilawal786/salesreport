<?php

namespace App\Http\Controllers;

use App\Sales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SalesController extends Controller
{
    public function store(Request $request)
    {
        $sales = Sales::where('user_id', Auth::user()->id)->whereDate('date', \Carbon\Carbon::today())->first();
        if ($sales) {
            $notification = array(
                'messege' => 'You already creayed todat record!',
                'alert-type' => 'error'
            );
        } else {
            $sale = new Sales();
            $sale->sales = $request->sales;
            $sale->date = $request->date;
            if (Auth::user()->email == 'ruby@caravane.earth') {
                $sale->se = $request->se;
                $sale->ma = $request->ma;
                $visitor = $request->se + $request->ma;
                $sale->visitor = $visitor;
            } elseif (Auth::user()->email == 'shefa.k@caravane.earth') {
                $sale->bk = $request->bk;
                $sale->lu = $request->lu;
                $sale->at = $request->at;
                $sale->di = $request->di;
                $visitor = $request->bk + $request->lu + $request->at + $request->di;
                $sale->visitor = $visitor;
            } else {
                $sale->visitor = $request->visitor;
            }
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
