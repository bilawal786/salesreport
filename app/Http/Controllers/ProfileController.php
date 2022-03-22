<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
Use Hash;
class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile() {
    	return view ('admin.setting.profile');
    }
    
    public function profile_update(Request $request) {
    	
    	$user = User::find($request->id);
    	$user->email = $request->email;
    	$user->name = $request->name;
    	if($request->hasfile('image'))
                  {     
                    if(!empty($profile->image)){
                        $image_path=$profile->image;
                        unlink($image_path);
                      }
                        $image = $request->file('image');
                        $name = time().'profile'.'.'.$image->getClientOriginalExtension();
                        $destinationPath ='profile_images/';
                        $image->move($destinationPath, $name);
                        $user->image='profile_images/'.$name;

                  }

      $user->save();
      $notification=array(
                        'messege'=>'Profile Updated Successfully!',
                        'alert-type'=>'success'
                         );
      return Redirect()->back()->with($notification);
    }

    public function password_change() {

    	return view ('admin.setting.updatepassword');
    }

    public function password_update(Request $request)
    {
      $password=Auth::user()->password;
      $oldpass=$request->oldpass;
      $newpass=$request->password;
      $confirm=$request->password_confirmation;
      if (Hash::check($oldpass,$password)) {
           if ($newpass === $confirm) {
                      $user=User::find(Auth::id());
                      $user->password=Hash::make($request->password);
                      $user->save();
                      Auth::logout();
                      $notification=array(
                        'messege'=>'Password Changed Successfully ! Now Login with Your New Password',
                        'alert-type'=>'success'
                         );
                       return Redirect()->route('login')->with($notification);
                 }else{
                     $notification=array(
                        'messege'=>'New password and Confirm Password not matched!',
                        'alert-type'=>'error'
                         );
                       return Redirect()->back()->with($notification);
                 }
      }else{
        $notification=array(
                'messege'=>'Old Password not matched!',
                'alert-type'=>'error'
                 );
               return Redirect()->back()->with($notification);
      }

}

}
