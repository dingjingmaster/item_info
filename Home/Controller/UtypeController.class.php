<?php
/**
 * Created by PhpStorm.
 * User: DingJing
 * Date: 2018/9/10
 * Time: 10:15
 */

namespace Home\Controller;
use Think\Controller;
use Home\Model;

require __DIR__ . '/../Common/utype_page.php';

class UtypeController extends Controller {
    public function utype_rinit() {
        $this->ajaxReturn(utype_init('exhibit'));
    }

    public function utype_vinit(){
        $this->ajaxReturn(utype_init('value'));
    }

    public function search_exhibit() {
        $nav_title = "";
        $yTitle = "用户类型占比(100%)";
        $title = "用户类型阅读量占比";

        $Retent = new Model\UtypeModel($_POST['para']);
        $this->ajaxReturn(generate_response($Retent->getValue(), $nav_title, $title, $yTitle));
    }

    public function search_value() {
        $nav_title = "";
        $yTitle = "用户类型天阅读人数";
        $title = "用户类型阅读量统计";

        $Retent = new Model\UtypeModel($_POST['para']);
        $this->ajaxReturn(generate_response($Retent->getValue(), $nav_title, $title, $yTitle));
    }
}