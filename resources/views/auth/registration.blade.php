<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" 
        rel="stylesheet" 
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" 
        crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4" style="margin-top: 20px;">
                <h4>Registration</h4>
                <hr>
                    <form action="{{route('register-user')}}" method="post">
                        @if(Session::has('success'))
                        <div class="alert alert-success">{{Session::get('success')}}</div>
                        @endif
                        @if(Session::has('failed'))
                        <div class="alert alert-danger">{{Session::get('failed')}}</div>
                        @endif
                        @csrf
                        <div class="form-group">
							<label for="name">Full Name</label>
							<input type="text" class="form-control" 
								   placeholder="Enter Full Name"
								   name="name" value="{{old('name')}}">  
                            <span class="text-danger">@error('name') {{$message}}@enderror</span>
                        </div>
                        <div class="form-group">
							<label for="position">Position</label>
							<input type="text" class="form-control" 
								   placeholder="Enter Given Job Position"
								   name="position" value="{{old('position')}}">  
                            <span class="text-danger">@error('position') {{$message}}@enderror</span>
                        </div>
                        <div class="form-group">
							<label for="contactNumber">Contact Number</label>
							<input type="text" class="form-control" 
								   placeholder="Enter Contact Number"
								   name="contactNumber" value="{{old('contactNumber')}}">  
                            <span class="text-danger">@error('contactNumber') {{$message}}@enderror</span>
                        </div>
						<div class="form-group">
							<label for="email">Email</label>
							<input type="text" class="form-control" 
								   placeholder="Enter Email"
								   name="email" value="{{old('email')}}"> 
                            <span class="text-danger">@error('email') {{$message}}@enderror</span>
                        </div>
						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" class="form-control" 
								   placeholder="Enter Password"
								   name="password" value="">
                            <span class="text-danger">@error('password') {{$message}}@enderror</span>
         
                        </div>
						<button class="btn btn-block btn-primary" type="submit">Register</button>
						<br>
                        <a href="login">Already have an account?</a>
                    </form>
            </div>
        </div>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" 
        crossorigin="anonymous">

</script>
</html>