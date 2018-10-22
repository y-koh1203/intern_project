<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="../css/html5reset-1.6.1.css" rel="stylesheet" type="text/css">
        <link href="../css/design.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="../css/slider-pro.css" media="screen" />
        <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet" />
        <script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="../js/menu.js"></script>
        <script src="../js/jquery.sliderPro.min.js"></script>
        <title>Document</title>
        <style>
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
                        <li class="gnav__menu__item"><a href="#">和</a><div class="gnav__menu__background jp"></div></li>
                        <li class="gnav__menu__item"><a href="#">洋</a><div class="gnav__menu__background us"></div></li>
                        <li class="gnav__menu__item"><a href="#">中</a><div class="gnav__menu__background cn"></div></li>
                    </ul>
                </div><!--gnav-wrap-->
            </nav>
            <h1><a href="index.html"><span class="space"><span class="initial">M</span>ina</span><span class="space"><span class="initial">M</span>ori</span><span class="initial">G</span>ourmet</a></h1>
        </header>
        <article>
            <div id="main_cont">
                <div id="left_cont">
                    <!-- ↓スライダー本体 -->
                    <div id="simple" class="slider-pro">
                        <div class="sp-slides">
                            <div class="sp-slide">
                                <img class="sp-image" src="../images/IMG_7938.JPG" />
                            </div>
                            <div class="sp-slide">
                                <img class="sp-image" src="../images/IMG_7937.JPG" />
                            </div>
                            <div class="sp-slide">
                                <img class="sp-image" src="../images/IMG_7939.JPG" />
                            </div>
                            <div class="sp-slide">
                                <img class="sp-image" src="../images/IMG_7947.JPG" />
                            </div>
                        </div>
                    </div>
                </div>
                <div id="right_cont">
                    <div class="food_title">マルゲリータ</div>
                    <div class="food_genre">洋</div>
                    <div class="food_review">
                        ピッツァの登場。
                        よく見ると、切らないで出してくれてますね。<br>
                        これは切り口からトマトソースの水分やオリーブ油が皿の底
                        に流れて生地に染み込まないよう配慮しているのだと思われます。
                        他と明らかに違ったのは、他店と比べて真ん中部分も生地が
                        比較的厚め。<br>
                        なので、耳だけでなく全体的にモチモチ感を感じることが出来る♪
                        トマトソースもたっぷりで、チーズもしっかり。<br>
                        この味わいで600円は有り得ない安さ！
                        なんだか、申し訳なく思ってしまうほど安いのに美味しかった。<br>
                        この店だったら一度はやってみたかったピッツァ2枚食べにも挑戦してみたくなる、笑<br>
                        2枚食べても1200円だから絶対お得！<br>
                        もう少し早く知っておきたかったな。ご馳走さまでした！
                    </div>
                    <div class="food_price">価格￥600</div>
                    <div class="shop_url"><a href="https://tabelog.com/osaka/A2701/A270103/27046664/" target="_blank">Pizzeria Va Booo（ピッツェリア・ヴァ・ブー）→</a></div>
                </div>
            </div>
        </article>
        <footer>
            <div class="dummy_pic">
                <img src="../images/food_udon_zaru.png">
                <img src="../images/food_one_plate.png">
                <img src="../images/cha-han1.png">
                <img src="../images/salad_reisyabu.png">
                <img src="../images/food_karaage_lemon.png">
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
