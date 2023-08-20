<?php

namespace App\Http\Controllers\Home;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Carbon;
use App\Models\MultiImage;


class BlogPageController extends Controller
{
    public function allblogpage()
    {
       $blogs = Blog::latest()->get();
       return view('admin.blog_page.blogs__all',compact('blogs'));

    }
    public function addblog()
    {
        $categories = BlogCategory::orderBy('blog_category','ASC')->get();
        return view('admin.blog_page.blog_add',compact('categories'));

    }
    public function storeblog(Request $request)
    {
        $validate = $request->validate([
            'blog_category_id' => 'required',
            'blog_title' => 'required',
            'blog_tags' => 'required',
            'blog_description' => 'required',
            'blog_image' => 'required',
        ]);
        $image= $request->file('blog_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalName();
        Image::make($image)->resize(430,327)->save('upload/blog_image/'.$name_gen);
        $save_url = $name_gen;
        
        Blog::insert([
            'blog_category_id' => $request->blog_category_id,
            'blog_title' => $request->blog_title,
            'blog_image' =>  $save_url,
            'blog_tags' => $request->blog_tags,
            'blog_description' => $request->blog_description,
            'created_at' =>Carbon::now()


        ]);
        $notification = array(
            'message'=>'Blog Added Successfully!',
            'alert-type'=>'success'
        );
        return redirect()->route('all.blog_page')->with($notification );

    }
    public function editblog($id)
    {
        $editblogpage = Blog::find($id);
        $categories = BlogCategory::orderBy('blog_category','ASC')->get();
        return view('admin.blog_page.edit_blog_page',compact('editblogpage','categories'));
    }
    public function updateblog(Request $request)
    {
        $blog_id = $request->id;
        if($request->file('blog_image')){
            $image= $request->file('blog_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalName();
            Image::make($image)->resize(430,327)->save('upload/blog_image/'.$name_gen);
            $save_url = $name_gen;
            
            Blog::findOrFail($blog_id)->update([
                'blog_category_id' => $request->blog_category_id,
                'blog_title' => $request->blog_title,
                'blog_image' =>  $save_url,
                'blog_tags' => $request->blog_tags,
                'blog_description' => $request->blog_description,

            ]);
            $notification = array(
                'message'=>'Blog Upddated Successfully!',
                'alert-type'=>'success'
            );
            return redirect()->back()->with($notification );

        }else{
            Blog::findOrFail($blog_id)->update([
                'blog_category_id' => $request->blog_category_id,
                'blog_title' => $request->blog_title,
              
                'blog_tags' => $request->blog_tags,
                'blog_description' => $request->blog_description,

            ]);
            $notification = array(
                'message'=>'Blog Upddated Successfully!',
                'alert-type'=>'success'
            );
            return redirect()->back()->with($notification );
        }
    }
    public function deleteblog_page($id)
    {
        $blog = Blog::findOrFail($id);
        $blogimg = $blog->blog_image;
        $filename = 'upload/blog_image/'.$blogimg;
        unlink($filename);

        Blog::findOrFail($id)->delete();
        $notification = array(
            'message'=>'Blog Deleted Successfully!',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification );
    }
    public function blogdetails($id)
    {
        $blogtpage = Blog::find($id);
        $allblogs = Blog::latest()->limit(5)->get();
        $categories = BlogCategory::orderBy('blog_category','ASC')->get();
        return view('frontend.blog_page',compact('blogtpage','allblogs','categories'));

    }
    public function categoryblog($id)
    {
        $cat = BlogCategory::find($id);
        $blogpost = Blog::where('blog_category_id',$id)->orderBy('id','DESC')->get();
        $allblogs = Blog::latest()->limit(5)->get();
        $categories = BlogCategory::orderBy('blog_category','ASC')->get();
        return view('frontend.cat_blog_details',compact('blogpost','cat','allblogs','categories'));

    }
    public function homeblog()
    {
        $blogs = Blog::latest()->paginate(2);
        $categories = BlogCategory::orderBy('blog_category','ASC')->get();
        return view('frontend.blog',compact('blogs','categories'));
    }
}
