<?php include ('header.php'); ?>
<?php include ('sidebar.php');?>
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
        			<li class="breadcrumb-item">
        				<a href="#">Home</a>
        			</li>
        			<li class="breadcrumb-item active">Dashboard</li>
        		</ol>
        	<div>
        </div>
      </div> -->
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <h3 class="card-title mb-3">Full Calendar</h3>
                  <div class="col-lg-12">
                    <div id='calendar'></div>
										<div class="modal fade" id="createEventModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
											  <div class="modal-dialog">
											    <div class="modal-content">
											      <div class="modal-header">
											        <h5 class="modal-title" id="exampleModalLabel">Add Event</h5>
											        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
											      </div>
											      <div class="modal-body">
											        <div class="control-group">
											          <label class="control-label" for="inputPatient">Event:</label>
											          <div class="field desc">
											            <input class="form-control" id="title" name="title" placeholder="Event" type="text" value="">
											          </div>
											        </div>
											        <br>
											        <div class="control-group">
											          <label class="control-label" for="inputPatient">Color:</label>
											          <div class="field desc">
											            <select class="form-control" id="color" name="color" placeholder="Color" type="text" value="">
											              <option value="#FF0000">Red</option>
											              <option value="#800000">Maroon</option>
											              <option value="#FFFF00">Yellow</option>
											              <option value="#008000">Green</option>
											              <option value="#00FF00">Light Green</option>
											              <option value="#00FFFF">Aqua</option>
											              <option value="#0000FF">Blue</option>
											              <option value="#000080">Navy</option>
											              <option value="#FF00FF">Fuchsia</option>
											              <option value="#800080">Purple</option>
											            </select>
											          </div>													     
											           </div>
											      <div class="modal-footer">
											        <button class="btn" data-dismiss="modal" aria-hidden="true" data-bs-dismiss="modal">Cancel</button>
											        <button type="submit" class="btn btn-primary" id="submitButton">Save</button>
											      </div>
											    </div>
											  </div>
											</div>
										</div>
											<div id="calendarModal" class="modal fade">
											  <div class="modal-dialog">
											    <div class="modal-content">
											      <div class="modal-header">
											        <h5 class="modal-title" id="exampleModalLabel">Event Details</h5>
											        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
											      </div>
											      <div id="modalBody" class="modal-body">
											        <h4 id="title" class="modal-title"></h4>
											        <div id="modalWhen" style="margin-top:5px;"></div>
											      </div>
											      <div class="col-md-12 mb-4">
											      	<input class="form-control" id="eventID" />
											      </div>
											      <div class="modal-footer">
											        <button class="btn" data-dismiss="modal" aria-hidden="true" data-bs-dismiss="modal">Cancel</button>
											        <button type="submit" class="btn btn-danger" id="deleteButton">Delete</button>
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

<?php include ('footer.php');?>