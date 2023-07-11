@extends('admin.layouts.master')
@section('title',"User List")
@section('content')
{!! Toastr::message() !!}
<div class="content-body">
    <div class="container-fluid">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Users</h4><a href="{{ route('admin.vehicle-type.create') }}" class="btn btn-rounded btn-info"><span class="btn-icon-start text-info"><i class="fa fa-plus color-info"></i>
                    </span>Add</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-responsive-md">
                            <thead>
                                <tr>
                                    <th style="width:50px;">
                                        <div class="form-check custom-checkbox checkbox-success check-lg me-3">
                                            <input type="checkbox" class="form-check-input" id="checkAll" required="">
                                            <label class="form-check-label" for="checkAll"></label>
                                        </div>
                                    </th>
                                    <th><strong>Make</strong></th>
                                    <th><strong>Model Name</strong></th>
                                    <th><strong>Date</strong></th>
                                    <th><strong>Status</strong></th>
                                    <th><strong></strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                <tr>
                                    <td>
                                        <div class="form-check custom-checkbox checkbox-success check-lg me-3">
                                            <input type="checkbox" class="form-check-input" id="check_all_{{$user->id}}" required="" value="{{$user->id}}">
                                            <label class="form-check-label" for="check_all_{{$user->id}}"></label>
                                        </div>
                                    </td>
                                    <td><div class="d-flex align-items-center"><img src="{{ URL::to('assets/images/avatar/1.jpg') }}" class="rounded-lg me-2" width="24" alt=""> <span class="w-space-no">{{$user->make}}</span></div></td>
                                    <td>{{$user->model_name}}</td>
                                    <td>{{$user->created_at}}</td>
                                    <td>
                                        @if($user->status ==1)
                                        <div class="d-flex align-items-center"><i class="fa fa-circle text-success me-1"></i> Active</div>
                                        @else
                                        <div class="d-flex align-items-center"><i class="fa fa-circle text-danger me-1"></i> Inactive</div>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('admin.vehicle-type.edit', $user->id)}}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                            {{-- <a onclick="delete({{$user->id}})" href="{{ route('admin.vehicle-type.destroy', $user->id)}}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a> --}}
                                            <a onclick="deletes({{$user->id}})" href="javascript:void(0)" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                            
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr><td colspan="6">No record found!</td></tr> 
                                @endforelse
                                
                            </tbody>
                        </table>
                        {!! $users->withQueryString()->links('pagination::bootstrap-5') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')


<script type="text/javascript">
$(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});

function deletes(ids){
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#bf1f1f',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "{{ route('admin.vehicle-type.destroy', $user->id)}}",
                method:"delete",
                type: "delete",
                data: {id: 5},
                // dataType: "html",
                success: function () {
                    Swal.fire("Done!", "It was succesfully deleted!", 'success')
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    Swal.fire("Error deleting!", "Please try again", "error")
                }
            });
            // Swal.fire('Deleted!','Your file has been deleted.','success')
        }
    })
}
</script>
@endsection