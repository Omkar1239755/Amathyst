@extends('admin::admin.layouts.layout')
@section('content')

<style>
    button.btnprimary {
    border: none;
    padding: 5px 20px;
    background: #5f42aa;
    color: #FFF;
    font-size: 15px;
    font-weight: 700;
    border-radius: 5px;
}
</style>


<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                 <div class="col-lg-12">
                     @include('alertmessage')
                	<div class="card">
					   <div class="card-body">
	   				<form  method="POST" action="{{ route('Gemsstore') }}"  enctype="multipart/form-data" >
	   				 	    @csrf
		   				 	<div class="row">
								  <div class="col-md-5 mb-2">
    								    <label for="personal_trait" class="form-label">
                                         Gems
                                        </label>
								    <input type="text" class="form-control"  placeholder=" 1 gems"  name="gems" 
								   value="{{ old('gems', $gem->gems ?? '') }}">
								   @if($errors->has('gems'))
								   <span class="text-danger">{{$errors->first('gems')}}</span>
								   @endif
								  </div>
								  
							  	  <div class="col-md-5 mb-2">
							   <label for="personal_trait" class="form-label">
                                   </i> Gems Value (in Dollars)
                                </label>
							    <input type="text" class="form-control"  placeholder="Gems in Dollar"  name="dollar"
							     value="{{ old('dollar', $gem->Dollar ?? '') }}">
							     
							      @if($errors->has('dollar'))
								   <span class="text-danger">{{$errors->first('dollar')}}</span>
								   @endif
							    
							  </div>
							
								  <div class="col-md-6">
								    <button type="submit" class="btnprimary">Update</button>

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