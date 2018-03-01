<?php
/**
 * Created by PhpStorm.
 * User: DingJing
 * Date: 2018/2/27
 * Time: 14:18
 */
namespace Home\Controller;
use Think\Controller;
use Home\Model;

require __DIR__ . '/../Common/retent_page.php';

class RetentController extends Controller{
    public function retent_init(){

        $this->ajaxReturn(retent_init('retent'));
    }

    public function value_init() {

        $this->ajaxReturn(retent_init('value'));
    }

    public function search_retent() {
        $nav_title = "";
        $yTitle = "留存率(100%)";
        $title = "各限免批次留存率统计";

        $Retent = new Model\RetentModel($_POST['para']);
        //$Retent->getRetent();
        //$this->show("ok");
        $this->ajaxReturn(generate_response($Retent->getRetent(), $nav_title, $title, $yTitle));
    }

    public function search_value() {
        $nav_title = "";
        $yTitle = "阅读量";
        $title = "各限免批次阅读量统计";

        $Retent = new Model\RetentModel($_POST['para']);
        $this->ajaxReturn(generate_response($Retent->getValue(), $nav_title, $title, $yTitle));
    }
}