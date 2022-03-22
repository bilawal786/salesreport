<?php

namespace App\Http\Controllers;
use App\Lead;
use App\Comment;
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Imports\LeadsImport;
use Maatwebsite\Excel\Facades\Excel;


class LeadController extends Controller
{
    Public function create() {

    	return view ('admin.leads.create');
    }

    Public function index() {
    	$lead= Lead::all();
    	return view ('admin.leads.index' , compact('lead'));
    }

    Public function store(Request $request) {

    	$lead = new Lead();
        $lead->firstname = $request->firstname;
        $lead->lastname = $request->lastname;
        $lead->email = $request->email;
        $lead->phone = $request->phone;
        $lead->country = $request->country;
        $lead->status = $request->status;
        $lead->create_date = $request->create_date;
        $lead->modifiy_date = $request->modifiy_date;
        $lead->call_date = $request->call_date;
        $lead->follow_date = $request->follow_date;
        $lead->source = $request->source;


        $lead->save();
        $notification = array(
            'messege' => 'Lead Added Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

     public function delete($id) {
        $lead = Lead::find($id);
        $lead->delete();
         $notification=array(
                        'messege'=>'Lead Deleted !',
                        'alert-type'=>'error'
                         );
                       return Redirect()->back()->with($notification);
    }

     Public function edit($id) {
       $lead = Lead::find($id);
    	return view ('admin.leads.edit' , compact('lead'));
    }

    public function update(Request $request) {
        $id = $request->id;
        $lead = Lead::find($id);
        $lead->firstname = $request->firstname;
        $lead->lastname = $request->lastname;
        $lead->email = $request->email;
        $lead->phone = $request->phone;
        $lead->country = $request->country;
        $lead->status = $request->status;
        $lead->create_date = $request->create_date;
        $lead->modifiy_date = $request->modifiy_date;
        $lead->call_date = $request->call_date;
        $lead->follow_date = $request->follow_date;
        $lead->source = $request->source;

        $lead->update();
        $notification=array(
                        'messege'=>'Lead Updated Successfully!',
                        'alert-type'=>'success'
                         );
                       return Redirect()->route('lead.index')->with($notification);

    }

   Public function comment($id) {
       $lead = Lead::find($id);
       $comment= Comment::where('lead_id' , $id)->get();
    	return view ('admin.leads.comment' , compact('lead' , 'comment'));
    }

    public function comment_store(Request $request)
    {
    	$comment=new comment();
    	$comment->lead_id = $request->id;
    	$comment->comment = $request->comment;
    	$comment->save();
    	return Redirect()->back();

    }

    public function export()
    {
        return Excel::download(new UsersExport, 'leads.xlsx');
    }

    public function import(Request $request)
    {
    	$path1 = $request->file('excel')->store('temp');
        $path=storage_path('app').'/'.$path1;
        $data = Excel::import(new LeadsImport ,$path);
         $notification=array(
                        'messege'=>'Lead import Successfully!',
                        'alert-type'=>'success'
                         );
                       return Redirect()->route('lead.index')->with($notification);

    }

    public function search(Request $request) {
      $ser = $request->search;
// dd($ser);
      $comment = Comment::where('comment' , 'like', '%' . $ser . '%')->pluck('lead_id');
      // dd($comment);
      $lead = Lead::whereIn('id' , $comment)
          ->orwhere('firstname' , 'like', '%' . $ser . '%')
          ->orwhere('lastname' , 'like', '%' . $ser . '%')
          ->orwhere('email' , 'like', '%' . $ser . '%')
          ->orwhere('phone' , 'like', '%' . $ser . '%')
          ->orwhere('country' , 'like', '%' . $ser . '%')
          ->get();
      // dd($lead);
        return view ('admin.leads.index' , compact('lead'));
    }
    public function updateStatus($value, $id){
        $lead = Lead::find($id);
        $lead->status = $value;
        $lead->update();
        $notification=array(
            'messege'=>'Status Update Successfully!',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
    public function advancesearch(Request $request){
        $from = $request->from;
        $to = $request->to;
        $lead = Lead::where('status', $request->new)
            ->orwhere('status', $request->tryagain)
            ->orwhere('status', $request->notintrested)
            ->orwhere('status', $request->noanswer)
            ->orwhere('status', $request->done)
            ->orwhere('status', $request->callback)
            ->orwhere('status', $request->newonanswer)
            ->orwhere('status', $request->doneinmoney)
            ->orwhere('status', $request->whatnointrested)
            ->orwhereBetween('created_at', [$from, $to])
            ->get();
        return view ('admin.leads.index' , compact('lead'));

    }
}

