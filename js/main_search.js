/*************************************************************************
> FileName: main_search.js
> Author  : DingJing
> Mail    : dingjing@live.cn
> Created Time: 2018年01月22日 星期一 15时08分39秒
 ************************************************************************/

function search_exhibit(module) {
    alert('exhibit');

    var xmlhttp;
    var request = '/include/common_action.php?type=search';
    if(window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            //
            var res = xmlhttp.responseText;

            //var json = JSON.parse(res);

            // 主页
            //var mainPage = json.mainPage;
            //document.getElementById('main_div').innerHTML = mainPage;

            // 导航栏
            //var navPage = json.navPage;
            //document.getElementById('nav_page').innerHTML = navPage;

            // json 绘图信息
            //var js = JSON.parse(json.json);
            //for(var i in js) {
            //    var elem = js[i];
            //    var mJS = JSON.parse(elem);
            //    var divID = mJS['divId'];
            //    var mJson = mJS['json'];
            //    plot_picture(mJS['divId'], JSON.parse(mJson));
            //}
        }
    }

    xmlhttp.open('GET', request, true);
    xmlhttp.send();
}




function search_request_init() {

    var xmlhttp;
    var request = '/include/common_action.php?type=search';
    if(window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            //
            var res = xmlhttp.responseText;

            //var json = JSON.parse(res);

            // 主页
            //var mainPage = json.mainPage;
            //document.getElementById('main_div').innerHTML = mainPage;

            // 导航栏
            //var navPage = json.navPage;
            //document.getElementById('nav_page').innerHTML = navPage;

            // json 绘图信息
            //var js = JSON.parse(json.json);
            //for(var i in js) {
            //    var elem = js[i];
            //    var mJS = JSON.parse(elem);
            //    var divID = mJS['divId'];
            //    var mJson = mJS['json'];
            //    plot_picture(mJS['divId'], JSON.parse(mJson));
            //}
        }
    }

    xmlhttp.open('GET', request, true);
    xmlhttp.send();
}


