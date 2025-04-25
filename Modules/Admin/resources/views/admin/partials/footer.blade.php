
<footer class="main-footer"> <strong>Copyright &copy; 2024</strong> All rights reserved.  </footer>
 
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/demo.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/twitter-bootstrap.js') }}"></script>
<script src="{{ asset('assets/js/js_dataTables.js') }}"></script>
<script src="{{ asset('assets/js/dataTables.bootstrap5.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-tagsinput.min.js') }}"></script>
<script src="{{ asset('assets/js/fullcalendar-scheduler.min.js') }}"></script>
<script src="{{ asset('assets/js/moment.min.js') }}"></script>

<script>
	$(document).ready(function(){
  $('.nav-link').click(function(){
    $(this).parent().find('ul').toggle();
  })
})
</script>
<script src="assets/js/chart.min.js"></script>

<!-- Charts -->
<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	title: {
		text: ""
	},
	axisY: {
		title: "",
		suffix: "%"
	},
	axisX: {
		title: "Countries"
	},
	data: [{
		type: "column",
		yValueFormatString: "#,##0.0#\"%\"",
		dataPoints: [
			{ label: "Jan", y: 7.1 },	
			{ label: "Feb", y: 6.70 },	
			{ label: "Mar", y: 5.00 },
			{ label: "Apr", y: 2.50 },	
			{ label: "May", y: 2.30 },
			{ label: "Jun", y: 1.80 },
			{ label: "July", y: 1.60 },
			{ label: "Aug", y: 1.60 },
			{ label: "Sep", y: 2.30 },
			{ label: "Oct", y: 1.80 },
			{ label: "Nov", y: 1.60 },
			{ label: "Dec", y: 1.60 }
			
		]
	}]
});
chart.render();

}
</script>

<!-- Datatable -->
<script>
	new DataTable('#table');
</script>

<!-- Active Links -->
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



<!-- Full Calendar Script -->
<script>
//suppose this is array
var arrays = [{
  "title": "All Day Event",
  "start": "2024-04-01 00:00:00",
  "color": "#40E0D0"
}, {
  "title": "Long Event",
  "start": "2024-01-07 00:00:00",
  "color": "#FF0000"
}, {
  "title": "Repeating Event",
  "start": "2024-01-09 16:00:00",
  "color": "#0071c5"
}, {
  "title": "Conference",
  "start": "2024-01-11 00:00:00",
  "color": "#40E0D0"
}, {
  "title": "Meeting",
  "start": "2024-01-12 10:30:00",
  "color": "#000"
}, {
  "title": "Lunch",
  "start": "2024-04-12 12:00:00",
  "color": "#0071c5"
}, {
  "title": "Happy Hour",
  "start": "2024-01-12 17:30:00",
  "color": "#0071c5"
}, {
  "title": "Dinner",
  "start": "2024-01-12 20:00:00",
  "color": "#0071c5"
}, {
  "title": "Birthday Party",
  "start": "2024-01-14 07:00:00",
  "color": "#FFD700"
}, {
  "title": "Double click to change",
  "start": "2024-01-28 00:00:00",
  "color": "#008000"
}, {
  "title": "512",
  "start": "2024-04-04 00:00:00",
  "color": "#FF0000"
}, {
  "title": "21512",
  "start": "2024-04-06 00:00:00",
  "color": "#FF0000"
}, {
  "title": "236234",
  "start": "2024-04-07 00:00:00",
  "color": "#FF0000"
}, {
  "title": "3521",
  "start": "2024-04-03 00:00:00",
  "color": "#00FF00"
}, {
  "title": "HHH",
  "start": "2024-04-02 00:00:00",
  "color": "#FFFF00"
}]

document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');

  var calendar = new FullCalendar.Calendar(calendarEl, {
    headerToolbar: {
      left: 'prev,next today',
      center: 'title',
      right: 'dayGridMonth,timeGridWeek,timeGridDay'
    },
    // initialDate: '2024-04-25',
    navLinks: true, 
    selectable: true,
    selectMirror: true,
    eventDidMount: function(view) {
      //loop through json array
      $(arrays).each(function(i, val) {
        //find td->check if the title has same value-> get closest daygird ..change color there
        $("td[data-date=" + moment(val.start).format("YYYY-MM-DD") + "] .fc-event-title:contains(" + val.title + ")").closest(".fc-daygrid-event-harness").css("background-color", val.color);
      })
    },
    select: function(arg) {
      $('#createEventModal #startTime').val(arg.start);
      $('#createEventModal #endTime').val(arg.end);
      $('#createEventModal #when').text(arg.start);
      $('#createEventModal').modal('toggle');
    },
    eventClick:  function(arg) {
                // endtime = $.fullCalendar.moment(event.end).format('h:mm');
                // starttime = $.fullCalendar.moment(event.start).format('dddd, MMMM Do YYYY, h:mm');
                // var mywhen = starttime + ' - ' + endtime;
                $('#title').html(arg.event.title);
                $('#modalWhen').text(arg.event.start);
                $('#eventID').val(arg.event.id);
                $('#calendarModal').click().modal("show");
            },
    editable: true,
    dayMaxEvents: true,
    events: arrays //pass array here
  });

  calendar.render();
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