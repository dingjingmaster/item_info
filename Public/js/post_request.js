/*************************************************************************
 > FileName: main_request.js
 > Author  : DingJing
 > Mail    : dingjing@live.cn
 > Created Time: 2018年01月17日 星期三 15时59分41秒
 ************************************************************************/

function post_request(page, act, para) {
    var xmlhttp;
    var request = '/item_info/index.php?s=Home/' + page + '/' + act;
    if(window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var res = xmlhttp.responseText;
            //document.getElementById('main_div').innerHTML = res;

            var json = JSON.parse(res);
            var mainPage = json.mainPage;                                                           // 主页
            document.getElementById('main_div').innerHTML = mainPage;
            var navPage = json.navPage;                                                             // 导航栏
            document.getElementById('nav_div').innerHTML = navPage;
            var js = JSON.parse(json.json);                                                         // json 绘图信息
            var divId = js['div'];
            var pic = js['json'];
            plot_picture(divId, JSON.parse(pic));
        }
    }
    xmlhttp.open('POST', request, true);
    xmlhttp.setRequestHeader('Content-type', "application/x-www-form-urlencoded");
    xmlhttp.send('para=' + para);
}
