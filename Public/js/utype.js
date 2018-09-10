/*************************************************************************
 > FileName: ./main_global.js
 > Author  : DingJing
 > Mail    : dingjing@live.cn
 > Created Time: 2018年01月24日 星期三 09时22分47秒
 ************************************************************************/

function detail_input(jsObj) {
    var table = "";
    var target = Array();
    var para = Array();
    var startTim;
    var stopTim;
    var res = Object();
    var flag = '';
    table = 'summary';                                               // 查询哪个表
    for(var key in jsObj) {
        if(key == 'frePro' || key == 'nchPro' || key == 'chaPro' || key == 'monPro') {
            flag = "search_exhibit";
            target.push(key);
        } else if (key == 'freNum' || key == 'nchNum' || key == 'chaNum' || key == 'monNum' || key == 'allNum') {
            flag = 'search_value';
            target.push(key);
        }else {
            para.push(key);
        }
    }
    startTim = $('#fstart_tim').val();
    stopTim = $('#fstop_tim').val();
    diff = stopTim - startTim
    if (diff <= 2) {
        layer.msg('请设置更大的时间跨度且保证截止时间大于开始时间');
        return false;
    }
    if (target.length <= 0) {
        layer.msg('请选择至少一个查询指标');
        return false;
    }
    res.table = table;
    res.para = para;
    res.target = target;
    res.start = startTim;
    res.stop = stopTim;

    return {"page": flag, "put": JSON.stringify(res)};
}

function get_before_date(beforeDay) {
    var d = new Date();
    d.setDate(d.getDate() - beforeDay);
    return d;
}

layui.use(['form', 'laydate'], function(){
    var form = layui.form;
    var fee = [];

    var laydate = layui.laydate;
    var startTim = {
        elem: '#fstart_tim',
        format: 'yyyyMMdd',
        min: '2018-01-01',
        value: get_before_date(36),
        max: -3,
        istime: false
    };

    var stopTim = {
        elem: '#fstop_tim',
        format: 'yyyyMMdd',
        min: '2018-01-01',
        max: -1,
        value: get_before_date(2),
        istime: false
    };
    form.render();
    laydate.render(startTim);
    laydate.render(stopTim);

    form.on('submit(form_submit)', function(data){
        var formData = data.field;
        var res = detail_input(formData);
        if (res != false) {
            post_request('utype', res['page'], res['put']);
        }
        return false;
    });
});


