<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
</head>
<body>
	<div class="container col-md-6">
		@if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
		<form style="margin-top: 30px" action="{{ url('/send-mail') }}" method="post" enctype="multipart/form-data"> 
			@csrf
			  <div class="form-group">
			    <label for="exampleFormControlInput1">FROM</label>
			    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="from">
			  </div>
			  <div class="form-group">
			    <label for="exampleFormControlInput1">TO</label>
			    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="to">
			  </div>
			   <div class="form-group">
			    <label for="exampleFormControlInput1">Subject</label>
			    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Subject" name="subject">
			  </div>
			  <div class="form-group">
			    <label for="exampleFormControlTextarea1">Message</label>
			    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="message"></textarea>
			  </div>
			  <form>
			  <div class="form-group">
			    <label for="exampleFormControlFile1">Attach File</label><br>
			    <input type="file" id="exampleFormControlFile1" name="attach_file" multiple>
			   </div>  
				<div class="form-group">
				    <input type="submit" class="btn btn-success" id="exampleFormControlFile1" value="Send">
				</div>
		</form>
	</div>




	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
	<script type="text/javascript">
        @if(Session::has('message'))
            var type="{{ Session::get('alert-type','info') }}"
            switch(type) {
                case 'info':
                    toastr.info("{{ Session::get('message') }}");
                    break;
                case 'success':
                    toastr.success("{{ Session::get('message') }}");
                    break;
                case 'warning':
                    toastr.warning("{{ Session::get('message') }}");
                    break;
                case 'error':
                    toastr.error("{{ Session::get('message') }}");
                    break;
            }
        @endif
    </script>
</body>
</html>