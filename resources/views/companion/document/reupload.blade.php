@extends('template.layout.app')
@section('content')
           
             <div class="row w-100 m-0">
    <main class="col-md-10 offset-md-2 pt-5 mt-3 px-4">
            
                            <div class="d-flex align-items-center justify-content-between flex-wrap verification-reuploading">
                                <div class="d-flex align-items-center flex-wrap me-3 flex-grow-1">
                                    <h4 class="mb-0 editprofile-heding">
                                        Verification Documents
                                    </h4>
                                </div>
                            </div>
                             @include('alertmessage')
                            <div class="card verifyy-card">
                                <div class="row">
                                    <div class="fixed-verify">
                                        <div class="col-md-6">
                                            <div class="verfy-document">
                                                <div class="document-text">
                                                    <h2>Documents Uploaded</h2>
                                                    <p>Your identity was successfully verified during sign-up.<br>If
                                                        your
                                                        details have changed or need updating, you can upload new
                                                        documents
                                                        below.</p>
                                                </div>

                                          
                                            <form action="{{route('document.reuploadstore')}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                            <div class="text-center documents-input">
                                                    <label class="image-label">
                                                        <div class="preview-documentation" id="preview1">
                                                            <div class="plus-upload">
                                                                <i class="fas fa-plus"></i>
                                                                <p>Upload Your ID Document</p>
                                                            </div>
                                                        </div>
                                                        <input type="file" class="filein-hide" id="fileInput1"
                                                            accept="image/*" name="id_image" />
                                                        @if (Auth::user()->id_image)  
                                                        <img src="{{ asset('uploads/id_documents/' . Auth::user()->id_image) }}" width="200" height="100" alt="{{ Auth::user()->id_image }}">
                                                        @else
                                                        <img src="{{ asset('uploads/blankImage/blank.jpg') }}" 
                                                            width="200" height="100"
                                                             alt="blank.jpg">
                                                        @endif

                                                    </label>
                                            </div>
                                             @if($errors->has('id_image'))
                                                     <span class="text-danger">{{$errors->first('id_image')}}</span>
                                             @endif
                                            
                                                <p class="format-docs">Acceptable formats: Passport, Driver’s License,
                                                    National ID</p>
                                           
                                            <div class="text-center documents-input">
                                                    <label class="image-label">
                                                        <div class="preview-documentation" id="preview2">
                                                            <div class="plus-upload">
                                                                <i class="fas fa-plus"></i>
                                                                <p>Upload a Selfie Holding Your ID</p>
                                                            </div>
                                                        </div>
                                                        <input type="file" class="filein-hide" id="fileInput2"
                                                            accept="image/*" name="id_selfie_image" />
                                                        @if (Auth::User()->id_selfie_image)  
                                                        <img src="{{ asset('uploads/selfies/' . Auth::User()->id_selfie_image	) }}" width="200" height="100" alt="{{ Auth::User()->id_selfie_image}}"> 
                                                        @else
                                                        <img src="{{ asset('uploads/blankImage/blank.jpg') }}" 
                                                             width="200" height="100" 
                                                             alt="blank.jpg">
                                                        @endif
                                                    </label>
                                            </div>
                                            @if($errors->has('id_selfie_image'))
                                                     <span class="text-danger">{{$errors->first('id_selfie_image')}}</span>
                                            @endif
                                                <p class="format-docs">Hold your ID next to your face, make sure both
                                                    are clearly visible</p>
                                              
                                            </div>
                                         
                                            <div class="text-center submit-document" >
                                                <button type="submit" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#successModal">
                                                    Submit
                                                </button>
                                            </div>
                                    </form>
                                </div>
                                </main>
                            </div>
                            
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
 
   <script>
       function setupPreview(inputId, previewId, labelText) {
    const $input = $('#' + inputId);
    const $preview = $('#' + previewId);

    // Ensure elements exist
    if (!$input.length || !$preview.length) {
        console.error(`Elements not found: inputId=${inputId}, previewId=${previewId}`);
        return;
    }

    // Trigger file input click
    $preview.off('click').on('click', function (e) {
        e.preventDefault();
        e.stopPropagation();
        console.log('Preview clicked, triggering file input:', inputId);
        $input.click();
    });

    // Handle file selection
    $input.off('change').on('change', function () {
        const file = this.files[0];
        console.log('File selected:', file);
        if (file) {
            // Validate file type (optional)
            if (!file.type.startsWith('image/')) {
                console.error('Selected file is not an image:', file.type);
                alert('Please select an image file.');
                return;
            }
            const reader = new FileReader();
            reader.onload = function (e) {
                console.log('FileReader loaded:', e.target.result);
                $preview.html(`
                    <img src="${e.target.result}" alt="Preview" style="max-width: 100%; height: auto;" />
                    <button class="remove-btn" type="button">×</button>
                `);
            };
            reader.onerror = function (e) {
                console.error('FileReader error:', e);
            };
            reader.readAsDataURL(file);
        } else {
            console.log('No file selected');
        }
    });

    // Handle remove button click
    $preview.off('click', '.remove-btn').on('click', '.remove-btn', function (e) {
        e.stopPropagation();
        console.log('Remove button clicked, resetting input:', inputId);
        $input.val('');
        $preview.html(`
            <div class="plus-upload">
                <i class="fas fa-plus"></i>
                <p>${labelText}</p>
            </div>
        `);
    });
}

$(document).ready(function () {
    console.log('Document ready, setting up previews');
    setupPreview('fileInput1', 'preview1', 'Upload Your ID Document');
    setupPreview('fileInput2', 'preview2', 'Upload a Selfie Holding Your ID');
});
   </script>
@endsection