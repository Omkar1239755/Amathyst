@extends('template.layout.app')
@section('content')
<div class="row w-100 m-0">
   <main class="col-md-10 offset-md-2 px-4">
            <div class="d-flex align-items-center justify-content-between flex-wrap rates-heding">
                 <div class="d-flex align-items-center flex-wrap me-3 flex-grow-1">
                    <a href="{{route('rate.index')}}" class="btn btnarrow-link me-2">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                    <h4 class="mb-0 editprofile-heding">Edit</h4>
                </div>
            </div>
       
            <div class="card rates-card">
            <form action="{{route('rate.update',$rate->id)}}" method="POST">
             @csrf
            <div class="row">
               <div class="col-md-4 mb-3">
                    <div class="form-rate">
                        <label class="form-label rates-label">Title</label>
                          <select class="form-select rates-select" id="titleSelect">
    @php
        $predefinedTitles = [
            'Coffee Date', 'Lunch Date', 'Dinner Date', 'Movie Date',
            'Picnic Date', 'Walk & Talk Date', 'Adventure Date',
            'Cooking Date', 'Museum or Art Gallery Date', 'Game Night Date'
        ];
        $isCustom = !in_array($rate->title, $predefinedTitles);
    @endphp

    <option value="">Select a title</option>
    @foreach ($predefinedTitles as $title)
        <option value="{{ $title }}" {{ $rate->title == $title ? 'selected' : '' }}>
            {{ $title }}
        </option>
    @endforeach
</select>

<!-- Textbox (no name yet) -->
<input type="text" class="form-control mt-2" id="newCustomerInput"
       placeholder="Enter Title"
       value="{{ $isCustom ? old('title', $rate->title) : '' }}">

<!-- Hidden input for actual submission -->
<input type="hidden" name="title" id="finalTitle">
                    </div>
               </div>
                <div class="col-md-4 mb-3">
                    <div class="form-rate">
                        <label class="form-label rates-label">Rate (in gems) (1 Gem = $1)</label>
                        <input type="text" for="gem" class="form-control rate-enter"
                            placeholder="Enter gem" value="{{$rate->gem}}" name="gem" />
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <div class="form-rate">
                        <label class="form-label rates-label" for="hour">Hour</label>
                        <div class="custom-select-wrapper">
                            <select class="form-select rates-select" name="hour">
                                <option selected disabled>Select hour</option>
                                 @for($i=1;$i<=6;$i++)
                                    <option value='{{$i}}' {{($rate->hours==$i)?'selected':''}}>{{$i}} hour</option>
                                 @endfor
                            </select>
                        </div>
                    </div>
                </div>
                <div class="saverates">
                    <button type="submit"  class="savebtn-rates">Save</button>
                </div>
             </div>
            </form>
        </div>
    </main>
</div>
@endsection
@section('script')
<script>
    const select = document.getElementById('titleSelect');
    const input = document.getElementById('newCustomerInput');
    const finalInput = document.getElementById('finalTitle');
    updateFinalInput();
    input.addEventListener('input', function () {
        if (this.value.trim() !== '') {
            select.value = ''; 
        }
        updateFinalInput();
    });

 
    select.addEventListener('change', function () {
        if (this.value.trim() !== '') {
            input.value = ''; 
        }
        updateFinalInput();
    });

    function updateFinalInput() {
        const inputVal = input.value.trim();
        const selectVal = select.value.trim();

        if (inputVal !== '') {
            finalInput.value = inputVal;
        } else {
            finalInput.value = selectVal;
        }
    }
</script>
@endsection
