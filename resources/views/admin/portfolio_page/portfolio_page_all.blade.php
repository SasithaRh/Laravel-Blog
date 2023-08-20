@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Portfolio All</h4>
                        <p class="card-title-desc">
                        </p>
                        <br/>
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Portfolio name</th>
                                <th>Portfolio Title</th>
                                <th>Portfolio Iamge</th>
                                
                                <th>Action</th>
                                
                            </tr>
                            </thead>


                            <tbody>
                              @foreach ($portfolio as $key => $portfolios)
                              <tr>
                                <td>{{ $key + 1}}</td>
                                <td>{{ $portfolios['portfolio_name']}}</td>
                                <td>{{ $portfolios['portfolio_string']}}</td>
                                <td><img src="{{ asset('upload/portfolio_image/')}}/{{ $portfolios['portfolio_image'] }}" width="50px" height="50px"></td>
                                
                                <td>
                                    <a href="{{ route('edit.portfolio',$portfolios['id']) }}" class="btn btn-info sm"><i class="fas fa-edit"></i></a>
                                    <a href="{{ route('delete.portfolio',$portfolios['id']) }}" class="btn btn-danger sm" id="delete"><i class="fas fa-trash"></i></button>
                                </td>
                                
                            </tr>
                              @endforeach  
                           
                            
                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div>
</div>

@endsection