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
                {{ Session::get('success') }}
            </div>
        @endif
        
        <div class="container">
            <div class="card">
                <h3 class="mb-3 mt-3">Update profile</h3>
                <div class="d-flex justify-content-center">
                    <form method="post" action="{{route('update_profile',$profail->id)}}" enctype="multipart/form-data"
                        class="was-validated">
                        @csrf

                        <div class="mb-3 mt-3 ">
                            <label for="file" class="form-label">upload image profile</label>
                            <input type="file" class="form-control" id="image_profile" name="image_profile" value="{{$profail->image_profile}}">

                            <small id="image_erorr" class="form-text text-danger"></small>

                            @error('image_profile')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3 mt-3">
                            <label for="text" class="form-label">About The Company</label>
                            <input type="text"class="form-control" id="text_About" name="text_About"value="{{$profail->text_About}}" >
                            </textarea>

                            @error('text_About')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror

                        </div>


                        <div class="mb-3 mt-3 ">
                            <label for="file" class="form-label">upload image </label>
                            <input type="file" class="form-control" id="image" name="image" value="{{$profail->image}}">


                            @error('image')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3 mt-3">
                            <label for="text" class="form-label">Our Mission</label>
                            <input type="text" class="form-control" id="text_mission" name="text_mission" value="{{$profail->text_mission}}">
                        

                            @error('text_mission')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror

                        </div>


                        <div class="mb-3 mt-3">
                            <label for="text" class="form-label">Oue vision</label>
                            <input type="text" class="form-control" id="text_vision" name="text_vision" value="{{$profail->text_vision}}">
                            

                            @error('text_vision')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror

                        </div>
                        <button type="submit" class="btn btn-secondary">Update</button>

                    @endsection

                    </form>
                </div>
            </div>
        </div>
    </body>

    </html>
