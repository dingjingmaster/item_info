
function get_request(type, para) {

    var xmlhttp;
    var request = '/item_info/index.php?s=Home/' + type + '/' + para;

    //var request = '/item_info?s=Home/' + type + '/' + para;
    if(window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            //
            var res = xmlhttp.responseText;
            //document.getElementById('main_div').innerHTML = res;
            ///*
            var json = JSON.parse(res);
            document.getElementById('form_div').innerHTML = json.form_div;
            document.getElementById('main_div').innerHTML = json.main_div;
            document.getElementById('nav_div').innerHTML = json.nav_div;
            document.getElementById('title_div').innerHTML = json.title_div;

            var sc = document.createElement("script");
            var sc_id = document.createAttribute("id");
            sc_id.value = "scripts_s";
            sc.setAttributeNode(sc_id);
            document.getElementById("main_div").appendChild(sc);
            document.getElementById('scripts_s').src = json.script_div;
            //*/
            var reset =document.getElementById('form_reset');
            $("button#form_reset").click();
        }
    };

    xmlhttp.open('GET', request, true);
    xmlhttp.send();
}
