@extends('template.layout.app')
@section('content')
@include('alertmessage')
<div class="row w-100 m-0">
    <main class="col-md-10 offset-md-2 px-4">
                             <div  class="d-flex align-items-center justify-content-between flex-wrap verification-heding">
                                <div class="d-flex align-items-center flex-wrap me-3 flex-grow-1">
                                     <h4 class="mb-0 editprofile-heding">
                                        Verification Documents
                                    </h4>
                                 </div>
                            </div>
                        
                            @if(Auth::User()->doc_status == 1)
                             <div class="card verifyy-progress">
                                <div class="row">
                                    <div class="fixed-verify">
                                        <div class="col-md-6">
                                            <div class="verify-progresssvar">
                                                <div class="document-text">
                                                    <div class="text-center mb-2">
                                                        <img src="{{asset('assests/images/verifydocument.svg')}}" alt="">
                                                    </div>
                                                    <h2>Your documents have been successfully verified.</h2>
                                                    <p>Our team has reviewed and approved your submitted ID and details.
                                                        You are now a verified Companion on Amathyst.</p>
                                                </div>
                                             </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            @endif
                            @if(Auth::User()->doc_status == 2)
                               <div class="card verifyy-progress">
                                <div class="row">
                                    <div class="fixed-verify">
                                        <div class="col-md-6">
                                            <div class="verify-progresssvar">
                                                <div class="document-text">
                                                    <div class="text-center mb-2">
                                                        <img src="{{asset('assests/images/reuploadimg.svg')}}" alt="">
                                                    </div>
                                                    <h2>Document Verification Failed!</h2>
                                                    <p>Your submitted documents could not be verified.  Please re-upload
                                                        a clear photo of
                                                        your valid government-issued ID.</p>
                                                    <div class="text-center reupload-button">
                                                        <a href="{{route('document.reupload')}}" >
                                                            <button type="button" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                                                                Re-Upload Document
                                                            </button>
                                                        </a>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                             @endif
                             
                             @if(Auth::User()->doc_status == 0) 
                               <div class="card verificationis-in ">
                                <div class="row">
                                    <div class="fixed-verify">
                                        <div class="col-md-6">
                                            <div class="verify-progresssvar">
                                                <div class="document-text">
                                                    <div class="text-center mb-2">
                                                        <img src="{{asset('assests/images/progressverify.svg')}}" alt="">
                                                    </div>
                                                    <h2>Verification is in Progress</h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </main>
                             @endif
                        </div>
@endsection
@section('script')
    <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>-->
    <script>
        const sidebarLinks = document.querySelectorAll(".sidebar .nav-link");

        sidebarLinks.forEach((link) => {
            const img = link.querySelector("img.sidebar-icon");
            if (!img) return;

            const defaultSrc = img.getAttribute("data-default");
            const hoverSrc = img.getAttribute("data-hover");
            const href = link.getAttribute("href");

            if (localStorage.getItem("activeSidebar") === href) {
                link.classList.add("active");
                img.src = hoverSrc;
            }

          
            link.addEventListener("mouseenter", () => {
                img.src = hoverSrc;
            });

            link.addEventListener("mouseleave", () => {
                if (!link.classList.contains("active")) {
                    img.src = defaultSrc;
                }
            });

        
            link.addEventListener("click", (e) => {
                localStorage.setItem("activeSidebar", href);
              
            });
        });
    </script>
    <script>
        function setupPreview(inputId, previewId, labelText) {
            $('#' + previewId).on('click', function () {
                $('#' + inputId).click();
            });

            $('#' + inputId).on('change', function () {
                const file = this.files[0];
                const previewBox = $('#' + previewId);

                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        previewBox.html(`
                  <img src="${e.target.result}" alt="Preview" style="max-width: 100%; height: auto;" />
                  <button class="remove-btn" type="button">&times;</button>
                `);
                    };
                    reader.readAsDataURL(file);
                }
            });

           
            $('#' + previewId).on('click', '.remove-btn', function (e) {
                e.stopPropagation();
                $('#' + inputId).val('');
                $('#' + previewId).html(`
              <div class="plus-upload">
                <i class="fas fa-plus"></i>
                <p>${labelText}</p>
              </div>
            `);
            });
        }

        $(document).ready(function () {
            setupPreview('fileInput1', 'preview1', 'Upload Your ID Document');
            setupPreview('fileInput2', 'preview2', 'Upload a Selfie Holding Your ID');
        });
    </script>
  @endsection