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
                     @include('alertmessage')
                	<div class="card">
                            		<div class="card-header d-flex justify-content-between align-items-center">
                            			<h3 class="card-title">Booking History</h3>
                                    </div>
					   				 <div class="card-body">
					   				 	<table id="table" class="table table-striped" style="width:100%">
					   				 		 <thead>
        							            <tr>
        							                <th>S.No</th>
        							                <th>Date</th>
        							                <th>Associate</th>
        							                <th>Companion</th>
        							                <th>Title</th>
        							                <th>Gems(Purchased)</th>
        							            </tr>
							        	</thead>
							       		<tbody>
                                         @foreach ($bookings as $index => $booking)
                                            <tr>
                                                <td>{{$index+1 }}</td>
                                                <td>{{date('d-m-Y',strtotime($booking->date))}}</td>
                                                <td>{{ $booking->associate?->name ?? '-' }}</td>
                                                <td>{{$booking->companion?->name??'-'}}</td>
                                                <td>{{ $booking->title}}</td>
                                                <td>{{ $booking->gem}}</td>
                                             </tr>
                                        @endforeach	
                                    </tbody>
							   </table>    
					   	 </div>
					 </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection	