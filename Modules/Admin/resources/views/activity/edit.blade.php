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
	   				 	<form action="{{route('activtiy.update',$activity->id)}}" method="POST" enctype="multipart/form-data">
	   				 	    @csrf
		   				 	<div class="row">
								  <div class="col-md-6 mb-3">
								    <label for="activity" class="form-label">Activity</label>
								    <input type="text" class="form-control"  placeholder="Enter Activity" value="{{old('activity',$activity->activity)}}" name="activity">
								    @if($errors->has('activity'))
                                        <span class="text-danger">{{ $errors->first('activity') }}</span>
                                    @endif

								  </div>
								  <div class="col-md-6 mb-3">
								      <img src="{{ asset('uploads/activity/' . $activity->image) }}" width="30" height="30" alt="{{ $activity->image }}">
								    <label for="image" class="form-label">File</label>
								    <input type="file" class="form-control"  name="image">
								    @if($errors->has('image'))
								      <span class="text-danger">{{$errors->first('image')}}</span>
								    @endif
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