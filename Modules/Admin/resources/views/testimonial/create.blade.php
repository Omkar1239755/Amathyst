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
	   				 	<form action="{{route('testimonial.store')}}" method="POST" enctype="multipart/form-data">
	   				 	    @csrf
		   				 	<div class="row">
		   				 	    
		   				 	      <div class="col-md-6 mb-3">
    								    <label for="name" class="form-label">Name</label>
    								    <input type="text" class="form-control" value="{{old('name')}}" placeholder="Enter Name" name="name">
    								    @if($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
								  </div>
								  
								  <div class="col-md-6 mb-3">
    								    <label for="position" class="form-label">Position</label>
    								    <input type="text" class="form-control" value="{{old('position')}}" placeholder="Enter Position" name="position">
    								    @if($errors->has('position'))
                                            <span class="text-danger">{{ $errors->first('position') }}</span>
                                        @endif
								  </div>
								  <div class="col-md-6 mb-3">
								    <label for="description" class="form-label">Description</label>
								    <input type="text" class="form-control" value="{{old('description')}}" placeholder="Enter Description" name="description">
								    @if($errors->has('description'))
                                        <span class="text-danger">{{ $errors->first('description') }}</span>
                                    @endif
								  </div>
								  <div class="col-md-6 mb-3">
								    <label for="image" class="form-label">Image</label>
								    <input type="file" class="form-control"  name="image">
								    @if($errors->has('image'))
                                        <span class="text-danger">{{ $errors->first('image') }}</span>
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