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

td.dt-type-numeric img {
    width: 100px;
    height: 100px;
    object-fit: cover;

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
                			<h3 class="card-title">Withdrawn</h3>
                        </div>
					   				 <div class="card-body">
					   				 	<table id="table" class="table table-striped" style="width:100%">
					   				 		 <thead>
        							            <tr>
        							                <th>S.No</th>
        							                <th>Profile Pic</th>
        							                <th>Companion</th>
        							                <th>Gem Withdrawn</th>
        							                <th>Date</th>
        							                <th>Withdrawn Status</th>
                                                </tr>
							        	</thead>
							       		<tbody>
                                       @foreach ($earnings as $index => $earning)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>
                                                    @if ($earning->companion->profile_picture)
                                                       <img src="{{ asset('uploads/profilecompanion/'.$earning->companion->profile_picture) }}" width="20" height="20" alt="{{ $earning->companion->profile_picture }}">
                                                    @else
                                                        <img src="{{ asset('uploads/blankImage/blank.jpg' ) }}" width="40" height="40" alt="blank.jpg">

                                                    @endif
                                                </td>
                                                <td>{{ $earning->companion->name }}</td>
                                                <td>{{ $earning->earning_drawn }}</td>
                                                <td>{{date('d-m-Y',strtotime($earning->created_at))}}</td>
                                              <td>
                                                <label class="switch">
                                                    <input type="checkbox" data-id="{{$earning->id}}" class="toggle-class" {{ $earning->status ? 'checked' : '' }}>
                                                    <span class="slider round"></span>
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
$(function() {
    $('.toggle-class').change(function(e) {
        e.preventDefault();
        var checkbox = $(this);
        var status = checkbox.prop('checked') ? 1 : 0;
        var earningId = checkbox.data('id');
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
                    type: "POST",
                    dataType: "json",
                    url: '{{ route('companion.withdrawnstatus') }}',
                    data: {
                        'status': status,
                        'earningId': earningId,
                        _token:"{{csrf_token()}}"
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
</script>
@endsection	