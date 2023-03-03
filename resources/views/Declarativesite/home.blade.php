<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <title>Document</title>
    <style>
        .activ{
            background-color:#5CB580;
        }
        .left{
            width: 100%;
            margin-top: 80px;
            margin-left: 120px;
        }
        .list-group-item{
            height: 60px;
            width: 170%;
        }
        .container{
            display: inline-flex;
            background-color: #F3F3F3;
        }
        .right{
            width: 50%;
            margin-top: 50px;
        }
        .carousel-item{
            margin-top: -80px;
        }
        .prodact{
            margin-top: 60px;
        }
        a{
            text-decoration: none;
        }
    </style>
</head>
<body>
    <header class="container">
        <div class="left">
          <div class="cards">
            <ul class="list-group" style="width: 25%;">
                <li class="list-group-item activ">Home</li>
                <a href="{{route('view_product')}}"> <li class="list-group-item" > Prodact</li></a>
                <li class="list-group-item">About Us</li>
            </ul>
          </div>  
        </div>
        <div class="right">
            <div id="carouselExample" class="carousel slide">
                <div class="carousel-inner"  style="width: 600px; height: 300px;">
                  <div class="carousel-item active" >
                    <img src="storage/images/GB2mMjbdPY4wgpZsXZhgApZJ7WDXZnlSoMkQQD7a.jpg" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="storage/images/GB2mMjbdPY4wgpZsXZhgApZJ7WDXZnlSoMkQQD7a.jpg" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="storage/images/GB2mMjbdPY4wgpZsXZhgApZJ7WDXZnlSoMkQQD7a.jpg" class="d-block w-100" alt="...">
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
        </div>
    </header>
    <section class="prodact" style="overflow: hidden">
        <h2 style="text-align: center">Our On Prodacts</h2>
        <div class="row">
            @foreach ($Prodact as $items )
            <div class="col-sm-3" style="width: 300px;margin-left: 50px">
                <div class="card" style="margin-top: 50px">
                    <img src="storage/{{ $items->image }}" class="card-img-top" width="250px" height="250px" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$items->name}}</h5>
                        <p class="card-text">{{$items->title}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    <section class="prodact" style="overflow: hidden">
        <h2 style="text-align: center">New Prodacts</h2>
        <div class="row">
            @foreach ($Prodact as $items )
            <div class="col-sm-3" style="width: 300px;margin-left: 50px">
                <div class="card" style="margin-top: 50px">
                    <img src="storage/{{ $items->image }}" class="card-img-top" width="250px" height="250px" alt="...">
                    <div class="card-body">
                        <h5 class="card-title" style="text-align: center">{{$items->name}}</h5>
                        <p class="card-text">{{$items->title}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    
</body>
</html>