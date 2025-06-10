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
	   				 	<form method="POST"  action="{{route('gempackageUpdate',$data->id)}}">
	   				 	        @csrf
    		   	                <div class="row">
    								  <div class="col-md-6 mb-3">
    								    <label for="title" class="form-label">No Of Gems </label>
    								    <input type="number" class="form-control"  placeholder="Enter No Of Gems " value="{{old('gemscount',$data['No of gems'])}}" name="gemscount">
    								    @if($errors->has('gemscount'))
                                           <span class="text-danger">{{ $errors->first('gemscount') }}</span>
                                        @endif
    								  </div>
    								  <div class="col-md-6 mb-3">
    								    <label for="title" class="form-label">Amount (Dollars)</label>
    								    <input type="number" class="form-control"  value="{{old('Amount',$data->Amount)}}" placeholder="Amount " name="Amount">
        								   @if($errors->has('Amount'))-->
                                               <span class="text-danger">{{ $errors->first('Amount') }}</span>
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