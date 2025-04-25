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
					   				 <div class="card-body">
					   				 	<div class="row">
					   				 		<h3 class="card-title mb-3">Modal</h3>
					   				 		<div class="col-md-6">
					   				 				<button type="button" class="btn btn-primary ms-auto" data-bs-toggle="modal" data-bs-target="#exampleModal">Modal </button>
					   				 			</div>
					   				 			</div>
					   				 	</div>
					   				 </div>
					  				</div>
                 </div>
            </div>
        </div>
    </section>
</div>
</main>
<?php include('footer.php');?>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>