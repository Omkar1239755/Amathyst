@extends('admin::admin.layouts.layout')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                 <div class="col-lg-12">
                	<div class="card">
					   <div class="card-body">
	   				 	<form action="{{route('hobbie.update',$hobbie->id)}}" method="POST" enctype="multipart/form-data">
	   				 	    @csrf
		   				 	<div class="row">
								  <div class="col-md-6 mb-3">
								    <label for="hobby_name" class="form-label">Email:</label>
								    <input type="text" class="form-control"  placeholder="Enter Hobby Name" value="{{$hobbie->hobbie}}" name="hobby_name">
								    @if($errors->has('hobby_name'))
                                        <span class="text-danger">{{ $errors->first('hobby_name') }}</span>
                                    @endif
								  </div>
								  <div class="col-md-6 mb-3">
								    <label for="hobby_image" class="form-label">Image</label>
								     <img src="{{ asset('uploads/hobbies/' . $hobbie->image) }}" width="30" height="30" alt="{{ $hobbie->hobbie }}">
								    <input type="file" class="form-control"  name="hobby_image">
								  </div>
								  <div class="col-md-6">
								    <button type="submit" class="btn btn-primary">Submit</button>
								  </div>
							</div>
						 </form>
					   	</div>
					   </div>
                 </div>
            </div>
        </div>
    </section>
</div>
@endsection	