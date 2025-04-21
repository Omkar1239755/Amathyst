
@extends('layouts.layout')
@section('content')

  
  <!-- associateprofile form -->

  <section class="associateprofile">
    <div class="container">
      <div class="row">
        <div class="col-md-6 assoiate-left d-flex align-items-center justify-content-center">
          <img class="image-assoiate" src="/assests/images/assoiateimg.svg" alt="" />
        </div>

        <div class="col-md-6 assoiatee-right justify-content-center">

          <div class="assoiate-head">
            <h2>Let’s Complete Your Profile</h2>
            <p>
              Let’s set up your associate profile to help you find the right
              companions. This will help us suggest people who align with your
              interests and experiences.
            </p>
          </div>

          <div class="text-center profile-assoiate">

            <img id="profilePreview" src="/assests/images/profileimgasssoi.svg" alt="Profile Preview"
              style="width: 120px; height: 120px; border-radius: 50%;" />

            <p>
              Upload a Profile Picture <br />This helps companions see who’s interested in them.
            </p>
            <input type="file" id="profileUpload" accept="image/*" style="display: none;" />
            <button class="upload-btn" onclick="document.getElementById('profileUpload').click()">Upload</button>
          </div>

          <div class="mb-3 mt-3">
            <label class="form-label">Username</label>
            <input type="email" class="form-control" placeholder="Enter username">
          </div>



          <div class="accordion custom-accordion" id="accordionExample">

            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button collapsed custom-toggle-icon" type="button" id="interestAccordion">
                  What are you interested in?
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne">
                <div class="accordion-body" id="interestDisplay">
                  <!-- Selected interests will appear here -->
                </div>
              </div>
            </div>


            <div id="interestModal" class="modal-overlay">
              <div class="modal-contentselect">
                <button class="modal-close" id="closeInterestModal">&times;</button>
                <h2>What Are You Interested In?</h2>
                <p>Select a few topics you genuinely enjoy. This helps us match you with better connections.</p>

                <div class="interest-buttons">
                  <button class="interest-btn" data-interest="🎵 Music"></i>
                    <img src="/assests/images/modelmusic.png" alt="" class="modelunic-icon"> Music</button>

                  <button class="interest-btn" data-interest="📚 Books">
                    <img src="/assests/images/modlbook.png" alt="" class="modelunic-icon">Books</button>

                  <button class="interest-btn" data-interest="🍱 Foodie">
                    <img src="/assests/images/foodiemodel.png" alt="" class="modelunic-icon"> Foodie</button>
                 
                    <button class="interest-btn" data-interest="🎮 Gaming">
                      <img src="/assests/images/gamemodel.png" alt="" class="modelunic-icon">Gaming</button>

                  <button class="interest-btn" data-interest="✈️ Travel"> 
                    <img src="/assests/images/travelmodel.png" alt="" class="modelunic-icon"> Travel</button>

                  <button class="interest-btn" data-interest="🧘 Wellness">
                    <img src="/assests/images/wellnesmodl.png" alt="" class="modelunic-icon"> Wellness</button>

                  <button class="interest-btn" data-interest="🏞️ Nature">
                    <img src="/assests/images/naturemodel.png" alt="" class="modelunic-icon"> Nature</button>


                  <button class="interest-btn" data-interest="🎨 Art"> 
                    <img src="/assests/images/artmodel.png" alt="" class="modelunic-icon"> Art</button>

                  <button class="interest-btn" data-interest="🎭 Theatre">
                    <img src="/assests/images/threatermodl.png" alt="" class="modelunic-icon">Theatre</button>

                  <button class="interest-btn" data-interest="💬 Deep conversations">
                    <img src="/assests/images/deepconvertmodl.png" alt="" class="modelunic-icon"> Deep conversations</button>
               
                    <button class="interest-btn" data-interest="🐶 Pets">
                      <img src="/assests/images/petsmodel.png" alt="" class="modelunic-icon"> Pets</button>

                  <button class="interest-btn" data-interest="💻 Tech">
                    <img src="/assests/images/techmodel.png" alt="" class="modelunic-icon"> Tech</button>

                  <button class="interest-btn" data-interest="🏋️ Fitness">
                    <img src="/assests/images/fitnesmodel.png" alt="" class="modelunic-icon"> Fitness</button>

                </div>
                <div class="d-flex justify-content-center confirmm-modelbtn">
                  <button class="clrall-btn" id="clearallBtn">Clear All </button>
                  <button class="confirmm-selectbtn" id="saveInterestBtn">Confirm Selection</button>
                </div>

              </div>
            </div>

            <!-- list hobbies model -->

<!-- Accordion Item 1 -->
<div class="accordion-item">
  <h2 class="accordion-header" id="headingTwo">
    <button class="accordion-button collapsed custom-toggle-icon" type="button"
      data-bs-toggle="modal" data-bs-target="#modalHobbies">
      List a few of your hobbies
    </button>
  </h2>
</div>

<!-- Accordion Item 2 -->
<div class="accordion-item">
  <h2 class="accordion-header" id="headingThree">
    <button class="accordion-button collapsed custom-toggle-icon" type="button"
      data-bs-toggle="modal" data-bs-target="#modalDescribe">
      How would you describe yourself?
    </button>
  </h2>
</div>

<!-- Accordion Item 3 -->
<div class="accordion-item">
  <h2 class="accordion-header" id="headingFour">
    <button class="accordion-button collapsed custom-toggle-icon" type="button"
      data-bs-toggle="modal" data-bs-target="#modalActivities">
      What kind of activities do you enjoy?
    </button>
  </h2>
</div>

<!-- Modal 1: Hobbies -->
<div class="modal" id="modalHobbies" tabindex="-1" aria-labelledby="modalHobbiesLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalHobbiesLabel">Your Hobbies</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <ul class="modelul-list">
        <li>Dance</li>
        <li>Singing</li>
        <li>Art</li>
      </ul>
      </div>

    </div>
  </div>
</div>

<!-- Modal 2: Describe Yourself -->
<div class="modal" id="modalDescribe" tabindex="-1" aria-labelledby="modalDescribeLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalDescribeLabel">About You</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        I'm a passionate learner who enjoys working on creative and technical projects.
      </div>
    </div>
  </div>
</div>

<!-- Modal 3: Activities -->
<div class="modal" id="modalActivities" tabindex="-1" aria-labelledby="modalActivitiesLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalActivitiesLabel">Activities You Enjoy</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        I enjoy creative projects, group activities, and learning new tech skills.
      </div>
    </div>
  </div>
</div>

          </div>

       

          <div class="text-center assoit-btnn">
            <!-- Removed Bootstrap data attributes -->
            <button type="button" class="btn-assoiateprofile next-btn">
              Continue
            </button>
          </div>

          <!-- Custom Modal -->
          <div id="completionModal" class="modal-overlay">
            <div class="modal-content">
              <button class="modal-close" id="modalCloseBtn">&times;</button>

              <div class="user-ready">
                <i class="fas fa-user ready-user"></i>
              </div>

              <h2>Your Profile Is Ready!</h2>
              <p><b>Robert Brown</b>, you’re all set to start exploring companions who match your vibe and interests.
                Now let’s get started on your journey with Amathyst.
              </p>

              <div class="btn-gotodash">
                <a href="{{route('dashboard')}}" id="closeModalBtn" class="gotodashboard-btn">Go to My Dashboard</a>
              </div>
            </div>
          </div>

        </div>
      </div>

    </div>
  </section>



</body>
<!-- Bootstrap JS Bundle (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


<script>
  document.addEventListener("DOMContentLoaded", function () {
    const interestModal = document.getElementById("interestModal");
    const interestAccordion = document.getElementById("interestAccordion");
    const closeInterestModal = document.getElementById("closeInterestModal");
    const saveInterestBtn = document.getElementById("saveInterestBtn");
    const interestButtons = document.querySelectorAll(".interest-btn");
    const interestDisplay = document.getElementById("interestDisplay");

    let selectedInterests = [];

    // Open modal
    interestAccordion.addEventListener("click", () => {
      interestModal.classList.add("show");
    });

    // Close modal (button or outside click)
    closeInterestModal.addEventListener("click", () => {
      interestModal.classList.remove("show");
    });

    window.addEventListener("click", (e) => {
      if (e.target === interestModal) {
        interestModal.classList.remove("show");
      }
    });

    // Toggle interest selection
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

    // Render selected interests as tags
    function renderTags() {
      interestDisplay.innerHTML = '';
      selectedInterests.forEach(interest => {
        const tag = document.createElement("span");
        tag.className = "tag";
        tag.innerHTML = `${interest} <span class="remove-tag" data-interest="${interest}">&times;</span>`;
        interestDisplay.appendChild(tag);
      });

      // Add remove event to each tag
      document.querySelectorAll(".remove-tag").forEach(removeBtn => {
        removeBtn.addEventListener("click", () => {
          const toRemove = removeBtn.dataset.interest;
          selectedInterests = selectedInterests.filter(i => i !== toRemove);

          // Also unselect button in modal
          document.querySelector(`.interest-btn[data-interest="${toRemove}"]`)?.classList.remove("selected");

          renderTags();
        });
      });
    }

    // Save interests from modal
    saveInterestBtn.addEventListener("click", () => {
      renderTags();
      interestModal.classList.remove("show");
    });
  });
</script>

<script>

  const modal = document.getElementById("completionModal");
  const modalCloseIcon = document.getElementById("modalCloseBtn");
  let currentStep = 1;
  const totalSteps = 3; // Update this to your total number of steps

  // Continue button click
  document.querySelectorAll(".next-btn").forEach((btn) => {
    btn.addEventListener("click", () => {
      if (currentStep < totalSteps) {
        currentStep++;
        showStep(currentStep); // You should define showStep(stepNumber)
      } else if (currentStep === totalSteps) {
        modal.classList.add("show");
      }
    });
  });

  // Close modal on × button click
  if (modalCloseIcon) {
    modalCloseIcon.addEventListener("click", () => {
      modal.classList.remove("show");
    });
  }

  // Close modal on outside click
  window.addEventListener("click", function (event) {
    if (event.target === modal) {
      modal.classList.remove("show");
    }
  });



</script>

<!-- script profile upload -->
<script>
  document.getElementById('profileUpload').addEventListener('change', function (event) {
    const file = event.target.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function (e) {
        document.getElementById('profilePreview').src = e.target.result;
      };
      reader.readAsDataURL(file);
    }
  });
</script>

@endsection