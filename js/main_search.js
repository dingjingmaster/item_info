/*************************************************************************
> FileName: main_search.js
> Author  : DingJing
> Mail    : dingjing@live.cn
> Created Time: 2018年01月22日 星期一 15时08分39秒
 ************************************************************************/

function search_request_init(page) {

    var xmlhttp;
    var title = '';
    var request = '/item_info/item_info/include/common_action.php?type=search&page=' + page;
    if(window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    if(page == 'exhibit' || page == 'exhValu') {
        title = '订展比相关查询'
    }

    xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            //
            var res = xmlhttp.responseText;
            document.getElementById('form_div').innerHTML = res;
            document.getElementById('main_div').innerHTML = '';
            document.getElementById('nav_page').innerHTML = '';
            document.getElementById('title_div').innerHTML = title;
            var reset = document.getElementById('form_reset');
            $("button#form_reset").click();
       }
    }
    xmlhttp.open('GET', request, true);
    xmlhttp.send();
}

function search_request_select(page, info) {

    var xmlhttp;
    var request = '/item_info/item_info/include/common_action.php';
    if(window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var res = xmlhttp.responseText;
//            document.getElementById('main_div').innerHTML = res;

            var json = JSON.parse(res);
            
            var mainPage = json.mainPage;                                                           // 主页
            document.getElementById('main_div').innerHTML = mainPage;
            var navPage = json.navPage;                                                             // 导航栏
            document.getElementById('nav_page').innerHTML = navPage;
            var js = JSON.parse(json.json);                                                         // json 绘图信息
            var divId = js['div'];
            var pic = js['json'];
            plot_picture(divId, JSON.parse(pic));
        }
    }
    xmlhttp.open('POST', request, true);
    xmlhttp.setRequestHeader('Content-type', "application/x-www-form-urlencoded");
    xmlhttp.send("page=" + page + '&data=' + info);
}

