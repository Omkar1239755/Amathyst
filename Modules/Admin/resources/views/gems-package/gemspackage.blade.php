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
                			<h3 class="card-title">Gems Package</h3>
                            <!--<a type="button" href="{{route('gemsPackage.create')}}" class="btn btn-primary ms-auto"  style="background-color: #5F42AA;">-->
                            <!--    Add+-->
                            <!--</a>-->
                            </div>
					   				 <div class="card-body">
					   				 	<table id="table" class="table table-striped" style="width:100%">
					   				 <thead>
							            <tr>
							                <th>S.No</th>
							                <th>No of Gems</th>
                                            <th>Amount(Dollars)</th>
							                <th>Action</th>
							            </tr>
							            </thead>
							            	<tbody>
							          @foreach($data as $index => $item)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $item['No of gems'] }}</td>
                                                <td>{{ $item->Amount }}</td>
                                                <td class="table_action text-center" style="white-space: nowrap;"> 
                                                   <a href="{{route('gempackageEdit',$item->id)}}" class="edit-btn" style="margin-left: 10px; color: blue;">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Are you sure you want to delete this record?`,
              icon: "warning",
              buttons: true,
              dangerMode: true,
             })

          .then((willDelete) => {

            if (willDelete) {

              form.submit();
            }
        });
});
</script>
@endsection	