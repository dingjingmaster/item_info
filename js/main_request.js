/*************************************************************************
> FileName: main_request.js
> Author  : DingJing
> Mail    : dingjing@live.cn
> Created Time: 2018年01月17日 星期三 15时59分41秒
 ************************************************************************/


/**
 *  req: retent=留存率 req=请求类型 para=参数
 *
 */

function plot_picture(divName, jsonPara) {
    $(document).ready(function(){
        var div = '#' + divName; 
        $(div).highcharts(jsonPara);
    });
}

function page_init(page, type) {

    var xmlhttp;
    var request = '/item_info/item_info/include/common_action.php?page=' + page + '&type=' + type;
    if(window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            //
            var res = xmlhttp.responseText;
            var json = JSON.parse(res);

            document.getElementById('form_div').innerHTML = json.form_div;
            document.getElementById('main_div').innerHTML = json.main_div;
            document.getElementById('nav_div').innerHTML = json.nav_div;
            document.getElementById('title_div').innerHTML = json.title_div;
            document.getElementById('script').src = json.script_div;

            var reset = document.getElementById('form_reset');
            $("button#form_reset").click();
       }
    }
    xmlhttp.open('GET', request, true);
    xmlhttp.send();
}















function request_retent(req) {
    var xmlhttp;
    var request = '/item_info/item_info/include/common_action.php?type=retent&req=' + req;
    //var request = '/include/common_action.php?type=retent&req=' + req;
    if(window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            //
            var res = xmlhttp.responseText;
            var json = JSON.parse(res);

            // 标题
            var titlePage = json.title;
            document.getElementById('title_div').innerHTML = titlePage;
            document.getElementById('form_div').innerHTML = '';

            // 主页
            var mainPage = json.mainPage;
            document.getElementById('main_div').innerHTML = mainPage;

            // 导航栏
            var navPage = json.navPage;
            document.getElementById('nav_page').innerHTML = navPage;

            // json 绘图信息
            var js = JSON.parse(json.json);
            for(var i in js) {
                var elem = js[i];
                var mJS = JSON.parse(elem);
                var divID = mJS['divId'];
                var mJson = mJS['json'];
                plot_picture(mJS['divId'], JSON.parse(mJson));
            }
        }
    }

    xmlhttp.open('GET', request, true);
    xmlhttp.send();

}


function request_exhibit(req) {

    var xmlhttp;
    var request = '/item_info/item_info/include/common_action.php?type=exhibit&req=' + req;
    if(window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            //
            var res = xmlhttp.responseText;
            var json = JSON.parse(res);

            // 标题
            var titlePage = json.title;
            document.getElementById('title_div').innerHTML = titlePage;

            // 主页
            var mainPage = json.mainPage;
            document.getElementById('main_div').innerHTML = mainPage;

            // 导航栏
            var navPage = json.navPage;
            document.getElementById('nav_page').innerHTML = navPage;

            // json 绘图信息
            var js = JSON.parse(json.json);
            for(var i in js) {
                var elem = js[i];
                var mJS = JSON.parse(elem);
                var divID = mJS['divId'];
                var mJson = mJS['json'];
                plot_picture(mJS['divId'], JSON.parse(mJson));
            }
        }
    }

    xmlhttp.open('GET', request, true);
    xmlhttp.send();
}

