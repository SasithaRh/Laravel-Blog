@extends('admin.admin_master')
@section('admin')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" ></script>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h3 class="card-title mb-5">Edit Profile</h3>
                       <form action="{{ route('update.slider') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$homesliders['id'] }}">
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="{{$homesliders['title'] }}" name="title" id="example-text-input">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Short Title</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="{{$homesliders['short_title'] }}" name="shorttitle" id="example-text-input">
                            </div>
                        </div>
                        
                    
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Video Url</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" value="{{$homesliders['video_url'] }}" name="video_url" id="example-text-input">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Slider Image</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file"  name="slider_image" id="images">
                        </div>
                    </div>
                    <div>
                        <label for="example-email-input" class="col-sm-2 col-form-label"></label>

                        <img id="showimage" class="rounded-circle  avatar-xl" src="{{ asset('upload/home_slide/')}}/{{ $homesliders['home_slide'] }}" >

                    </div>
                    <center>
                        <input type="submit" class="btn btn-lg btn-info" value="Update Slider">
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
@endsection