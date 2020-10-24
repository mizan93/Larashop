@extends('admin.layout.app')

@section('title', 'inbox')
@push('css')

@endpush

@section('content')
<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
           <a class="btn btn-warning" href="{{ route('admin.inbox.index') }}">BACK</a>
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">View Message</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="mx-4 py-4">

                  <p> Name: {{ $inbox->name }}</p>
                  <p> Time: {{ date('h:i A', strtotime($inbox->created_at)) }},{{ $inbox->created_at->toFormattedDateString() }}</p>
                <p>  Email: {{ $inbox->email }}</p>
                <p>  Subject: {{ $inbox->subject }}</p>
                <p>Message: {!! $inbox->message !!}</p>
              </div>


            </div>
            <!-- /.card -->
            </div>
    </div><!-- /.container-fluid -->
  </div>
@endsection
@push('js')

@endpush
