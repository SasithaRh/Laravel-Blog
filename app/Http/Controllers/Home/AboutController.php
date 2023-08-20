<?php

namespace App\Http\Controllers\Home;
use App\Models\About;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Carbon;
use App\Models\MultiImage;
class AboutController extends Controller
{
    public function aboutpage()
    {
        $about = About::find(1);
        return view('admin.about_page.about_page_all',compact('about'));
    }
    public function updateabout(Request $request)
    {
        $about_id = $request->id;
        if($request->file('about_image')){
            $image= $request->file('about_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalName();
            Image::make($image)->resize(523,605)->save('upload/home_about/'.$name_gen);
            $save_url = $name_gen;
            
            About::findOrFail($about_id)->update([
                'title' => $request->title,
                'short_title' => $request->shorttitle,
                'short_description' =>$request->short_description,
                'long_description' =>$request->long_description,
                'about_image' => $save_url,

            ]);
            $notification = array(
                'message'=>'About Page Upddated Successfully!',
                'alert-type'=>'success'
            );
            return redirect()->back()->with($notification );

        }else{
            About::findOrFail($about_id)->update([
                'title' => $request->title,
                'short_title' => $request->shorttitle,
                'short_description' =>$request->short_description,
                'long_description' =>$request->long_description,
                

            ]);
            $notification = array(
                'message'=>'About Page Upddated Successfully!',
                'alert-type'=>'success'
            );
            return redirect()->back()->with($notification );
        }
    }
    public function homeabout()
    {
        $aboutpage = About::find(1);
        return view('frontend.about_page',compact('aboutpage'));

    }
    public function multi_image()
    {
        return view('admin.about_page.multi_image');

    }
    public function storemultiimage(Request $request)
    {
        $images = $request->file('multi_image');

        foreach($images as $image){

        
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalName();
            Image::make($image)->resize(226,220)->save('upload/multi_image/'.$name_gen);
            $save_url = $name_gen;
            
            MultiImage::insert([
                
                'multi_image' => $save_url,
                'created_at' =>Carbon::now()

            ]);
        }
            $notification = array(
                'message'=>'Multi Image Added Successfully!',
                'alert-type'=>'success'
            );
            return redirect()->back()->with($notification );
       
     
        
    }

    public function all_multi_image()
    {
        $allMultiImage = MultiImage::all();
        return view('admin.about_page.all_multi_image',compact('allMultiImage'));
    }
    public function editmultiimage($id)
    {
         $editimage = MultiImage::find($id);
        return view('admin.about_page.edit_multi_image',compact('editimage'));
    }
    public function updatemultimage(Request $request)
    {
        $image_id = $request->image_id;
        if($request->file('multi_image')){
            $image= $request->file('multi_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalName();
            Image::make($image)->resize(226,220)->save('upload/multi_image/'.$name_gen);
            $save_url = $name_gen;
            
            MultiImage::findOrFail($image_id)->update([
                
                'multi_image' => $save_url,

            ]);
            $notification = array(
                'message'=>'Image Upddated Successfully!',
                'alert-type'=>'success'
            );
            return redirect()->back()->with($notification );

        }
    }
    public function deletemultiimage($id)
    {
        $multi = MultiImage::findOrFail($id);
        $img = $multi->multi_image;
        $filename = 'upload/multi_image/'.$img;
        unlink($filename);

        MultiImage::findOrFail($id)->delete();
        $notification = array(
            'message'=>'Image Deleted Successfully!',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification );
    }
}
