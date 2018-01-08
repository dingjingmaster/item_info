function frame_width() {
    var w = window.innerWidth;
    var m = document.getElementById("frame_main");
    var l = document.getElementById("frame_slider");
    m.setAttribute("width", w - l.width - 20);
}
