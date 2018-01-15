<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.bootcss.com/foundation/5.5.3/css/foundation.min.css">
    <script src="https://cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/foundation/5.5.3/js/foundation.min.js"></script>
    <script src="https://cdn.bootcss.com/foundation/5.5.3/js/vendor/modernizr.js"></script>
    <script type="text/javascript" src="../js/slide_click.js"></script>

    <script>
        $(document).ready(function(){
            $(document).foundation();
        })
    </script>
</head>
<body>
<br/>
<ul class="accordion" data-accordion>
    <li class="accordion-navigation">
        <a href="#item_retention">留存率相关统计</a>
        <div id="item_retention" class="content">
            <ul class="button-group stack-for-small">
                <li><button type="button" class="button" onclick="day_retention_click()">天留存</button></li>
                <li><button type="button" class="button" onclick="week_retention_click()">周留存</button></li>
                <li><button type="button" class="button" onclick="week7_retention_click()">7天留存</button></li>
            </ul>
        </div>
    </li>
</ul>
</body>
</html>


