<?php
/**
 * Created by PhpStorm.
 * User: DingJing
 * Date: 2018/2/27
 * Time: 15:09
 */

namespace Home\Controller;
use Think\Controller;


class ExhibitController extends Controller {
    public function exhibit(){
        // 初始化
        $this->show("retent");
    }

    public function value() {
        // 具体数值
        $this->show("number");
    }

    public function search() {
        // 查询
        $this->show("search");
    }
}