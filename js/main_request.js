/*************************************************************************
> FileName: main_request.js
> Author  : DingJing
> Mail    : dingjing@live.cn
> Created Time: 2018年01月17日 星期三 15时59分41秒
 ************************************************************************/

function request_retent_day() {
    var xmlhttp;
    if(window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById('main_div').innerHTML = xmlhttp.responseText;
        }
    }

    xmlhttp.open('GET', '/include/common_action.php?type=retent_day', true);
    xmlhttp.send();
}




