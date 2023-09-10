<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" 
        rel="stylesheet" 
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" 
        crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4" style="margin-top: 20px;">
                <h4>Log in </h4>
                <hr>
                    <form action="{{route('login-user')}}" method="post">
                    @if(Session::has('success'))
                        <div class="alert alert-success">{{Session::get('success')}}</div>
                        @endif
                        @if(Session::has('failed'))
                        <div class="alert alert-danger">{{Session::get('failed')}}</div>
                        @endif
                        @csrf
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
                        <div class="form-group">
                            <button class="btn btn-block btn-primary" type="submit">Log in</button>
                        </div>
                        <br>
                        <a href="registration">Click here to Register!</a>
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