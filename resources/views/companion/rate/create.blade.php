
@extends('template.layout.app')
@section('content')
<div class="row w-100 m-0">
    <main class="col-md-10 offset-md-2 px-4">
                            <div class="d-flex align-items-center justify-content-between flex-wrap rates-heding">
                                 <div class="d-flex align-items-center flex-wrap me-3 flex-grow-1">
                                    <a href="{{route('rate.index')}}" class="btn btnarrow-link me-2">
                                        <i class="fas fa-arrow-left"></i>
                                    </a>
                                    <h4 class="mb-0 editprofile-heding">Add</h4>
                                </div>
                            </div>
                       
                            <div class="card rates-card">
                            <form action="{{route('rate.store')}}" method="POST">
                             @csrf
                            <div class="row">
                               <div class="col-md-4 mb-3">
                                    <div class="form-rate">
                                        <label class="form-label rates-label">Title</label>
                                       
                                             <!-- Dropdown -->
                                            <select class="form-select rates-select" id="customerSelect">
                                                <option selected disabled>Select Title</option>
                                                <option value="addText">Add Custom Title</option>
                                                <option value='Coffee Date'>Coffee Date</option>
                                                <option value='Lunch Date'>Lunch Date</option>
                                                <option value='Dinner Date'>Dinner Date</option>
                                                <option value='Movie Date'>Movie Date</option>
                                                <option value='Picnic Date'>Picnic Date</option>
                                                <option value='Walk & Talk Date'>Walk & Talk Date</option>
                                                <option value='Adventure Date'>Adventure Date</option>
                                                <option value='Cooking Date'>Cooking Date</option>
                                                <option value='Museum or Art Gallery Date'>Museum or Art Gallery Date</option>
                                                <option value='Game Night Date'>Game Night Date</option>
                                            </select>
                                            
                                            <!-- Custom Input (initially hidden) -->
                                            <input type="text" class="form-control mt-2" id="newCustomerInput"
                                                   placeholder="Enter Title" style="display: none;">
                                            
                                            <!-- Final hidden field for submission -->
                                            <input type="hidden" name="title" id="finalTitle" value="{{ old('title') }}">

                                    @if($errors->has('title'))
                                     <span class="text-danger">{{$errors->first('title')}}</span>
                                    @endif
                                    </div>
                                    
                               </div>
                                <div class="col-md-4 mb-3">
                                    <div class="form-rate">
                                        <label class="form-label rates-label">Rate (in gems) (1 Gem = $1)</label>
                                        <input type="text" for="gem" class="form-control rate-enter"
                                            placeholder="Enter gem" name="gem" value="{{old('gem')}}">
                                    @if($errors->has('gem'))
                                       <span class="text-danger">{{$errors->first('gem')}}</span>
                                    @endif
                                    </div>
                                  
                                </div>

                                <div class="col-md-4 mb-3">
                                    <div class="form-rate">
                                        <label class="form-label rates-label" for="hour">Hour</label>
                                        <div class="custom-select-wrapper">
                                            <select class="form-select rates-select" name="hour">
                                                <option selected disabled>Select hour</option>
                                                @for($i=1;$i<=6;$i++)
                                                <option value='{{$i}}'>{{$i}} hour</option>
                                                @endfor
                                            </select>
                                        </div>
                                     @if($errors->has('hour'))
                                      <span class="text-danger">{{$errors->first('hour')}}</span>
                                     @endif
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
    const select = document.getElementById('customerSelect');
    const input = document.getElementById('newCustomerInput');
    const finalInput = document.getElementById('finalTitle');
    window.addEventListener('DOMContentLoaded', () => {
        const oldVal = finalInput.value;
        const isPredefined = Array.from(select.options).some(opt => opt.value === oldVal && opt.value !== 'addText');
        if (!isPredefined && oldVal) {
            select.value = 'addText';
            input.style.display = 'block';
            input.value = oldVal;
        }
    });

   
    select.addEventListener('change', function () {
        if (this.value === 'addText') {
            input.style.display = 'block';
            input.value = '';
            finalInput.value = ''; 
            input.focus();
        } else {
            input.style.display = 'none';
            input.value = '';
            finalInput.value = this.value;
        }
    });

   
    input.addEventListener('input', function () {
        finalInput.value = this.value.trim();
    });
</script>
@endsection