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
                                <th>Blog Category name</th>
                                
                                <th>Action</th>
                                
                            </tr>
                            </thead>


                            <tbody>
                              @foreach ($blogcategory as $key => $blogcategorys)
                              <tr>
                                <td>{{ $key + 1}}</td>
                                <td>{{ $blogcategorys['blog_category']}}</td>
                               
                                <td>
                                      <a href="{{ route('edit.blogcategorys',$blogcategorys['id']) }}" class="btn btn-info sm"><i class="fas fa-edit"></i></a>
                                    <a href="{{ route('delete.blogcategorys',$blogcategorys['id']) }}" class="btn btn-danger sm" id="delete"><i class="fas fa-trash"></i></button>  
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