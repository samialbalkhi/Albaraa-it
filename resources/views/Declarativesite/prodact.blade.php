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
        .navbar{
         background-color: #8a8a95;
        }
        #navbarNav{
            justify-content: center;
            font-size: 20px;
        }
        li{
            margin: 20px;
        }
        a{
            text-decoration: none;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg" id="navbar">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
              @foreach ($Section as $itmes )
            <ul class="navbar-nav" id="btn">
                    
              <li class="nav-item" >
                <a class="nav-link active" aria-current="page" href="#">{{$itmes->name}}</a>
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
                      <ul class="list-group" style="margin-top: 50px">
                        @foreach ($brand_section as $item)
                        <h1>{{$item->brands->name}}</h1>
                        <li class="list-group-item activ"><li>
                        @endforeach
                    
                      </ul>
                    </div>  
                  </div>
            </div>
            <div class="col-sm" style="margin-left:-350px ">
                <section class="prodact" style="overflow: hidden;width:150%;">
                    <div class="row">
                        @foreach ($Prodact as $items )
                        <div class="col-sm-3" style="width: 300px">
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
            </div>
        </div>
    </div>
    
{{-- <script>
    document.getElementById('left').style.display="none"
                document.getElementById('btn').addEventListener("click",function(){
                    document.getElementById('left').style.display="flex"
                })
</script> --}}
</body>
</html>