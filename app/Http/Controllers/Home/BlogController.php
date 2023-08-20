<?php

namespace App\Http\Controllers\Home;
use App\Models\BlogCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Carbon;
use App\Models\MultiImage;

class BlogController extends Controller
{
    public function allblog()
    {
       $blogcategory = BlogCategory::latest()->get();
       return view('admin.blog_category.blog_category_all',compact('blogcategory'));

    }
    public function addblog_category()
    {
        return view('admin.blog_category.blog_category_add');

    }
   
    public function storeblog_category(Request $request)
    {
     
       
        
        BlogCategory::insert([
            'blog_category' => $request->blog_category,
            'created_at' =>Carbon::now()


        ]);
        $notification = array(
            'message'=>'Category Added Successfully!',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification );

    }
    public function deleteblogcategorys($id)
    {
        $blogCategory = BlogCategory::findOrFail($id);
       

        BlogCategory::findOrFail($id)->delete();
        $notification = array(
            'message'=>'Blog Category Successfully!',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification );
    }
    public function editblogcategorys($id)
    {
        $editblogCategory = BlogCategory::find($id);
        return view('admin.blog_category.edit_blog_category',compact('editblogCategory'));
    }
    public function updatecategory(Request $request)
    {
        $cat_id = $request->id;
        BlogCategory::findOrFail($cat_id)->update([
            'blog_category' => $request->blog_category,
            

        ]);
        $notification = array(
            'message'=>'Blog Category Upddated Successfully!',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification );
    }
}
