<?php
/**
 * Created by PhpStorm.
 * User: DingJing
 * Date: 2018/2/27
 * Time: 15:09
 */

namespace Home\Controller;
use Think\Controller;
use Home\Model;

require __DIR__ . '/../Common/exhibit_page.php';


class ExhibitController extends Controller {
    public function exhibit_init(){
        $this->ajaxReturn(exhibit_init('exhibit'));
    }

    public function value_init() {
        $this->ajaxReturn(exhibit_init('value'));
    }

    public function search_exhibit() {
        $nav_title = "";
        $yTitle = "比例(100%)";
        $title = "订展比";

        $Retent = new Model\ExhibitModel($_POST['para']);
        $this->ajaxReturn(generate_response($Retent->getRetent(), $nav_title, $title, $yTitle));
    }
    public function search_value() {

        $nav_title = "";
        $yTitle = "数量";
        $title = "指标数量";

        $Retent = new Model\ExhibitModel($_POST['para']);
        $this->ajaxReturn(generate_response($Retent->getValue(), $nav_title, $title, $yTitle));
    }
}