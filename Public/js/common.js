
// 绘图函数
function plot_picture(divName, jsonPara) {
    $(document).ready(function(){
        var div = '#' + divName;
        $(div).highcharts(jsonPara);
    });
}

$(document).ready(function() {})

layui.use('element', function(){
    var element = layui.element;
});