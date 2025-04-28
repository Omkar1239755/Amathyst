@extends('admin::admin.layouts.layout')
@section('content')

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <!-- <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div> -->
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                 <div class="col-lg-12">
                	<div class="card">
                		<div class="card-header d-flex justify-content-between align-items-center">
                			<h3 class="card-title">Hobbies-Type</h3>

                            <button type="button" class="btn btn-primary ms-auto" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: #5F42AA;">
                                Add Category
                            </button>

                		      </div>
					   				 <div class="card-body">
					   				 	<table id="table" class="table table-striped" style="width:100%">
					   				 		 <thead>
							            <tr>
							                <th>S.No</th>
							                <th>Hobbie-Category</th>
                                            <th>Image</th>
							                <th>Action</th>
							            </tr>
							        	</thead>
							       		<tbody>
                                                
                                           @foreach ($data as $index => $hobby)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $hobby->hobbie }}</td>
                                                <td>
                                                    @if ($hobby->image)
                                                        <img src="/uploads/hobbies/{{ $hobby->image }}" width="60" alt="{{ $hobby->hobbie }}">
                                                    @else
                                                        No Image
                                                    @endif
                                                </td>
                                                <td class="table_action text-center">
                                                    <a href="details.php"> <i class="fa fa-eye"></i> </a>
                                                    <a href="#"> <i class="fa fa-edit"></i> </a>
                                                </td>
                                            </tr>
                                        @endforeach				            
							        </tbody>
							        </table>    
					   				 </div>
					  				</div>


                                        <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form id="hobbyForm" enctype="multipart/form-data"> <!-- START FORM -->
                            @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Hobbie-Category</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                            <!-- Hobby Category Name -->
                            <div class="mb-3">
                                <label for="hobby_name" class="form-label">Hobby Category Name</label>
                                <input type="text" class="form-control" id="hobby_name" name="hobby_name" placeholder="Enter Hobby Category" required>
                            </div>

                            <!-- Hobby Image -->
                            <div class="mb-3">
                                <label for="hobby_image" class="form-label">Upload Image</label>
                                <input type="file" class="form-control" id="hobby_image" name="hobby_image" required>
                            </div>
                            </div>

                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" style="background-color: #5F42AA;">Save</button> <!-- changed to submit -->
                            </div>
                        </div>
                        </form> <!-- END FORM -->
                    </div>
                    </div>
    
                 </div>
            </div>
        </div>
    </section>
</div>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {

    $('#hobbyForm').on('submit', function(e) {
        e.preventDefault(); // Prevent normal form submit
        var formData = new FormData(this);
        // alert(formData);

        $.ajax({
            
            type: 'POST',
            url: "{{ url('adminstrator/hobbie-store') }}",  // Set your correct route here
            data: formData,

            processData: false,  // Important for file uploads
            contentType: false,  // Important for file uploads

    
                    success: function(response) {
                        if(response.success){
                            console.log(response); 
                            alert(response.message);
                            $('#hobbyForm')[0].reset();  // Reset form
                            $('#exampleModal').modal('hide');  // Close modal
                            location.reload(); // Optional: reload page to update table
                        } else {
                            alert('Something went wrong!');
                        }
                    },
                    error: function(xhr) {
                        alert('Error occurred!');
                        console.log(xhr.responseText);
                    }
        });
    });

});
</script>
  
@endsection	

