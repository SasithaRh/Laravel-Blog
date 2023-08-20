<?php

namespace App\Http\Controllers\Home;
use App\Models\Blog;
use App\Models\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Carbon;


class ContactController extends Controller
{
    public function contactpage()
    {
       
       return view('frontend.contact');

    }
    public function Storecontact(Request $request)
    {
       
       
        
        Contact::insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'phone' => $request->phone,
            'message' => $request->message,
            'created_at' =>Carbon::now()


        ]);
        $notification = array(
            'message'=>'Your Message Submited Successfully!',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification );

    }
    public function contactmessage()
    {
       $contacts = Contact::all();
       return view('admin.conatct_page.contacts',compact('contacts'));

    }
    public function deletecontact($id)
    {
        $message = Contact::findOrFail($id);
       

        Contact::findOrFail($id)->delete();
        $notification = array(
            'message'=>'Message Deleted Successfully!',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification );
    }

}
