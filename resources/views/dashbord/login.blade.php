<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row align-items-center vh-100">
        <div class="col-6 mx-auto">
          
            <div class="card">
                <div class="card-body">
                <form method="POST" action="{{route('chek_login')}}">
                    @csrf
                    <!-- Email input -->
    <div class="form-outline mb-4">
        <input type="email" name="email" class="form-control" />
      <label class="form-label" for="form2Example1">Email address</label>
    </div>
  
    <!-- Password input -->
    <div class="form-outline mb-4">
        <input type="password" name="password" class="form-control" />
        <label class="form-label" for="form2Example2">Password</label>
    </div>
    
    
    
    <!-- Submit button -->
    <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>
  
    <!-- Register buttons -->
    <div class="text-center">
      <p>Not a member? <a href="{{route('regester')}}">Register</a></p>
      <p>or sign up with:</p>
      <button type="button" class="btn btn-link btn-floating mx-1">
          <i class="fab fa-facebook-f"></i>
        </button>
        
        <button type="button" class="btn btn-link btn-floating mx-1">
            <i class="fab fa-google"></i>
        </button>
        
        <button type="button" class="btn btn-link btn-floating mx-1">
            <i class="fab fa-twitter"></i>
        </button>
  
      <button type="button" class="btn btn-link btn-floating mx-1">
          <i class="fab fa-github"></i>
        </button>
    </div>
</form>
</div>
</div>    
</div>

</div>
</div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>