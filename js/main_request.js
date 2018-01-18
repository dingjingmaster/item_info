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


function request_retent(req) {
    var xmlhttp;
    var request = '/include/common_action.php?type=retent&req=' + req;
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
            document.getElementById('main_div').innerHTML = res;
        }
    }

    xmlhttp.open('GET', request, true);
    xmlhttp.send();
}



