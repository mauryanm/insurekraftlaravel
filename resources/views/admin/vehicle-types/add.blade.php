@extends('admin.layouts.master')
@section('content')
{!! Toastr::message() !!}
<div class="content-body">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Add Users</h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form name="add" class="formvalidate" method="POST" action="{{ route('admin.users.store') }}">
                        @csrf
                        {{-- @method('PUT') --}}
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label col-form-label">Name<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label col-form-label">Email<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" name="email" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label col-form-label">Phone<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="phone_number" data-rule-number="true" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label col-form-label">Position<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="position" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label col-form-label">Department<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="department" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label col-form-label">Discription</label>
                            <div class="col-sm-10">
                                <textarea class="form-control form-control editor" id="ckeditor" name="description" required></textarea>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-lg-10 ms-auto">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')

<style>
    .cke_toolbar_break{display: inline;}
</style>
<script type="text/javascript">
 CKEDITOR.replace('ckeditor', {
    filebrowserUploadUrl: "{{route('ckeditor.image-upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
});
$(function() {
    $(".formvalidate").validate({
        ignore: [],
        errorClass: "text-danger mt-1",
        errorElement: "em",
        rules: { 
            description:{
                required: function(textarea) 
                {
                    CKEDITOR.instances[textarea.id].updateElement();
                    var editorcontent = textarea.value.replace(/<[^>]*>/gi, '');
                    return editorcontent.length === 0;
                },

                minlength:10
            }
        },
        errorPlacement: function ( error, element ) {
            if(element.hasClass('editor')){
                error.insertAfter( element.next( ".cke_editor_ckeditor" ) );
            }else{
                error.insertAfter( element );
            }
            // error.addClass( "help-block" );
            // element.parents( ".col-sm-10" ).addClass( "has-feedback" );
            // if ( element.prop( "type" ) === "checkbox" ) {
            //     error.insertAfter( element.parent( "label" ) );
            // } else {
            //     error.insertAfter( element );
            // }
            // if ( !element.next( "span" )[ 0 ] ) {
            //     $( "<span class='glyphicon glyphicon-remove form-control-feedback'></span>" ).insertAfter( element );
            // }
        },
        // success: function ( label, element ) {
        //     console.log(label, element)
        //     if ( !$( element ).next( "label" )[ 0 ] ) {
        //         $( "<span class='glyphicon glyphicon-ok form-control-feedback'></span>" ).insertAfter( $( element ) );
        //     }
        // },
        // highlight: function ( element, errorClass, validClass ) {
        //     console.log("H",element, errorClass, validClass)
        //     $( element ).parents( ".col-sm-10" ).addClass( "has-error" ).removeClass( "has-success" );
        //     $( element ).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );
        // },
        // unhighlight: function ( element, errorClass, validClass ) {
        //     console.log("U",element, errorClass, validClass)
        //     $( element ).parents( ".col-sm-10" ).addClass( "has-success" ).removeClass( "has-error" );
        //     $( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
        // },
        submitHandler: function(form) {
            form.submit();
        }
    });
})

</script>
@endsection