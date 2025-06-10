 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
 <script>
     var swiper = new Swiper(".mySwiper", {
         spaceBetween: 10,
         slidesPerView: 3,
         grid: {
             rows: 2,
             fill: "row",
         },
         freeMode: true,
         watchSlidesProgress: true,
     });

     var swiper2 = new Swiper(".mySwiper2", {
         spaceBetween: 10,
         navigation: {
             nextEl: ".swiper-button-next",
             prevEl: ".swiper-button-prev",
         },
         thumbs: {
             swiper: swiper,
         },
     });
 </script>

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
     $(document).ready(function() {
         var currentPath = window.location.href;

         if (currentPath === "") {
             currentPath = "index.html"; 
         }

         $('.nav-link.sidebar-alink').each(function() {
             var href = $(this).attr('href');
             if (href === currentPath) {
                 $(this).addClass('active');
             }
         });
     });
 </script>

 <script>
     $(document).ready(function() {
         $('#sidebarcontrolbarr').click(function() {
             $('.sidebar').removeClass('d-none');
         });
         $('.removesidebar i').click(function() {
             $('.sidebar').addClass('d-none');
         });
     });
 </script>
 <script>
     document.addEventListener('DOMContentLoaded', function() {
         const sidebar = document.getElementById('sidebar');
         const toggleBtn = document.getElementById('toggleSidebar');

         toggleBtn.addEventListener('click', function() {
             if (window.innerWidth < 992) { 
                 sidebar.classList.toggle('active');
             }
         });

        
         document.addEventListener('click', function(e) {
             if (
                 window.innerWidth < 992 &&
                 !sidebar.contains(e.target) &&
                 !toggleBtn.contains(e.target)
             ) {
                 sidebar.classList.remove('active');
             }
         });
     });
 </script>
 </body>
 </html>
