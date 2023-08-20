@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">All Contact Messages</h4>
                        <p class="card-title-desc">
                        </p>
                        <br/>
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Eamil</th>
                                <th>Phone</th>
                                <th>Subject</th>
                                <th>Date</th>
                                <th>Action</th>
                                
                            </tr>
                            </thead>


                            <tbody>
                              @foreach ($contacts as $key => $contact)
                              <tr>
                                <td>{{ $key + 1}}</td>
                                <td>{{ $contact['name'] }}</td>
                                <td>{{ $contact['email'] }}</td>
                                <td>{{ $contact['phone'] }}</td>
                                <td>{{ $contact['subject'] }}</td>
                                <td>{{ $contact['created_at'] }}</td>
                                <td align="center">
                                    
                                    <a href="{{ route('delete.contact',$contact['id']) }}" class="btn btn-danger sm" id="delete"><i class="fas fa-trash"></i></button>  
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
