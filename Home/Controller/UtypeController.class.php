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
        $this->ajaxReturn(retent_init('retent'));
    }

    public function utype_vinit(){
        $this->ajaxReturn(utype_init('value'));
    }

    public function search_retent() {
        $nav_title = "";
        $yTitle = "留存率(100%)";
        $title = "各限免批次留存率统计";

        echo 'ok';
        //$Retent = new Model\RetentModel($_POST['para']);
        //$this->ajaxReturn(generate_response($Retent->getRetent(), $nav_title, $title, $yTitle));
    }

    public function search_value() {
        $nav_title = "";
        $yTitle = "阅读量";
        $title = "各限免批次阅读量统计";

        echo 'ok';
        //$Retent = new Model\RetentModel($_POST['para']);
        //$this->ajaxReturn(generate_response($Retent->getValue(), $nav_title, $title, $yTitle));
    }
}