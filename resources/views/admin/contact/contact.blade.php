@extends('admin.layout.app')

@section('title','Contact')

@push('css')

@endpush

@section('content')
<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header" data-background-color="purple">
                    <h4 class="title">Edit company contact</h4>
                </div>
                <div class="card-content">
                    <form method="POST" action="{{ route('admin.contact.update',$contact->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Address</label>
                                    <input type="text" class="form-control" name="address" value="{{ $contact->address }}" >

                                </div>
                            </div>
                        </div>

                        <div class="row">
                        <div class="col-md-12">
                            <div class="form-group label-floating">
                                <label class="control-label">City</label>
                                <input type="text" class="form-control" name="city" value="{{ $contact->city }}" >

                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Phone</label>
                                    <input type="text" class="form-control" name="phone" value="{{ $contact->phone }}" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-md-12">
                            <div class="form-group label-floating">
                                <label class="control-label">Email</label>
                                <input type="text" class="form-control" name="email" value="{{ $contact->email }}" >


                            </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">FaceBook link</label>
                                   <input type="text" class="form-control" name="fb_link" value="{{ $contact->fb_link }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Twitter link</label>
                                   <input type="text" class="form-control" name="tw_link" value="{{ $contact->tw_link }}" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Instagram link</label>
                                   <input type="text" class="form-control" name="gplus_link" value="{{ $contact->insta_link }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Goofle plus link</label>
                                   <input type="text" class="form-control" name="gplus_link" value="{{ $contact->gplus_link }}" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Youtube link</label>
                                   <input type="text" class="form-control" name="youtube_link" value="{{ $contact->youtube_link }}" >
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
  </div>
 </div>
@endsection

@push('js')
<script>
    $(document).ready(function() {
  $("#quickForm").validate({
      rules:{
        cat_name:{
            required: true,
        },
      },
  });
});
</script>
@endpush
