@extends('admin.admin_master')
@section('admin')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" ></script>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h3 class="card-title mb-5">Blog Category Page</h3>
                       <form action="{{ route('store.blog_category') }}" id="myForm" method="post" >
                        @csrf
                       
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Category Name</label>
                            <div class="form-group col-sm-10">
                                <input class="form-control" type="text"  name="blog_category" id="example-text-input">
                               
                            </div>
                      
                        </div>
                 
                    <center>
                        <input type="submit" class="btn btn-lg btn-info" value="Add Blog Category">
                    </center>
                    
                    </form>
                       
    
                        <!-- end row -->
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
</div>

<script src="{{ asset('backend/assets/js/validate.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#myForm').validate({
            rules: {
                blog_category:{
                    required :true,
                },
            
            },
            messages:{
                blog_category:{
                    required :'Plase Enter Blog Category',
                },
                
            },
            errorElement: 'span',
            errorPlacement:function (error,element){
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight:function(element,errorClass,validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight:function(element,errorClass,validClass){
                $(element).removeClass('is-invalid');
            },
                
        
        });
    });
</script>
<script src="{{ asset('backend/assets/libs/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/pages/form-editor.init.js') }}"></script>
@endsection