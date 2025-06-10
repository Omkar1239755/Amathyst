<footer class="main-footer"> <strong>Copyright &copy; 2024</strong>All rights reserved</footer>
<script src="{{ asset('admin_asset/js/jquery.min.js') }}"></script>
<script src="{{ asset('admin_asset/js/demo.js') }}"></script>
<script src="{{ asset('admin_asset/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('admin_asset/js/twitter-bootstrap.js') }}"></script>
<script src="{{ asset('admin_asset/js/js_dataTables.js') }}"></script>
<script src="{{ asset('admin_asset/js/dataTables.bootstrap5.js') }}"></script>
<script src="{{ asset('admin_asset/js/bootstrap-tagsinput.min.js') }}"></script>
<script src="{{ asset('admin_asset/js/moment.min.js') }}"></script>
<link rel= "stylesheet" href= "https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" >
<script>
$(document).ready(function(){
  $('.nav-link').click(function(){
    $(this).parent().find('ul').toggle();
  })
})
</script>
<script src="{{ asset('admin_asset/js/chart.min.js')}}"></script>
<script>
	new DataTable('#table');
	new DataTable('#example'); 
	new DataTable('#companionratetable');
	new DataTable('#earningtable'); 
	new DataTable('#testtable');
	new DataTable('#withdrawtable');
	
</script>

<script>
	jQuery(function($) {
    var path = window.location.href; 
    $('.nav-sidebar .nav-item .nav-link').each(function() {
      if (this.href === path) {
        $(this).addClass('active');
      }
    });
  });
</script>
<script>
	$(document).ready(function(){
		$('.navbar-nav').click(function(){
			$('.sidebar-mini').toggleClass('sidebar-collapse');
		});
	});
</script>
</body>
</html>