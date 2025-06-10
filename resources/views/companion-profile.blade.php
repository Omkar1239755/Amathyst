@extends('webtemplate.layouts.layout')
    @section('content')
    
 <style>
        .selected-hobby {
        display: inline-block;
        margin-right: 8px;
    }
    
    .selected-hobby img {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        object-fit: cover;
    }
    
    .remove-hobby {
        background: none;
        border: none;
        font-size: 18px;
        cursor: pointer;
    }
</style> 
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css" rel="stylesheet"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<section class="associateprofile">
<form  enctype="multipart/form-data">
     @csrf
        <div class="container">
            <div class="row">
                <div class="col-md-6 championn-left d-flex align-items-center justify-content-center">
                    <img class="image-assoiate" src="{{asset('assests/images/championimg.svg')}}" alt="" />
                </div>
                <div class="col-md-6 assoiatee-right justify-content-center">
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
                            <div class="step-block active" id="barStep1"></div>
                            <div class="step-block" id="barStep2"></div>
                            <div class="step-block" id="barStep3"></div>
                        </div>


                        <div class="text-center profile-assoiate">
                            <img id="profilePreview" src="{{asset('assests/images/profileimgasssoi.svg')}}" alt="Profile Preview"
                                style="width: 120px; height: 120px; border-radius: 50%;" />
                             <p>
                                Upload a Profile Picture <br />This helps companions see who’s interested in them.
                            </p>
                            <input type="file" id="profileUpload" name="profile_image" accept="image/*" style="display: none;"
                                class="compainion-preview" />
                            <button class="upload-btn" type="button"
                                onclick="document.getElementById('profileUpload').click()">Upload</button>
                            </div>
                           
                             <div id="image-error" style="color:red; display:none; margin-top: 5px;">
                                     Please select at least one.
                              </div>
                            <div class="mb-3 mt-3">
                            <label class="form-label"><b>Username</b></label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter username" />
                            <div id="username-error" style="color: red; display: none; margin-top: 5px;">
                                Username is required.
                            </div>
                        </div>



                       <input type="text" class="input-headingtell"> <b>Tell us a bit about yourself</b>
                        <div class="input-wrapperpro">
                           <textarea class="form-control customprofile-textarea" rows="4" name="bio"
                                placeholder="e.g., “I’m a laid-back person who loves books, deep conversations, and exploring new places.”"></textarea>
                                <div id="bio-error" style="color:red; display:none;">Please tell us a bit about yourself.</div>
                        </div>
                       
                        
                         <!-- Accordian  -->
                         <div class="accordion custom-accordion" id="accordionExample">
                             <!-- Accordion Item 1 -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button collapsed custom-toggle-icon" type="button"
                                        id="interestAccordion1">
                                        What are you interested in?
                                    </button>
                                </h2>
                                <div id="collapseOne1" class="accordion-collapse collapse show"
                                    aria-labelledby="headingOne">
                                    <div class="accordion-body" id="interestDisplay1">
                                        <!-- Selected interests will appear here -->
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="interests" id="selectedHobbiesInput1" />
                             <div id="interests-error" style="color:red; display:none; margin-top: 5px;">
                                Please select at least one .
                            </div>
                             <!-- Modal for Accordion Item 1 -->
                            <div id="interestModal1" class="modal-overlay">
                                <div class="modal-contentselect">
                                    <button class="modal-close" type="button"  id="closeInterestModal1">&times;</button>
                                    <h2>What Are You Interested In?</h2>
                                    <p>Select a few topics you genuinely enjoy. This helps us match you with better
                                        connections.</p>
                                        
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
                                        <button class="clearall-btn" id="clearallBtn1" type="button">Clear All</button>
                                        <button class="confirmm-selectbtn" id="saveInterestBtn1" type="button">Confirm Selection</button>
                                    </div>
                                </div>
                            </div>
                            
       <!-- *******************************************Accordion Item 2 ************************************************************-->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed custom-toggle-icon" type="button"
                                    id="interestAccordion2">
                                    List a few of your hobbies
                                </button>
                            </h2>
                            <div id="collapseTwo2" class="accordion-collapse collapse show"
                                aria-labelledby="headingTwo">
                                <div class="accordion-body" id="interestDisplay2">
                                    <!-- Selected interests will appear here -->
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="additional_hobbie" id="selectedHobbiesInput2" />
                          <div id="hobbie-error" style="color:red; display:none; margin-top: 5px;">
                                Please select at least one.
                         </div>
         <!--************************ Modal for Accordion Item 2 ********************************************************************-->
                            <div id="interestModal2" class="modal-overlay">
                                <div class="modal-contentselect">
                                    <button class="modal-close"  type="button" id="closeInterestModal2">&times;</button>
                                    
                                    <p>Few of your hobbies</p>
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
                                        <button class="clearall-btn" id="clearallBtn2" type="button">Clear All</button>
                                        <button class="confirmm-selectbtn" id="saveInterestBtn2" type="button">Confirm Selection</button>
                                    </div>
                                </div>
                            </div>
    
    
         <!--*****************************************Accordian item 3*********************************************************-->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed custom-toggle-icon" type="button"
                                        id="interestAccordion3">
                                    How would you describe yourself?
                                    </button>
                                </h2>
                                <div id="collapseThree3" class="accordion-collapse collapse show"
                                    aria-labelledby="headingThree">
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
                                    <button class="modal-close" id="closeInterestModal3"  type="button">&times;</button>
                                    <p>How would you describe yourself?</p>
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
                                        <button class="clearall-btn" id="clearallBtn3"  type="button">Clear All</button>
                                        <button class="confirmm-selectbtn" id="saveInterestBtn3"  type="button">Confirm Selection</button>
                                    </div>
                                </div>
                            </div> 
    
    
     <!-- *******************************Accordion Item 4 *****************************************************-->
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
                                        <!-- Selected interests will appear here -->
                                    </div>
                                </div>
                            </div>
    
                            <input type="hidden" name="activities" id="selectedActivitiesInput" />
                              <div id="activity-error" style="color:red; display:none; margin-top: 5px;">
                                 Please select at least one.
                            </div>
                              
    <!--************************************* Modal for Accordion Item 4******************************************************* -->
                            <div id="interestModal4" class="modal-overlay">
                                <div class="modal-contentselect">
                                    <button class="modal-close" id="closeInterestModal4"  type="button">&times;</button>
                                
                                    <p>Kind of activities do you enjoy?</p>
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

     <!--************************************************************accordian item 5*********************************************************************************-->
               
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed custom-toggle-icon" type="button"
                                id="interestAccordion3">
                                Explore personalities & preferences .
                            </button>
                        </h2>
                        <div id="collapseThree3" class="accordion-collapse collapse show" aria-labelledby="headingThree">
                            <div class="accordion-body" id="interestDisplay5">
                                <!-- Selected personalities will appear here -->
                            </div>
                        </div>
                    </div>
                    
                    <input type="hidden" name="personality" id="selectedPersonalityInput" />
                      <div id="personality-error" style="color:red; display:none; margin-top: 5px;">
                         Please select at least one.
                    </div>
                </div>
                    
                    
                    <!-- Modal for Accordion Item 5 -->
                    <div id="interestModal5" class="modal-overlay">
                        <div class="modal-contentselect">
                            <button class="modal-close" id="closeInterestModal5" type="button">&times;</button>
                            <p>How would you describe your personality?</p>
                            <div class="interest-buttons">
                                @foreach($personality as $person)
                                <button class="interest-btn" type="button"
                                    data-id="{{ $person->id }}"
                                    data-name="{{ $person->personality_preferences }}"
                                    data-image="{{ asset('uploads/personalities/'.$person->image) }}">
                                    
                                    <img src="{{ asset('uploads/personalities/'.$person->image) }}" alt="" class="modelunic-icon">
                                    {{ $person->personality_preferences }}
                                </button>
                                @endforeach
                            </div>
                            <div class="d-flex justify-content-center confirmm-modelbtn">
                                <button class="clearall-btn" id="clearallBtn5" type="button">Clear All</button>
                                <button class="confirmm-selectbtn" id="saveInterestBtn5" type="button">Confirm Selection</button>
                            </div>
                        </div>
                    </div>
                        <!--continue bttn-->
                        <div class="text-center champpp-btnn">
                            <button type="button" class="btn-championgirll next-btn">
                                Continue
                            </button>
                        </div>
                    </div>
                
  <!--******* *****************************************step 2************ ******************************************************************-->
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
                            <div class="step-block active" id="barStep1"></div>
                            <div class="step-block active" id="barStep2"></div>
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
                                                
                                                <input type="file" id="file-ip-1" name="upload1" accept="image/*"
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
                                                
                                                <input type="file" id="file-ip-2"  name="upload2" accept="image/*"
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
                                                
                                                
                                                <input type="file" id="file-ip-3"  name="upload3" accept="image/*"
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
                                                <input type="file" id="file-ip-4"  name="upload4" accept="image/*"
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
                                                <input type="file" id="file-ip-5"   name="upload5" accept="image/*"
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
                                                <input type="file" id="file-ip-6"  name="upload6" accept="image/*"
                                                    onchange="showPreview(event, 6);" />
                                                <button type="button" class="imgRemove" onclick="myImgRemove(6)"
                                                    style="display:none;">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                
                                <div id="additional-image-error" class="text-danger mt-2" style="display: none;"></div>

                                        
                            </div>
                        </div>
                        
                        <div class="text-center secondchamp-step">
                            <button type="button" class="btn-championgirll next-btn">
                                Continue
                            </button>
                        </div>

             </div>
   <!-- ***************************************************************step 3****************************************************************************-->
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
                                <div class="step-block active" id="barStep1"></div>
                                <div class="step-block active" id="barStep2"></div>
                                <div class="step-block active" id="barStep3"></div>

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
                                    <div id="preview-id-doc" class="preview-boxverifyy">
                                        <i class="fas fa-plus"></i>
                                        <p>Upload Your ID Document</p>
                                    </div>
                                    <input type="file" name="idimage"  id="input-id-doc" accept="image/*"
                                    onchange="showPreview(event, 'id-doc')" />
                                    
                                    <button type="button" class="img-remove-btn" onclick="removeImage('id-doc')"
                                        style="display:none;">
                                        <i class="fas fa-times"></i>
                                    </button>
                                    
                                 <div id="image-error1" style="color:red; display:none; margin-top: 5px;">
                                         Please select at least one.
                                  </div>
                                </label>
                      </div>
                        
                              <!--selfie 8-->
                     <p class="format-idpara">Acceptable formats: Passport, Driver’s License, National ID</p>
                            <div class="text-center nationalid-input">
                                <label class="image-label">
                                    <div id="preview-selfie" class="preview-boxverifyy">
                                        <i class="fas fa-plus"></i>
                                        <p>Upload a Selfie Holding Your ID</p>
                              </div>
                                <input type="file" name="selfieimage"  id="input-selfie" accept="image/*"
                                    onchange="showPreview(event, 'selfie')" />
                                     
                                    <button type="button" class="img-remove-btn" onclick="removeImage('selfie')"
                                        style="display:none;">
                                        <i class="fas fa-times"></i>
                                    </button>
                                    
                                   <div id="image-error2" style="color:red; display:none; margin-top: 5px;">
                                 Please select at least one.
                                  </div>
                                  
                                </label>
                            </div>
                            <p class="format-idpara">Hold your ID next to your face, make sure both are clearly visible
                            </p>
                      </div>
                        <!--captcha code commented-->
                        <!--<div class="boxcap-container">-->
                        <!--    <input type="checkbox">-->
                        <!--    <p class="robot">I'm not a robot</p>-->
                        <!--    <div>-->
                        <!--      <div class="captcha-container">-->
                        <!--            <div class="logo-captcha">-->
                        <!--                <svg width="31" height="30" viewBox="0 0 31 30" fill="none"-->
                        <!--                    xmlns="http://www.w3.org/2000/svg">-->
                        <!--                    <path-->
                        <!--                        d="M30.0906 14.9789C30.0899 14.7631 30.0849 14.5485 30.0753 14.335V2.15984L26.7093 5.52576C23.9545 2.15375 19.7637 0 15.0697 0C10.1847 0 5.84492 2.33169 3.10156 5.94269L8.61873 11.5179C9.15941 10.5179 9.92751 9.65906 10.8536 9.01039C11.8168 8.25873 13.1816 7.64415 15.0695 7.64415C15.2976 7.64415 15.4736 7.6708 15.603 7.72101C17.9421 7.90563 19.9696 9.19653 21.1635 11.0702L17.2581 14.9755C22.2047 14.9561 27.7928 14.9447 30.0902 14.978"-->
                        <!--                        fill="#1C3AA9" />-->
                        <!--                    <path-->
                        <!--                        d="M14.9789 0.000610352C14.7631 0.00131601 14.5485 0.00633868 14.335 0.0159818H2.15983L5.52576 3.38191C2.15375 6.13673 0 10.3275 0 15.0216C0 19.9065 2.33173 24.2463 5.94269 26.9897L11.5179 21.4725C10.5179 20.9318 9.65906 20.1637 9.01039 19.2376C8.25877 18.2744 7.64415 16.9096 7.64415 15.0217C7.64415 14.7937 7.6708 14.6176 7.72101 14.4883C7.90563 12.1492 9.19653 10.1216 11.0702 8.92779L14.9755 12.8331C14.9561 7.88654 14.9447 2.29845 14.978 0.00103747"-->
                        <!--                        fill="#4285F4" />-->
                        <!--                    <path-->
                        <!--                        d="M0 15.0211C0.00072284 15.2369 0.00569389 15.4514 0.0153656 15.665V27.8402L3.38129 24.4742C6.13611 27.8462 10.3269 30 15.021 30C19.9059 30 24.2457 27.6683 26.9891 24.0573L21.4719 18.4821C20.9312 19.4821 20.1631 20.3409 19.237 20.9896C18.2738 21.7413 16.909 22.3558 15.0211 22.3558C14.7931 22.3558 14.617 22.3292 14.4877 22.279C12.1486 22.0944 10.121 20.8035 8.92718 18.9298L12.8325 15.0245C7.88593 15.0439 2.29784 15.0553 0.000429605 15.022"-->
                        <!--                        fill="#ABABAB" />-->
                        <!--                </svg>-->
                        <!--                <div class="captcha-text">-->
                        <!--                    <p>reCAPTCHA</p>-->
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--            <p class="captcha-text-tos">Privacy - Terms</p>-->
                        <!--        </div> -->
                
                        <!--    </div>-->
                        <!--</div>-->
                        
                    <!--final continue button-->
                        <div class="text-center thirdchamp-step">
                            <button type="continue" class="btn-championgirll next-btn"  id="submitProfileFormBtn">
                                Continue
                            </button>
                    </div>
                </div>

            </div>
        </div>
 </form>
 </section>
 
 
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

    
    
    <!-- Popup Modal -->
    <div id="completionModal" class="modal-overlay">
        <div class="modal-content">
            <button class="modal-close" type="button" id="modalCloseBtn">&times;</button>

            <div class="user-ready">
                <i class="fas fa-user ready-user"></i>
            </div>
             <p>  Our profile is live,<b id="userNameInModal"></b><br>
                Associates can now discover and book you using Gems.
            </p>
            <div class="btn-gotodash">
                <a href="{{route('dashboard')}}" id="closeModalBtn" class="gotodashboard-btn">Go to My Dashboard</a>
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


</section>
@endsection
@section('script')
</body>
<!-- Bootstrap JS-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.19.3/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>
<!-- Bootstrap JS file opn-->

<!--for crop image -->

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
<!-- steps for vallidation inputs opening  js -->
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

    // const modal = document.getElementById("completionModal");
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
      //  vallidation
      document.querySelectorAll(".next-btn").forEach((btn) => {
                       btn.addEventListener("click", () => {
                        let isValid = true; 
                            if (currentStep === 1) {
                                    // Step 1 validation
                                const imageInput = document.getElementById("profileUpload");
                                const imageError = document.getElementById("image-error");
                                    if (!imageInput.files || imageInput.files.length === 0) {
                                        imageError.style.display = "block";
                                        imageError.textContent = "Please select a profile picture.";
                                        isValid = false;
                                    } else {
                                        imageError.style.display = "none";
                                    }
                                    
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
                        
                                const bioInput = document.querySelector("textarea[name='bio']");
                                const bioError = document.getElementById("bio-error");
                                if (!bioInput.value.trim()) {
                                    bioError.style.display = "block";
                                    bioInput.classList.add("is-invalid");
                                    isValid = false;
                                } else {
                                    bioError.style.display = "none";
                                    bioInput.classList.remove("is-invalid");
                                }
                        
                            const fields = [
                                { input: "selectedHobbiesInput1", error: "interests-error" },
                                { input: "selectedHobbiesInput2", error: "hobbie-error" },
                                { input: "selectedTraitsInput", error: "trait-error" },
                                { input: "selectedActivitiesInput", error: "activity-error" },
                                { input: "selectedPersonalityInput", error: "personality-error" },
                            ];
                        
                                fields.forEach(({ input, error }) => {
                                    const inputEl = document.getElementById(input);
                                    const errorEl = document.getElementById(error);
                                    if (!inputEl.value.trim()) {
                                        errorEl.style.display = "block";
                                        isValid = false;
                                    } else {
                                        errorEl.style.display = "none";
                                    }
                                });
                            }
                        // step 2 vallidation of images
                          if (currentStep === 2) {
                                // Step 2 validation
                                const additionalImageInputs = [
                                    document.getElementById("file-ip-1"),
                                    document.getElementById("file-ip-2"),
                                    document.getElementById("file-ip-3"),
                                    document.getElementById("file-ip-4"),
                                    document.getElementById("file-ip-5"),
                                    document.getElementById("file-ip-6"),
                                ];
                        
                                const allImageSelected = additionalImageInputs.every(input => input && input.files.length > 0);
                                const additionalImageError = document.getElementById("additional-image-error");
                        
                                if (!allImageSelected) {
                                    additionalImageError.style.display = "block";
                                    additionalImageError.textContent = "Enhance your profile by uploading all your images";
                                    isValid = false;
                                } else {
                                    additionalImageError.style.display = "none";
                                }
                            }
                        
                            if (!isValid) return;
                        
                            // Move to next step
                            if (currentStep < totalSteps) {
                                currentStep++;
                                showStep(currentStep);
                            } else if (currentStep === totalSteps) {
                                modal.classList.add("show");
                            }
                        });
                   });
    if (modalCloseIcon) {
        modalCloseIcon.addEventListener("click", () => {
            modal.classList.remove("show");
        });
    }
    // window.addEventListener("click", function (event) {
    //     if (event.target === modal) {
    //         modal.classList.remove("show");
    //     }
    // });
   showStep(currentStep);
});
</script>
<!-- model opn close -->
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
<!--modal 1-->
<script>
  $(document).ready(function () {
    var selectedHobbies = [];

    // Handle selecting a hobby
    $('#interestModal1 .interest-btn').on('click', function () {
        var hobby = {
            id: $(this).data('id'),
            name: $(this).data('name'),
            image: $(this).data('image')
        };

        var index = selectedHobbies.findIndex(h => h.id === hobby.id);

        // If hobby is already selected, remove it
        if (index !== -1) {
            selectedHobbies.splice(index, 1);
            $(this).removeClass('selected');
        } else {
            // Otherwise, add to selected list
            selectedHobbies.push(hobby);
            $(this).addClass('selected');
        }
    });

    // Clear All Button
    $('#clearallBtn1').on('click', function () {
        selectedHobbies = [];
        $('.interest-btn').removeClass('selected');
        $('#interestDisplay1').empty();
        $('#selectedHobbiesInput1').val('');
    });
    

    // Save Button: Display selected hobbies
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
                        <img src="${hobby.image}" alt="${hobby.name}" style="width: 30px; height: 30px; object-fit: cover; border-radius: 50%;" />
                        <span>${hobby.name}</span>
                        <button type="button" class="remove-hobby">&times;</button>
                    </div>
                </div>
            `;
            $display.append(html);
        });

    $('#interestModal1').removeClass('show');


    });

    // Remove hobby from selection
    $('#interestDisplay1').on('click', '.remove-hobby', function () {
        var $parent = $(this).closest('.selected-hobby');
        var hobbyId = $parent.data('id');

        selectedHobbies = selectedHobbies.filter(function (hobby) {
            return hobby.id !== hobbyId;
        });

        // Remove the selected hobby from display
        $parent.remove();

        // Update the hidden input
        $('#selectedHobbiesInput1').val(selectedHobbies.map(function (hobby) {
            return hobby.id;
        }).join(','));

        // Unselect the button in modal
        $('.interest-btn[data-id="' + hobbyId + '"]').removeClass('selected');
    });
});
</script>
<!--modal 2-->
<script>
$(document).ready(function () {
    var selectedHobbies2 = [];


    // Handle selecting a hobby in Modal 2
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
    
    

    // Clear All Button for Modal 2
    $('#clearallBtn2').on('click', function () {
        selectedHobbies2 = [];
        $('#interestModal2 .interest-btn').removeClass('selected');
        $('#interestDisplay2').empty();
        $('#selectedHobbiesInput2').val('');
    });


    // Save Button for Modal 2: Display selected hobbies
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
                        <img src="${hobby.image}" alt="${hobby.name}" style="width: 30px; height: 30px; object-fit: cover; border-radius: 50%;" />
                        <span>${hobby.name}</span>
                        <button type="button" class=" remove-hobby">&times;</button>
                    </div>
                </div>
            `;
            $display.append(html);
        });

        $('#interestModal2').removeClass('show');
    });


    // Remove hobby from display
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
<!--modal 3-->
<script>
$(document).ready(function () {
    var selectedTraits = [];

    // Select trait in Modal 3
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

    // Clear All in Modal 3
    $('#clearallBtn3').on('click', function () {
        selectedTraits = [];
        $('#interestModal3 .interest-btn').removeClass('selected');
        $('#interestDisplay3').empty();
        $('#selectedTraitsInput').val('');
    });

    // Save Selection in Modal 3
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
                        <img src="${trait.image}" alt="${trait.name}" style="width: 30px; height: 30px; object-fit: cover; border-radius: 50%;" />
                        <span>${trait.name}</span>
                        <button type="button" class="delete-btn ms-2 remove-trait">&times;</button>
                    </div>
                </div>
            `;
            $display.append(html);
        });

        $('#interestModal3').removeClass('show');
    });

    // Remove trait
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
<!--modal 4-->
<script>
$(document).ready(function () {
    var selectedActivities = [];

    // Select activity in Modal 4
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

    // Clear All in Modal 4
    $('#clearallBtn4').on('click', function () {
        selectedActivities = [];
        $('#interestModal4 .interest-btn').removeClass('selected');
        $('#interestDisplay4').empty();
        $('#selectedActivitiesInput').val('');
    });

    // Save Selection in Modal 4
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
                        <img src="${activity.image}" alt="${activity.name}" style="width: 30px; height: 30px; object-fit: cover; border-radius: 50%;" />
                        <span>${activity.name}</span>
                        <button type="button" class="remove-activity">&times;</button>
                    </div>
                </div>
            `;
            $display.append(html);
        });

        $('#interestModal4').removeClass('show');
    });

    // Remove activity
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
<!--modal 5-->
<script>
$(document).ready(function () {
    var selectedPersonalities = [];

    // Select personality button toggle
    $('#interestModal5 .interest-btn').on('click', function () {
        var personality = {
            id: $(this).data('id'),
            name: $(this).data('name'),
            image: $(this).data('image')
        };

        var index = selectedPersonalities.findIndex(p => p.id === personality.id);

        if (index !== -1) {
            // Already selected — remove it
            selectedPersonalities.splice(index, 1);
            $(this).removeClass('selected');
        } else {
            // Add new selection
            selectedPersonalities.push(personality);
            $(this).addClass('selected');
        }
    });

    // Clear All selections
    $('#clearallBtn5').on('click', function () {
        selectedPersonalities = [];
        $('#interestModal5 .interest-btn').removeClass('selected');
        $('#interestDisplay5').empty();
        $('#selectedPersonalityInput').val('');
    });

    // Confirm Selection and display chosen personalities
    $('#saveInterestBtn5').on('click', function () {
        var $display = $('#interestDisplay5');
        $display.empty();

        var personalityIds = selectedPersonalities.map(p => p.id);
        $('#selectedPersonalityInput').val(personalityIds.join(',')); // Store IDs in hidden input

        selectedPersonalities.forEach(function (p) {
            var html = `
                <div class="selected-personality d-inline-block me-2 mb-2" data-id="${p.id}">
                    <div class="d-flex align-items-center p-1 border rounded" style="gap: 8px;">
                        <img src="${p.image}" alt="${p.name}" style="width: 30px; height: 30px; object-fit: cover; border-radius: 50%;" />
                        <span>${p.name}</span>
                        <button type="button" class="remove-personality">&times;</button>
                    </div>
                </div>
            `;
            $display.append(html);
        });

        $('#interestModal5').removeClass('show'); // Hide modal (you handle .show toggling)
    });

    // Remove individual personality from selection display
    $('#interestDisplay5').on('click', '.remove-personality', function () {
        var $parent = $(this).closest('.selected-personality');
        
        var idToRemove = $parent.data('id');

        selectedPersonalities = selectedPersonalities.filter(p => p.id !== idToRemove);

        $parent.remove();

        $('#selectedPersonalityInput').val(selectedPersonalities.map(p => p.id).join(','));

        $('#interestModal5 .interest-btn[data-id="' + idToRemove + '"]').removeClass('selected');
    });

    // Close modal button
    $('#closeInterestModal5').on('click', function () {
        $('#interestModal5').removeClass('show');
    });
});
</script>

<!--data to submit via ajax-->
<script>
document.addEventListener("DOMContentLoaded", function () {
    const submitBtn = document.getElementById("submitProfileFormBtn");
    const modal = document.getElementById("completionModal");
    const modalCloseBtn = document.getElementById("modalCloseBtn");
    const form = document.querySelector("form");
    const loader = document.getElementById("loader");
    
    
submitBtn.addEventListener("click", function (e) {
        e.preventDefault();
        // Step 3 validation
        let isValid = true;
        const idDocInput = document.getElementById("input-id-doc");
        const selfieInput = document.getElementById("input-selfie");
        const idDocError = document.getElementById("image-error1");
        const selfieError = document.getElementById("image-error2");

        // Validate ID Document
        if (!idDocInput.files || idDocInput.files.length === 0) {
            idDocError.style.display = "block";
            idDocError.textContent = "Please upload your ID document.";
            isValid = false;
        } else {
            idDocError.style.display = "none";
        }

        // Validate Selfie
        if (!selfieInput.files || selfieInput.files.length === 0) {
            selfieError.style.display = "block";
            selfieError.textContent = "Please upload a selfie holding your ID.";
            isValid = false;
        } else {
            selfieError.style.display = "none";
        }
        // Stop if not valid
        if (!isValid) return;
        
        // show loader
        loader.style.display = "flex";
        
        // Disable the submit button to prevent multiple submissions
        submitBtn.disabled = true;
    
        const formData = new FormData(form);

        fetch("{{ route('user.companion.complete') }}", {
            method: "POST",
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                throw new Error("Form submission failed.");
            }
            return response.json();
        })
        .then(data => {
            document.getElementById("userNameInModal").innerText = data.name;
            modal.classList.add("show");
        })
        .catch(error => {
            console.error("Submission error:", error);
            alert("Something went wrong. Please try again.");
        })
        .finally(()=>{
           loader.style.display="none";
           submitBtn.disabled = false;
        });
    });
});

</script>



<script>
function showPreview(event, key) {
    const input = event.target;
    const file = input.files[0];
    const previewId = typeof key === 'number' ? `file-ip-${key}-preview` : `preview-${key}`;
    const removeBtnSelector = typeof key === 'number' ? '.imgRemove' : '.img-remove-btn';

    const previewBox = document.getElementById(previewId);
    const removeBtn = input.closest('label').querySelector(removeBtnSelector);

    if (file && previewBox) {
        const src = URL.createObjectURL(file);
        previewBox.innerHTML = `<img src="${src}" alt="Preview" style="max-width: 100%; height: auto;" />`;
        if (removeBtn) {
            removeBtn.style.display = 'inline-block';
        }
    }
}

function removeImage(key) {
    const isNumber = typeof key === 'number' || !isNaN(parseInt(key));
    const previewId = isNumber ? `file-ip-${key}-preview` : `preview-${key}`;
    const inputId = isNumber ? `file-ip-${key}` : `input-${key}`;
    const removeBtnSelector = isNumber ? '.imgRemove' : '.img-remove-btn';

    const previewBox = document.getElementById(previewId);
    const input = document.getElementById(inputId);
    const removeBtn = input.closest('label').querySelector(removeBtnSelector);

    if (previewBox && input && removeBtn) {
        const defaultText = isNumber
            ? `<i class="fas fa-plus"></i><p>Upload</p>`
            : key === 'id-doc'
                ? `<i class="fas fa-plus"></i><p>Upload Your ID Document</p>`
                : `<i class="fas fa-plus"></i><p>Upload a Selfie Holding Your ID</p>`;

        previewBox.innerHTML = defaultText;
        input.value = '';
        removeBtn.style.display = 'none';
    }
}

function myImgRemove(key) {
    removeImage(key);
}
</script>
@endsection