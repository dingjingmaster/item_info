/*************************************************************************
> FileName: ./main_global.js
> Author  : DingJing
> Mail    : dingjing@live.cn
> Created Time: 2018年01月24日 星期三 09时22分47秒
 ************************************************************************/

$(document).ready(function() {})

layui.use('element', function(){
    var element = layui.element;
});

layui.use('form', function(){
    var form = layui.form;

    var fee = [];

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
        if(data.value == 'sum') {
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
        } else if (data.value == 'stg') {
            // 推荐策略
            // 1. 选择要查询的页面 和 付费类型 和 模块细分 2. 选中后出现按钮
            document.getElementById('form_sub_div').style.display="block";
            document.getElementById('form_mod_div').style.display="block";
            document.getElementById('form_fee_div').style.display="block";
            document.getElementById('form_target_div').style.display="block";
            document.getElementById('form_submit').style.display="block";
            // 维度细分
            var stg= '' +
                '<option value="livStmRec">实时流</option>' + 
                '<option value="usrKnnRec">用户协同</option>' + 
                '<option value="codBotRec">冷启动</option>' + 
                '<option value="popRec">流行度</option>' + 
                '<option value="itmKnnRec">物品协同</option>' + 
                '<option value="samCtgRec">同分类</option>' + 
                '<option value="subMdlRec">订阅模型</option>' + 
                '<option value="redMdlRec">阅读模型</option>' + 
                '<option value="cotSimRec">内容相似</option>' + 
                '<option value="redMdlRec">阅读同分类</option>' + 
                '<option value="cat1SimCtgRec">一级同分类</option>';
            $("#form_sub").append(stg);
        } else if (data.value == 'stu') {
            // 连载状态
            document.getElementById('form_sub_div').style.display="block";
            document.getElementById('form_mod_div').style.display="block";
            document.getElementById('form_fee_div').style.display="block";
            document.getElementById('form_target_div').style.display="block";
            document.getElementById('form_submit').style.display="block";
            // 维度细分
            var stg= '' +
                '<option value="cmpStau">完结</option>' + 
                '<option value="noCmpStau">连载</option>' + 
            $("#form_sub").append(stg);
        } else if (data.value == 'vie') {
            // 订阅级别
            document.getElementById('form_sub_div').style.display="block";
            document.getElementById('form_mod_div').style.display="block";
            document.getElementById('form_fee_div').style.display="block";
            document.getElementById('form_target_div').style.display="block";
            document.getElementById('form_submit').style.display="block";
            // 维度细分
            var stg= '' +
                '<option value="bt0to10Sub">介于0到10</option>' + 
                '<option value="bt10to1bSub">介于10到100</option>' + 
                '<option value="bt1bto1kSub">介于100到1000</option>' + 
                '<option value="bt1kto10kSub">介于1000到10000</option>' + 
                '<option value="bt10kto100kSub">介于1万到10万</option>' + 
                '<option value="bt100kto1000kSub">介于10万到100万</option>' + 
                '<option value="bt1000kto10000kSub">介于100万到1千万</option>' + 
            $("#form_sub").append(stg);
        } else if (data.value == 'itim') {
            // 入库时间
            document.getElementById('form_sub_div').style.display="block";
            document.getElementById('form_mod_div').style.display="block";
            document.getElementById('form_fee_div').style.display="block";
            document.getElementById('form_target_div').style.display="block";
            document.getElementById('form_submit').style.display="block";
            // 维度细分
            var stg= '' +
                '<option value="lesMonIn">1月内入库</option>' + 
                '<option value="bt1mto3mIn">1~3月内入库</option>' + 
                '<option value="bt3mto12mIn">3~12月内入库</option>' + 
                '<option value="bt12mto99mIn">12~99月内入库</option>' + 
            $("#form_sub").append(stg);
        } else if (data.value == 'utim') {
            // 最后更新时间
            document.getElementById('form_sub_div').style.display="block";
            document.getElementById('form_mod_div').style.display="block";
            document.getElementById('form_fee_div').style.display="block";
            document.getElementById('form_target_div').style.display="block";
            document.getElementById('form_submit').style.display="block";
            // 维度细分
            var stg= '' +
                '<option value="lesMonUpd">0~1月未更新</option>' + 
                '<option value="bt1mto3mUpd">1~3月未更新</option>' + 
                '<option value="bt3mto12mUpd">3~12月未更新</option>' + 
                '<option value="bt12mto99mUpd">12~99月未更新</option>' + 
            $("#form_sub").append(stg);
        } else if (data.value == 'vtg1') {
            // 一级分类
            document.getElementById('form_sub_div').style.display="block";
            document.getElementById('form_mod_div').style.display="block";
            document.getElementById('form_fee_div').style.display="block";
            document.getElementById('form_target_div').style.display="block";
            document.getElementById('form_submit').style.display="block";
            // 维度细分
            var stg= '' +
                '<option value="boyCfy1">男频</option>' + 
                '<option value="girlCfy1">女频</option>' + 
                '<option value="monCfy1">包月</option>' + 
                '<option value="pshCfy1">出版</option>' + 
                '<option value="othCfy1">其它</option>' + 
            $("#form_sub").append(stg);
        }
        //var test = '<option value="ssss"> ddddd </option>';
        //$("#form_module").append(test);
        form.render('select');
    });
    
    form.on('submit(formDemo)', function(data){
        layer.msg(JSON.stringify(data.field));
        return false;
    });
});


