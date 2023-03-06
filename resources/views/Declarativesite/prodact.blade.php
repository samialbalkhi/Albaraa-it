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

    <script src="https://cdn.jsdelivr.net/npm/axios@1.1.2/dist/axios.min.js"></script>

    <script src="https://unpkg.com/axios@1.1.2/dist/axios.min.js"></script>

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

        .active {
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
                            
                            <a class="nav-link active" id="sections" data-id="{{ $itmes->id }}" id="data"
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

                            <li class="list-group-item"></li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm" style="margin-left:-350px ">
                <section class="prodact" style="overflow: hidden;width:150%;">
                    <div id="productsData" class="row">

                    </div>
                </section>
            </div>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script type="module">
      
        $(document).ready(function() {

           var getFirstSection=$('#sections').attr('data-id');
         
        viewBrands(getFirstSection);

    
            async function viewBrands(SectionId){
                axios.get(`http://127.0.0.1:8000/section_brand?section_id=${SectionId}`).then((response) =>{
                    var tmp='';
                        response.data.forEach((brands)=>{
                            tmp+=

                            `
                        
                            <li class="list-group-item brandd " id="brand" brand-id=${brands.id}>${brands.name}</li>
                            `   
                
                        })
                           let container = document.getElementById('sidebar');
                           container.innerHTML='';
                           container.innerHTML=tmp;
                       
                       
                         
                           viewProducts(response.data[2].id); //// get brandId  wheere have products
                           $('.brandd').click(function (e) {
                                var brandId=$(this).attr('brand-id');
                                   
                                viewProducts(brandId);
               });
                             });
                           
                             

                        

            }

        
            async function viewProducts(getBrandId) 
            {
                axios.get(`http://127.0.0.1:8000/brand_products?brandId=${getBrandId}`).then((response) => {
                    var tmp='';
                        response.data.forEach((listOfProducts)=>{
                            tmp+=

                            `
                        
                            <div  class="col-sm-3" style="width: 300px">
                                <div class="card" style="margin-top: 50px"> 
                                    <a href="/information_products/${listOfProducts.id}"> <img src="storage/${ listOfProducts.image }" class="card-img-top" width="250px" height="250px" ></a>
                                    <div class="card-body">
                                    <h5 class="card-title">${listOfProducts.name}</h5>
                                <p class="card-text">${listOfProducts.title }</p>
                                </div>
                                </div>
                                </div>
                            `   
                                    // console.log('getdata' +response);
                                
                }) 
                            

                        var productcards = document.getElementById('productsData');

                            productcards.innerHTML='';
                            productcards.innerHTML=tmp;



            });
                  
           
            }


    

        })
           
    
    </script>
</body>

</html>
