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
	   				 	<form action="{{route('personal-trait.update',$trait->id)}}" method="POST" enctype="multipart/form-data">
	   				 	    @csrf
		   				 	<div class="row">
								  <div class="col-md-6 mb-3">
								    <label for="personal_trait" class="form-label">Trait</label>
								    <input type="text" class="form-control" value="{{$trait->personal_trait}}" placeholder="Enter Trait Name" name="personal_trait">
								    @if($errors->has('personal_trait'))
                                        <span class="text-danger">{{ $errors->first('personal_trait') }}</span>
                                    @endif
								  </div>
								  <div class="col-md-6 mb-3">
								    <label for="image" class="form-label">Image</label>
								     <img src="{{ asset('uploads/personaltrait/' . $trait->image) }}" width="30" height="30" alt="{{ $trait->image }}">
								     
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