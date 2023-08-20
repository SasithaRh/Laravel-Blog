@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <center class="mt-4">
                        <img class="rounded-circle  avatar-xl" src="{{ asset('upload/admin_image/')}}/{{ $adminData['profile_image'] }}" alt="Card image cap">

                    </center>
                    <div class="card-body">
                        <h4 class="-title text-center">{{$adminData['name'] }}</h4>
                        <h5 class="card-title text-center">{{$adminData['email'] }}</h5>
                        <p class="card-text" align="justify">This is a wider card with supporting text below as a
                            natural lead-in to additional content. This content is a little bit
                            longer.</p>
                           
                            <center >
                          <a align="justify" href="{{ route('edit.profile') }}"><button class="btn -btn-lg btn-info">Edit Profile</button></a>
                        </center>
                    </div>
                </div>
            </div>

        

        </div>
    </div>
</div>
@endsection