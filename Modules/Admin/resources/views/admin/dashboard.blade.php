@extends('admin::admin.layouts.layout')
@section('content')
  <div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                	 <div class="small-box ">
                    	<a href="javascript:;">
                        <div class="inner">
                        	<div class="icon1">
                        		<i class="fa-solid fa-user"></i>
                        	</div>
                            <h3>{{$countassociates}}</h3>
                            <p>Associates</p>
                        </div>
                        <div class="icon"> <i class="ion ion-bag"></i> </div> 
                        <a href="{{route('associate.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </a>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box ">
                    	<a href="javascript:;">
                        <div class="inner">
                        	<div class="icon1">
                        		<i class="fa-solid fa-user"></i>
                        	</div>
                            <h3>{{$countcompanions}}</h3>
                            <p>Companions</p>
                        </div>
                        <div class="icon"> <i class="ion ion-bag"></i> </div> 
                        <a href="{{route('companion.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </a>
                </div>
              </div>
            </div>
        </div>
    </section>
  </div>
@endsection	