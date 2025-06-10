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
	   				 	<form action="{{route('personality.update',$personality->id)}}" method="POST" enctype="multipart/form-data">
	   				 	    @csrf
		   				 	<div class="row">
								  <div class="col-md-6 mb-3">
								    <label for="additional_hobbie" class="form-label">Personality & Prefrences</label>
								    <input type="text" class="form-control"  placeholder="Enter Hobby Name" value="{{$personality->personality_preferences}}" 
								    name="Personality">
								    @if($errors->has('Personality'))
                                        <span class="text-danger">{{ $errors->first('Personality') }}</span>
                                    @endif
								  </div>
								  <div class="col-md-6 mb-3">
								    <label for="image" class="form-label">Image</label>
								     <img src="{{ asset('uploads/personalities/' . $personality->image) }}" width="30" height="30" alt="{{$personality->image }}">
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