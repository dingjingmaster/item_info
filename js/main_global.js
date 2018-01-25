/*************************************************************************
> FileName: ./main_global.js
> Author  : DingJing
> Mail    : dingjing@live.cn
> Created Time: 2018年01月24日 星期三 09时22分47秒
 ************************************************************************/

function detail_input(jsObj) {
    var table = "";
    var module = Array();
    var fee = Array();
    var target = Array();
    var para = Array();                 // 细分的模块

    var res = Object();

    table = jsObj['dim'];
    for(var key in jsObj) {
        if(key == 'dim') {
            continue;
        } else if (null != key.match(/Mdl$/)) {
            module.push(key);
        } else if (null != key.match(/Fee$/)) {
            fee.push(key);
        } else if (key == 'clkDsp' || key == 'subClk' || key == 'subDsp' || key == 'redSub' || key == 'redDsp' || key == 'retent' || key == 'rteDsp') {
            target.push(key);
        } else {
            para.push(key);
        }
    }

    res.table = table;
    res.module = module;
    res.fee = fee;
    res.para = para;
    res.target = target;

    return JSON.stringify(res);
}


$(document).ready(function() {})

layui.use('element', function(){
    var element = layui.element;
});

layui.use('laydate', function() {

    // 截止时间
    //laydate.render({
    //    elem: '#form_stop_time'
    //});
});

layui.use(['form', 'laydate'], function(){
    var form = layui.form;
    var laydate = layui.laydate;

    var fee = [];
    // 开始时间
    laydate.render({
        elem: '#form_start_time'
    });

    form.on('select(form_dim)', function(data){
        // 隐藏所有div
        document.getElementById('form_sub_div').style.display="none";
        document.getElementById('form_mod_div').style.display="none";
        document.getElementById('form_fee_div').style.display="none";
        document.getElementById('form_target_div').style.display="none";
        document.getElementById('form_submit').style.display="none";
        // 删除
        $("#form_sub").empty();

        //
        if(data.value == 'summary') {
            // 总体情况
            // 1. 选择要查询的页面 2.选中后出现按钮
            document.getElementById('form_mod_div').style.display="block";
            document.getElementById('form_target_div').style.display="block";
            document.getElementById('form_submit').style.display="block";
        } else if (data.value == 'fee') {
            // 付费类别
            // 1. 选择要查询的页面 和 付费类型 2.选中后出现按钮
            document.getElementById('form_mod_div').style.display="block";
            document.getElementById('form_fee_div').style.display="block";
            document.getElementById('form_target_div').style.display="block";
            document.getElementById('form_submit').style.display="block";
        } else if (data.value == 'strategy') {
            // 推荐策略
            // 1. 选择要查询的页面 和 付费类型 和 模块细分 2. 选中后出现按钮
            document.getElementById('form_sub_div').style.display="block";
            document.getElementById('form_mod_div').style.display="block";
            document.getElementById('form_fee_div').style.display="block";
            document.getElementById('form_target_div').style.display="block";
            document.getElementById('form_submit').style.display="block";
            // 维度细分
            var stg= '' +
                '<input type="checkbox" lay-skin="primary" name="livStmRec" title="实时流"/>' + 
                '<input type="checkbox" lay-skin="primary" name="usrKnnRec" title="用户协同"/>' + 
                '<input type="checkbox" lay-skin="primary" name="codBotRec" title="冷启动"/>' + 
                '<input type="checkbox" lay-skin="primary" name="popRec" title="流行度"/>' + 
                '<input type="checkbox" lay-skin="primary" name="itemKnnRec" title="物品协同"/>' + 
                '<input type="checkbox" lay-skin="primary" name="samCtgRec" title="同分类"/>' + 
                '<input type="checkbox" lay-skin="primary" name="subMdlRec" title="订阅模型"/>' + 
                '<input type="checkbox" lay-skin="primary" name="redMdlRec" title="阅读模型"/>' + 
                '<input type="checkbox" lay-skin="primary" name="cotSimRec" title="内容相似"/>' + 
                '<input type="checkbox" lay-skin="primary" name="redMdlRec" title="阅读同分类"/>' + 
                '<input type="checkbox" lay-skin="primary" name="cat1SimCtgRec" title="一级同分类"/>';
            document.getElementById('form_sub').innerHTML = stg;
        } else if (data.value == 'status') {
            // 连载状态
            document.getElementById('form_sub_div').style.display="block";
            document.getElementById('form_mod_div').style.display="block";
            document.getElementById('form_fee_div').style.display="block";
            document.getElementById('form_target_div').style.display="block";
            document.getElementById('form_submit').style.display="block";
            // 维度细分
            var stu= '' +
                '<input type="checkbox" lay-skin="primary" name="cmpStau" title="完结"/>' + 
                '<input type="checkbox" lay-skin="primary" name="noCmpStau" title="连载"/>';
            document.getElementById('form_sub').innerHTML = stu;
        } else if (data.value == 'view') {
            // 订阅级别
            document.getElementById('form_sub_div').style.display="block";
            document.getElementById('form_mod_div').style.display="block";
            document.getElementById('form_fee_div').style.display="block";
            document.getElementById('form_target_div').style.display="block";
            document.getElementById('form_submit').style.display="block";
            // 维度细分
            var vie= '' +
                '<input type="checkbox" lay-skin="primary" name="bt0to10Sub" title="介于0到10"/>' + 
                '<input type="checkbox" lay-skin="primary" name="bt10to1bSub" title="介于10到100"/>' + 
                '<input type="checkbox" lay-skin="primary" name="bt1bto1kSub" title="介于100到1000"/>' + 
                '<input type="checkbox" lay-skin="primary" name="bt1kto10kSub" title="介于1000到10000"/>' + 
                '<input type="checkbox" lay-skin="primary" name="bt10kto100kSub" title="介于1万到10万"/>' + 
                '<input type="checkbox" lay-skin="primary" name="bt100kto1000kSub" title="介于10万到100万"/>' + 
                '<input type="checkbox" lay-skin="primary" name="bt1000kto10000kSub" title="介于100万到1千万"/>';
            document.getElementById('form_sub').innerHTML = vie;
        } else if (data.value == 'intime') {
            // 入库时间
            document.getElementById('form_sub_div').style.display="block";
            document.getElementById('form_mod_div').style.display="block";
            document.getElementById('form_fee_div').style.display="block";
            document.getElementById('form_target_div').style.display="block";
            document.getElementById('form_submit').style.display="block";
            // 维度细分
            var itim= '' +
                '<input type="checkbox" lay-skin="primary" name="lesMonIn" title="1月内入库"/>' + 
                '<input type="checkbox" lay-skin="primary" name="bt1mto3mIn" title="1~3月内入库"/>' + 
                '<input type="checkbox" lay-skin="primary" name="bt3mto12mIn" title="3~12月内入库"/>' + 
                '<input type="checkbox" lay-skin="primary" name="bt12mto99mIn" title="12~99月内入库"/>';
            document.getElementById('form_sub').innerHTML = itim;
        } else if (data.value == 'update') {
            // 最后更新时间
            document.getElementById('form_sub_div').style.display="block";
            document.getElementById('form_mod_div').style.display="block";
            document.getElementById('form_fee_div').style.display="block";
            document.getElementById('form_target_div').style.display="block";
            document.getElementById('form_submit').style.display="block";
            // 维度细分
            var utim = '' +
                '<input type="checkbox" lay-skin="primary" name="lesMonUpd" title="0~1月未更新"/>' + 
                '<input type="checkbox" lay-skin="primary" name="bt1mto3mUpd" title="1~3月未更新"/>' + 
                '<input type="checkbox" lay-skin="primary" name="bt3mto12mUpd" title="3~12月未更新"/>' + 
                '<input type="checkbox" lay-skin="primary" name="bt12mto99mUpd" title="12~99月未更新"/>';
            document.getElementById('form_sub').innerHTML = utim;
        } else if (data.value == 'classify1') {
            // 一级分类
            document.getElementById('form_sub_div').style.display="block";
            document.getElementById('form_mod_div').style.display="block";
            document.getElementById('form_fee_div').style.display="block";
            document.getElementById('form_target_div').style.display="block";
            document.getElementById('form_submit').style.display="block";
            // 维度细分
            var ctg1 = '' +
                '<input type="checkbox" lay-skin="primary" name="boyCfy1" title="男频"/>' + 
                '<input type="checkbox" lay-skin="primary" name="girlCfy1" title="女频"/>' + 
                '<input type="checkbox" lay-skin="primary" name="monCfy1" title="包月"/>' + 
                '<input type="checkbox" lay-skin="primary" name="pshCfy1" title="出版"/>' + 
                '<input type="checkbox" lay-skin="primary" name="othCfy1" title="其它"/>';
            document.getElementById('form_sub').innerHTML = ctg1;
        }
        form.render();
    });
    
    form.on('submit(form_submit)', function(data){
        // 检查数据是否有错
        var formData = data.field;

        // 检查第一栏是否选择
        if(formData['dim'] == "") {
            layer.msg("请您输入查询维度...");
        }
        
        search_request_select('exhibit', detail_input(formData));

        return false;
    });
});


