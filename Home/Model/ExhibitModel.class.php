<?php
/**
 * Created by PhpStorm.
 * User: DingJing
 * Date: 2018/3/1
 * Time: 17:28
 */

namespace Home\Model;
use Think\Model;

require __DIR__ . '/../Common/common.php';
require __DIR__ . '/../Common/exhibit_parse.php';

class ExhibitModel extends Model {

    private $module;
    private $fee;
    private $paras;
    private $target;
    private $start;
    private $stop;

    protected $tablePrefix = 'item_exhibit_';
    protected $tableName;
    protected $fields;
    protected $pk = 'dzid';
    protected $connection = array(
        'db_type'  => 'mysql',
        'db_user'  => 'root',
        'db_pwd'   => '123456',
        'db_host'  => '127.0.0.1',
        'db_port'  => '3306',
        'db_name'  => 'item_exhibit',
        'db_charset' => 'utf8',
    );

    public function __construct($req) {
        try {
            $res = json_decode($req, true);
            $this->tableName = $res['table'];
            $this->module = $res['module'];
            $this->fee = $res['fee'];
            $this->paras = $res['para'];
            $this->target = $res['target'];
            $this->start = $res['start'];
            $this->stop = $res['stop'];
            $this->fields = $this->set_fields();
        }catch (Exception $ex) {
            //
            echo 'error';
        }
        parent::__construct();
    }

    public function getRetent() {
        $result = array();
        ///*
        foreach ($this->get_sql() as $msql) {
            foreach ($this->target as $i) {
                $bak = array();
                $field = 'dzid, timeStamp, ' . $i;
                $resData = date_range($this->start, $this->stop);
                $res = $this->where($msql['sql'])->getField($field, ';');
                if (($res != null) && ($res != false)) {
                    foreach ($res as $key => $value) {
                        $arr = explode(';', $value);
                        $resData[$arr[0]] = $arr[1];
                    }
                    $bak['exp'] = $msql['exp'] . '-' . to_chinese_character($i);
                    $bak['data'] = $resData;
                    array_push($result, $bak);
                }
            }

        }
        return $result;
    }

    public function getValue() {
        return $this->getRetent();
    }

    public function time_range() {
        return array($this->start, $this->stop);
    }

    private function set_fields(){
        switch($this->tableName) {
            case 'summary':
                return array('dzid', 'dspNum', 'clkNum', 'srbNum', 'redNum', 'rteNum', 'clkDsp', 'subClk','subDsp', 'redSub', 'redDsp', 'retent', 'rteDsp', 'typeCate', 'timeStamp');
            case 'fee':
                return array('dzid', 'dspNum', 'clkNum', 'srbNum', 'redNum', 'rteNum', 'clkDsp', 'subClk','subDsp', 'redSub', 'redDsp', 'retent', 'rteDsp', 'feeCate', 'typeCate', 'timeStamp');
            case 'status':
                return array('dzid', 'dspNum', 'clkNum', 'srbNum', 'redNum', 'rteNum', 'clkDsp', 'subClk','subDsp', 'redSub', 'redDsp', 'retent', 'rteDsp', 'feeCate', 'statusCate', 'typeCate', 'timeStamp');
            case 'view':
                return array('dzid', 'dspNum', 'clkNum', 'srbNum', 'redNum', 'rteNum', 'clkDsp', 'subClk','subDsp', 'redSub', 'redDsp', 'retent', 'rteDsp', 'feeCate', 'viewCate', 'typeCate', 'timeStamp');
            case 'intime':
                return array('dzid', 'dspNum', 'clkNum', 'srbNum', 'redNum', 'rteNum', 'clkDsp', 'subClk','subDsp', 'redSub', 'redDsp', 'retent', 'rteDsp', 'feeCate', 'intimeCate', 'typeCate', 'timeStamp');
            case 'update':
                return array('dzid', 'dspNum', 'clkNum', 'srbNum', 'redNum', 'rteNum', 'clkDsp', 'subClk','subDsp', 'redSub', 'redDsp', 'retent', 'rteDsp', 'feeCate', 'updateCate', 'typeCate', 'timeStamp');
            case 'classify1':
                return array('dzid', 'dspNum', 'clkNum', 'srbNum', 'redNum', 'rteNum', 'clkDsp', 'subClk','subDsp', 'redSub', 'redDsp', 'retent', 'rteDsp', 'feeCate', 'classify1Cate', 'typeCate', 'timeStamp');
            case 'strategy':
                return array('dzid', 'dspNum', 'clkNum', 'srbNum', 'redNum', 'rteNum', 'clkDsp', 'subClk','subDsp', 'redSub', 'redDsp', 'retent', 'rteDsp', 'feeCate', 'strategyCate', 'typeCate', 'timeStamp');
        }
    }

    private function get_sql() {
        $sqlInfo = [];
        switch($this->tableName) {
            case "summary":
                foreach ($this->module as $i) {
                        $m = array();
                        $msql = 'typeCate=' . str_to_number($i) . ' AND ' . ' timeStamp >= ' . $this->start . ' AND timeStamp <= ' . $this->stop;
                        $m['exp'] = to_chinese_character($i);
                        $m['sql'] = $msql;
                        array_push($sqlInfo, $m);
                }
                break;
            case 'fee':
                foreach ($this->fee as $i) {
                    foreach($this->module as $j) {
                        $m = array();
                        $msql = 'feeCate=' . str_to_number($i) . ' AND ' . 'typeCate=' . str_to_number($j) . ' AND ' . ' timeStamp >= ' . $this->start . ' AND timeStamp <= ' . $this->stop;
                        $exp = to_chinese_character($i) . '-' . to_chinese_character($j);
                        $m['exp'] = $exp;
                        $m['sql'] = $msql;
                        array_push($sqlInfo, $m);
                    }
                }
                break;
            case 'status':
                foreach($this->fee as $i) {
                    foreach($this->paras as $j) {
                        foreach($this->module as $k) {
                            $m = array();
                            $msql = 'feeCate=' . str_to_number($i) . ' AND ' . 'statusCate=' . str_to_number($j) . ' AND ' . 'typeCate=' . str_to_number($k) . ' AND ' . ' timeStamp >= ' . $this->start . ' AND timeStamp <= ' . $this->stop;
                            $exp = to_chinese_character($i) . '-' . to_chinese_character($j) . '-' . to_chinese_character($k);
                            $m['exp'] = $exp;
                            $m['sql'] = $msql;
                            array_push($sqlInfo, $m);
                        }
                    }
                }
                break;
            case 'view':
                foreach($this->fee as $i) {
                    foreach($this->paras as $j) {
                        foreach($this->module as $k) {
                            $m = array();
                            $msql = 'feeCate=' . str_to_number($i) . ' AND ' . 'viewCate=' . str_to_number($j) . ' AND ' . 'typeCate=' . str_to_number($k) . ' AND ' . ' timeStamp >= ' . $this->start . ' AND timeStamp <= ' . $this->stop;
                            $exp = to_chinese_character($i) . '-' . to_chinese_character($j) . '-' . to_chinese_character($k);
                            $m['exp'] = $exp;
                            $m['sql'] = $msql;
                            array_push($sqlInfo, $m);
                        }
                    }
                }
                break;
            case 'intime':
                foreach($this->fee as $i) {
                    foreach($this->paras as $j) {
                        foreach($this->module as $k) {
                            $m = array();
                            $msql = 'feeCate=' . str_to_number($i) . ' AND ' . 'intimeCate=' . str_to_number($j) . ' AND ' . 'typeCate=' . str_to_number($k) . ' AND ' . ' timeStamp >= ' . $this->start . ' AND timeStamp <= ' . $this->stop;
                            $exp = to_chinese_character($i) . '-' . to_chinese_character($j) . '-' . to_chinese_character($k);
                            $m['exp'] = $exp;
                            $m['sql'] = $msql;
                            array_push($sqlInfo, $m);
                        }
                    }
                }
                break;
            case 'update':
                foreach($this->fee as $i) {
                    foreach($this->paras as $j) {
                        foreach($this->module as $k) {
                            $m = array();
                            $msql = 'feeCate=' . str_to_number($i) . ' AND ' . 'updateCate=' . str_to_number($j) . ' AND ' . 'typeCate=' . str_to_number($k) . ' AND ' . ' timeStamp >= ' . $this->start . ' AND timeStamp <= ' . $this->stop;
                            $exp = to_chinese_character($i) . '-' . to_chinese_character($j) . '-' . to_chinese_character($k);
                            $m['exp'] = $exp;
                            $m['sql'] = $msql;
                            array_push($sqlInfo, $m);
                        }
                    }
                }
                break;
            case 'classify1':
                foreach($this->fee as $i) {
                    foreach($this->paras as $j) {
                        foreach($this->module as $k) {
                            $m = array();
                            $msql = 'feeCate=' . str_to_number($i) . ' AND ' . 'classify1Cate=' . str_to_number($j) . ' AND ' . 'typeCate=' . str_to_number($k) . ' AND ' . ' timeStamp >= ' . $this->start . ' AND timeStamp <= ' . $this->stop;
                            $exp = to_chinese_character($i) . '-' . to_chinese_character($j) . '-' . to_chinese_character($k);
                            $m['exp'] = $exp;
                            $m['sql'] = $msql;
                            array_push($sqlInfo, $m);
                        }
                    }
                }
                break;
            case 'strategy':
                foreach($this->fee as $i) {
                    foreach($this->paras as $j) {
                        foreach($this->module as $k) {
                            $m = array();
                            $msql = 'feeCate=' . str_to_number($i) . ' AND ' . 'strategyCate=' . str_to_number($j) . ' AND ' . 'typeCate=' . str_to_number($k) . ' AND ' . ' timeStamp >= ' . $this->start . ' AND timeStamp <= ' . $this->stop;
                            $exp = to_chinese_character($i) . '-' . to_chinese_character($j) . '-' . to_chinese_character($k);
                            $m['exp'] = $exp;
                            $m['sql'] = $msql;
                            array_push($sqlInfo, $m);
                        }
                    }
                }
                break;
        }

        return $sqlInfo;
    }


}