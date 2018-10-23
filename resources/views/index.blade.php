<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="{{asset('/css/html5reset-1.6.1.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('/css/design.css')}}" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{asset('/css/swiper.min.css')}}">
        <script type="text/javascript" src="{{asset('/js/jquery-3.3.1.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('/js/menu.js')}}"></script>
        <script src="{{asset('/js/swiper.min.js')}}"></script>
        <title>TOP</title>
        <!-- Demo styles -->
        <style>
            .swiper-container {
                width: 100%;
                padding: 0 0 3% 0;
                background-color: transparent;
            }
            .swiper-slide {
                width: 20%;
                box-shadow:0px 0px 15px 0px #000000;
                border-radius: 10px;
                overflow: hidden;
            }
            .swiper-slide .food_pic {
                width: 100%;
            }
            .food_pic img {
                width: 100%;
            }
            .jp{
                background-image: url("{{ url('storage/images/MIL28021.JPG') }}");
            }
            .us{
                background-image: url("{{ url('storage/images/pastas-1150032_1920.jpg') }}");
            }
            .cn{
                background-image: url("{{ url('storage/images/MIL28091.JPG') }}");
            }
        </style>
    </head>
    <body>
        <header>
            <a class="menu">
                <span class="menu__line menu__line--top"></span>
                <span class="menu__line menu__line--center"></span>
                <span class="menu__line menu__line--bottom"></span>
            </a>
            <nav class="gnav">
                <div class="gnav__wrap">
                    <ul class="gnav__menu">
                        <li class="gnav__menu__item"><a href="/japanese">和</a><div class="gnav__menu__background jp"></div></li>
                        <li class="gnav__menu__item"><a href="/western">洋</a><div class="gnav__menu__background us"></div></li>
                        <li class="gnav__menu__item"><a href="/chinese">中</a><div class="gnav__menu__background cn"></div></li>
                    </ul>
                </div><!--gnav-wrap-->
            </nav>
            <h1><a href="/"><span class="space"><span class="initial">M</span>ina</span><span class="space"><span class="initial">M</span>ori</span><span class="initial">G</span>ourmet</a></h1>
        </header>
        <article>
            <!-- Swiper -->
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    @if(count($foods) > 0)
                        @foreach ($foods as $food)
                        <div class="swiper-slide">
                            <div class="food_pic"><img src="{{ url('storage/images/'.$food->image_path1) }}" alt=""></div>
                            <div class="food">{{$food->name}}</div>
                            <div class="food_category">{{$food->genre}}</div>
                            <div class="more"><a href="/index/detail/{{$food->id}}">MORE</a></div>
                        </div>
                        @endforeach
                    @else
                        <div>no record.</div>
                    @endif
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination swiper-pagination-black"></div>
            </div>
        </article>
        <footer>
            <div class="dummy_pic">
                <img src="{{ url('storage/images/food_udon_zaru.png') }}">
                <img src="{{ url('storage/images/food_one_plate.png') }}">
                <img src="{{ url('storage/images/cha-han1.png') }}">
                <img src="{{ url('storage/images/salad_reisyabu.png') }}">
                <img src="{{ url('storage/images/food_karaage_lemon.png') }}">
            </div>
            <div class="copyright">Copyright©2017 clarenet. All Rights Reserved. & Created by Tera and Yama</div>
        </footer>
        <!-- Initialize Swiper -->
        <script>
            
            var swiper = new Swiper('.swiper-container', {
                effect: 'coverflow',
                grabCursor: true,
                centeredSlides: true,
                slidesPerView: 'auto',
                coverflowEffect: {
                    rotate: 50,
                    stretch: 0,
                    depth: 100,
                    modifier: 1,
                    slideShadows : true,
                },
                pagination: {
                    el: '.swiper-pagination',
                },
                loop:true,
                spaceBetween:100
            });
        </script>
    </body>
