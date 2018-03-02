
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

function get_before_date(beforeDay) {
    var d = new Date();
    d.setDate(d.getDate() - beforeDay);
    return d;
}