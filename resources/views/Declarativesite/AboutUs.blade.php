<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <style>
        body {

            background-color: #e6dcdc;
        }

        .container {
            display: inline-flex;
        }

        .left {
            width: 100%;
            margin-top: 80px;
            margin-left: 120px;
        }

        .right {
            width: 50%;
            margin-top: 50px;

        }

        .list-group-item {
            height: 60px;
            width: 170%;
        }

        .left_section {
            width: 30%;
            margin-top: 80px;
            margin-left: 120px;
        }

        .right_section {
            width: 50%;
            margin-top: 50px;
            margin-left: 220px;


        }

        .footer_lift {
            width: 50%;
            margin-top: 50px;
            margin-left: 100px;
        }

        .footer_right {
            width: 50%;
            margin-top: 50px;
            margin-left: 20%;
            margin-right: 10%;
        }

        a {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <form action="{{route('get_profile')}}" method="get">

        <header class="container">

            <div class="left">

                <ul class="list-group" style="width: 25%;">
                    <a href="{{ route('home_sa') }}">
                        <li class="list-group-item activ">Home</li>
                    </a>
                    <a href="{{ route('view_product') }}">
                        <li class="list-group-item"> Prodact</li>
                    </a>
                    <a href="{{ route('About_Us') }}">
                        <li class="list-group-item">About Us</li>
                    </a>
                </ul>
            </div>
            @foreach ($profile as $items )
                
            @endforeach
            <div class="right">
                <img src="storage/{{ $items->image_profile }}" class="card-img-top" width="250px"alt="...">

                    
            </div>

        </header>
        <section class="container">
            <div class="left_section">
                <img src="storage/{{ $items->image }}" class="card-img-top" width="250px"alt="...">

            </div>
            <div class="right_section">
                <h1>About the company</h1>
                {{$items->text_About}}
            </div>
        </section>
        <footer class="container">
            <div class="footer_lift">
                <h1>Our Mission</h1>
                {{$items->text_mission}}
            </div>
            <div class="footer_right">
                <h1>Our Vision</h1>
                {{$items->text_vision}}
                
    </form>


    </div>
    </footer>
</body>

</html>
