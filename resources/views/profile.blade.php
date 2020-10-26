@extends('layouts.app')

@section('content')
@section('title', 'cart')

    <section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Profile</li>
				</ol>
            </div>
            <div>
                
            </div>
            <h2>User Profile</h2>
            <form action="{{ route('account.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
			<table class="table">

                     <tr>
                        <td>Image</td>
                        <td>
                        <img src="{{ url('storage/profile/'.$profile->image ) }}" class="img-fluid" style="max-width: 50%;height: auto" alt="Profile-image">
                        <input type="file" name="image"></td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td><input type="text" name="name" value="{{ $profile->name }}"></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="email" name="email" value="{{ $profile->email }}"></td>
                    </tr>
                    <tr>
                        <td>Notes</td>
                        <td><textarea  name="about" rows="5" cols="5">
                            {{ $profile->about }}
                            </textarea>
                        </td>
                    </tr>
                    <tr>
                        <td><button type="submit">Update profile</button>
</td>
                        <td></td>
                    </tr>



            </table>
        </form>
        <h2>Change Password</h2>
        <form class="form-horizontal" action="{{ route('account.password.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <table class="table">


               <tr>
                   <td>Old Password</td>
                   <td><input type="text" name="old_password" ></td>
               </tr>
               <tr>
                   <td>New Password </td>
                   <td><input type="email" name="password" ></td>
               </tr>
               <tr>
                   <td>Confirm Password </td>
                   <td><input type="email" name="password_confirmation" ></td>
               </tr>

               <tr>
                   <td><button type="submit">Update password</button>
                                                              </td>
                   <td></td>
               </tr>



       </table>



    </form>
		</div>
    </section>

@endsection
@push('js')

<script>
</script>
@endpush
