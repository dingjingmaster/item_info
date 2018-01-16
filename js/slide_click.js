function day_retention_click() {
    alert('day');
    var mframe = window.parent.document.getElementById("frame_main");
    mframe.setAttribute("src", "frame/main_retent_day.php");
}

function week_retention_click() {
    var mframe = window.parent.document.getElementById("frame_main");
    mframe.setAttribute("src", "frame/main_retent_week.php");
}

function week7_retention_click() {
    var mframe = window.parent.document.getElementById("frame_main");
    mframe.setAttribute("src", "frame/main_retent_week7.php");
}
