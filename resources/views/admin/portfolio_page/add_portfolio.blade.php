@extends('admin.admin_master')
@section('admin')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" ></script>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h3 class="card-title mb-5">Portfolio Page</h3>
                       <form action="{{ route('store.portfolio') }}" method="post" enctype="multipart/form-data">
                        @csrf
                       
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio Name</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text"  name="portfolio_name" id="example-text-input">
                            </div>
                        @error('portfolio_name')
                           <span class="text-danger" align="center">{{ $message }}</span> 
                        @enderror
                        </div>
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio Title</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text"  name="portfolio_string" id="example-text-input">
                            </div>
                            @error('portfolio_string')
                            <span class="text-danger" align="center">{{ $message }}</span> 
                         @enderror
                        </div>
                       
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio Description</label>
                            <div class="col-sm-10">
                                <textarea id="elm1" name="portfolio_description" rows="3"></textarea>
                            </div>
                            @error('portfolio_description')
                            <span class="text-danger" align="center">{{ $message }}</span> 
                         @enderror
                        </div>
                    
                  
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Insert Portfolio Image</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file"  name="portfolio_image" id="images">
                        </div>
                        @error('portfolio_image')
                        <span class="text-danger" align="center">{{ $message }}</span> 
                     @enderror
                    </div>
                    <div>
                        <label for="example-email-input" class="col-sm-2 col-form-label"></label>

                        <img id="showimage" class="rounded-circle  avatar-xl" src="" >

                    </div>
                    <center>
                        <input type="submit" class="btn btn-lg btn-info" value="Add Portfolio Page">
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