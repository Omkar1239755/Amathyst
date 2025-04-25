<?php include('header.php');?>
<?php include('sidebar.php');?>
<main>
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
                			<button type="button" class="btn btn-primary ms-auto" >Add </button>
                		</div>
					   				 <div class="card-body">
					   				 	<table id="table" class="table table-striped" style="width:100%">
					   				 		 <thead>
							            <tr>
							                <th>S.No</th>
							                <th>Name</th>
							                <th>Email</th>
							                <th>Status</th>
							                <th>Action</th>
							            </tr>
							        	</thead>
							       		<tbody>
							            <tr>
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
							            </tr>
							          </tbody>
							        </table>
					   				 </div>
					  				</div>
                 </div>
            </div>
        </div>
    </section>
</div>
</main>
<?php include('footer.php');?>


