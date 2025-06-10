@extends('admin::admin.layouts.layout')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid"></div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                 <div class="col-lg-12">
                     @include('alertmessage')
                	<div class="card">
                            		<div class="card-header d-flex justify-content-between align-items-center">
                            			<h3 class="card-title">Transaction</h3>
                                    </div>
					   				 <div class="card-body">
					   				 	<table id="table" class="table table-striped" style="width:100%">
					   				 		 <thead>
        							            <tr>
        							                <th>S.No</th>
        							                <th>Name</th>
        							                <th>Date</th>
        							                <th>Transaction Id</th>
        							                <th>Amount</th>
        							                <th>Gems</th>
        							                <th>Status</th>
        							            </tr>
							        	</thead>
							       		<tbody>
                                         @foreach ($transactions as $index =>$transaction)
                                            <tr>
                                                <td>{{$index+1 }}</td>
                                                <td>{{$transaction->user->name }}</td>
                                                <td>{{date('d-m-Y',strtotime($transaction->created_at))}}</td>
                                                <td>{{($transaction->transaction_id)?$transaction->transaction_id:'-'}}</td>
                                                <td>{{ ($transaction->Amount)?$transaction->Amount:'-' }}</td>
                                                <td>{{ ($transaction->Gems)?$transaction->Gems:'-'}}</td>
                                                <td>
                                                    @if($transaction->status==0)
                                                     <span style="color:yellow">Pending</span> 
                                                    @endif
                                                    @if($transaction->status==1)
                                                        <span style="color:green">Completed</span>
                                                    @endif
                                                    @if($transaction->status==2)
                                                      <span style="color:red">Failed</span>
                                                     @endif
                                                </td>
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