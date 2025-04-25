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
                			<h3 class="card-title">Table</h3>
                			<button type="button" class="btn btn-primary ms-auto" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Add
                            </button>
                		</div>
					   				 <div class="card-body">
					   				 	<table id="table" class="table table-striped" style="width:100%">
					   				 		 <thead>
							            <tr>
							                <th>S.No</th>
							                <th>Category-Type</th>
						                     <th>image</th>
							        
							                <th>Action</th>
							            </tr>
							        	</thead>
							       		<tbody>
							            <!-- <tr>
							                <td>1</td>
							                <td>Tiger Nixon</td>
							                <td>tiger@gmail.com</td>
							                <td><label class="badge badge-danger">pending</label></td>
							                <td class="table_action text-center">
							                	<a href="details.php"> <i class="fa fa-eye"></i> </a>
							                	<a href="#"> <i class="fa fa-edit"></i> </a>
							                </td>
							            </tr>
							            <tr>
							                <td>2</td>
							                <td>Tiger Nixon</td>
							                <td>tiger@gmail.com</td>
							                <td><label class="badge badge-warning">In Progress</label></td>
							                <td class="table_action">
							                	<a href="details.php"> <i class="fa fa-eye"></i> </a>
							                	<a href="#"> <i class="fa fa-edit"></i> </a>
							                </td>
							            </tr>
							            <tr>
							                <td>3</td>
							                <td>Tiger Nixon</td>
							                <td>tiger@gmail.com</td>
							                <td><label class="badge badge-info">Fixed</label></td>
							                <td class="table_action">
							                	<a href="details.php"> <i class="fa fa-eye"></i>  </a>
							                	<a href="#"> <i class="fa fa-edit"></i> </a>
							                </td>
							            </tr>
							            <tr>
							                <td>4</td>
							                <td>Tiger Nixon</td>
							                <td>tiger@gmail.com</td>
							                <td><label class="badge badge-success">Completed</label></td>
							                <td class="table_action">
							                	<a href="#"> <i class="fa fa-eye"></i>  </a>
							                	<a href="#"> <i class="fa fa-edit"></i> </a>
							                </td>
							            </tr> -->
							          </tbody>
							        </table>


					   				 </div>
					  				</div>


                 </div>
            </div>
        </div>
    </section>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{ __('Add New Skill') }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- You can add your form here -->
        <form id="skillform">
            <div class="mb-3">
                <label for="skillName" class="form-label">Skill Name</label>
                <input type="text" class="form-control" id="skillName" placeholder="Enter skill" name="skill">
            </div>
            <!-- Add more fields as needed -->

            <div class="mb-3">
                <label for="Image" class="form-label">Image</label>
                <input type="file" class="form-control" id="Image"  name="Image">
            </div>
    </form>
    </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary">Save</button>
    </div>
    </div>
    </div>
</div>
<script>

$document.ready(function(){
 $('#skillform').on('submit',function(e){

e.preventDefault();


$.ajax({
    
url:'{{route('skill-store')}}',

method:'POST',

data: $(this).serialize(),






})


 })







})


</script>





