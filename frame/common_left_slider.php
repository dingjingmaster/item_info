<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.bootcss.com/foundation/5.5.3/css/foundation.min.css">
    <script src="https://cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/foundation/5.5.3/js/foundation.min.js"></script>
    <script src="https://cdn.bootcss.com/foundation/5.5.3/js/vendor/modernizr.js"></script>
    <script>
        $(document).ready(function(){
            $(document).foundation();
        })
    </script>
</head>
<body style="padding:2px">
<ul class="accordion" data-accordion>
    <li class="accordion-navigation">
        <a href="#demo">留存率相关</a>
        <div id="demo" class="content">
            <ul class="button-group stack">
                <li><button type="button" class="button" onclick="day_retention">天留存</button></li>
                <li><button type="button" class="button">周留存</button></li>
                <li><button type="button" class="button">7天留存</button></li>
            </ul>
        </div>
    </li>
</ul>
</body>
</html>


