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
					   				 		<h3 class="card-title mb-3">Add More</h3>
					   				 		<div class="col-md-12">
					   				 				<div class="dates_area">
                              <form>
                                  <div class="row mb-3" style="display: flex; align-items: flex-end;">
                                      <div class="col-md-4 col-sm-4">
                                          <label> Name </label>
                                          <input type="text" class="form-control" />
                                      </div>
                                      <div class="col-md-4 col-sm-4">
                                          <label> Email </label>
                                          <input type="text" class="form-control" />
                                      </div>
                                      <div class="col-md-4 col-sm-4">
                                          <a href="javascript:;" id="addMoreBtns"> <button type="button" class="btn btn-primary"> Add More </button> </a>
                                      </div>
                                  </div>
                                  <div class="main_append mb-3">
                                      
                                  </div>  
                              </form>
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
$(document).ready(function(){
    $('#addMoreBtns').click(function(){
      $('.main_append').append('<div class="daterow mb-3"> <div class="row" style="display: flex; align-items: flex-end;"> <div class="col-md-4 col-sm-4"> <label> Start time </label> <input type="text" class="form-control"/> </div><div class="col-md-4 col-sm-4"> <label> End time </label> <input type="text" class="form-control"/> </div><div class="col-md-4 col-sm-4"> <a href="javascript:;"> <button type="button" class="dlButtons btn btn-danger"> Delete </button> </a> </div></div></div>');
    });
    $(document).on('click', '.dlButtons', function(){
        $(this).parent().parent().parent().parent().remove();
    });
});
</script>
