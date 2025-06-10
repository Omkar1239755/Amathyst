@extends('template.layout.app')
@section('content')

</style>
  <div class="row w-100 m-0">
    
        <main class="col-md-10 offset-md-2 px-4">
            @include('alertmessage')
            <div class="d-flex align-items-center justify-content-between flex-wrap setting-heding">
                <div class="d-flex align-items-center flex-wrap me-3 flex-grow-1">
                    <h4 class="mb-0 editprofile-heding">Settings</h4>
                </div>
            </div>

            <form action="{{ route('Savesettings') }}" method="POST">
                @csrf
                <div class="card rates-card">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="form-rate position-relative mt-3">
                                <label class="form-label rates-label">Old Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control show-password" name="oldpass"
                                        placeholder="Enter old password">
                                    <button type="button" class="input-group-text eye-password" disabled>
                                        <i class="fas fa-eye-slash"></i>
                                    </button>

                                </div>
                                @error('oldpass')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>


                        <div class="col-md-4 mb-3">
                            <div class="form-rate position-relative mt-3">
                                <label class="form-label rates-label">New Password</label>
                                <div class="input-group">
                                    <input type="password" id="password" class="form-control show-password" name="newpass"
                                        placeholder="Enter new password">
                                    <button type="button" class="input-group-text eye-password" disabled>
                                        <i class="fas fa-eye-slash"></i>
                                    </button>
                                </div>
                                @error('newpass')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                             <div id="strengthMessage"></div>
                        </div>
                       

                        <div class="col-md-4 mb-3">
                            <div class="form-rate position-relative mt-3">
                                <label class="form-label rates-label">Confirm Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control show-password" name="confirmpass"
                                        placeholder="Enter confirmed password">
                                    <button type="button" class="input-group-text eye-password" disabled>
                                        <i class="fas fa-eye-slash"></i>
                                    </button>
                                 </div>
                                @error('confirmpass')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="updatepassword">
                            <button type="submit" class="update-pass">Update Password</button>
                     
                        </div>
                     </div>
                </div>
            </form>
              
               
               <form method="POST" action="{{ route('deleteaccount') }}" >
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete-settingbtn show_confirm" disabled >
                        Delete Account
                    </button>
               </form>
            <div class="blocuser-count">
                <a href="{{route('blocked.users')}}" class="link-divblockk">
                    <h3>Blocked Users <span>(24)</span></h3>
                    <p>View and manage users you’ve blocked on Amathyst.</p>
                    <div class="img-endblockk">
                        <img src="{{ asset('assests/images/vectright.svg') }}" alt="vector" width="14px">
                    </div>
                </a>
            </div>
        </div>
    </main>
</div>
@endsection
@section('script')
    <script>
        document.getElementById("loginButton").addEventListener("click", function(event) {
            event.preventDefault();
            document.getElementById("loginForm").submit();
        });
    </script>

    <script>
        $(document).ready(function() {
           
            $(".eye-password").attr("disabled", true);
            $(".eye-password").on("click", function() {
                $(this).toggleClass("active");
                const input = $(this).prev(".show-password");

                if ($(this).hasClass("active")) {
                    input.attr("type", "text");
                    $(this).find("i").removeClass("fa-eye-slash").addClass("fa-eye");
                } else {
                    input.attr("type", "password");
                    $(this).find("i").removeClass("fa-eye").addClass("fa-eye-slash");
                }
            });

            
            $(".show-password").on("focus", function() {
                $(this).next(".eye-password").removeAttr("disabled");
            });
        });
    </script>

    <style>
        .input-group button {
            display: block !important;
            opacity: 1 !important;
            z-index: 99;
        }
    </style>

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
        document.getElementById('password').addEventListener('input', function() {
            var strengthMessage = document.getElementById('strengthMessage');
            var val = this.value;
            var strength = 0;
        
            if (val.length > 7) strength++;
            if (/[A-Z]/.test(val)) strength++;
            if (/[0-9]/.test(val)) strength++;
            if (/[^A-Za-z0-9]/.test(val)) strength++;
        
            switch(strength) {
                case 0:
                case 1:
                    strengthMessage.textContent = "Weak";
                    strengthMessage.style.color = "red";
                    break;
                case 2:
                    strengthMessage.textContent = "Moderate";
                    strengthMessage.style.color = "orange";
                    break;
                case 3:
                case 4:
                    strengthMessage.textContent = "Strong";
                    strengthMessage.style.color = "green";
                    break;
            }
        });
   </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
       $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Are you sure you want to delete your account?`,
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })

          .then((willDelete) => {
            if (willDelete) {
             form.submit();
             }
         });
     });
</script>
@endsection