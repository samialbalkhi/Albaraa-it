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
        <h3 class="mb-3 mt-3">Add Your Brands</h3>
        <div class="d-flex justify-content-center">
            <form method="post" action="{{route('create_brand')}}" class="was-validated">
                    @csrf
                    
                    <div class="mb-3 mt-3 ">
                        <label for="text" class="form-label">Name Brand</label>
                        <input type="text" class="form-control" id="name" name="name">
                        <small id="name_erorr" class="form-text text-danger"></small>
                    </div>
                    @error('name')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror

                    <div class="mb-3 mt-3"> 

                        <label for="">Add Section</label>
                        <select name="section_id" class="form-select" aria-label="Default select example">
                            @foreach ($Section as $item )
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>   
                    
                    </div>

                    @error('Section')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror

                    
                     <button type="submit" class="btn btn-secondary">Save</button>
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
                        <th scope="col">name</th>
                        <th scope="col">section</th>
                        <th scope="col">action</th>

                        
                       
                      </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($brand_section as $itmes )
                        <tr>  

                            <th scope="row">{{$itmes->id}}</th>
                            <td>{{$itmes->name}}</td>
                            <td>{{$itmes->section->name}}</td>

                            <td>
                                <a href="{{route('edit_brand',$itmes->id)}}" type="button" class="btn btn-success">update</a>
                                <a href="{{route('delete_brand',$itmes->id)}}" type="submit" class="btn btn-danger">delete</a>  
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