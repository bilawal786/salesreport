<?php

namespace App\Http\Controllers;

use App\Sales;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Apperance;
use App\Lead;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sales = \App\Sales::whereDate('created_at', \Carbon\Carbon::today())->get();
        return view('admin.index' , compact('sales'));
    }

     public function apperance()
    {
        $app= Apperance::first();
        return view('admin.setting.apperance' , compact('app'));
    }

    public function app_update(Request $request) {

        $app = Apperance::first();
        $app->name = $request->name;
        if($request->hasfile('image'))
                  {
                    if(!empty($app->image)){
                        $image_path=$profile->image;
                        unlink($image_path);
                      }
                        $image = $request->file('image');
                        $name = time().'app'.'.'.$image->getClientOriginalExtension();
                        $destinationPath ='profile_images/';
                        $image->move($destinationPath, $name);
                        $app->logo='profile_images/'.$name;

                  }

      $app->save();
      $notification=array(
                        'messege'=>'Apperance Updated Successfully!',
                        'alert-type'=>'success'
                         );
      return Redirect()->back()->with($notification);
    }
    public function salesReport(){
        $sales = \App\Sales::whereDate('created_at', \Carbon\Carbon::today())->get();
        $salesyesterday = \App\Sales::whereDate('created_at', \Carbon\Carbon::yesterday())->get();
        return view('admin.reports', compact('sales', 'salesyesterday'));
    }
    public function weeklyreport(){
        $sales = \App\Sales::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
        $salesyesterday = \App\Sales::whereDate('created_at', \Carbon\Carbon::now()->startOfWeek()->subWeek())->get();
        return view('admin.weeklyreport', compact('sales', 'salesyesterday'));
    }
    public function monthlyreport(){
        $sales = \App\Sales::whereMonth('created_at', Carbon::now()->month)->get();
        $salesyesterday = \App\Sales::whereMonth('created_at', '=', Carbon::now()->subMonth()->month)->get();
        return view('admin.monthlyreport', compact('sales', 'salesyesterday'));
    }
}
