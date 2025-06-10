@extends('webtemplate.layouts.layout') 
@section('css')
<style>
    .selected-hobby {
        display: inline-block;
        margin-right: 8px;
    }
    
    .selected-hobby img {
        width: 25px;
        height: 25px;
        border-radius: 50%;
        object-fit: cover;
    }
    
    .remove-hobby {
        background: none;
        border: none;
        font-size: 18px;
        cursor: pointer;
    }
    .modal-content {
    animation: fadeIn 0.3s ease-in-out;
  }

 .btn-purple {
  background-color: #6610f2;
  color: white;
  border: none;
  
  
}

</style>  
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css" rel="stylesheet"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endsection
@section('content')
<form  enctype="multipart/form-data">
    @csrf
    <div class="container">
        <div class="row">
            <div class="col-md-6 assoiate-left d-flex align-items-center justify-content-center">
                <img class="image-assoiate" src="{{asset('assests/images/assoiateimg.svg')}}" alt="" />
            </div>
           <div class="col-md-6 assoiatee-right justify-content-center">
                <div class="assoiate-head">
                    <h2>Let’s Complete Your Profile</h2>
                    <p>
                        Let’s set up your associate profile to help you find the right companions.
                        This will help us suggest people who align with your interests and experiences.
                    </p>
                </div>
                    
                <div class="text-center profile-assoiate">
                    <img id="profilePreview" 
                         src="{{asset('assests/images/profileimgasssoi.svg') }}" 
                         alt="Profile Preview" 
                         style="width: 120px; height: 120px; border-radius: 50%;" />
                        <p>Upload a Profile Picture <br />This helps companions see who’s interested in them.</p>
                     <input type="file" id="profileUpload" accept="image/*" name="profile_image" style="display: none;" />
                     <button type="button" class="upload-btn" onclick="document.getElementById('profileUpload').click();">
                        Upload
                    </button>
                    <div id="image-error" style="color:red; display:none; margin-top: 5px;">
                      Please select at least one.
                    </div>
                </div>
                
                
                <div class="mb-3 mt-3">
                    <label class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" id= "username"  placeholder="Enter username">
                     <div id="username-error" style="color: red; display: none; margin-top: 5px;">
                                Username is required.
                      </div>
                </div>

               
                <div class="accordion custom-accordion" id="accordionExample">
                <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button collapsed custom-toggle-icon" type="button" id="interestAccordion1">
                                What are you interested in?
                            </button>
                        </h2>
                        <div id="collapseOne1" class="accordion-collapse collapse show" aria-labelledby="headingOne">
                            <div class="accordion-body" id="interestDisplay1">
                                <!-- Selected interests will appear here -->
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="interests" id="selectedHobbiesInput1" />
                    
                    <div id="interests-error" style="color:red; display:none; margin-top: 5px;">
                         Please select at least one.
                    </div>
                      
                    <div id="interestModal1" class="modal-overlay">
                        <div class="modal-contentselect">
                            <button class="modal-close" type="button" id="closeInterestModal1">&times;</button>
                            <h2>What Are You Interested In?</h2>
                            <p>Select a few topics you genuinely enjoy. This helps us match you with better connections.</p>
                            <div class="interest-buttons">
                                @foreach($data as $hobbie)
                                    <button class="interest-btn" 
                                            type="button" 
                                            data-id="{{ $hobbie->id }}" 
                                            data-name="{{ $hobbie->hobbie }}" 
                                            data-image="{{ asset('uploads/hobbies/'.$hobbie->image) }}">
                                        <img src="{{ asset('uploads/hobbies/'.$hobbie->image) }}" alt="" class="modelunic-icon">
                                        {{ $hobbie->hobbie }}
                                    </button>
                                @endforeach
                            </div>
                            <div class="d-flex justify-content-center confirmm-modelbtn">
                                <button type="button" class="clearall-btn" id="clearallBtn1">Clear All</button>
                                <button type="button" class="confirmm-selectbtn" id="saveInterestBtn1">Confirm Selection</button>
                            </div>
                        </div>
                    </div>

                   <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed custom-toggle-icon" type="button" id="interestAccordion2">
                                List a few of your hobbies
                            </button>
                        </h2>
                        <div id="collapseTwo2" class="accordion-collapse collapse show" aria-labelledby="headingTwo">
                            <div class="accordion-body" id="interestDisplay2">
                               
                            </div>
                        </div>
                    </div>
                    
                    
                    <input type="hidden" name="additional_hobbie" id="selectedHobbiesInput2" />
                     <div id="hobbie-error" style="color:red; display:none; margin-top: 5px;">
                         Please select at least one.
                    </div>
                    <div id="interestModal2" class="modal-overlay">
                        <div class="modal-contentselect">
                            <button class="modal-close" type="button" id="closeInterestModal2">&times;</button>
                            <h2>Few of your hobbies</h2>
                            <div class="interest-buttons">
                                @foreach($data1 as $hobbie)
                                    <button class="interest-btn"
                                            data-id="{{ $hobbie->id }}" 
                                            type="button"
                                            data-name="{{ $hobbie->additional_hobbie }}" 
                                            data-image="{{ asset('uploads/additional_hobbies/'.$hobbie->image) }}">
                                        
                                        <img src="{{ asset('uploads/additional_hobbies/'.$hobbie->image) }}" alt="" class="modelunic-icon">
                                        {{ $hobbie->additional_hobbie }}
                                    </button>
                                @endforeach
                            </div>
                            <div class="d-flex justify-content-center confirmm-modelbtn">
                                <button class="clearall-btn" type="button" id="clearallBtn2">Clear All</button>
                                <button class="confirmm-selectbtn" type="button" id="saveInterestBtn2">Confirm Selection</button>
                            </div>
                        </div>
                    </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed custom-toggle-icon" type="button" id="interestAccordion3">
                            How would you describe yourself?
                        </button>
                    </h2>
                    <div id="collapseThree3" class="accordion-collapse collapse show" aria-labelledby="headingThree">
                        <div class="accordion-body" id="interestDisplay3">
                            
                        </div>
                    </div>
                </div>
                    
                 <input type="hidden" name="trait" id="selectedTraitsInput" />
                   <div id="trait-error" style="color:red; display:none; margin-top: 5px;">
                         Please select at least one.
                    </div>
                     <div id="interestModal3" class="modal-overlay">
                        <div class="modal-contentselect">
                            
                            <button class="modal-close" id="closeInterestModal3" type="button">&times;</button>
                            <h2>How would you describe yourself?</h2>
                            
                            <div class="interest-buttons">
                                @foreach($data2 as $hobbie)
                                    <button class="interest-btn" 
                                            type="button"
                                           data-id="{{ $hobbie->id }}" 
                                            data-name="{{ $hobbie->personal_trait }}" 
                                            data-image="{{asset('uploads/personaltrait/'.$hobbie->image)}}">
                                        
                                        <img src="{{asset('uploads/personaltrait/'.$hobbie->image) }}" alt="" class="modelunic-icon">
                                        {{ $hobbie->personal_trait }}
                                    </button>
                                    
                                @endforeach
                            </div>
                            
                            <div class="d-flex justify-content-center confirmm-modelbtn">
                                <button class="clearall-btn" type="button" id="clearallBtn3">Clear All</button>
                                <button class="confirmm-selectbtn" type="button" id="saveInterestBtn3">Confirm Selection</button>
                          </div>
                            
                        </div>
                    </div>

                   <div class="accordion-item">
                         <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed custom-toggle-icon" type="button"
                            id="interestAccordion4">
                            What kind of activities do you enjoy?
                            </button>
                        </h2>
                        <div id="collapseFour4" class="accordion-collapse collapse show"
                        aria-labelledby="headingFour">
                            <div class="accordion-body" id="interestDisplay4">
                           
                            </div>
                        </div>
                    </div>
                    
                    
                     <input type="hidden" name="activities" id="selectedActivitiesInput" />
                      <div id="activity-error" style="color:red; display:none; margin-top: 5px;">
                         Please select at least one.
                    </div>
                       </div> 
                    <div id="interestModal4" class="modal-overlay">
                    <div class="modal-contentselect">
                       <button class="modal-close" type="button"  id="closeInterestModal4">&times;</button>
                       <h2>Kind of activities do you enjoy?</h2>
                        <div class="interest-buttons">
                             @foreach($data3 as $hobbie)
                                <button class="interest-btn" type="button"
                                data-id="{{ $hobbie->id }}" 
                                data-name="{{ $hobbie->activity }}" 
                                data-image="{{ asset('uploads/activity/'.$hobbie->image) }}" >
                                 
                                <img
                                src="{{ asset('uploads/activity/'.$hobbie->image)}}" alt="" class="modelunic-icon">
                                {{$hobbie->activity}}
                                
                                </button>
                            @endforeach
                        
                        </div>
                      <div class="d-flex justify-content-center confirmm-modelbtn">
                            <button class="clearall-btn" id="clearallBtn4" type="button">Clear All</button>
                            <button class="confirmm-selectbtn" id="saveInterestBtn4" type="button">Confirm Selection</button>
                      </div>
                     </div>
                 </div>
                <!-- Submit Button (Outside of modals) -->
                <div class="text-center assoit-btnn mt-4">
                    <button type="submit" class="btn-assoiateprofile next-btn" id="submitProfileFormBtn">
                        Continue
                    </button>
                </div>
            </div> <!-- End Right Column -->
        </div> <!-- End Row -->
    </div> <!-- End Container -->
</form>
    
    <!-- Popup Modal -->
    <div id="completionModal" class="modal-overlay">
    <div class="modal-content">
    <button class="modal-close" type="button" id="modalCloseBtn">&times;</button>
    <div class="user-ready">
    <i class="fas fa-user ready-user"></i>
    </div>
    <h2 >Your Profile Is Ready!</h2>
    <p> <b id="userNameInModal"></b> you’re all set to start exploring companions who match your vibe and interests.Now let’s get started on your journey with Amathyst.
    </p>
    <div class="btn-gotodash">
    <a href="{{route('associatedashboard')}}" id="closeModalBtn" class="gotodashboard-btn">Go To Dashboard</a>
    </div>
    </div>
    </div>

    <!-- Clean Cropping Modal -->
<div class="modal fade" id="cropperModal" tabindex="-1" aria-labelledby="cropperModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md">
    <div class="modal-content shadow rounded-3 border-0">
      <div class="modal-header bg-light border-0 rounded-top-3 py-3">
        <h5 class="modal-title fw-semibold text-center w-100">Crop Profile Picture</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-4">
        <h4 class="text-muted text-center mb-3">Adjust your photo within the frame</h4>
        
        <!-- Cropper Container -->
        <div class="cropper-container mx-auto bg-light rounded-2 overflow-hidden" 
             style="width: 100%; height: 300px; display: flex; align-items: center; justify-content: center;">
          <img id="cropperImage" class="img-fluid" style="max-height: 100%;" />
        </div>
        
        <!-- Simple Controls -->
        <div class="d-flex justify-content-center gap-2 mt-3">
          <button type="button" class="btn btn-outline-secondary btn-sm crop-control" data-method="zoom" data-option="0.1">
            <i class="bi bi-zoom-in"></i>
          </button>
          <button type="button" class="btn btn-outline-secondary btn-sm crop-control" data-method="zoom" data-option="-0.1">
            <i class="bi bi-zoom-out"></i>
          </button>
          <button type="button" class="btn btn-outline-secondary btn-sm crop-control" data-method="reset">
            <i class="bi bi-arrow-counterclockwise"></i> Reset
          </button>
        </div>
      </div>
      
      <!-- Action Buttons -->
      <div class="modal-footer border-0 pt-0">
        <div class="d-flex justify-content-between w-100">
          <button type="button" class="btn btn-outline-secondary px-4 btn-purple" data-bs-dismiss="modal">
            Cancel
          </button>
          <button type="button" class="btn btn-primary px-4 btn-purple" id="cropImageBtn">
            Save
          </button>
        </div>
      </div>
    </div>
  </div>
</div>


  <!--loader-->
   <div id="loader" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(103, 58, 183, 0.8); z-index: 9999; justify-content: center; align-items: center; flex-direction: column;">
    <div style="color: white; font-size: 24px; font-weight: 500; margin-bottom: 20px;">
        <i class="fas fa-spinner fa-spin" style="margin-right: 10px;"></i>
        Creating Your Profile...
    </div>
    <div style="color: white; font-size: 16px;">
        Please wait while we set up your profile. This may take a moment.
    </div>
</div>
@endsection
@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>




<!--crooper script-->
<script>
document.addEventListener("DOMContentLoaded", function () {
    let cropper;
    const input = document.getElementById('profileUpload');
    const imagePreview = document.getElementById('profilePreview');
    const cropperModalEl = document.getElementById('cropperModal');
    const cropperModal = new bootstrap.Modal(cropperModalEl);
    const cropperImage = document.getElementById('cropperImage');
    const cropBtn = document.getElementById('cropImageBtn');

    input.addEventListener('change', function (e) {
        const file = e.target.files[0];
        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = function (event) {
                cropperImage.src = event.target.result;

                cropperImage.onload = () => {
                    if (cropper) cropper.destroy();

                    cropper = new Cropper(cropperImage, {
                        aspectRatio: 1,
                        viewMode: 2,
                        autoCropArea: 0.8,
                        responsive: true,
                        movable: true,
                        zoomable: true,
                        cropBoxMovable: true,
                        cropBoxResizable: true,
                        minContainerWidth: 300,
                        minContainerHeight: 300
                    });

                    cropperModal.show();
                };
            };
            reader.readAsDataURL(file);
        }
    });

    // Handle crop button click
    cropBtn.addEventListener('click', function () {
        if (cropper) {
            const canvas = cropper.getCroppedCanvas({
                width: 500,
                height: 500,
                fillColor: '#fff',
                imageSmoothingQuality: 'high'
            });

            canvas.toBlob(function (blob) {
                imagePreview.src = canvas.toDataURL('image/jpeg');
                
                const croppedFile = new File([blob], "profile.jpg", {
                    type: "image/jpeg",
                    lastModified: new Date().getTime()
                });

                const dataTransfer = new DataTransfer();
                dataTransfer.items.add(croppedFile);
                input.files = dataTransfer.files;

                cropperModal.hide();
            }, 'image/jpeg', 0.9);
        }
    });

    // Handle control buttons
    document.querySelectorAll('.crop-control').forEach(button => {
        button.addEventListener('click', function() {
            const method = this.dataset.method;
            const option = this.dataset.option;
            
            if (cropper) {
                if (method === 'reset') {
                    cropper.reset();
                } else if (method === 'zoom') {
                    cropper.zoom(parseFloat(option));
                }
            }
        });
    });

    // Clean up when modal closes
    cropperModalEl.addEventListener('hidden.bs.modal', function () {
        if (cropper) {
            cropper.destroy();
            cropper = null;
        }
    });
});
</script>


        
<script>
    $(document).ready(function(){
        $('#headingFour').click(function(){
        $('#interestModal4').addClass('show'); 
       });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
    const accordions = document.querySelectorAll(".accordion-button.custom-toggle-icon");
    accordions.forEach((accordion, index) => {
    const interestModal = document.getElementById(`interestModal${index + 1}`);
    const interestAccordion = accordion;
    const closeInterestModal = interestModal.querySelector(`#closeInterestModal${index + 1}`);
    const saveInterestBtn = interestModal.querySelector(`#saveInterestBtn${index + 1}`);
    const clearallBtn = interestModal.querySelector(`#clearallBtn${index + 1}`);
    const interestButtons = interestModal.querySelectorAll(".interest-btn");
    const interestDisplay = document.getElementById(`interestDisplay${index + 1}`);
    let selectedInterests = [];
    interestAccordion.addEventListener("click", () => {
    interestModal.classList.add("show");
    });
    closeInterestModal.addEventListener("click", () => {
    interestModal.classList.remove("show");
    });
    window.addEventListener("click", (e) => {
    if (e.target === interestModal) {
    interestModal.classList.remove("show");
    }
    });
    interestButtons.forEach((btn) => {
    btn.addEventListener("click", () => {
    const interest = btn.dataset.interest;
    if (selectedInterests.includes(interest)) {
    selectedInterests = selectedInterests.filter(i => i !== interest);
    btn.classList.remove("selected");
    } else {
    selectedInterests.push(interest);
    btn.classList.add("selected");
    }
    });
    });
    function renderTags() {
    interestDisplay.innerHTML = '';
    selectedInterests.forEach(interest => {
    const tag = document.createElement("span");
    tag.className = "tag";
    tag.innerHTML = `${interest} <span class="remove-tag" data-interest="${interest}">&times;</span>`;
    interestDisplay.appendChild(tag);
    });
    const removeBtns = interestDisplay.querySelectorAll(".remove-tag");
    removeBtns.forEach(removeBtn => {
    removeBtn.addEventListener("click", () => {
    const toRemove = removeBtn.dataset.interest;
    selectedInterests = selectedInterests.filter(i => i !== toRemove);
    interestButtons.forEach(btn => {
    if (btn.dataset.interest === toRemove) {
    btn.classList.remove("selected");
    }
    });
    renderTags();
    });
    });
    }
    saveInterestBtn.addEventListener("click", () => {
    renderTags();
    interestModal.classList.remove("show");
    });
    clearallBtn.addEventListener("click", () => {
    selectedInterests = [];
    interestButtons.forEach(btn => btn.classList.remove("selected"));
    });
    });
    });
</script>
 <script>
    document.getElementById('profileUpload').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                document.getElementById('profilePreview').src = e.target.result;
            };

            reader.readAsDataURL(file);
        }
    });
</script>
<script>
  $(document).ready(function () {
    var selectedHobbies = [];
     $(' #interestModal1  .interest-btn').on('click', function () {
        var hobby = {
            id: $(this).data('id'),
            name: $(this).data('name'),
            image: $(this).data('image')
        };

        var index = selectedHobbies.findIndex(h => h.id === hobby.id);
         if (index !== -1) {
            selectedHobbies.splice(index, 1);
            $(this).removeClass('selected');
        } else {
           
            selectedHobbies.push(hobby);
            $(this).addClass('selected');
        }
    });


    $('#clearallBtn1').on('click', function () {
        selectedHobbies = [];
        $('.interest-btn').removeClass('selected');
        $('#interestDisplay1').empty();
        $('#selectedHobbiesInput1').val('');
    });

  
    $('#saveInterestBtn1').on('click', function () {
        var $display = $('#interestDisplay1');
        $display.empty();

        var hobbyIds = selectedHobbies.map(function(hobby) {
            return hobby.id;
        });

        $('#selectedHobbiesInput1').val(hobbyIds.join(','));

        selectedHobbies.forEach(function (hobby) {
            var html = `
                <div class="selected-hobby d-inline-block me-2 mb-2" data-id="${hobby.id}">
                    <div class="d-flex align-items-center p-1 border rounded" style="gap: 8px;">
                        <img src="${hobby.image}" alt="${hobby.name}" style="width: 25px; height: 25px; object-fit: cover; border-radius: 50%;" />
                        <span>${hobby.name}</span>
                        <button type="button" class="remove-hobby">&times;</button>
                    </div>
                </div>
            `;
            $display.append(html);
        });

        $('#interestModal1').removeClass('show');
    });

   
    $('#interestDisplay1').on('click', '.remove-hobby', function () {
        var $parent = $(this).closest('.selected-hobby');
        var hobbyId = $parent.data('id');

        selectedHobbies = selectedHobbies.filter(function (hobby) {
            return hobby.id !== hobbyId;
        });

        
        $parent.remove();

      
        $('#selectedHobbiesInput1').val(selectedHobbies.map(function (hobby) {
            return hobby.id;
        }).join(','));

       
        $('.interest-btn[data-id="' + hobbyId + '"]').removeClass('selected');
    });
});
</script>
<script>
$(document).ready(function () {
    var selectedHobbies2 = [];
    $('#interestModal2 .interest-btn').on('click', function () {
        var hobby = {
            id: $(this).data('id'),
            name: $(this).data('name'),
            image: $(this).data('image')
        };

        var index = selectedHobbies2.findIndex(h => h.id === hobby.id);

        if (index !== -1) {
            selectedHobbies2.splice(index, 1);
            $(this).removeClass('selected');
        } else {
            selectedHobbies2.push(hobby);
            $(this).addClass('selected');
        }
    });
    
    

   
    $('#clearallBtn2').on('click', function () {
        selectedHobbies2 = [];
        $('#interestModal2 .interest-btn').removeClass('selected');
        $('#interestDisplay2').empty();
        $('#selectedHobbiesInput2').val('');
    });


  
    $('#saveInterestBtn2').on('click', function () {
        var $display = $('#interestDisplay2');
        $display.empty();

        var hobbyIds = selectedHobbies2.map(function(hobby) {
            return hobby.id;
        });

        $('#selectedHobbiesInput2').val(hobbyIds.join(','));

        selectedHobbies2.forEach(function (hobby) {
            var html = `
                <div class="selected-hobby d-inline-block me-2 mb-2" data-id="${hobby.id}">
                    <div class="d-flex align-items-center p-1 border rounded" style="gap: 8px;">
                        <img src="${hobby.image}" alt="${hobby.name}" style="width: 25px; height: 25px; object-fit: cover; border-radius: 50%;" />
                        <span>${hobby.name}</span>
                        <button type="button" class="remove-hobby">&times;</button>
                    </div>
                </div>
            `;
            $display.append(html);
        });

        $('#interestModal2').removeClass('show');
    });


 
    $('#interestDisplay2').on('click', '.remove-hobby', function () {
        var $parent = $(this).closest('.selected-hobby');
        var hobbyId = $parent.data('id');

        selectedHobbies2 = selectedHobbies2.filter(function (hobby) {
            return hobby.id !== hobbyId;
        });

        $parent.remove();

        $('#selectedHobbiesInput2').val(selectedHobbies2.map(function (hobby) {
            return hobby.id;
        }).join(','));

        $('#interestModal2 .interest-btn[data-id="' + hobbyId + '"]').removeClass('selected');
    });
});
</script>
<script>
$(document).ready(function () {
    var selectedTraits = [];
     $('#interestModal3 .interest-btn').on('click', function () {
        var trait = {
             id: $(this).data('id'),
            name: $(this).data('name'),
            image: $(this).data('image')
        };

        var index = selectedTraits.findIndex(t => t.id === trait.id);

        if (index !== -1) {
            selectedTraits.splice(index, 1);
            $(this).removeClass('selected');
        } else {
            selectedTraits.push(trait);
            $(this).addClass('selected');
        }
    });

   
    $('#clearallBtn3').on('click', function () {
        selectedTraits = [];
        $('#interestModal3 .interest-btn').removeClass('selected');
        $('#interestDisplay3').empty();
        $('#selectedTraitsInput').val('');
    });

   
    $('#saveInterestBtn3').on('click', function () {
        var $display = $('#interestDisplay3');
        $display.empty();

        var traitIds = selectedTraits.map(function(trait) {
            return trait.id;
        });

        $('#selectedTraitsInput').val(traitIds.join(',')); // Set trait IDs to input

        selectedTraits.forEach(function (trait) {
            var html = `
                <div class="selected-trait d-inline-block me-2 mb-2" data-id="${trait.id}">
                    <div class="d-flex align-items-center p-1 border rounded" style="gap: 8px;">
                        <img src="${trait.image}" alt="${trait.name}" style="width: 25px; height: 25px; object-fit: cover; border-radius: 50%;" />
                        <span>${trait.name}</span>
                        <button type="button" class="delete-btn ms-2 remove-trait">&times;</button>
                    </div>
                </div>
            `;
            $display.append(html);
        });

        $('#interestModal3').removeClass('show');
    });

    
    $('#interestDisplay3').on('click', '.remove-trait', function () {
        var $parent = $(this).closest('.selected-trait');
        var traitId = $parent.data('id');

        selectedTraits = selectedTraits.filter(function (trait) {
            return trait.id !== traitId;
        });

        $parent.remove();

        $('#selectedTraitsInput').val(selectedTraits.map(function (trait) {
            return trait.id;
        }).join(','));

        $('#interestModal3 .interest-btn[data-id="' + traitId + '"]').removeClass('selected');
    });
});
</script>
<script>
$(document).ready(function () {
    var selectedActivities = [];
    $('#interestModal4 .interest-btn').on('click', function () {
        var activity = {
            id: $(this).data('id'),
            name: $(this).data('name'),
            image: $(this).data('image')
        };

        var index = selectedActivities.findIndex(a => a.id === activity.id);

        if (index !== -1) {
            selectedActivities.splice(index, 1);
            $(this).removeClass('selected');
        } else {
            selectedActivities.push(activity);
            $(this).addClass('selected');
        }
    });

  
    $('#clearallBtn4').on('click', function () {
        selectedActivities = [];
        $('#interestModal4 .interest-btn').removeClass('selected');
        $('#interestDisplay4').empty();
        $('#selectedActivitiesInput').val('');
    });

    
    $('#saveInterestBtn4').on('click', function () {
        var $display = $('#interestDisplay4');
        $display.empty();

        var activityIds = selectedActivities.map(function(activity) {
            return activity.id;
        });

        $('#selectedActivitiesInput').val(activityIds.join(',')); // Set activity IDs to input

        selectedActivities.forEach(function (activity) {
            var html = `
                <div class="selected-activity d-inline-block me-2 mb-2" data-id="${activity.id}">
                    <div class="d-flex align-items-center p-1 border rounded" style="gap: 8px;">
                        <img src="${activity.image}" alt="${activity.name}" style="width: 25px; height: 25px; object-fit: cover; border-radius: 50%;" />
                        <span>${activity.name}</span>
                        <button type="button" class="remove-activity">&times;</button>
                    </div>
                </div>
            `;
            $display.append(html);
        });

        $('#interestModal4').removeClass('show');
    });

    
    $('#interestDisplay4').on('click', '.remove-activity', function () {
        var $parent = $(this).closest('.selected-activity');
        var activityId = $parent.data('id');

        selectedActivities = selectedActivities.filter(function (activity) {
            return activity.id !== activityId;
        });

        $parent.remove();

        $('#selectedActivitiesInput').val(selectedActivities.map(function (activity) {
            return activity.id;
        }).join(','));

        $('#interestModal4 .interest-btn[data-id="' + activityId + '"]').removeClass('selected');
    });
});
</script>
<!--ajax -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    const submitBtn = document.getElementById("submitProfileFormBtn");
    const modal = document.getElementById("completionModal");
    const modalCloseBtn = document.getElementById("modalCloseBtn");
    const form = document.querySelector("form");
    const loader = document.getElementById("loader");

submitBtn.addEventListener("click", function (e) {
        e.preventDefault();
        let isValid = true;

        const usernameInput = document.getElementById("username");
        const usernameError = document.getElementById("username-error");

        if (!usernameInput.value.trim()) {
            usernameError.style.display = "block";
            usernameInput.classList.add("is-invalid");
            isValid = false;
        } else {
            usernameError.style.display = "none";
            usernameInput.classList.remove("is-invalid");
        }

        const imageInput = document.getElementById("profileUpload");
        let imageError = document.getElementById("image-error");
        if (!imageError) {
           
            imageError = document.createElement("div");
            imageError.id = "image-error";
            imageError.style.color = "red";
            imageInput.parentNode.appendChild(imageError);
        }

        if (!imageInput.files || imageInput.files.length === 0) {
            imageError.style.display = "block";
            imageError.textContent = "Please select a profile picture.";
            isValid = false;
        } else {
            imageError.style.display = "none";
        }

        const fields = [
            { input: "selectedHobbiesInput1", error: "interests-error" },
            { input: "selectedHobbiesInput2", error: "hobbie-error" },
            { input: "selectedTraitsInput", error: "trait-error" },
            { input: "selectedActivitiesInput", error: "activity-error" },
        ];

        fields.forEach(({ input, error }) => {
            const inputEl = document.getElementById(input);
            let errorEl = document.getElementById(error);
            if (!errorEl) {
                
                errorEl = document.createElement("div");
                errorEl.id = error;
                errorEl.style.color = "red";
                inputEl.parentNode.appendChild(errorEl);
            }

            if (!inputEl.value.trim()) {
                errorEl.style.display = "block";
                errorEl.textContent = "This field is required.";
                isValid = false;
            } else {
                errorEl.style.display = "none";
            }
        });

        if (!isValid) return;
        
        loader.style.display = "flex";
        submitBtn.disabled = true;
       
        const formData = new FormData(form);
        fetch("{{ route('user.profile.complete') }}", {
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
            },
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                throw new Error("Form submission failed.");
            }
            return response.json();
        })
        .then(data => {
            if (data.name) {
                document.getElementById("userNameInModal").innerText = data.name;
            }
            modal.classList.add("show");
        })
        .catch(error => {
            alert("Something went wrong. Please try again.");
            console.error(error);
        })
        .finally(()=>{
          loader.style.display="none";  
          submitBtn.disabled = false; 
        });
        
    });
    modalCloseBtn?.addEventListener("click", () => modal.classList.remove("show"));
    window.addEventListener("click", (e) => {
        if (e.target === modal) modal.classList.remove("show");
    });
});

</script>




@endsection