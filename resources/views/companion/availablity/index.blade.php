@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/timepicker-ui@2.2.1/dist/timepicker-ui.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://weareoutman.github.io/clockpicker/dist/jquery-clockpicker.min.css">
@endsection
@extends('template.layout.app')
@section('content')
   <div class="col-md-12 dev1">
                        <div class="d-flex align-items-center justify-content-between flex-wrap myavailibility-head">
                            <div class="d-flex align-items-center flex-wrap me-3 flex-grow-1">
                                <h4 class="mb-0 editprofile-heding">My Availability</h4>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input commontogglecheackbtn" id="common_switch"  name="common_switch" type="checkbox" role="switch"
                                    id="switchCheckDefault">
                            </div>
                        </div>
                      <div class="card upcomin-card">
                            <div class="table-responsive">
                                <table class="table myearning-td">
                                    <thead class="table-light">
                                        <tr class="availability-tr">
                                            <th scope="col">Days</th>
                                            <th scope="col">From</th>
                                            <th scope="col">To</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($days as $index => $day)
                                         @php 
                                            $availability = \App\Models\MyAvailibility::where('user_id', Auth::user()->id)
                                                ->where('day', $day)
                                                ->first();
                                        @endphp
                                            <tr class="data-abailibity">
                                                <td>{{ $day }}</td>
                                                <input type="hidden" class="day" value="{{ $day }}">
                                                
                                                <td class="input-timing">
                                                    <div class="input-outer input-field d-flex align-items-center gap-2">
                                                        <input type="time" name="starttime[{{ $index }}]" value="{{ $availability?->start_time }}" class="form-control starttime">
                                                    </div>
                                                </td>
                                            
                                                <td class="input-timingsecond">
                                                    <div class="input-outer input-field d-flex align-items-center gap-2">
                                                        <input type="time" name="endtime[{{ $index }}]" value="{{ $availability?->end_time }}" class="form-control endtime">
                                                    </div>
                                                </td>
                                            
                                                <td>
                                                    <div class="d-inline-block">
                                                        <div class="form-check form-switch">
                                                           
                                            
                                                            <input class="form-check-input togglecheackbtn" type="checkbox" role="switch"
                                                                {{ ($availability && $availability->status == 1) ? 'checked' : '' }}>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                     </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="https://weareoutman.github.io/clockpicker/dist/jquery-clockpicker.min.js"></script>
<script>
    $(document).ready(function () {
        const $input = $("input[name='time']").clockpicker({
            placement: 'bottom',
            align: 'left',
            autoclose: true,
            donetext: "Select"
        });

        $('#clockTrigger').on('click', function () {
            $input.clockpicker('show'); 
        });
    });
</script>

<script>
$('.togglecheackbtn').on('click', function () {
    var $checkbox = $(this); 
    var $row = $checkbox.closest('tr.data-abailibity');
    var day = $row.find('.day').val();
    var starttime = $row.find('.starttime').val();
    var endtime = $row.find('.endtime').val();
    var status = $checkbox.is(':checked') ? 1 : 0;
    

   
    Swal.fire({
        title: 'Are you sure?',
        text: 'Do you want to change your availability for this time slot?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Yes, change it!',
        cancelButtonText: 'No, keep it as is',
        reverseButtons: true
    }).then(function (result) {
        if (result.isConfirmed) {
          
            $.ajax({
                url: '{{ route("myavailability.store") }}',
                type: 'POST',
                data: {
                    day: day,
                    starttime: starttime,
                    endtime: endtime,
                    status: status,
                    _token: "{{ csrf_token() }}"
                },
                success: function (response) {
                    Swal.fire(
                        'Updated!',
                        response.success || 'Your availability has been changed.',
                        'success'
                    );
                     location.reload();
                },
                error: function (xhr) {
                    let errorMsg = 'An error occurred while saving data.';
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        errorMsg = xhr.responseJSON.message;
                    }
                    Swal.fire(
                        'Error!',
                        errorMsg,
                        'error'
                    );
                    setTimeout(function() {
                        location.reload();
                    }, 3000); 

                }

            });
        } else {
            
            $checkbox.prop('checked', false);
        }
    });
});



$('.commontogglecheackbtn').on('click', function () {
    var isChecked = $('#common_switch').prop('checked'); 
    var common_status = isChecked ? 1 : 0;

    Swal.fire({
        title: 'Are you sure to update all availability ?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, update it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '{{ route("myavailability.status") }}',
                type: 'GET',
                data: {
                    common_status: common_status,
                    _token:"{{csrf_token()}}"
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    Swal.fire(
                        'Updated!',
                        'Your availability has been updated.',
                        'success'
                    );
                   
                  
                    
                     setTimeout(function(){
                        location.reload();  
                     },2000);
                },
                error: function (xhr) {
                    Swal.fire(
                        'Error!',
                        'Something went wrong.',
                        'error'
                    );
                }
            });
        }
    });
});

</script>
<script>
    const checkbox = document.getElementById("common_switch");
    const savedState = localStorage.getItem("common_switch_state");
    if (savedState !== null) {
        checkbox.checked = savedState === "true";
    }
   checkbox.addEventListener("change", function (e) {
        if (e.isTrusted) {
            localStorage.setItem("common_switch_state", this.checked);
        } else {
            this.checked = localStorage.getItem("common_switch_state") === "true";
        }
    });
</script>
@endsection