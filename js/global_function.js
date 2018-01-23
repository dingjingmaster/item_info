/*************************************************************************
> FileName: global_function.js
> Author  : DingJing
> Mail    : dingjing@live.cn
> Created Time: 2018年01月23日 星期二 18时22分52秒
 ************************************************************************/

$("select#form_dim").change(function(){

alert("改变1");
var x = document.getElementById("form_dim");
var y = document.getElementById("form_module");
alert("改变");

y.options.length = 0;
if(x.selectedIndex == 1) {
        y.options.add(new Option("书架-猜你喜欢", "shfGusMdl"));
        y.options.add(new Option("免费-包月推荐", "freMonRecMdl"));
        y.options.add(new Option("免费-猜你喜欢", "freGusMdl"));
        y.options.add(new Option("精选-瀑布流", "chsStmMdl"));
        y.options.add(new Option("精选-完结瀑布流", "chsFinStmMdl"));
        y.options.add(new Option("精选-男频瀑布流", "chsBoyStmMdl"));
        y.options.add(new Option("精选-排行瀑布流", "chsRakStmMdl"));
        y.options.add(new Option("精选-女频瀑布流", "chsGilStmMdl"));
        y.options.add(new Option("封面页-类别推荐", "foeCtgMdl"));
        y.options.add(new Option("封面页-作者推荐", "foeAutMdl"));
        y.options.add(new Option("封面页-读本书的人还看过", "foeArdMdl"));
        y.options.add(new Option("封面页-读本书的人还看过更多", "foeArdMorMdl"));
        y.options.add(new Option("章末页-读本书的人还看过", "bakArdMdl"));
        y.options.add(new Option("书架推荐", "shfRecMdl"));
        y.options.add(new Option("包月瀑布流", "monStmMdl"));
        y.options.add(new Option("根据阅读推荐", "redRecMdl"));
        y.options.add(new Option("退出拦截推荐", "extRecMdl"));
}
});







