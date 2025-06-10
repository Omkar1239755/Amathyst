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


.hover-zoom {
    transition: transform 0.3s ease;
}

.hover-zoom:hover {
    transform: scale(15); 
    z-index: 9999;
    position: relative;
}
td.dt-type-numeric img {
    width: 65px;
    height: 75px;
    object-fit: contain;
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
                			<h3 class="card-title">Document</h3>
                        </div>
					   				 <div class="card-body">
					   				 	<table id="table" class="table table-striped" style="width:100%">
					   				 		 <thead>
							            <tr>
							                <th>S.No</th>
							                <th>Name</th>
							                <th>User Name</th>
							                <th>Id Document</th>
							                <th>Selfie Document</th>
							                <th>Document Status</th>
							            </tr>
							        	</thead>
							       		<tbody>
                                        @foreach ($roles as $index => $role)
                                                    <tr>
                                                        <td>{{ $index + 1 }}</td>
                                                        <td>{{ $role->name }}</td>
                                                          
                                                        <td>{{ $role->user_name }}</td>
                                                       <td>
                                                            @if ($role->id_image)
                                                                <img src="{{ asset('uploads/id_documents/' . $role->id_image) }}" 
                                                                     width="30" height="30" 
                                                                     alt="{{ asset($role->id_image) }}" 
                                                                     class="hover-zoom">
                                                            @else
                                                                <img src="{{ asset('uploads/blankImage/blank.jpg') }}" 
                                                                     width="30" height="30" 
                                                                     alt="blank.jpg">
                                                            @endif
                                                        </td>

                                                        <td>
                                                            @if ($role->id_selfie_image)
                                                                    <img src="{{ asset('uploads/selfies/'.$role->id_selfie_image)}}" width="30" height="30" alt="{{ asset($role->id_selfie_image)}}" class="hover-zoom">            
                                                              @else
                                                                <img src="{{ asset('uploads/blankImage/blank.jpg' ) }}" width="30" height="30" alt="blank.jpg" >
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <label class="switch">
                                                                <select class="toggle-class" name="status" data-id="{{ $role->id }}">
                                                                    <option value="0" {{ $role->doc_status == 0 ? 'selected' : '' }}>In Progress</option>
                                                                    <option value="1" {{ $role->doc_status == 1 ? 'selected' : '' }}>Verified</option>
                                                                    <option value="2" {{ $role->doc_status == 2 ? 'selected' : '' }}>Reupload</option>
                                                                </select>
                                                            </label>
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


$(document).ready(function() {
    $(document).on('change', '.toggle-class', function() {
        var status = $(this).val();
        var user_id = $(this).data('id');
        $.ajax({
            url: '{{ route('document.status') }}',
            type: 'GET',
            data: {
                _token: '{{ csrf_token() }}',
                user_id: user_id,
                status: status
            },
            success: function(response) {
                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Updated!',
                        text: response.message,
                        timer: 2000,
                        showConfirmButton: false
                    });
                   setTimeout(function() {
                    location.reload();
                }, 2000);
                } else {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Oops!',
                        text: response.message
                    });
                }
            },
            error: function(xhr) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Something went wrong. Please try again.'
                });
                console.error('Error:', xhr.responseText);
            }
        });
    });
});

</script>
@endsection	