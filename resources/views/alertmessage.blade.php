<!-- Include iziToast CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/css/iziToast.min.css">
<!-- Include iziToast JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/js/iziToast.min.js"></script>
<!--Alert message of success -->
@if($message = Session::get('success'))
	<script>
	    iziToast.success({
	        message: '{{ $message }}',
	        position: 'topRight',
	        timeout: 5000, 
	        progressBarColor: 'rgba(255, 255, 255, 0.5)',
	        icon: null
	    });
   </script>
@endif


@if ($message = Session::get('danger'))
    <script>
        iziToast.error({
            message: '{{ $message }}',
            position: 'topRight',
            timeout: 5000,
            progressBarColor: 'rgba(255, 255, 255, 0.5)',
            icon: null
        });
    </script>
@endif

<!--Alert message of error -->
@if($errors->any())
    <script>
        iziToast.error({
            message: '<ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>',
            position: 'topRight',
            timeout: 5000,
            progressBarColor:'rgba(255, 255, 255, 0.5)',
            closeOnClick: true,
            displayMode: 'replace',
            animateInside: true,
            icon:null,
            close: false,
            buttons: [
                ['<button>&times</button>', function (instance, toast) {
                    instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');
                }]
            ]
        });
    </script>
@endif





