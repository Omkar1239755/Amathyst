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
					   				 		<h3 class="card-title mb-3">Image Upload</h3>
					   				 		<div class="col-lg-12">
                            <div class="card">
                              <div class="card-body">
                                <div class="log-form">
                                  <div class="form-group">
                                    <div class="user_profile user_profile2">
                                      <img id="blah" src="images/placeholder.jpeg" />
                                      <div class="camra_outer">
                                        <input type='file' id="imgInp" />
                                        <i class="fa-solid fa-camera"></i>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
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

<script>
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#imgInp").change(function(){
    readURL(this);
});
</script>
