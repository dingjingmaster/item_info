<!DOCTYPE html>
<html lang="zh-cn">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="http://cdn.static.runoob.com/libs/foundation/5.5.3/js/foundation.min.js"></script>
        <script src="http://cdn.static.runoob.com/libs/foundation/5.5.3/js/vendor/modernizr.js"></script>
        <script type="text/javascript" src="js/main_size.js"></script>
        <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/foundation/5.5.3/css/foundation.min.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <title>宜搜物品信息展示平台</title>
        <script>
            function body_resize(){
                frame_width();
            }

            function mtest(){
                document.getElementById('frame_main').src="frame/common_left_slider.php";
            }
        </script>
    </head>
    <body onresize="body_resize()">
        <div>
            <hr/>
        </div>
        <div class="full_screen">
            <iframe src="frame/common_left_slider.php" id="frame_slider" scrolling="auto" width="200" height="100%"></iframe>
            <iframe src="frame/main_retent_day.php" id="frame_main" onload="frame_width()" float="right" scrolling="auto" height="100%"></iframe>
        </div>
        <footer>
            <hr/>
            <hr/>
            <hr/>
        </footer>
    </body>
</html>
