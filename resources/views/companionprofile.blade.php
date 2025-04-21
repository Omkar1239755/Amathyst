
@extends('layouts.layout')
@section('content')
<body>
    <section class="associateprofile">
        <div class="container">
            <div class="row">

                <div class="col-md-6 championn-left d-flex align-items-center justify-content-center">
                    <img class="image-assoiate" src="/assests/images/championimg.svg" alt="" />
                </div>

                <div class="col-md-6 assoiatee-right justify-content-center">
                    <!-- step 1 -->
                    <div class="step step-1 ">

                        <div class="champion-head">
                            <h2>Let’s Complete Your Profile</h2>
                            <p>
                                Let’s set up your associate profile to help you find the right
                                companions. This will help us suggest people who align with your
                                interests and experiences.
                            </p>
                        </div>

                        <div class="progress-step-bar">
                            <div class="step-block" id="barStep1"></div>
                            <div class="step-block" id="barStep2"></div>
                            <div class="step-block" id="barStep3"></div>
                        </div>


                        <div class="text-center profile-assoiate">

                            <img id="profilePreview" src="/assests/images/profileimgasssoi.svg" alt="Profile Preview"
                                style="width: 120px; height: 120px; border-radius: 50%;" />

                            <p>
                                Upload a Profile Picture <br />This helps companions see who’s interested in them.
                            </p>


                            <input type="file" id="profileUpload" accept="image/*" style="display: none;" />


                            <button class="upload-btn"
                                onclick="document.getElementById('profileUpload').click()">Upload</button>
                        </div>

                        <div class="mb-3 mt-3">
                            <label class="form-label">Username</label>
                            <input type="email" class="form-control" placeholder="Enter username" />
                        </div>

                        <div class="input-wrapperpro">
                            <div class="input-headingtell">Tell us a bit about yourself</div>
                            <textarea class="form-control customprofile-textarea" rows="4"
                                placeholder="e.g., “I’m a laid-back person who loves books, deep conversations, and exploring new places.”"></textarea>
                        </div>

                        <div class="accordion custom-accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button collapsed custom-toggle-icon" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false"
                                        aria-controls="collapseOne">
                                        What are you interested in?
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        I’m interested in technology, design, and solving real-world
                                        problems through creative solutions.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed custom-toggle-icon" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                                        aria-controls="collapseTwo">
                                        List a few of your hobbies
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Dancing, singing, sketching, and exploring new tech tools.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed custom-toggle-icon" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        How would you describe yourself?
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse"
                                    aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        I'm a passionate learner who enjoys working on creative and
                                        technical projects.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFour">
                                    <button class="accordion-button collapsed custom-toggle-icon" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false"
                                        aria-controls="collapseFour">
                                        What kind of activities do you enjoy?
                                    </button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        I enjoy creative projects, group activities, and learning
                                        new tech skills.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-center champpp-btnn">
                            <button type="submit" class="btn-championgirll next-btn">
                                Continue
                            </button>
                        </div>
                    </div>

                    <!-- step 2 -->

                    <div class="step step-2">
                        <div class="champion-head">
                            <h2>Let’s Complete Your Profile</h2>
                            <p>
                                Let’s set up your associate profile to help you find the right
                                companions. This will help us suggest people who align with your
                                interests and experiences.
                            </p>
                        </div>


                        <div class="progress-step-bar">
                            <div class="step-block" id="barStep1"></div>
                            <div class="step-block" id="barStep2"></div>
                            <div class="step-block" id="barStep3"></div>
                            
                        </div>



                        <div class="uploadsss">
                            <div class="text-center showmore-heading">
                                <h2>Show More of Your World</h2>
                                <p>
                                    Upload additional photos to help others get a better sense of your personality and
                                    lifestyle.
                                    These will remain blurred unless someone is logged in.
                                </p>

                                <div class="image-upload-one">

                                    <div class="d-flex gap-3 justify-content-start flex-wrap mb-3">

                                        <div class="form-input">
                                            <label class="image-label">
                                                <div id="file-ip-1-preview" class="preview-box">
                                                    <i class="fas fa-plus"></i>
                                                    <p>Upload</p>
                                                </div>
                                                <input type="file" id="file-ip-1" accept="image/*"
                                                    onchange="showPreview(event, 1);" />
                                                <button type="button" class="imgRemove" onclick="myImgRemove(1)"
                                                    style="display:none;">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </label>
                                        </div>

                                        <div class="form-input">
                                            <label class="image-label">
                                                <div id="file-ip-2-preview" class="preview-box">
                                                    <i class="fas fa-plus"></i>
                                                    <p>Upload</p>
                                                </div>
                                                <input type="file" id="file-ip-2" accept="image/*"
                                                    onchange="showPreview(event, 2);" />
                                                <button type="button" class="imgRemove" onclick="myImgRemove(2)"
                                                    style="display:none;">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </label>
                                        </div>

                                        <div class="form-input">
                                            <label class="image-label">
                                                <div id="file-ip-3-preview" class="preview-box">
                                                    <i class="fas fa-plus"></i>
                                                    <p>Upload</p>
                                                </div>
                                                <input type="file" id="file-ip-3" accept="image/*"
                                                    onchange="showPreview(event, 3);" />
                                                <button type="button" class="imgRemove" onclick="myImgRemove(3)"
                                                    style="display:none;">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </label>
                                        </div>
                                    </div>


                                    <div class="d-flex gap-3 justify-content-start flex-wrap">

                                        <div class="form-input">
                                            <label class="image-label">
                                                <div id="file-ip-4-preview" class="preview-box">
                                                    <i class="fas fa-plus"></i>
                                                    <p>Upload</p>
                                                </div>
                                                <input type="file" id="file-ip-4" accept="image/*"
                                                    onchange="showPreview(event, 4);" />
                                                <button type="button" class="imgRemove" onclick="myImgRemove(4)"
                                                    style="display:none;">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </label>
                                        </div>

                                        <div class="form-input">
                                            <label class="image-label">
                                                <div id="file-ip-5-preview" class="preview-box">
                                                    <i class="fas fa-plus"></i>
                                                    <p>Upload</p>
                                                </div>
                                                <input type="file" id="file-ip-5" accept="image/*"
                                                    onchange="showPreview(event, 5);" />
                                                <button type="button" class="imgRemove" onclick="myImgRemove(5)"
                                                    style="display:none;">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </label>
                                        </div>

                                        <div class="form-input">
                                            <label class="image-label">
                                                <div id="file-ip-6-preview" class="preview-box">
                                                    <i class="fas fa-plus"></i>
                                                    <p>Upload</p>
                                                </div>
                                                <input type="file" id="file-ip-6" accept="image/*"
                                                    onchange="showPreview(event, 6);" />
                                                <button type="button" class="imgRemove" onclick="myImgRemove(6)"
                                                    style="display:none;">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="text-center secondchamp-step">
                            <button type="continue" class="btn-championgirll next-btn">
                                Continue
                            </button>
                        </div>

                    </div>


                    <!-- step 3 -->
                    <div class="step step-3">
                        <div class="champion-head">
                            <h2>Let’s Complete Your Profile</h2>
                            <p>
                                Let’s set up your associate profile to help you find the right
                                companions. This will help us suggest people who align with your
                                interests and experiences.
                            </p>
                        </div>

                        <div class="col-6 text-center mb-4">
                            <div class="progress-step-bar">
                                <div class="step-block" id="barStep1"></div>
                                <div class="step-block" id="barStep2"></div>
                                <div class="step-block" id="barStep3"></div>
                             
                            </div>
                        </div>

                        <div class="verfy-champ">
                            <div class="text-chmpverify">
                                <h2>Verify Your Identity Securely</h2>
                                <p>To keep Amathyst safe for everyone, we require a quick ID verification.  
                                    Your information stays private and will never be shared with other users.</p>
                            </div>

                            <div class="text-center nationalid-input">
                                    <label class="image-label">
                                        <div id="file-ip-1-preview" class="preview-box">
                                            <i class="fas fa-plus"></i>
                                          <p>Upload Your ID Document</p>
                                        </div>
                                        <input type="file" id="file-ip-1" accept="image/*"
                                            onchange="showPreview(event, 1);" />
                                        <button type="button" class="imgRemove" onclick="myImgRemove(1)"
                                            style="display:none;">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </label>                           
                            </div>
                            <p class="format-idpara">Acceptable formats: Passport, Driver’s License, National ID</p>


                            <div class="text-center nationalid-input">
                                <label class="image-label">
                                    <div id="file-ip-1-preview" class="preview-box">
                                        <i class="fas fa-plus"></i>
                                      <p>Upload a Selfie Holding Your ID</p>
                                    </div>
                                    <input type="file" id="file-ip-1" accept="image/*"
                                        onchange="showPreview(event, 1);" />
                                    <button type="button" class="imgRemove" onclick="myImgRemove(1)"
                                        style="display:none;">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </label>                           
                        </div>
                        <p class="format-idpara">Hold your ID next to your face, make sure both are clearly visible</p>

                        </div>

                        <div class="boxcap-container">
                            <input type="checkbox">
                            <p class="robot">I'm not a robot</p>
                              <div>
                                <div class="captcha-container">
                                  <div class="logo-captcha">
                                    <svg width="31" height="30" viewBox="0 0 31 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M30.0906 14.9789C30.0899 14.7631 30.0849 14.5485 30.0753 14.335V2.15984L26.7093 5.52576C23.9545 2.15375 19.7637 0 15.0697 0C10.1847 0 5.84492 2.33169 3.10156 5.94269L8.61873 11.5179C9.15941 10.5179 9.92751 9.65906 10.8536 9.01039C11.8168 8.25873 13.1816 7.64415 15.0695 7.64415C15.2976 7.64415 15.4736 7.6708 15.603 7.72101C17.9421 7.90563 19.9696 9.19653 21.1635 11.0702L17.2581 14.9755C22.2047 14.9561 27.7928 14.9447 30.0902 14.978" fill="#1C3AA9"/>
                                    <path d="M14.9789 0.000610352C14.7631 0.00131601 14.5485 0.00633868 14.335 0.0159818H2.15983L5.52576 3.38191C2.15375 6.13673 0 10.3275 0 15.0216C0 19.9065 2.33173 24.2463 5.94269 26.9897L11.5179 21.4725C10.5179 20.9318 9.65906 20.1637 9.01039 19.2376C8.25877 18.2744 7.64415 16.9096 7.64415 15.0217C7.64415 14.7937 7.6708 14.6176 7.72101 14.4883C7.90563 12.1492 9.19653 10.1216 11.0702 8.92779L14.9755 12.8331C14.9561 7.88654 14.9447 2.29845 14.978 0.00103747" fill="#4285F4"/>
                                    <path d="M0 15.0211C0.00072284 15.2369 0.00569389 15.4514 0.0153656 15.665V27.8402L3.38129 24.4742C6.13611 27.8462 10.3269 30 15.021 30C19.9059 30 24.2457 27.6683 26.9891 24.0573L21.4719 18.4821C20.9312 19.4821 20.1631 20.3409 19.237 20.9896C18.2738 21.7413 16.909 22.3558 15.0211 22.3558C14.7931 22.3558 14.617 22.3292 14.4877 22.279C12.1486 22.0944 10.121 20.8035 8.92718 18.9298L12.8325 15.0245C7.88593 15.0439 2.29784 15.0553 0.000429605 15.022" fill="#ABABAB"/>
                                    </svg>
                                      <div class="captcha-text">
                                        <p>reCAPTCHA</p>            
                                      </div>            
                                  </div>
                                  <p class="captcha-text-tos">Privacy - Terms</p>
                                </div>
                              </div>    
                          </div>


                        <div class="text-center thirdchamp-step">
                            <button type="continue" class="btn-championgirll next-btn">
                                Continue
                            </button>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </section>




    <!-- Popup Modal -->
    <div id="completionModal" class="modal-overlay">
        <div class="modal-content">
          <button class="modal-close" id="modalCloseBtn">&times;</button>
      
          <div class="user-ready">
            <i class="fas fa-user ready-user"></i>
          </div>
      
          <h2>Your Profile Is Ready!</h2>
          <p>Your profile is live, Julie Brown!<br>
             Associates can now discover and book you using Gems.
          </p>
      
          <div class="btn-gotodash">
            <a href="{{route('dashboard')}}" id="closeModalBtn" class="gotodashboard-btn">Go to My Dashboard</a>
          </div>
        </div>
      </div>

        </div>
      </section>
    
    
    
</body>
<!-- Bootstrap JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


<!-- Bootstrap JS file opn-->
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


<!-- steps js -->




<script>
    document.addEventListener("DOMContentLoaded", function () {
      let currentStep = 1;
      const totalSteps = 3;
  
      const steps = document.querySelectorAll(".step");
      const progressBars = [
        document.getElementById("barStep1"),
        document.getElementById("barStep2"),
        document.getElementById("barStep3")
      ];
  
      const modal = document.getElementById("completionModal");
      const closeModalBtn = document.getElementById("closeModalBtn");
      const modalCloseIcon = document.getElementById("modalCloseBtn");
  
      function showStep(step) {
        steps.forEach((el, index) => {
          el.classList.toggle("active", index === step - 1);
        });
  
        progressBars.forEach((bar, index) => {
          if (index < step) {
            bar.classList.add("active");
          } else {
            bar.classList.remove("active");
          }
        });
      }
  
      document.querySelectorAll(".next-btn").forEach((btn) => {
        btn.addEventListener("click", () => {
          if (currentStep < totalSteps) {
            currentStep++;
            showStep(currentStep);
          } else if (currentStep === totalSteps) {
            modal.classList.add("show");
          }
        });
      });
  
      // Close modal on '×' button click
      if (modalCloseIcon) {
        modalCloseIcon.addEventListener("click", () => {
          modal.classList.remove("show");
        });
      }
  
      // Close modal on background click
      window.addEventListener("click", function (event) {
        if (event.target === modal) {
          modal.classList.remove("show");
        }
      });
  
      showStep(currentStep);
    });
  </script>
  

<!-- second step script -->

<script>
    function showPreview(event, number) {
        const file = event.target.files[0];
        if (file) {
            const src = URL.createObjectURL(file);
            const previewBox = document.getElementById(`file-ip-${number}-preview`);
            const input = document.getElementById(`file-ip-${number}`);
            const removeBtn = input.closest('.form-input').querySelector('.imgRemove');

            previewBox.innerHTML = `<img src="${src}" alt="Image Preview" />`;
            removeBtn.style.display = 'block';
        }
    }

    function myImgRemove(number) {
        const previewBox = document.getElementById(`file-ip-${number}-preview`);
        const input = document.getElementById(`file-ip-${number}`);
        const removeBtn = input.closest('.form-input').querySelector('.imgRemove');

        previewBox.innerHTML = `<i class="fas fa-plus"></i><p>Upload</p>`;
        input.value = '';
        removeBtn.style.display = 'none';
    }

</script>


</body>

</html>

@endsection