@extends('template.layout.app') 
@section('content') 
<style>
    .selected {
        background-color: blue !important;
        color: white !important;
    }
    
    .unselected {
        background-color: #fff !important;
        color: black !important;
    }
    
    .fade:not(.show) {
        /*opacity 1; */
    }
</style>
<style>
    .photo-upload-box {
        position: relative;
        cursor: pointer;
        width: 100%;
        height: 200px; /* Or your specific height */
        border: 2px dashed #ccc;
        border-radius: 8px;
        display: flex;
        justify-content: center;
        align-items: center;
        overflow: hidden;
    }
    
    .upload-overlay {
        position: absolute;
        z-index: 2;
        color: white;
        text-align: center;
        background: rgba(0, 0, 0, 0);
        padding: 8px;
        border-radius: 5px;
    }
    
    .preview-imageprofile {
        width: 100%;
        height: 100%;
        object-fit: cover;
        position: absolute;
    }
    
    .remove-btn {
        position: absolute;
        top: 5px;
        right: 5px;
        background-color: red;
        color: white;
        border: none;
        border-radius: 50%;
        width: 30px;
        height: 30px;
        display: none;
    }
</style>
<!--<div class="col-md-12">-->


     @include('alertmessage')

      
           
                 <div class="row w-100 m-0">
                   <main class="col-md-10 offset-md-2 px-4">
                    <div class="d-flex align-items-center profileedit-content flex-wrap">
                        <div class="d-flex align-items-center me-3"> <a href="{{route('associatedashboard')}}" class="btn btnarrow-link me-2"> <i class="fas fa-arrow-left"></i> </a>
                            <h4 class="mb-0 editprofile-heding">Edit Profile</h4>
                           
                        </div>
                        <div class="home-profiletab">
                            <!--<ul class="nav nav-pills tabin-profile" id="pills-tab" role="tablist">-->
                            <!--    <li class="nav-item" role="presentation"> <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true"> Personal Info </button> </li>-->
                            <!--    <li class="nav-item" role="presentation"> <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false"> Photos </button> </li>-->
                            <!--</ul>-->
                        </div>
                    </div>
                    
                          <div id="saveMessage" class="mb-1"></div>
                    
                    <form id="profileform" enctype="multipart/form-data"> @csrf <div class="tab-content" id="pills-tabContent">
                            <!-- Home Tab -->
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                                <div class="profile-card">
                                    <!-- Profile Photo Section -->
                                    <div class="mb-4 d-flex align-items-center">
                                        <div class="profile-photo me-3"> <img id="profilePreview" src="{{asset('uploads/profile/'.Auth::User()->profile_picture)}}" class="imgprofile-prev rounded-circle" value=width="20"> </div>
                                        <div> <input type="file" id="profileInput" name="profile_image" style="display: none;">
                                            <h4 class="photo-txtprofile">Profile Photo</h4> <a href="#" class="chnge-img" id="changePhoto">Change</a>
                                        </div>
                                    </div> <!-- User Information Section -->
                                    <div class="row mb-3">
                                        <div class="col-md-6"> <label class="form-label nameform">Full Name</label> <input type="text" class="form-control formfield" name="name" value="{{ old('name', $user->name) }}" placeholder=""> </div>
                                        <div class="col-md-6"> <label class="form-label nameform">Email</label> <input type="email" class="form-control formfield" name="email" value="{{ old('email', $user->email) }}" placeholder=""> </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6"> <label class="form-label nameform">Username</label> <input type="text" class="form-control formfield" name="user_name" value="{{ old('username', $user->user_name) }}" placeholder=""> </div>
                                        <div class="col-md-6">
                                            <div class="mb-3"> <label class="form-label nameform">Birthday:</label>
                                                <div class="row g-2">
                                                    <div class="col-4"> <select id="birthDay" name="day" class="form-select custom-select">
                                                            <option disabled selected>Day</option> @for ($i = 1; $i <= 31; $i++) <option value="{{ $i }}" {{
                                                                old('day', $day)==$i ? 'selected' : '' }}>{{ $i }} </option> @endfor
                                                        </select> </div> @php $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']; $selectedMonthName = ucfirst(strtolower(old('month', $user->month ?? ''))); $selectedMonthIndex = array_search($selectedMonthName, $months); @endphp <div class="col-4"> <select id="birthMonth" name="month" class="form-select custom-select">
                                                            <option disabled>Month</option> @foreach ($months as $index => $month) <option value="{{ $index + 1 }}" {{
                                                                $selectedMonthIndex===$index ? 'selected' : '' }}> {{ $month }} </option> @endforeach
                                                        </select> </div>
                                                    <div class="col-4"> <select id="birthYear" name="year" class="form-select custom-select">
                                                            <option disabled selected>Year</option> @for ($i = 1900; $i <= date('Y'); $i++) <option value="{{ $i }}" {{ old('year', $year)==$i ? 'selected'
                                                                : '' }}>{{ $i }}</option> @endfor
                                                        </select> </div>
                                                </div>
                                            </div>
                                        </div>
                                       
                                        <div class="row">
                                            <div class="col-md-6">
                                                <!-- Interests Section -->
                                                <div class="section-box">
                                                    <div class="section-header d-flex justify-content-between align-items-center mb-2"> <strong>Interests</strong> <button class="open-modal-btn" type="button" data-bs-toggle="modal" data-bs-target="#interestModal"> <i class="fas fa-plus"></i> </button> </div> <!-- Selected Interests -->
                                                    <ul id="model-interest" class="tags list-unstyled d-flex flex-wrap gap-2 interest-tags"> @foreach($hobbies as $hobbie) <li class="tag-item"> <span><img src="{{ asset('uploads/hobbies/'.$hobbie->image) }}" width="20"></span> {{ ucfirst($hobbie->hobbie) }} <span class="remove-tag" onclick="removeTag('{{ $hobbie->id }}')"><i class="fas fa-times"></i></span> </li> @endforeach </ul> <!-- Hidden Input for Form --> <input type="hidden" name="selected_hobbies" id="selectedHobbiesInput" value="{{ $user->hobbie }}">
                                                </div> @php $selectedHobbyIds = explode(',', $user->hobbie ?? ''); @endphp
                                               
                                                <!-- Interests Modal -->
                                                <div class="modal fade" id="interestModal" tabindex="-1" aria-labelledby="interestModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                                        <div class="modal-content inmodel-assoiate">
                                                            <div class="modal-header border-0">
                                                                <h5 class="modal-title" id="interestModalLabel">Select Interests</h5> <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row"> @foreach($data as $data1) @php $isSelected = in_array($data1->id, $selectedHobbyIds); @endphp <div class="modal-buttons interest-buttons"> <button type="button" class="interest-button {{ $isSelected ? 'selected' : 'unselected' }}" data-id="{{ $data1->id }}" data-name="{{ $data1->hobbie }}" data-image="{{ asset('uploads/hobbies/'.$data1->image) }}" onclick="toggleHobby(this)"> <img src="{{ asset('uploads/hobbies/'.$data1->image) }}" alt="{{ $data1->hobbie }}" width="20px"> {{ $data1->hobbie }} </button> </div> @endforeach </div>
                                                            </div>
                                                            <div class="modal-footer border-0 justify-content-center">
                                                                 <button type="button" class="clearall-btn" onclick="clearhobbie()" >Clear All 
                                                                 </button> 
                                                                 <button type="button" class="confirmm-selectbtn" onclick="confirmSelection()">Confirm</button> </div>
                                                        </div>
                                                    </div>
                                                </div>
                                               
                                            </div>
                                            <!--additional Hobbies-->
                                            <div class="col-md-6">
                                                <div class="section-box">
                                                    <div class="section-header d-flex justify-content-between align-items-center mb-2"> <strong>Hobbies</strong> <button class="open-modal-btn" type="button" data-bs-toggle="modal" data-bs-target="#additionalHobbyModal"> <i class="fas fa-plus"></i> </button> </div>
                                                    <ul id="model-hobby" class="tags list-unstyled d-flex flex-wrap gap-2 hobby-tags"> @foreach($additionalhobbie as $hobbie) <li class="tag-item"> <span><img src="{{ asset('uploads/additional_hobbies/'.$hobbie->image) }}" width="20"></span> {{ ucfirst($hobbie->additional_hobbie) }} <span class="remove-tag" onclick="removeTag('{{ $hobbie->id }}')"><i class="fas fa-times"></i></span> </li> @endforeach </ul>
                                                </div>
                                            </div> <!-- Hidden Input for Form --> <input type="hidden" name="additional_hobbie" id="additionalHobbieInput" value="{{ $user->additional_hobbie }}"> @php $additionalHobbyIds = explode(',', $user->additional_hobbie ?? ''); @endphp
                                            <!-- Additional Hobbies Modal -->
                                            <div class="modal fade" id="additionalHobbyModal" tabindex="-1" aria-labelledby="additionalHobbyModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header border-0">
                                                            <h5 class="modal-title" id="additionalHobbyModalLabel"> Select Additional Hobbies</h5> <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row"> @foreach($data2 as $data) @php $isSelected = in_array($data->id, $additionalHobbyIds); @endphp <div class="modal-buttons interest-buttons"> <button type="button" class="hobby-button {{ $isSelected ? 'selected' : 'unselected' }}" data-id="{{ $data->id }}" data-name="{{ $data->additional_hobbie }}" data-image="{{ asset('uploads/additional_hobbies/' . $data->image) }}" onclick="toggleAdditionalHobby(this)"> <img src="{{ asset('uploads/additional_hobbies/'.$data->image) }}" width="20"> {{ $data->additional_hobbie }} </button> </div> @endforeach </div>
                                                        </div>
                                                        <div class="modal-footer border-0 mt-3 justify-content-center"> <button type="button" class="clearall-btn" onclick="clearAlladditional()">Clear All</button> <button type="button" class="confirmm-selectbtn" onclick="confirmAdditionalHobbySelection()">Confirm</button> </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--personal traits-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="section-box">
                                                    <div class="section-header d-flex justify-content-between align-items-center mb-2"> <strong>Personal Traits</strong> <button class="open-modal-btn" type="button" data-bs-toggle="modal" data-bs-target="#traitModal "> <i class="fas fa-plus"></i> </button> </div>
                                                    <ul id="model-trait" class="tags list-unstyled d-flex flex-wrap gap-2 interest-tags"> @foreach($traits as $trait) <li class="tag-item d-flex align-items-center gap-1 bg-light px-2 py-1"> <span><img src="{{asset('uploads/personaltrait/'.$trait->image)}}" width="20" /></span> {{ ucfirst($trait->personal_trait) }} <span class="remove-tag ms-2" style="cursor: pointer"><i class="fas fa-times"></i></span> </li> @endforeach </ul>
                                                </div>
                                            </div> <!-- Hidden Input for Form --> <input type="hidden" name="traits" id="personal_traits" value="{{ $user->personal_trait }}"> @php $personaltraitIds = explode(',', $user->personal_trait ?? ''); @endphp
                                            <!-- Personal Traits Modal -->
                                            <div class="modal fade" id="traitModal" tabindex="-1" aria-labelledby="traitModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header border-0">
                                                            <h5 class="modal-title" id="traitModalLabel">Select Personal Traits</h5> <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row"> @foreach($data3 as $data) @php $isSelected = in_array($data->id, $personaltraitIds); @endphp <div class="modal-buttons trait-buttons"> <button type="button" class="trait-button {{ $isSelected ? 'selected' : 'unselected' }}" data-id="{{ $data->id }}" data-name="{{ $data->personal_trait }}" data-image="{{ asset('uploads/personaltrait/'. $data->image) }}" onclick="toggleTrait(this)"> <img src="{{ asset('uploads/personaltrait/'. $data->image) }}" width="20"> {{ $data->personal_trait }} </button> </div> @endforeach </div>
                                                        </div>
                                                        <div class="modal-footer border-0 mt-3 justify-content-center"> <button type="button" class="clearall-btn" id="clear-traits-btn" onclick="clearAllTraits()">Clear All</button> <button type="button" class="confirmm-selectbtn" id="confirm-traits-btn" onclick="confirmTraitSelection()">Confirm</button> </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--Activity-->
                                            <div class="col-md-6">
                                                <div class="section-box">
                                                    <div class="section-header d-flex justify-content-between align-items-center mb-2"> <strong>Favorite Activities</strong> <button class="open-modal-btn" type="button" data-bs-toggle="modal" data-bs-target="#activityModal "> <i class="fas fa-plus"></i> </button> </div>
                                                    <ul id="model-activity" class="tags list-unstyled d-flex flex-wrap gap-2 interest-tags"> @foreach($activity as $hobbie) <li <span><img src="{{asset('uploads/activity/'.$hobbie->image)}}" width="20" /></span> {{ ucfirst($hobbie->activity)}} <span class="remove-tag ms-2" onclick="removeTag('{{ $hobbie->id }}')" style="cursor: pointer"><i class="fas fa-times"></i> </span> </li> @endforeach </ul>
                                                </div>
                                            </div>
                                        </div> <!-- Hidden Input for Form --> <input type="hidden" name="activitie" id="activities" value="{{ $user->activitie }}"> @php $activityIds = explode(',', $user->activitie ?? ''); @endphp
                                        <!-- Favorite Activities Modal -->
                                        <div class="modal fade" id="activityModal" tabindex="-1" aria-labelledby="activityModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header border-0">
                                                        <h5 class="modal-title" id="activityModalLabel">Select Favorite Activities</h5> <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row"> @foreach($data4 as $data_4) @php $isSelected = in_array($data_4->id, $activityIds); @endphp <div class="modal-buttons activity-buttons"> <button type="button" class="activity-button {{ $isSelected ? 'selected' : 'unselected' }}" data-id="{{ $data_4->id }}" data-name="{{ $data_4->activity }}" data-image="{{ asset('uploads/activity/' . $data_4->image) }}" onclick="toggleActivity(this)"> <img src="{{ asset('uploads/activity/' . $data_4->image) }}" width="20"> {{ $data_4->activity }} </button> </div> @endforeach </div>
                                                    </div>
                                                    <div class="modal-footer border-0 justify-content-center"> <button type="button" class="clearall-btn" onclick="clearAllActivities()">Clear All</button> <button type="button" class="confirmm-selectbtn" onclick="confirmActivitySelection()">Confirm</button> </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-start"> <button type="submit" class="btn-savechnge mt-3" id="saveProfileBtn">Save the Change</button> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            </form>
        </div>
        </main>

@endsection

@section('script')

<script>
        let selectedHobbyIds = [];
    
        // Initialize on DOM ready
        document.addEventListener("DOMContentLoaded", function () {
            const initialValues = document.getElementById('selectedHobbiesInput').value;
            if (initialValues) {
                selectedHobbyIds = initialValues.split(',');
            }
    
            // Highlight selected buttons
            selectedHobbyIds.forEach(id => {
                const btn = document.querySelector(`.interest-button[data-id="${id}"]`);
                if (btn) {
                    btn.classList.add('selected');
                    btn.classList.remove('unselected');
                }
            });
    
            // Render tags on load
            renderHobbyTags();
        });
    
        // Toggle button state
        function toggleHobby(button) {
            const id = button.getAttribute('data-id');
    
            if (selectedHobbyIds.includes(id)) {
                selectedHobbyIds = selectedHobbyIds.filter(hid => hid !== id);
                button.classList.remove('selected');
                button.classList.add('unselected');
            } else {
                selectedHobbyIds.push(id);
                button.classList.add('selected');
                button.classList.remove('unselected');
            }
        }
    
        // Confirm selected hobbies
        function confirmSelection() {
            document.getElementById('selectedHobbiesInput').value = selectedHobbyIds.join(',');
            renderHobbyTags();
    
            const modal = bootstrap.Modal.getInstance(document.getElementById('interestModal'));
            modal.hide();
        }
    
        // Clear all selections
        function clearhobbie() {
            selectedHobbyIds = [];
            document.querySelectorAll('.interest-button').forEach(btn => {
                btn.classList.remove('selected');
                btn.classList.add('unselected');
            });
            document.getElementById('selectedHobbiesInput').value = '';
            renderHobbyTags();
        }
    
        // Render selected hobbies as tags
        function renderHobbyTags() {
            const container = document.getElementById('model-interest');
            container.innerHTML = '';
    
            selectedHobbyIds.forEach(id => {
                const btn = document.querySelector(`.interest-button[data-id="${id}"]`);
                if (btn) {
                    const name = btn.getAttribute('data-name');
                    const image = btn.getAttribute('data-image');
    
                    const tagHTML = `
                        <li class="tag-item">
                            <span><img src="${image}" width="20"></span>
                            ${name}
                            <span class="remove-tag" onclick="removeHobbyTag('${id}')"><i class="fas fa-times"></i></span>
                        </li>
                    `;
                    container.insertAdjacentHTML('beforeend', tagHTML);
                }
            });
        }
    
        // Remove tag from list
        function removeHobbyTag(id) {
            selectedHobbyIds = selectedHobbyIds.filter(hid => hid !== id);
    
            const btn = document.querySelector(`.interest-button[data-id="${id}"]`);
            if (btn) {
                btn.classList.remove('selected');
                btn.classList.add('unselected');
            }
    
            document.getElementById('selectedHobbiesInput').value = selectedHobbyIds.join(',');
            renderHobbyTags();
        }
    </script>
    
<script>
    let selectedAdditionalHobbyIds = [];
    
    // Initialize with existing selected values
    document.addEventListener("DOMContentLoaded", function () {
        const initialValues = document.getElementById('additionalHobbieInput').value;
        if (initialValues) {
            selectedAdditionalHobbyIds = initialValues.split(',');
        }
    
        // Highlight pre-selected buttons
        selectedAdditionalHobbyIds.forEach(id => {
            const btn = document.querySelector(`.hobby-button[data-id="${id}"]`);
            if (btn) {
                btn.classList.add('selected');
                btn.classList.remove('unselected');
            }
        });
    
        // Render tags initially
        renderAdditionalHobbyTags();
    });
    
    // Toggle button selection
    function toggleAdditionalHobby(button) {
        const id = button.getAttribute('data-id');
        const name = button.getAttribute('data-name');
        const image = button.getAttribute('data-image');
    
        if (selectedAdditionalHobbyIds.includes(id)) {
            selectedAdditionalHobbyIds = selectedAdditionalHobbyIds.filter(i => i !== id);
            button.classList.remove('selected');
            button.classList.add('unselected');
        } else {
            selectedAdditionalHobbyIds.push(id);
            button.classList.add('selected');
            button.classList.remove('unselected');
        }
    }
    
    // Confirm button click - save to hidden input & render tags
    function confirmAdditionalHobbySelection() {
        document.getElementById('additionalHobbieInput').value = selectedAdditionalHobbyIds.join(',');
        renderAdditionalHobbyTags();
        const modal = bootstrap.Modal.getInstance(document.getElementById('additionalHobbyModal'));
        modal.hide();
    }
    
    // Clear all selections
    function clearAlladditional() {
        selectedAdditionalHobbyIds = [];
        document.querySelectorAll('.hobby-button').forEach(btn => {
            btn.classList.remove('selected');
            btn.classList.add('unselected');
        });
        document.getElementById('additionalHobbieInput').value = '';
        renderAdditionalHobbyTags();
    }
    
    // Render selected hobbies as tags
    function renderAdditionalHobbyTags() {
        const container = document.getElementById('model-hobby');
        container.innerHTML = '';
    
        selectedAdditionalHobbyIds.forEach(id => {
            const btn = document.querySelector(`.hobby-button[data-id="${id}"]`);
            const name = btn.getAttribute('data-name');
            const image = btn.getAttribute('data-image');
    
            const tagHTML = `
                <li class="tag-item">
                    <span><img src="${image}"class="icon-dashbord"></span>
                    ${name}
                    <span class="remove-tag" onclick="removeTag('${id}')"><i class="fas fa-times"></i></span>
                </li>
            `;
            container.insertAdjacentHTML('beforeend', tagHTML);
        });
    }
    
    // Remove a single tag
    function removeTag(id) {
        selectedAdditionalHobbyIds = selectedAdditionalHobbyIds.filter(i => i !== id);
        const btn = document.querySelector(`.hobby-button[data-id="${id}"]`);
        if (btn) {
            btn.classList.remove('selected');
            btn.classList.add('unselected');
        }
        document.getElementById('additionalHobbieInput').value = selectedAdditionalHobbyIds.join(',');
        renderAdditionalHobbyTags();
    }
</script>

<script>
    let selectedTraits = [];
    
    $(document).ready(function () {
        // Load initial selected traits from hidden input
        const initialTraits = $('#personal_traits').val();
        if (initialTraits) {
            selectedTraits = initialTraits.split(',').map(function (id) {
                const $btn = $('.trait-button[data-id="' + id + '"]');
                if ($btn.length) {
                    $btn.addClass('selected');
                    return {
                        id: $btn.data('id'),
                        name: $btn.data('name'),
                        image: $btn.data('image')
                    };
                }
            }).filter(Boolean);
        }
    
        // Toggle trait button
        $(document).on('click', '.trait-button', function () {
            const $btn = $(this);
            const id = $btn.data('id');
            const name = $btn.data('name');
            const image = $btn.data('image');
    
            const exists = selectedTraits.find(t => t.id == id);
    
            if (exists) {
                selectedTraits = selectedTraits.filter(t => t.id != id);
                $btn.removeClass('selected');
            } else {
                selectedTraits.push({ id, name, image });
                $btn.addClass('selected');
            }
        });
    
        // // Confirm selected traits
        // $(document).on('click', '#confirm-traits-btn', function () {
        //     confirmTraitSelection();
        // });
    
        // // Clear all traits
        // $(document).on('click', '#clear-traits-btn', function () {
        //     clearAllTraits();
        // });
    
        // Initial render
        renderTraitTags();
    });
    
    function confirmTraitSelection() {
        renderTraitTags();
        $('#personal_traits').val(selectedTraits.map(t => t.id).join(','));
        const modal = bootstrap.Modal.getInstance(document.getElementById('traitModal'));
        modal.hide();
    }
    
    function renderTraitTags() {
        const $list = $('#model-trait');
        $list.empty();
    
        selectedTraits.forEach(function (trait) {
            $list.append(`
        <li class="tag-item">
          <span><img src="${trait.image}" class="icon-dashbord" /></span> ${trait.name}
          <span class="remove-tag ms-2" style="cursor: pointer;" onclick="removeTrait('${trait.id}')">
            <i class="fas fa-times"></i>
          </span>
        </li>
      `);
        });
    }
    
    function removeTrait(id) {
        selectedTraits = selectedTraits.filter(t => t.id != id);
    
        $('.trait-button').each(function () {
            if ($(this).data('id') == id) {
                $(this).removeClass('selected');
            }
        });
    
        renderTraitTags();
        $('#personal_traits').val(selectedTraits.map(t => t.id).join(','));
    }
    
    function clearAllTraits() {
        selectedTraits = [];
        $('.trait-button').removeClass('selected');
        $('#model-trait').empty();
        $('#personal_traits').val('');
    }
</script>

<script>
    let selectedActivities = [];
    
    $(document).ready(function () {
        // Load initial selected activities from hidden input
        const initialActivities = $('#activities').val();
        if (initialActivities) {
            selectedActivities = initialActivities.split(',').map(function (id) {
                const $btn = $('.activity-button[data-id="' + id + '"]');
                if ($btn.length) {
                    $btn.addClass('selected');
                    return {
                        id: $btn.data('id'),
                        name: $btn.data('name'),
                        image: $btn.data('image')
                    };
                }
            }).filter(Boolean);
        }
    
        // Toggle activity selection
        $(document).on('click', '.activity-button', function () {
            const $btn = $(this);
            const id = $btn.data('id');
            const name = $btn.data('name');
            const image = $btn.data('image');
    
            const exists = selectedActivities.find(act => act.id == id);
    
            if (exists) {
                selectedActivities = selectedActivities.filter(act => act.id != id);
                $btn.removeClass('selected');
            } else {
                selectedActivities.push({ id, name, image });
                $btn.addClass('selected');
            }
        });
    
        // // Confirm button
        // $(document).on('click', '.confirmm-selectbtn', function () {
        //     confirmActivitySelection();
        // });
    
        // // Clear All
        // $(document).on('click', '.clearall-btn', function () {
        //     clearAllActivities();
        // });
    
        // Initial render
        renderActivityTags();
    });
    
    function confirmActivitySelection() {
        renderActivityTags();
        $('#activities').val(selectedActivities.map(act => act.id).join(','));
        const modal = bootstrap.Modal.getInstance(document.getElementById('activityModal'));
        modal.hide();
    }
    
    function renderActivityTags() {
        const $list = $('#model-activity');
        $list.empty();
    
        selectedActivities.forEach(function (activity) {
            $list.append(`
                <li class="tag-item">
                    <span><img src="${activity.image}"class="icon-dashbord" /></span> ${activity.name}
                    <span class="remove-tag ms-2" style="cursor:pointer;" onclick="removeActivity('${activity.id}')">
                        <i class="fas fa-times"></i>
                    </span>
                </li>
            `);
        });
    }
    
    function removeActivity(id) {
        selectedActivities = selectedActivities.filter(act => act.id != id);
    
        $('.activity-button').each(function () {
            if ($(this).data('id') == id) {
                $(this).removeClass('selected');
            }
        });
    
        renderActivityTags();
        $('#activities').val(selectedActivities.map(act => act.id).join(','));
    }
    
    function clearAllActivities() {
        selectedActivities = [];
        $('.activity-button').removeClass('selected');
        $('#model-activity').empty();
        $('#activities').val('');
    }
</script>
<!--ajax-->
<script>
    $(document).ready(function () {
        $('#saveProfileBtn').click(function (e) {
            e.preventDefault();
    
    
            let formData = new FormData($('#profileform')[0]);
    
            $.ajax({
                url: '{{ route("Storeassociate") }}',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
    
                    $('#saveMessage').html('<div class="alert alert-success">Profile updated successfully!</div>');
                    // Optionally hide it after 3 seconds
                    setTimeout(() => {
                        $('#saveMessage').fadeOut();
                    }, 1000);
                },
                error: function (xhr) {
    
                    $('#saveMessage').html('<div class="alert alert-danger">Something went wrong. Please try again.</div>');
                }
            });
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.getElementById('changePhoto').addEventListener('click', function (e) {
            e.preventDefault();
            document.getElementById('profileInput').click();
        });
    
        document.getElementById('profileInput').addEventListener('change', function (e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (event) {
                    document.getElementById('profilePreview').src = event.target.result;
                }
                reader.readAsDataURL(file);
            }
        });
    });
</script>

<script>
    function previewImage(event, index) {
        const reader = new FileReader();
        reader.onload = function () {
            const img = document.getElementById('preview' + index);
            img.src = reader.result; // Display new image
        };
        reader.readAsDataURL(event.target.files[0]);
    }
    
    function removeImage(index) {
        document.getElementById('preview' + index).src = "";  // Clear the preview
        document.getElementById('fileInput' + index).value = null;  // Reset the input field
    }
</script>

@endsection