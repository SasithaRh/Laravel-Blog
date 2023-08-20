<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function profile()
    {
        $id = Auth::user()->id;
        $adminData = User::find($id);
        return view('admin.admin_profile',compact('adminData'));
    }
    public function editprofile()
    {
        $id = Auth::user()->id;
        $editData = User::find($id);
        return view('admin.admin_profile_edit',compact('editData'));
    }
    public function stroreprofile(Request $request )
    {
        $id = Auth::user()->id;
        $Data = User::find($id);
        $Data->name = $request->name;
        $Data->email = $request->email;

        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_image'),$filename);
            $Data['profile_image']= $filename;
        }
        $Data->save();
        $notification = array(
            'message'=>'Profile Upddated Successfully!',
            'alert-type'=>'success'
        );
        return redirect()->route('admin.profile')->with($notification );
    }
    public function changepassword()
    {
        return view('admin.admin_change_password');
    }
    public function updatepassword(Request $request)
    {
        $validate = $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required',
            'conpassword' => 'required|same:newpassword'
        ]);

        $hashPassword = Auth::user()->password;
        if(Hash::check($request->oldpassword,$hashPassword)){
            $users = User::find(Auth::id());
            $users->password = bcrypt($request->newpassword);
            $users->save();

            session()->flash('message','Password Updated Successfully');

            return redirect()->back();
        }else{
            session()->flash('message','Old Password doesn not match');

            return redirect()->back();
        }
    }
}
