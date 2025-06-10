<div class="companion-profile">
        <div class="row g-4">
            @foreach($companions as $companion)
             <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                <div class="card profile-cardindex">
                    @if ($companion->profile_picture)
                        <a  href="{{route('home.viewprofile',$companion->id)}}">   <img src="{{asset('uploads/profilecompanion/'.$companion->profile_picture)}}" class="indexcompanion-imagesview" alt="..." />    </a> 
                      @else
                      <img src="{{ asset('uploads/blankImage/blank.jpg' ) }}" width="60" alt="blank.jpg">
                    @endif
                  <div class="card-body prrofile-boddy">

                    <div class="d-flex justify-content-between align-items-center">
                  <a href="{{route('home.viewprofile',$companion->id)}}" style="text-decoration: none;">    <h5 class="card-title mb-0 title-profile">{{$companion->name}}</h5>  </a>
                      <span class="rating-index d-flex align-items-center">
                        <img src="{{asset('assests/images/ratingimg.svg')}}" alt="rating"class="rate-indexone">
                        @php
                            $sum = 0;
                            $count = $companion->companionrating->count();
                        
                            foreach ($companion->companionrating as $rate) {
                                $sum += $rate->rate;
                            }
                        
                            $average = $count > 0 ? $sum / $count : 0;
                        @endphp
                        {{ $average == 0 ? 0 : number_format($average, 1) }}

                      </span>
                    </div>
                     @php
                       $gem = App\Models\Rate::where('user_id', $companion->id)->min('gem');
                     @endphp

                    <p class="card-text txt-profile"><img src="{{asset('assests/images/gemsimg.svg')}}" alt="gems" class="start-gemsforimg"> Start from <span>  {{ $gem?$gem:0}} Gems</span>
                    </p>
                    <div class="text-center mt-4">
                    <a href="{{route('home.viewprofile',$companion->id)}}"> <button type="button" class="indexprofile-btn">View Profile</button> </a>
                    </div>
                    
                  </div>
                </div>
              </div>
           @endforeach
        </div>
         <div class="d-flex justify-content-center mt-5">
             <nav>
        @if (isset($companions) && $companions->count())
        @php
            $filters = request()->except(['page']);
            $isFiltered = count($filters) > 0;
        @endphp
        @unless ($isFiltered)
            <ul class="pagination">
                @if ($companions->onFirstPage())
                    <li class="page-item disabled"><span class="page-link"><i class="fas fa-arrow-left"></i></span></li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $companions->previousPageUrl() }}"><i class="fas fa-arrow-left"></i></a>
                    </li>
                @endif
    
                @foreach ($companions->getUrlRange(1, $companions->lastPage()) as $page => $url)
                    <li class="page-item {{ $companions->currentPage() == $page ? 'active' : '' }}">
                        <a class="page-link" href="{{ $url }}">{{ str_pad($page, 2, '0', STR_PAD_LEFT) }}</a>
                    </li>
                @endforeach
    
                @if($companions->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $companions->nextPageUrl() }}"><i class="fas fa-arrow-right"></i></a>
                    </li>
                @else
                    <li class="page-item disabled"><span class="page-link"><i class="fas fa-arrow-right"></i></span></li>
                @endif
            </ul>
        @endunless
        @else
            <h1>No Record found</h1>
        @endif
        </nav>
        </div>
   </div>