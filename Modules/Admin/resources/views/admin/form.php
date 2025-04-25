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
					   				 	<form action="/action_page.php">
					   				 		<div class="row">
											  <div class="col-md-6 mb-3">
											    <label for="email" class="form-label">Email:</label>
											    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
											  </div>
											  <div class="col-md-6 mb-3">
											    <label for="pwd" class="form-label">Password:</label>
											    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
											  </div>
											  <div class="col-md-12 mb-3 ">
											  	<label for="comment">Comments:</label>
													<textarea class="form-control" rows="5" id="comment" name="text"></textarea>
											  </div>

											  <div class="col-md-12 form-check mb-3 ">
											    <label class="form-check-label">
											      <input class="form-check-input" type="checkbox" name="remember"> Remember me
											    </label>
											  </div>
											  <div class="col-md-6">
											  <button type="submit" class="btn btn-primary">Submit</button>
											  </div>
											  </div>
											</form>
					   				 </div>
					  				</div>
                 </div>
            </div>
        </div>
    </section>
</div>
</main>
<?php include('footer.php');?>