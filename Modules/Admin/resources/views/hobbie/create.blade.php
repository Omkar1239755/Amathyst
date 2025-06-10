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
	   				 	<form action="{{route('hobbie.store')}}" method="POST" enctype="multipart/form-data">
	   				 	    @csrf
		   				 	<div class="row">
								  <div class="col-md-6 mb-3">
								    <label for="hobby_name" class="form-label">Hobbie</label>
								    <input type="text" class="form-control" value="{{old('hobby_name')}}" placeholder="Enter Hobby Name" name="hobby_name">
								    @if($errors->has('hobby_name'))
                                        <span class="text-danger">{{ $errors->first('hobby_name') }}</span>
                                    @endif
								  </div>
								  <div class="col-md-6 mb-3">
								    <label for="hobby_image" class="form-label">Image</label>
								    <input type="file" class="form-control"  name="hobby_image">
								    @if($errors->has('hobby_image'))
                                        <span class="text-danger">{{ $errors->first('hobby_image') }}</span>
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