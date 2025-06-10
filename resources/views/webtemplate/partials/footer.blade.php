
  <!-- Footer -->
 
  </main>
  
  <section class="footer py-3">
    <div class="container">
      <footer class="foot-footer">
        <div class="row ">

          <!-- Logo + Description -->
          <div class="col-12 col-md-3 mb-4 footer-border">
            <div class="logo-textfooter"><img src="https://work.mobidudes.in/OM/Amathyst/public/assests/images/Logo.png" alt=""></div>
            <p class="logo-descriptionfooter">
              Clarity gives you the blocks and components you need to
              create a truly professional website.
            </p>
           
          </div>


          <!-- Quick Links 1 -->
          <div class="col-12 col-md-3 mb-4 footer-border">
            <h5 class="fw-semibold mb-3">CONTACTS</h5>
            <ul class="list-unstyled footer-links">
              <li><a href="#" class="text-decoration-none"><i class="fas fa-map-marker-alt"></i> Onam Plaza</a></li>
              <li><a href="#" class="text-decoration-none"><i class="fas fa-phone-alt"></i> +91-9922336644</a></li>
              <li><a href="#" class="text-decoration-none"><i class="fas fa-envelope"></i> info@gmail.com</a></li>
              
            </ul>
          </div>

          <!-- Quick Links 2 -->
          <div class="col-12 col-md-3 mb-4 footer-border">
            <h5 class="fw-semibold mb-3">QUICK LINKS</h5>
            <ul class="list-unstyled footer-links">
              <li><a href="#" class="text-decoration-none ">Company profile</a></li>
              <li><a href="#" class="text-decoration-none ">Terms & Condition</a></li>
              <li><a href="#" class="text-decoration-none ">privacy policy</a></li>
              <li><a href="#" class="text-decoration-none ">FAQ</a></li>
            </ul>
          </div>
             <!-- Quick Links 3 -->
          <div class="col-12 col-md-3 mb-4 social-footer">
            <h5 class="fw-semibold mb-3">SOCIAL LINKS</h5>
            <div class="d-flex justify-content-center justify-content-md-start gap-3 mt-3 social-icons">
              <a href="#"><i class="fab fa-twitter "></i></a>
              <a href="#"><i class="fab fa-facebook-f "></i></a>
              <a href="#"><i class="fab fa-instagram "></i></a>
              <a href="#"><i class="fab fa-github "></i></a>
            </div>
          </div>
     <div class="text-center copyright-footer">Copyright © 2012 - 2025 TermsFeed®. All rights reserved.</div>

        </div>
      </footer>
    </div>
  </section>
  

  <script src="{{asset('/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('/js/swiper-bundle.min.js')}}"></script>
 
  <!-- Initialize Swiper -->
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
  $(document).ready(function () {
    $('#sidebarcontrolbarr').click(function () {
      $('.sidebar').toggleClass('active');
    });
  });
</script>
  
  
  
  
  