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
        <div class="card">
            <h3 class="mb-3 mt-3">Add Your Prodect</h3>
            <div class="d-flex justify-content-center">
                <form method="post" action="{{route('create_bnars')}}" enctype="multipart/form-data"
                    class="was-validated">
                    @csrf

                    <div class="mb-3 mt-3 ">
                        <label for="file" class="form-label">upload image banrs</label>
                        <input type="file" class="form-control" id="image" name="image">

                        <small id="image_erorr" class="form-text text-danger"></small>

                        @error('image')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
    
                    </div>

                    <button type="submit" class="btn btn-secondary">Save </button>
                </form>
            </div>
            
        </div>
      </div>

      <div class="container">
        <div class="m-4">

            <div class=" d-flex justify-content-center ">
                
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">id</th>
                        <th scope="col">image</th>
                       

                        
                       
                      </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($banr as $items )
                            
                        <tr>  
                            
                            <th scope="row">{{$items->id}}</th>
                            <td><img src="storage/{{ $items->image }}" width="100" height="100"></td>
                            
                            
                            
                            <td>
                                <a href="{{route('edit_bnars',$items->id)}}" type="button" class="btn btn-success">update</a>
                                <a href="{{route('delete_bnars',$items->id)}}" type="submit" class="btn btn-danger">delete</a>  
                            </td>
                        </tr>
                        @endforeach
                        
                        
                    </tbody>
                  </table>
            </div>
         </div>
     </div>
      @endsection
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"> 
      </script> 
</body>
</html>