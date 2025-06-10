@extends('admin::admin.layouts.layout')
@section('content')

<style>
    
    td.dt-type-numeric img {
    width: 65px;
    height: 75px;
    object-fit: contain;
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
                		<div class="card-header d-flex justify-content-between align-items-center">
                			<h3 class="card-title">Testimonial</h3>
                            <a type="button" href="{{route('testimonial.create')}}" class="ms-auto"  style="background-color: #5F42AA;padding:8px 10px;border-radius:10px;text-decoration:none;color:#FFF;">
                                Add+
                            </a>
                            </div>
					   				 <div class="card-body">
					   				 	<table id="table" class="table table-striped" style="width:100%">
    					   				 	<thead>
            							            <tr>
            							                <th>S.No</th>
            							                <th>Name</th>
            							                <th>Position</th>
            							                <th>Image</th>
            							                <th>Description</th>
                                                        <th>Action</th>
            							            </tr>
    							        	</thead>
							       		<tbody>
                                                
                                          @foreach ($testimonials as $index => $testimonial)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $testimonial->name }}</td>
                                                <td>{{$testimonial->position}}</td>
                                                <td>
                                                    @if ($testimonial->description )
                                                        <img src="{{ asset('uploads/testimonial/'. $testimonial->image) }}" alt="{{ $testimonial->hobbie }}">
                                                    @else
                                                        <img src="{{ asset('uploads/blankImage/blank.jpg' ) }}" alt="blank.jpg">
                                                    @endif
                                                </td>
                                                <td>{{ $testimonial->description }}</td>
                                                
                                               <td class="table_action text-center" style="white-space: nowrap;">
                                                    <form method="POST" action="{{route('testimonial.delete',$testimonial->id)}}" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-link p-0 m-0 border-0 show_confirm" style="color: red;">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                
                                                    <a href="{{route('testimonial.edit',$testimonial->id)}}" class="edit-btn" style="margin-left: 10px; color: blue;">
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