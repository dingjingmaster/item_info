/*************************************************************************
> FileName: main_search.js
> Author  : DingJing
> Mail    : dingjing@live.cn
> Created Time: 2018年01月22日 星期一 15时08分39秒
 ************************************************************************/

function search_request_init(page) {

    var xmlhttp;
    var request = '/item_info/item_info/include/common_action.php?type=search&page=' + page;
    if(window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            //
            var res = xmlhttp.responseText;
            document.getElementById('form_div').innerHTML = res;
            var reset = document.getElementById('form_reset');
            $("button#form_reset").click();

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

function exhibit_change() {
    var x = document.getElementById("form_dim");
    var y = document.getElementById("form_module");

    y.options.length = 0;
    if(x.selectedIndex == 0) {
        y.options.add(new Option("书架推荐", "shfRecMdl"));
        y.options.add(new Option("免费-猜你喜欢", "freGusMdl"));
        y.options.add(new Option("章末页-读本书的人还看过", "bakArdMdl"));
        y.options.add(new Option("封面页-读本书的人还看过", "foeArdMdl"));
        y.options.add(new Option("书架-猜你喜欢", "shfGusMdl"));
        y.options.add(new Option("精选-瀑布流", "chsStmMdl"));
        y.options.add(new Option("封面页-读本书的人还看过更多", "foeArdMorMdl"));
        y.options.add(new Option("包月瀑布流", "monStmMdl"));
        y.options.add(new Option("封面页-类别推荐", "foeCtgMdl"));
        y.options.add(new Option("封面页-作者推荐", "foeAutMdl"));
        y.options.add(new Option("精选-完结瀑布流", "chsFinStmMdl"));
        y.options.add(new Option("免费-包月推荐", "freMonRecMdl"));
        y.options.add(new Option("精选-男频瀑布流", "chsBoyStmMdl"));
        y.options.add(new Option("精选-排行瀑布流", "chsRakStmMdl"));
        y.options.add(new Option("精选-女频瀑布流", "chsGilStmMdl"));
        y.options.add(new Option("根据阅读推荐", "redRecMdl"));
        y.options.add(new Option("退出拦截推荐", "extRecMdl"));
    }
}
























