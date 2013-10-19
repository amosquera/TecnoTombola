<?php session_start(); ?>
<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8"><meta name="format-detection" content="telephone=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
        <title>Tecno Tómbola</title>
        <meta http-equiv="expires" content="0" />
        <meta http-equiv="Cache-Control" content="no-cache" />
        <meta http-equiv="pragma" content="no-cache"/>
        <meta name="description" content=""/>
        <meta name="viewport" content="width=device-width"/>
        <meta name="generator" content="Platilla - TecnoForum"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
        <link rel="stylesheet" href="css/index.css"/>
        <link rel="shortcut icon" href="img/favicon.ico"/>
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
        <!--[if lt IE 9]>
        <script src="js/css3-mediaqueries.js"></script>
        <![endif]-->
        <style>
            #tombolaTimer,h2{
                height: 100px;
                line-height:1em;
                margin-top:50px!important;
                margin-bottom: 50px!important;
            }
            #random2, p{
                line-height:1em;
                margin-top:50px !important;
            }
            #felicitacion h2{
                color:rgb(43, 210, 217) !important;
            }
        </style>
    </head>
    <body>
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id))
                    return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1&appId=543353302394110";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
        <header>
            <img src="img/title.png"/>
            <aside>
                <a href="https://twitter.com/intent/tweet?button_hashtag=TecnoTombola&text=la%20quiero" class="twitter-hashtag-button" data-lang="es" data-related="tecnoTombola" data-count="vertical">Tweet</a>
                <div class="g-plusone" data-annotation="inline" data-width="300"></div>
            </aside>
        </header>
        <div>
            <!--[if lt IE 10]>
                    <h4 class="chromeframe">Estas usando un internet explorer <strong>viejo</strong>. 
                    Por favor <a href="http://browsehappy.com/">actualiza tu navegador</a> o 
                    <a href="http://www.google.com/chromeframe/?redirect=true">
                    activa Google Chrome Frame</a> para mejorar tu experiencia.</h4>
                <![endif]-->
        </div>
        <div id="cargando" class="oculto">
            <h2>CARGANDO...</h2>
        </div>
        <div id="tombola">
            <div id="tombolaControl">
                <h3>Ingrese el tiempo de espera para detener la tómbola</h3>
                <input type="text" id="flag" value="30" class="input-small"> <span>segundos</span><br />
                <!--<input class="btn-inverse btn-large stop" type="button" value="Detener" onclick="detener();"/>-->
                <input class="btn btn-large" type="button" id="star" value="Iniciar" onclick="iniciar();">
                <input class="btn btn-large" type="button" value="Regresar" onclick="window.location.assign('TuNavegadorEsMuyViejo.php');">
                <input type="hidden" id="flagS" value="0"><br />
            </div>
            <div id="tombolaTimer">
                <h2 id="timer"></h2>
            </div>
        </div>
        <div id="random2" class="oculto">
            <div>
                <?php
                echo $_SESSION['par'];
                ?>
            </div>
            <!--<input class="btn-inverse btn-large stop" type="button" value="Detener" onclick="detener();"/>-->
        </div>
        <div id="felicitacion" class="oculto">
            <h2 id="ganador"></h2>
            <input class="btn btn-large" type="button" id="regresar" value="Siguiente" onclick="regresar();">
        </div>
        <footer>
            <aside>
                <div class="fb-like" data-href="http://tecnotombola.com" data-send="true" data-width="450" data-show-faces="true">
                </div>
            </aside>
            Todos los derechos reservados ThonyFDesign 2013 <a href="about.html">mas información</a>
        </footer>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script type="text/javascript" src="js/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.file-input.js" ></script>
        <script type="text/javascript" src="js/jquery.timer.js"></script>
        <script type="text/javascript" src="js/code.js" ></script>
        <script type="text/javascript">
            !function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (!d.getElementById(id)) {
                    js = d.createElement(s);
                    js.id = id;
                    js.src = "https://platform.twitter.com/widgets.js";
                    fjs.parentNode.insertBefore(js, fjs);
                }
            }(document, "script", "twitter-wjs");

            window.___gcfg = {lang: 'es-419'};

            (function() {
                var po = document.createElement('script');
                po.type = 'text/javascript';
                po.async = true;
                po.src = 'https://apis.google.com/js/plusone.js';
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(po, s);
            })();
        </script>
        <script>
            (function(i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function() {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                        m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

            ga('create', 'UA-31306561-5', 'tecnotombola.com');
            ga('send', 'pageview');

        </script>
    </body>
</html>