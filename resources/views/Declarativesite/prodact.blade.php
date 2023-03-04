<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <title>Document</title>
    <style>
        .navbar {
            background-color: #8a8a95;
        }

        #navbarNav {
            justify-content: center;
            font-size: 20px;
        }

        li {
            margin: 20px;
        }

        .active{
            text-decoration: none;
            padding: 15px 25px;
            font-size: 24px;
            text-align: center;
            cursor: pointer;
            outline: none;
            color: #fff;

            border: none;
            border-radius: 15px;
            box-shadow: 0 9px #999;
        }

        .active:hover {
            background-color: #3e8e41
        }

        .active:active {
            background-color: #3e8e41;
            box-shadow: 0 5px #666;
            transform: translateY(4px);
        }
        .barand-btn{
            cursor: pointer;
            text-decoration: none;
        }
        .barand-btn:hover li{
            background-color: #3e8e41;
        }
        .brand{
            padding: 15px 25px;
            font-size: 24px;
            text-align: center;
            cursor: pointer;
            outline: none;
            color: #000;
            margin-top: 15px;

            border: none;
            border-radius: 15px;
        }
        .brand:active{
            
            background-color: #3e8e41;
            box-shadow: 0 5px #666;
            transform: translateY(4px);
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg" id="navbar">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse  navbar-collapse" id="navbarNav">
                @foreach ($Section as $itmes)
                    <ul class="navbar-nav " id="btn">

                        <li class="nav-item test">
                            <a class="nav-link active" data-id="{{ $itmes->id }}" id="data"
                                aria-current="page">{{ $itmes->name }}</a>
                        </li>
                @endforeach
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <div class="col-sm">
                <div class="left" id="left" style="width: 30%;margin-left: -100px">
                    <div class="cards">
                        <ul class="list-group" id="sidebar" style="margin-top: 50px">
                            @foreach ($sections as $listOfSection)
                                @foreach ($listOfSection->brands as $brand)
                                @endforeach
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm" style="margin-left:-350px ">
                <section class="prodact" style="overflow: hidden;width:150%;">
                    <div class="row">
                        @foreach ($Prodact as $items)
                            <div class="col-sm-3" style="width: 300px">
                                <div class="card" style="margin-top: 50px">
                                    <img src="storage/{{ $items->image }}" class="card-img-top" width="250px"
                                        height="250px" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $items->name }}</h5>
                                        <p class="card-text">{{ $items->title }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </section>
            </div>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {

            $(".test a").on('click', function() {
                let dataId = $(this).attr("data-id");

                $.ajax({
                    type: "post",
                    url: "{{ route('section_brand') }}",
                    headers: {

                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: {
                        'section_id': dataId
                    },

                    success: function(response) {

                        function appendSideBar(sidebar, listOfBrands) {
                            document.getElementById("sidebar").innerHTML = '';
                            sidebar.append(fetchBrands(listOfBrands));
                        }

                        function fetchBrands(brands) {


                            if (!Object.keys(brands).length) return;

                            let ul = document.createElement('ul');

                            for (let i = 0; i < brands.length; i++) {

                                let li = document.createElement('button')
                                li.className = "brand";
                                li.innerHTML = brands[i].name;


                                ul.append(li);
                            }

                            return ul;
                        }



                        let container = document.getElementById('sidebar');
                        appendSideBar(container, response);

                    }
                });

            })
            $(".brand").on('click', function() {
                console.log("name");
            })
        });
    </script>
</body>

</html>
