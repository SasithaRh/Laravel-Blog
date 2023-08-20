<?php

namespace App\Http\Controllers\Home;
use App\Models\HomeSlide;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
class HomeSliderController extends Controller
{
    public function homeslider()
    {
        $homesliders = HomeSlide::find(1);
        return view('admin.home_slide.home_slide_all',compact('homesliders'));
    }
    public function updateslider(Request $request)
    {
        $slide_id = $request->id;
        if($request->file('slider_image')){
            $image= $request->file('slider_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalName();
            Image::make($image)->resize(636,852)->save('upload/home_slide/'.$name_gen);
            $save_url = $name_gen;
            
            HomeSlide::findOrFail($slide_id)->update([
                'title' => $request->title,
                'short_title' => $request->shorttitle,
                'home_slide' => $save_url,
                'video_url' =>  $request->video_url,

            ]);
            $notification = array(
                'message'=>'Slider Details Upddated Successfully!',
                'alert-type'=>'success'
            );
            return redirect()->back()->with($notification );

        }else{
            HomeSlide::findOrFail($slide_id)->update([
                'title' => $request->title,
                'short_title' => $request->shorttitle,
              
                'video_url' =>  $request->video_url,

            ]);
            $notification = array(
                'message'=>'Slider Details Upddated Successfully!',
                'alert-type'=>'success'
            );
            return redirect()->back()->with($notification );
        }
    }
}
