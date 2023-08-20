

@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title mb-5">Change the Password</h3>
                        @if(count($errors))
                            
                        @foreach ($errors->all() as $error)
                            <p class="alert alert-danger alert-dismissible fade show">{{ $error }}</p>
                        @endforeach

                    @endif

                   <form action="{{ route('update.password') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Enter Password</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="password" placeholder="Enter the old Password" name="oldpassword" id="example-text-input">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Enter  Password</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="password" placeholder="Enter the New Password" name="newpassword" id="example-text-input">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Confirm Password</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="password" placeholder="Confirm the  Password" name="conpassword" id="example-text-input">
                        </div>
                    </div>
                   
    
                <center>
                    <input type="submit" class="btn btn-lg btn-info" value="Change Password">
                </center>
                
                </form>
                   
    
                        <!-- end row -->
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
</div>

@endsection