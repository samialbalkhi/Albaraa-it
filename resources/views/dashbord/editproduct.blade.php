    {{-- @extends('layuot.navbar') --}}
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>Document</title>


    </head>

    <body>
        {{-- @section('nav') --}}
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


            <div class="m-4">

                <div class=" d-flex justify-content-center ">



                    <table id="example2" class="table">
                        <thead>
                            <tr>
                                <th scope="col">id</th>

                                <th scope="col">list of Detals</th>



                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($detail as $items)
                                <tr>

                                    <th scope="row">{{ $items->id }}</th>
                                    <td>{{ $items->details }}</td>

                                    <td>
                                        <button type="button" data-bs-toggle="modal" details_id="{{ $items->id }}"
                                            data-bs-target="#updateStudentModal" class="btn btn-primary detiles">
                                            Edit
                                        </button>


                                        <a href="" type="submit" class="btn btn-danger">delete</a>
                                    </td>

                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Update Student Modal -->
        <div wire:ignore.self class="modal fade" id="updateStudentModal" tabindex="-1"
            aria-labelledby="updateStudentModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateStudentModalLabel">Edit Student</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal"
                            aria-label="Close"></button>
                    </div>
                    <form>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label>Update details</label>
                                <input type="text" name="details" id="details" class="form-control">
                                @error('details')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" wire:click="closeModal"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" data-id="0"
                                class="btn btn-primary Update_details">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>



        <script src="https://code.jquery.com/jquery-3.6.4.min.js"
            integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function() {
                $(".detiles").click(function() {
                    var id = $(this).attr("details_id");
                    $.ajax({
                        type: "GET",
                        url: "/edit?id=" + id,
                        'id': id,
                        success: function(response) {
                            $('#details').val(response.data);


                        }
                    });
                })
                $('.Update_details').click(function() {
                    //  var id=id.val();
                    var details = ('#details').val();
                    $.ajax({
                        type: "POST",
                        url: "{{ route('update_detail') }}",
                        data: {
                            'details': details
                        },
                        headers: {

                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        dataType: "dataType",
                        success: function(response) {

                        }
                    });
                })
            });
        </script>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
            integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
            integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
        </script>

    </body>

    </html>
