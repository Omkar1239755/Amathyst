@section('css')
<style>
.switch {
  position: relative;
  display: inline-block;
  width: 40px;   /* smaller width */
  height: 22px;  /* smaller height */
}
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #dc3545; /* InActive - red */
  transition: .4s;
  border-radius: 22px;
}
.slider:before {
  position: absolute;
  content: "";
  height: 16px;
  width: 16px;
  left: 3px;
  bottom: 3px;
  background-color: white;
  transition: .4s;
  border-radius: 50%;
}
input:checked + .slider {
  background-color: #28a745; /* Active - green */
}
input:checked + .slider:before {
  transform: translateX(18px);
}
</style>
@endsection
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
                			<h3 class="card-title">Companion</h3>
                        </div>
					   				 <div class="card-body">
					   				 	<table id="table" class="table table-striped" style="width:100%">
					   				 		 <thead>
							            <tr>
							                <th>S.No</th>
							                <th>Name</th>
							                <th>Profile Pic</th>
                                            <th>Email</th>
                                            <!--<th>Status</th>-->
                                            <th>Featured Companion</th>
                                            <th>Action</th>
                                        </tr>
							        	</thead>
							       		<tbody>
                                       @foreach ($companions as $index => $companion)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $companion->name }}</td>
                                                <td>
                                                    @if ($companion->profile_picture)
                                                         <img src="{{ asset('uploads/profilecompanion/'.$companion->profile_picture) }}" 
                                                                 alt="{{ $companion->profile_picture }}" 
                                                                 style="border-radius: 50%; object-fit: cover; height: 60px; width: 60px;">

                                                    @else
                                                        <img src="{{ asset('uploads/blankImage/blank.jpg' ) }}" width="40" height="40" alt="blank.jpg">

                                                    @endif
                                                </td>
                                                <td>{{ $companion->email }}</td>
                                                
                                              <!--<td>-->
                                              <!--  <label class="switch">-->
                                              <!--      <input type="checkbox" data-id="{{$companion->id}}" class="toggle-class" {{ $companion->status ? 'checked' : '' }}>-->
                                              <!--      <span class="slider round"></span>-->
                                              <!--  </label>-->
                                              <!--</td>-->
                                              
                                              
                                              <td>
                                                <label class="switch">
                                                    <input type="checkbox" data-id="{{$companion->id}}" class="featured-toggle-class" {{ $companion->featured_status ? 'checked' : '' }}>
                                                    <span class="slider round"></span>
                                                </label>
                                              </td>
                                              
                                               <td class="table_action text-center" style="white-space: nowrap;">
                                                   
                                                    <!--<form method="POST" action="{{ route('companion.delete', $companion->id) }}" style="display: inline;">-->
                                                    <!--    @csrf-->
                                                    <!--    @method('DELETE')-->
                                                    <!--    <button type="submit" class="btn btn-link p-0 m-0 border-0 show_confirm" style="color: red;">-->
                                                    <!--        <i class="fa fa-trash"></i>-->
                                                    <!--    </button>-->
                                                    <!--</form>-->
                                                
                                                    <a href="{{ route('companion.view', $companion->id) }}" class="edit-btn" style="margin-left: 10px; color: green;">
                                                        <i class="fa fa-eye"></i>
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
@endsection	
@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(function() {
    $('.toggle-class').change(function(e) {
        e.preventDefault();
        var checkbox = $(this);
        var status = checkbox.prop('checked') ? 1 : 0;
        var user_id = checkbox.data('id');
        checkbox.prop('checked', !status);

        Swal.fire({
            title: 'Are you sure?',
            text: "You are about to change the status.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#28a745',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, change it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                checkbox.prop('checked', status);
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '{{ route('companions.update-status') }}',
                    data: {
                        'status': status,
                        'user_id': user_id
                    },
                    success: function(data) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Updated!',
                            text: data.success || 'Status updated successfully!',
                            timer: 1500,
                            showConfirmButton: false
                        });
                    },
                    error: function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops!',
                            text: 'Something went wrong. Try again.',
                        });
                        
                        checkbox.prop('checked', !status);
                    }
                });
            } else {
                
                checkbox.prop('checked', !status);
            }
        });
    });
});

$(function() {
    $('.featured-toggle-class').change(function(e) {
        e.preventDefault();
        var checkbox = $(this);
        var status = checkbox.prop('checked') ? 1 : 0;
        var user_id = checkbox.data('id');
        checkbox.prop('checked', !status);

        Swal.fire({
            title: 'Are you sure?',
            html: "<b>You are about to set this companion as featured.</b>",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#28a745',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, change it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                checkbox.prop('checked', status);
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '{{ route('companions.featured-update-status') }}',
                    data: {
                        'status': status,
                        'user_id': user_id
                    },
                    success: function(data) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Updated!',
                            text: data.success || 'Status updated successfully!',
                            timer: 1500,
                            showConfirmButton: false
                        });
                    },
                    error: function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops!',
                            text: 'Only 4 Companion can be marked as featured',
                        });
                        
                        checkbox.prop('checked', !status);
                    }
                });
            } 
            
            
            else {
                
                checkbox.prop('checked', !status);
            }
        });
    });
});

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