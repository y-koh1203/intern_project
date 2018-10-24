<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="{{asset('/css/html5reset-1.6.1.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('/css/design.css')}}" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="{{asset('/css/slider-pro.css')}}" media="screen" />
        <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet" />
        <script type="text/javascript" src="{{asset('/js/jquery-3.3.1.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('/js/menu.js')}}"></script>
        <script src="{{asset('/js/jquery.sliderPro.min.js')}}"></script>
        <title>Document</title>
        <style>
            /* @font-face{
                font-family:"logo_font";
                src:url("../fonts/corp_round_v1.ttf");
            }
            @font-face{
                font-family:"main_font";
                src:url("../fonts/bokutachi.otf");
            }
            @font-face{
                font-family:"jp_font";
                src:url("../fonts/AiharaHudemojiKaisho3.00.ttf")
            }
            @font-face{
                font-family:"us_font";
                src:url("../fonts/cinecaption226.ttf")
            }
            @font-face{
                font-family:"cn_font";
                src:url("../fonts/esenapaj.otf")
            }
            body{
                font-family:"main_font";
            }
            h1 a{
                font-family:"logo_font";
            }
            .jp_font a{
                font-family:"jp_font";
            }
            .us_font a{
                font-family:"us_font";
            }
            .cn_font a{
                font-family:"cn_font";
            } */
            /*前矢印のアイコンフォント*/
            .sp-next-arrow:before {
                font-family: FontAwesome !important;
                
            }
            /*後矢印のアイコンフォント*/
            .sp-previous-arrow:before {
                font-family: FontAwesome !important;
                
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
                        <li class="gnav__menu__item"><a href="#">和食</a><div class="gnav__menu__background jp"></div></li>
                        <li class="gnav__menu__item"><a href="#">洋食</a><div class="gnav__menu__background us"></div></li>
                        <li class="gnav__menu__item"><a href="#">中華</a><div class="gnav__menu__background cn"></div></li>
                    </ul>
                </div><!--gnav-wrap-->
            </nav>
            <h1><a href="/"><span class="space"><span class="initial">M</span>ina</span><span class="space"><span class="initial">M</span>ori</span><span class="initial">G</span>ourmet</a></h1>
        </header>
        @foreach($foods as $food)
        <article>
            <div id="main_cont">
                <div id="left_cont">
                    <!-- ↓スライダー本体 -->
                    <div id="simple" class="slider-pro">
                        <div class="sp-slides">
                            @if($food->image_path1 != null)
                            <div class="sp-slide">
                                <img class="sp-image" src="{{ url('storage/images/foods/'.$food->image_path1) }}" />
                            </div>
                            @endif
                            @if($food->image_path2 != null)
                            <div class="sp-slide">
                                <img class="sp-image" src="{{ url('storage/images/foods/'.$food->image_path2) }}" />
                            </div>
                            @endif
                            @if($food->image_path3 != null)
                            <div class="sp-slide">
                                <img class="sp-image" src="{{ url('storage/images/foods/'.$food->image_path3) }}" />
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div id="right_cont">
                    <div class="food_title">{{$food->name}}</div>
                    <div class="food_genre">{{$food->genre}}</div>
                    <div class="food_review">
                        {{$food->body}}
                    </div>
                    <div class="food_price">価格￥{{$food->price}}</div>
                    <div class="shop_url"><a href="{{$r_url}}" target="_blank" class="square_btn">{{$r_name}}→</a></div>
                </div>
            </div>
        </article>
        @endforeach
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
        <script>
            $( document ).ready(function( $ ) {
                $('#simple').sliderPro({
                    width: "100%",//横幅
                    height:550,
                    arrows: true,//左右の矢印
                    buttons: true,//ナビゲーションボタン
                    slideDistance:0,//スライド同士の距離
                });
            });
        </script>
    </body>
