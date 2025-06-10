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
	   				 	<form action="{{route('additionalHobbie.update',$hobbie->id)}}" method="POST" enctype="multipart/form-data">
	   				 	    @csrf
		   				 	<div class="row">
								  <div class="col-md-6 mb-3">
								    <label for="additional_hobbie" class="form-label">Hobbie</label>
								    <input type="text" class="form-control"  placeholder="Enter Hobby Name" value="{{$hobbie->additional_hobbie}}" 
								    name="additional_hobbie">
								    @if($errors->has('additional_hobbie'))
                                        <span class="text-danger">{{ $errors->first('additional_hobbie') }}</span>
                                    @endif
								  </div>
								  <div class="col-md-6 mb-3">
								    <label for="image" class="form-label">Image</label>
								     <img src="{{ asset('uploads/additional_hobbies/' . $hobbie->image) }}" width="30" height="30" alt="{{ $hobbie->image }}">
								    <input type="file" class="form-control"  name="image">
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