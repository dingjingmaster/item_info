/*************************************************************************
 > FileName: ./main_global.js
 > Author  : DingJing
 > Mail    : dingjing@live.cn
 > Created Time: 2018年01月24日 星期三 09时22分47秒
 ************************************************************************/

function detail_input(jsObj) {
    var table = "";
    var fee = Array();
    var target = Array();
    var para = Array();                                                 // 细分的模块
    var startTim;
    var stopTim;
    var res = Object();
    var flag = '';
    table = jsObj['dim'];                                               // 查询哪个表
    for(var key in jsObj) {
        if(key == 'dim') {
            continue;
        } else if (null != key.match(/Fee$/)) {
            fee.push(key);
        } else if (key == 'rteDay' || key == 'rteWeek' || key == 'rteWk7') {
            flag = "search_retent";
            target.push(key);
        } else if (key == 'valDay' || key == 'valWeek' || key == 'valWk7') {
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
    res.fee = fee;
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
        value: '20180201',
        max: -3,
        istime: false,
    };

    var stopTim = {
        elem: '#fstop_tim',
        format: 'yyyyMMdd',
        min: '2018-01-01',
        max: -1,
        value: get_before_date(1),
        istime: false,
    };

    form.on('select(form_dim)', function(data){
        // 隐藏所有div
        document.getElementById('form_fee_div').style.display="none";
        document.getElementById('form_sub_div').style.display="none";
        document.getElementById('form_target_div').style.display="none";
        document.getElementById('form_time_div').style.display="none";
        document.getElementById('form_submit').style.display="none";

        // 删除
        $("#form_sub").empty();

        if(data.value == 'limitfree') {
            // 限免
            // 1. 选择要查询的页面 2.选中后出现按钮
            document.getElementById('form_sub_div').style.display="block";
            document.getElementById('form_target_div').style.display="block";
            document.getElementById('form_time_div').style.display="block";
            document.getElementById('form_submit').style.display="block";

            var stg= '' +
                '<input type="checkbox" lay-skin="primary" name="limfe1" title="第一批限免" checked />' +
                '<input type="checkbox" lay-skin="primary" name="limfe2" title="第二批限免" checked/>' +
                '<input type="checkbox" lay-skin="primary" name="limfe3" title="第三批限免" checked/>' +
                '<input type="checkbox" lay-skin="primary" name="limfe4" title="第四批限免" checked/>';

            document.getElementById('form_sub').innerHTML = stg;


        } else if (data.value == 'fee') {
            // 付费类别
            document.getElementById('form_fee_div').style.display="block";
            document.getElementById('form_target_div').style.display="block";
            document.getElementById('form_time_div').style.display="block";
            document.getElementById('form_submit').style.display="block";

        } else if (data.value == 'status') {
            // 书籍状态
            document.getElementById('form_sub_div').style.display="block";
            document.getElementById('form_fee_div').style.display="block";
            document.getElementById('form_target_div').style.display="block";
            document.getElementById('form_time_div').style.display="block";
            document.getElementById('form_submit').style.display="block";
            var stg= '' +
                '<input type="checkbox" lay-skin="primary" name="finish" title="完结"/>' +
                '<input type="checkbox" lay-skin="primary" name="unfinish" title="连载" checked/>';
            document.getElementById('form_sub').innerHTML = stg;

        } else if (data.value == 'viewCount') {
            document.getElementById('form_sub_div').style.display="block";
            document.getElementById('form_fee_div').style.display="block";
            document.getElementById('form_target_div').style.display="block";
            document.getElementById('form_time_div').style.display="block";
            document.getElementById('form_submit').style.display="block";
            // 维度细分
            var stg= '' +
                '<input type="checkbox" lay-skin="primary" name="bt0to1b" title="介于0到100" checked/>' +
                '<input type="checkbox" lay-skin="primary" name="bt1bto1k" title="介于100到1000"/>' +
                '<input type="checkbox" lay-skin="primary" name="bt1kto1w" title="介于1000到1万"/>' +
                '<input type="checkbox" lay-skin="primary" name="bt1wto10w" title="介于1万到10万"/>' +
                '<input type="checkbox" lay-skin="primary" name="gt10w" title="大于10万"/>';
            document.getElementById('form_sub').innerHTML = stg;
        } else if (data.value == 'intime') {
            // 入库时间
            document.getElementById('form_sub_div').style.display="block";
            document.getElementById('form_fee_div').style.display="block";
            document.getElementById('form_target_div').style.display="block";
            document.getElementById('form_time_div').style.display="block";
            document.getElementById('form_submit').style.display="block";
            // 维度细分
            var itim= '' +
                '<input type="checkbox" lay-skin="primary" name="lesMonIn" title="1月内入库" checked/>' +
                '<input type="checkbox" lay-skin="primary" name="bt1mto3mIn" title="1~3月内入库"/>' +
                '<input type="checkbox" lay-skin="primary" name="bt3mto12mIn" title="3~12月内入库"/>' +
                '<input type="checkbox" lay-skin="primary" name="gt1yIn" title="大于1年入库"/>';
            document.getElementById('form_sub').innerHTML = itim;
        } else if (data.value == 'update') {
            // 最后更新时间
            document.getElementById('form_sub_div').style.display="block";
            document.getElementById('form_fee_div').style.display="block";
            document.getElementById('form_target_div').style.display="block";
            document.getElementById('form_time_div').style.display="block";
            document.getElementById('form_submit').style.display="block";
            // 维度细分
            var utim = '' +
                '<input type="checkbox" lay-skin="primary" name="lesMonUpd" title="0~1月未更新" checked/>' +
                '<input type="checkbox" lay-skin="primary" name="bt1mto3mUpd" title="1~3月未更新"/>' +
                '<input type="checkbox" lay-skin="primary" name="bt3mto12mUpd" title="3~12月未更新"/>' +
                '<input type="checkbox" lay-skin="primary" name="gt1yUpd" title="大于1年未更新"/>';
            document.getElementById('form_sub').innerHTML = utim;
        } else if (data.value == 'classify1') {
            // 一级分类
            document.getElementById('form_sub_div').style.display="block";
            document.getElementById('form_fee_div').style.display="block";
            document.getElementById('form_target_div').style.display="block";
            document.getElementById('form_time_div').style.display="block";
            document.getElementById('form_submit').style.display="block";
            // 维度细分
            var ctg1 = '' +
                '<input type="checkbox" lay-skin="primary" name="boyCfy1" title="男频" checked/>' +
                '<input type="checkbox" lay-skin="primary" name="girlCfy1" title="女频"/>' +
                '<input type="checkbox" lay-skin="primary" name="pshCfy1" title="出版"/>' +
                '<input type="checkbox" lay-skin="primary" name="othCfy1" title="其它"/>';
            document.getElementById('form_sub').innerHTML = ctg1;
        }
        form.render();
        laydate.render(startTim);
        laydate.render(stopTim);
    });

    form.on('submit(form_submit)', function(data){
        var formData = data.field;
        // 检查第一栏是否选择
        if(formData['dim'].length <= 1) {
            layer.msg("请您输入查询维度...");
            return false;
        }
        var res = detail_input(formData);
        if (res != false) {
            post_request('retent', res['page'], res['put']);
        }
        return false;
    });
});



