@extends('template.layout.app')
@section('content')
 <div class="row w-100 m-0">
    <main class="col-md-10 offset-md-2 px-4">
        <div class="d-flex align-items-center justify-content-between flex-wrap editpro-txtt mb-4">
            <div class="d-flex align-items-center flex-wrap me-3 flex-grow-1">
                <h4 class="mb-0 editprofile-heding">Rating/Reviews</h4>
            </div>
        </div>
        <div class="card review-cards">
                            <div class="container py-4">
                                <div class="row mb-4">
                                    <div class="col-md-12 text-center">
                                        <h5 class="overal-heding">Overall Rating</h5>
                                        @php
                                            $fullStars = floor($averagerating);
                                            $halfStar = ($averagerating - $fullStars) >= 0.5 ? 1 : 0;
                                            $emptyStars = 5 - ($fullStars + $halfStar);
                                        @endphp
                                    <h1 class="fw-bold">
                                       {{ number_format($averagerating, 1) }}
                                        <small class="fs-8">/5</small>
                                    </h1>
                                    
                                    <div class="rating-stars mb-2">
                                        @for ($i = 0; $i < $fullStars; $i++)
                                            <i class="fas fa-star"></i>
                                        @endfor
                                    
                                        @if ($halfStar)
                                            <i class="fas fa-star-half-alt"></i>
                                        @endif
                                    
                                        @for ($i = 0; $i < $emptyStars; $i++)
                                            <i class="far fa-star"></i>
                                        @endfor
                                    </div>
                                        <button class="countreview-btn">Based on {{$ratingcount}} Reviews</button>
                                    </div>
                                    <!--<div class="col-md-4">-->
                                    <!--    <div class="d-flex align-items-center mb-2">-->
                                    <!--        <div class="me-2">5</div><i class="fas fa-star text-warning me-2"></i>-->
                                    <!--        <div class="progress w-100"><div class="progress-bar" style="width: 80%;"></div></div>-->
                                    <!--        {{$oneStarRatingCount}}-->
                                    <!--    </div>-->
                                    <!--    <div class="d-flex align-items-center mb-2">-->
                                    <!--        <div class="me-2">4</div><i class="fas fa-star text-warning me-2"></i>-->
                                    <!--        <div class="progress w-100"><div class="progress-bar" style="width: 60%;"></div></div>-->
                                    <!--        {{$twoStarRatingCount}}-->
                                    <!--    </div>-->
                                    <!--    <div class="d-flex align-items-center mb-2">-->
                                    <!--        <div class="me-2">3</div><i class="fas fa-star text-warning me-2"></i>-->
                                    <!--        <div class="progress w-100"><div class="progress-bar" style="width: 40%;"></div></div>-->
                                    <!--        {{$threeStarRatingCount}}-->
                                    <!--    </div>-->
                                        
                                            
                                    <!--    <div class="d-flex align-items-center mb-2">-->
                                    <!--        <div class="me-2">2</div><i class="fas fa-star text-warning me-2"></i>-->
                                    <!--        <div class="progress w-100"><div class="progress-bar" style="width: 20%;"></div></div>-->
                                    <!--        {{$fourStarRatingCount}}-->
                                    <!--    </div>-->
                                    <!--    <div class="d-flex align-items-center">-->
                                    <!--        <div class="me-2">1</div><i class="fas fa-star text-warning me-2"></i>-->
                                    <!--        <div class="progress w-100"><div class="progress-bar" style="width: 10%;"></div></div>-->
                                    <!--        {{$fiveStarRatingCount}}-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                </div>
                               <!-- Reviews Section -->
                                 <div class="reviewss-bordertop">
                                   <h5 class="text-center reviewhere-h mb-3 mt-3">Reviews</h5>
                                  <div class="row g-3">
                                      @foreach($ratings as $rating)
                                        <div class="col-md-6">
                                                <div class="review-card">
                                                <div class="d-flex mb-2">
                                                    <img src="{{asset('uploads/profile/'.$rating->associatereviews->profile_picture) }}" class="rounded-circle me-2" alt="User">
                                                    <div>
                                                        <strong>{{$rating->associatereviews->name}}</strong><br>
                                                        <small class="text-muted">
                                                        {{ \Carbon\Carbon::parse($rating->created_at)->setTimezone('Asia/Kolkata')->format('h:i') }}

                                                        </small>
                                                    </div>
                                                    @php
                                                        $rate = $rating->rate;
                                                    @endphp
                                                     <div class="ms-auto rating-stars">
                                                        <strong>{{$rating->rate}}</strong>
                                                        @for ($i = 1; $i <= 5; $i++)
                                                        @if ($i <= $rate)
                                                            <i class="fas fa-star text-warning"></i> 
                                                        @else
                                                            <i class="far fa-star text-muted"></i> 
                                                        @endif
                                                        @endfor
                                                    </div>
                                                </div>
                                                <p class="mb-0 text-muted">{{$rating->reviews}}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                       </div>
                </div>
         </div>
    </main>
</div>
@endsection