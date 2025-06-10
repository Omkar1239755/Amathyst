@extends('webtemplate.layouts.layout')
@section('content')
 <style>
section.view-profile.blurred-section {
    filter: blur(12px);
}

.login-modal {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 14;
    background: white;
    padding: 2rem;
    border-radius: 10px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.6);
    max-width: 630px;
    width: 100%;
    height: 415px;
}

.login-modal-content h4 {
    font-size: 30px;
    color: rgba(26, 14, 37, 1);
    font-weight: 500;
    font-family: 'Poppins';
}
.login-modal-content p {
   font-size: 17px;
    color: rgba(26, 14, 37, 1);
    font-weight: 500;
    font-family: 'Poppins';
}
.viewimg {
    width: 165px;
    height: 180px;
    object-fit: cover;
    padding-bottom: 13px;
}
 </style>
@if(Auth::guest())
    {{-- Modal and overlay --}}
    <div class="blur-overlay"></div>
    <div class="login-modal">
        <div class="login-modal-content text-center">
              <img src="https://work.mobidudes.in/OM/Amathyst/public/assests/images/loginaindex.svg" class="viewimg" alt="img" />
           <h4 class="mb-3">Log In to View Companion Details</h4>
            <p class="mb-3">You must be logged in to view the full profile details of this Companion.</p>
            <a href="{{ route('login') }}" style="background-color: #5f42a9; color:#FFF; padding: 10px 100px; border: none; border-radius: 12px; text-decoration: none; display: inline-block;font-size:14px;font-weight: 500;">
                Go to Login
            </a>
        </div>
    </div>
@endif


<section class="view-profile {{ Auth::guest() ? 'blurred-section' : '' }}" >
<div class="container-fluid mt-4">
<div class="row">
<div class="col-md-3 mb-4 mt-4">
<div class="filter-box">
<form action="{{route('home.companion')}}" method="POST" autocomplete="off">
              @csrf
<div class="byname-search mb-3">
<h4 class="text-center" >Search</h4>
<div class="search-wrapper" style="position: relative;">
<input type="text" name="name" id="name" placeholder="Search by name" class="form-control">
</div>
</div>


<div class="mb-3">
<strong>Interests</strong>
<ul class="d-flex flex-wrap mt-2 btn-filter">
    @foreach($hobbies as $hobbie)
<li class="tag-btn">
<label class="d-flex align-items-center">
<input type="checkbox" name="hobbie[]" value="{{ $hobbie->id }}" class="selectbutton-index d-none">
<img src="{{ asset('uploads/hobbies/' . $hobbie->image) }}" alt="icon" class="index-iconsassocoiate">
          {{ $hobbie->hobbie }}
</label>
</li>
    @endforeach
</ul>
</div>
 
<div class="mb-3">
<strong>Hobbies</strong>
<ul class="d-flex flex-wrap mt-2 btn-filter">
    @foreach($additionalhobbies as $additionalhobbie)
<li class="tag-btn">
<label class="d-flex align-items-center">
<input type="checkbox" name="additional_hobbie[]" value="{{ $additionalhobbie->id }}" class="selectbutton-index d-none">
<img src="{{ asset('uploads/additional_hobbies/' . $additionalhobbie->image) }}" alt="icon" width="20px" class="index-iconsassocoiate">
          {{ $additionalhobbie->additional_hobbie }}
</label>
</li>
    @endforeach
</ul>
</div>
 
<div class="mb-3">
<strong>Personal Traits</strong>
<ul class="d-flex flex-wrap mt-2 btn-filter">
    @foreach($traits as $trait)
<li class="tag-btn">
<label class="d-flex align-items-center">
<input type="checkbox" name="personal_trait[]" value="{{ $trait->id }}" class="selectbutton-index d-none">
<img src="{{ asset('uploads/personaltrait/' . $trait->image) }}" alt="icon" class="index-iconsassocoiate">
          {{ $trait->personal_trait }}
</label>
</li>
    @endforeach
</ul>
</div>
 
            

<div class="mb-3">
<strong>Favorite Activities</strong>
<ul class="d-flex flex-wrap mt-2 btn-filter">
                    @foreach($activities as $activitie)
<li class="tag-btn"><img src="{{asset('uploads/activity/'.  $activitie->image)}}" alt="music" class="index-iconsassocoiate"> {{  $activitie->activity}}
<input type="checkbox" name="activity[]" id="activity" value="{{$activitie->id}}" class="selectbutton-index" ></li>
                    @endforeach
</ul>
</div>
<div class="text-center">
<button class="apply-btn" id="searchBtn" type="submit">Apply</button>
<button type="button" class="reset-btn" onclick="window.location.href='{{route('home.companion')}}'">Reset</button>
</div>
</form>
</div>
</div>
<div class="col-md-9" id="companionsList">
          @include('home.companion.partials._companions', ['companions' => $companions])
<!--@include('home.companion.search_results', ['companions' => $companions])-->
</div>
</div>
</div>
</section>
@endsection	
@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){
    $('.tag-btn').on('click', function() {
        const input = $(this).find('input[type="checkbox"]');
        input.prop('checked', !input.prop('checked'));
        $(this).toggleClass('selected', input.prop('checked'));
    });
});
</script>
<script>
    var swiper = new Swiper(".mySwiper", {
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
        el: ".swiper-pagination",
        },
    });
</script>
<script>
  $('#searchBtn').on('click', function (e) {
    e.preventDefault();
    var name = $('#name').val() ? $('#name').val() : 'all';
    function getCheckedValues(name) {
        var values = [];
        $('input[name="' + name + '[]"]:checked').each(function () {
            values.push($(this).val());
        });
        return values;
    }
 
    var hobbie = getCheckedValues('hobbie');
    var additional_hobbie = getCheckedValues('additional_hobbie');
    var personal_trait = getCheckedValues('personal_trait');
    var activity = getCheckedValues('activity');
    $.ajax({
        url: "{{ route('home.companion') }}",
        type: 'POST',
        data: {
            name: name,
            hobbie: hobbie,
            additional_hobbie: additional_hobbie,
            personal_trait: personal_trait,
            activity: activity,
            _token: "{{ csrf_token() }}"
        },
        success: function (response) {
            $('#companionsList').html(response.html);
            console.log("Works");
        },
        error: function (xhr) {
            alert('Something went wrong');
        }
    });
});
</script>
@endsection