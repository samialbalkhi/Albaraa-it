@extends('layuot.navbar')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>


    @section('nav')

    @if (Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{Session::get('success')}}
      </div>
      @endif


    <div class="container">
        <div class="card mb-4">
        <h3 class="mb-3 mt-3">Update Your Section</h3>
        <div class="d-flex justify-content-center ">
            <form method="post" action="{{route('update_section',$section->id)}}" class="was-validated mb-4">
                @csrf
               
                <div class="mb-3 mt-3 ">
                    <label for="text" class="form-label">Update Name Section</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$section->name}}">

                    @error('name')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror

                </div>
                <button type="submit" class="btn btn-secondary">Save Update</button>

            </form>
        </div>
        </div>
    </div>
    @endsection
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">

</script>
</body>
</html>