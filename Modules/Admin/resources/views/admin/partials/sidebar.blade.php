<style>
    
    li.nav-item.logout-btn {
    padding-left: 13px;
}
 
button.nav-icon.btn.btn-link.nav-icon{
    color: #000;
    text-decoration:none;
}
</style>
<aside class="main-sidebar sidebar-dark-primary elevation-4"> 
    <a href="{{route('admin.dashboard')}}" class="brand-link" style="background-color: #5F42AA;">
        <span class="brand-text">
         <img src="{{ asset('assests/images/Logo.png') }}" alt="Logo" style="height: 20px; margin-right: 5px;">
        </span>
   </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" >
                <li class="nav-item"> 
                    <a href="{{ route('admin.dashboard') }}" class="nav-link "> 
                       <i class="las la-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                
            
                 <li class="nav-item"> 
                        <a href="{{route('associate.index')}}" class="nav-link">
                        <i class="las la-user-circle"></i>
                            <p>Associate</p>
                        </a> 
                    </li>
                
                
            <li class="nav-item"> 
                        <a href="{{route('companion.index')}}" class="nav-link">
                        <i class="las la-user-circle"></i>
                            <p>Companion</p>
                        </a> 
                    </li>
        
              <li class="nav-item"> 
                <a href="#" class="nav-link">
                <i class="las la-user-plus"></i>
                    <p>User Profile Data<i class="fas fa-angle-left right"></i> </p>
                </a>
                    <ul class="nav nav-treeview">
                            <li class="nav-item"> 
                                <a href="{{route('hobbie.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                    <p>Hobbies Types</p>
                                </a> 
                            </li>

                            <li class="nav-item"> 
                                <a href="{{route('additionalHobbie.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                    <p>Additional Hobbies</p>
                                </a> 
                            </li>

                            <li class="nav-item"> 
                                <a href="{{route('personal-trait.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                    <p>Personal Traits</p>
                                </a> 
                            </li>

                            <li class="nav-item"> 
                                <a href="{{route('activtiy.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                    <p>Favourite Activities </p>
                                </a> 
                            </li>
                            
                            
                            
                            <li class="nav-item"> 
                                <a href="{{route('personality.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                    <p>Personality & Prefrences </p>
                                </a> 
                            </li>
                       </ul>
                </li>
                
                <!--<li class="nav-item"> -->
                <!--    <a href="#" class="nav-link">-->
                <!--      <i class="las la-user-circle"></i>-->
                <!--        <p>User<i class="fas fa-angle-left right"></i> </p>-->
                <!--    </a>-->
                <!--    <ul class="nav nav-treeview">-->
                <!--        <li class="nav-item"> -->
                <!--            <a href="{{route('associate.index')}}" class="nav-link">-->
                <!--            <i class="far fa-circle nav-icon"></i>-->
                <!--                <p>Associate</p>-->
                <!--            </a> -->
                <!--        </li>-->
                <!--        <li class="nav-item"> -->
                <!--            <a href="{{route('companion.index')}}" class="nav-link">-->
                <!--            <i class="far fa-circle nav-icon"></i>-->
                <!--                <p>Companion</p>-->
                <!--            </a> -->
                <!--        </li>-->
                <!--    </ul>-->
                <!--</li>-->
  
                 <li class="nav-item"> 
                    <a href="#" class="nav-link">
                    <i class="las la-gem"></i>
                        <p>Gems<i class="fas fa-angle-left right"></i> </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"> 
                            <a href="{{route('gems')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                                <p>Gem Value</p>
                            </a> 
                        </li>
                        <li class="nav-item"> 
                            <a href="{{route('gemsPackage')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                                <p>Gems Package</p>
                            </a> 
                        </li>
                    </ul>
                </li>
                
                    <li class="nav-item"> 
                    <a href="{{route('admindocument.index')}}" class="nav-link "> 
                        <i class="lar la-file-alt"></i>
                        <p>Document</p>
                    </a>
                </li>
                
                <li class="nav-item"> 
                    <a href="{{route('companion.withdrawn')}}" class="nav-link "> 
                      <i class="las la-wallet"></i>
                        <p>Withdrawn</p>
                    </a>
                </li>
                
                <li class="nav-item"> 
                    <a href="{{route('booking.index')}}" class="nav-link "> 
                   <i class="las la-address-book"></i>
                        <p>Booking History</p>
                    </a>
                </li>
                
                 <li class="nav-item"> 
                    <a href="{{route('transaction.index')}}" class="nav-link "> 
                     <i class="las la-money-check-alt"></i>
                        <p>Transaction </p>
                    </a>
                </li>
            
                <li class="nav-item"> 
                    <a href="{{route('faq.index')}}" class="nav-link "> 
                       <i class="las la-question-circle"></i>
                        <p>FAQ</p>
                    </a>
                </li>
                
                 <li class="nav-item"> 
                    <a href="{{route('testimonial.index')}}" class="nav-link "> 
                      <i class="las la-cube"></i>
                        <p>Testimonial</p>
                    </a>
                </li>
                
                <li class="nav-item"> 
                    <a href="{{route('howIt.index')}}" class="nav-link "> 
                      <i class="las la-question"></i>
                        <p>How It Works</p>
                    </a>
                </li>
                
                <li class="nav-item logout-btn"> 
                    <form method="POST" action="{{route('admin.logout')}}" >
                        @csrf
                        <button type="submit" class="nav-icon btn btn-link nav-icon p-0">
                         <i class="las la-sign-out-alt"></i> Logout
                        </button>
                        <button type="submit" class="btn btn-link nav-icon p-0">
                    </form>
                </li>
            </ul>
         </nav>
    </div>
</aside>