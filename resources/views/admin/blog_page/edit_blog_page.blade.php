@extends('admin.admin_master')
@section('admin')


<style type="text/css">
    .bootstrap-tagsinput .tag{
        margin-right: 2px;
        color: #b70000;
        font-weight: 700px;
    } 
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" ></script>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h3 class="card-title mb-5">Blog Page</h3>
                       <form action="{{ route('update.blog') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$editblogpage['id'] }}">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Blog Category ID</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="blog_category_id" aria-label="Default select example">
                                    
                                    @foreach ($categories as $key => $categorie)
                                    <option value="{{$categorie['id']  }}" {{$categorie['id'] == $editblogpage['blog_category_id'] ? 'selected':'' }}>{{ $categorie['blog_category'] }}</option>
                                    
                                    @endforeach
                                    </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Blog Title</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="{{$editblogpage['blog_title']  }}"  name="blog_title" id="example-text-input">
                            </div>
                        @error('blog_title')
                           <span class="text-danger" align="center">{{ $message }}</span> 
                        @enderror
                        </div>
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Blog Tags</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="{{$editblogpage['blog_tags']  }}" name="blog_tags" id="example-text-input" data-role="tagsinput">
                            </div>
                           
                            @error('blog_tags')
                            <span class="text-danger" align="center">{{ $message }}</span> 
                         @enderror
                        </div>
                       
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Blog Description</label>
                            <div class="col-sm-10">
                                <textarea id="elm1" name="blog_description" rows="3">{{$editblogpage['blog_description']  }}</textarea>
                            </div>
                            @error('blog_description')
                            <span class="text-danger" align="center">{{ $message }}</span> 
                         @enderror
                        </div>
                    
                  
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Insert Blog Image</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file"  name="blog_image" id="images">
                        </div>
                        @error('blog_image')
                        <span class="text-danger" align="center">{{ $message }}</span> 
                     @enderror
                    </div>
                    <div>
                        <label for="example-email-input" class="col-sm-2 col-form-label"></label>

                        <img id="showimage" class="rounded-circle  avatar-xl" src="{{ asset('upload/blog_image/')}}/{{ $editblogpage['blog_image'] }}" >

                    </div>
                    <center>
                        <input type="submit" class="btn btn-lg btn-info" value="Add Blog Page">
                    </center>
                    
                    </form>
                       
    
                        <!-- end row -->
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('#images').change(function(e){
            var reader = new FileReader();
                reader.onload = function(e){
                    $('#showimage').attr('src',e.target.result);

                }
                reader.readAsDataURL(e.target.files['0']);
            
        });
    });
</script>
<script src="{{ asset('backend/assets/libs/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/pages/form-editor.init.js') }}"></script>
@endsection