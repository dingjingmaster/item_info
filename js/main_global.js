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
    form.on('select(form_dim)', function(data){
        if(data.value == 'sum') {
            // 发送 ajax 返回按钮
            document.getElementById('form_mod_div').style.display="none";
//            $('div#form_mod_div').hiden();
//            $('div#form_fee_div').hiden();
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


