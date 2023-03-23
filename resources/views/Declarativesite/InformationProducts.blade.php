<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Document</title>

    <style>
        body {

            background-color: #e6dcdc;
        }

        .right {
            margin-left: 500px;

        }

        h1 {
            margin: 50px;
        }

        h5 {
            text-align: right;
            margin-right: 200px;
        }

        h2 {
            text-align: right;
            margin-right: 50px;

        }

        h3 {
            margin-right: 70px;
            margin-left: 100px;

        }
        .carousel-item{
            margin-top: -80px;
        }
    </style>
</head>

<body>
    <header class="container">
        <div class="left ">

            
            <div class="right">
                <div id="carouselExample" class="carousel slide">
                    <div class="carousel-inner"  style="width: 600px; height: 300px;">
                      @foreach ($prodactimage->imageprodcus as $prodacts  )
                          
                      <div class="carousel-item active" >
                          
                          <img src="/storage/{{ $prodacts->image }}" class="card-img-top">
                          
                          
                        </div>
                        
                        @endforeach
                     
                    </div>
                    
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                      
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true">
                          
                    </span>
                    
                    <span class="visually-hidden">Next</span>
                    
                </button>
            </div>
        </div>
            
    </header>
    <section>
        <div class="container">
            <div class="card">

                <h1>{{ $prodact->name }}</h1>
                <h1>{{ $prodact->title }}</h1>
                <h2>{{ $prodact->price }} $</h2>
            </div>
        </div>
    </section>
    <footer>
        <div class="container">


            <h1>ditals</h1>
            <h3>
                @foreach ($prodact->details as $item)
                    {{ $item->details }}<br><br>
                @endforeach
            </h3>

        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>
