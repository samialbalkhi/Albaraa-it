    @extends('layuot.navbar')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <title>Document</title>
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
                    <h3 class="mb-3 mt-3">Add Your Prodect</h3>
                    <div class="d-flex justify-content-center">
                        <form method="post" action="{{ route('update_product', $prodact->id) }}"
                            enctype="multipart/form-data" class="was-validated">
                            @csrf

                            <div class="mb-3 mt-3 ">
                                <label for="file" class="form-label">Update upload image prodact</label>
                                <input type="file" class="form-control" id="image" name="image"
                                    value="{{ $prodact->image }}">

                                <small id="image_erorr" class="form-text text-danger"></small>

                                @error('image')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror

                            </div>

                            <div class="mb-3 mt-3">
                                <label for="text" class="form-label">Update Name Prodact</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ $prodact->name }}">

                                <small id="title_erorr" class="form-text text-danger"></small>

                                @error('name')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror

                            </div>

                            <div class="mb-1 mt-1">
                                <label for="text" class="form-label">Update Title Prodact</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    value="{{ $prodact->title }}">

                                <small id="title_erorr" class="form-text text-danger"></small>

                                @error('title')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>


                            <div class="mb-3 mt-3">
                                <label for="text" class="form-label">Update Detalis</label>
                                <input type="text" class="form-control" id="list" name="list_of_details"
                                    value="{{ $prodact->list_of_details }}">

                                <small id="list_erorr" class="form-text text-danger"></small>

                                @error('list_of_details')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3 mt-3">
                                <label for="price" class="form-label">Update Price</label>
                                <input type="text" class="form-control" id="price" name="price"
                                    value="{{ $prodact->price }}">

                                <small id="price" class="form-text text-danger"></small>

                                @error('price')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>


                            <div class="mb-3 mt-3">
                                <label for="discount" class="form-label">Update Discount</label>
                                <input type="text" class="form-control" id="discount" name="discount"
                                    value="{{ $prodact->discount }}">

                                <small id="discount" class="form-text text-danger"></small>
                                @error('discount')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>


                            <div class="mb-3 mt-3">

                                <label for="">Update Brands</label>
                                <select name="brand_id" class="form-select" aria-label="Default select example">

                                    @foreach ($brand as $items)
                                        <option value="{{ $items->id }}">{{ $items->name }}</option>
                                    @endforeach

                                    @error('brand_id')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </select>
                            </div>

                            <button type="submit" class="btn btn-secondary">Save</button>

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
