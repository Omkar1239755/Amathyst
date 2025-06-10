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
	   				 	<form action="{{route('howIt.update',$howit->id)}}" method="POST">
	   				 	    @csrf
		   				 	<div class="row">
								   <div class="col-md-12 mb-3 ">
									  <label for="comment">Description</label>
									  <textarea class="form-control" rows="5"  name="description">{{old('description',$howit->description)}}</textarea>
									@if($errors->has('description'))
                                        <span class="text-danger">{{ $errors->first('description') }}</span>
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