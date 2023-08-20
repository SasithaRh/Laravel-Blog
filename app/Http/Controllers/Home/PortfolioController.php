<?php

namespace App\Http\Controllers\Home;
use App\Models\Portfolio;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Carbon;
use App\Models\MultiImage;
class PortfolioController extends Controller
{
    public function allportfolio()
    {
       $portfolio = Portfolio::latest()->get();
       return view('admin.portfolio_page.portfolio_page_all',compact('portfolio'));

    }
    public function addportfolio()
    {
        return view('admin.portfolio_page.add_portfolio');

    }
    public function storeportfolio(Request $request)
    {
        $validate = $request->validate([
            'portfolio_name' => 'required',
            'portfolio_string' => 'required',
            'portfolio_description' => 'required',
            'portfolio_image' => 'required',
        ]);
        $image= $request->file('portfolio_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalName();
        Image::make($image)->resize(1020,519)->save('upload/portfolio_image/'.$name_gen);
        $save_url = $name_gen;
        
        Portfolio::insert([
            'portfolio_name' => $request->portfolio_name,
            'portfolio_string' => $request->portfolio_string,
            'portfolio_image' =>  $save_url,
            'portfolio_description' => $request->portfolio_description,
            'created_at' =>Carbon::now()


        ]);
        $notification = array(
            'message'=>'Portfolio Added Successfully!',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification );

    }
    public function editportfolio($id)
    {
        $portfolio = Portfolio::find($id);
        return view('admin.portfolio_page.edit_portfolio',compact('portfolio'));
    }
    public function deleteportfolio($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        $portfolioimg = $portfolio->portfolio_image;
        $filename = 'upload/portfolio_image/'.$portfolioimg;
        unlink($filename);

        Portfolio::findOrFail($id)->delete();
        $notification = array(
            'message'=>'Portfolio Deleted Successfully!',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification );
    }
    public function portfoliodetails($id)
    {
        $portfoliodetails = Portfolio::findOrFail($id);
        return view('frontend.portfolio_details_page.portfolio_details',compact('portfoliodetails'));
    }
    public function homeportfolio()
    {
        $portfoliodetails = Portfolio::all();
        return view('frontend.home_portfolio',compact('portfoliodetails'));
    }
}
