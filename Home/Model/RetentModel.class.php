<?php
/**
 * Created by PhpStorm.
 * User: DingJing
 * Date: 2018/2/27
 * Time: 17:23
 */
namespace Home\Model;
use Think\Model;
require __DIR__ . '/../Common/common.php';
require __DIR__ . '/../Common/retent_parse.php';

class RetentModel extends Model {

    private $fee;
    private $paras;
    private $target;
    private $start;
    private $stop;

    protected $tablePrefix = 'item_retent_';
    protected $tableName;
    protected $fields;
    protected $pk = 'irid';
    protected $connection = array(
        'db_type'  => 'mysql',
        'db_user'  => 'root',
        'db_pwd'   => '123456',
        'db_host'  => '127.0.0.1',
        'db_port'  => '3306',
        'db_name'  => 'item_retention',
        'db_charset' => 'utf8',
    );

    public function __construct($req) {
        try {
            $res = json_decode($req, true);
            $this->tableName = $res['table'];
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
        foreach ($this->get_sql() as $msql) {
            $bak = array();
            $field = 'irid, retent, timeStamp';
            $resData = date_range($this->start, $this->stop);
            $res = $this->where($msql['sql'])->getField($field, ';');
            if (($res != null) && ($res != false)) {
                foreach ($res as $key => $value) {
                    $arr = explode(';', $value);
                    $resData[$arr[1]] = $arr[0];
                }
                $bak['exp'] = $msql['exp'];
                $bak['data'] = $resData;
                array_push($result, $bak);
            }
        }
        return $result;
    }

    public function getValue() {
        $result = array();
        foreach ($this->get_sql() as $msql) {
            $bak = array();
            $field = 'irid, last, timeStamp';
            $resData = date_range($this->start, $this->stop);
            $res = $this->where($msql['sql'])->getField($field, ';');
            if (($res != null) && ($res != false)) {
                foreach ($res as $key => $value) {
                    $arr = explode(';', $value);
                    $resData[$arr[1]] = $arr[0];
                }
                $bak['exp'] = $msql['exp'];
                $bak['data'] = $resData;
                array_push($result, $bak);
            }
        }
        return $result;
    }

    public function time_range() {
        return array($this->start, $this->stop);
    }

    private function set_fields(){
        switch($this->tableName) {
            case "limitfree":
                return array('irid', 'last', 'remain', 'retent', 'tfCate', 'timeStamp');
            case 'fee':
                return array('irid', 'last', 'remain', 'retent', 'feeCate', 'typeCate', 'timeStamp');
            case 'status':
                return array('irid', 'last', 'remain', 'retent', 'statuCate', 'feeCate', 'typeCate', 'timeStamp');
            case 'viewCount':
                return array('irid', 'last', 'remain', 'retent', 'viewCate', 'feeCate', 'typeCate', 'timeStamp');
            case 'intime':
                return array('irid', 'last', 'remain', 'retent', 'intimeCate', 'feeCate', 'typeCate', 'timeStamp');
            case 'update':
                return array('irid', 'last', 'remain', 'retent', 'updateCate', 'feeCate', 'typeCate', 'timeStamp');
            case 'classify1':
                return array('irid', 'last', 'remain', 'retent', 'cate1Cate', 'feeCate', 'typeCate', 'timeStamp');
        }
        return;
    }

    private function get_sql() {
        $sqlInfo = [];
        switch($this->tableName) {
            case "limitfree":
                foreach ($this->paras as $par) {
                    $m = array();
                    $msql = 'tfCate=' . str_to_number($par) . ' AND ' . ' timeStamp >= ' . $this->start . ' AND timeStamp <= ' . $this->stop;
                    $exp = to_chinese_character($par);
                    $m['exp'] = $exp;
                    $m['sql'] = $msql;
                    array_push($sqlInfo, $m);
                }
                break;
            case 'fee':
                foreach ($this->fee as $i) {
                    foreach($this->target as $j) {
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
                        foreach($this->target as $k) {
                            $m = array();
                            $msql = 'feeCate=' . str_to_number($i) . ' AND ' . 'statuCate=' . str_to_number($j) . ' AND ' . 'typeCate=' . str_to_number($k) . ' AND ' . ' timeStamp >= ' . $this->start . ' AND timeStamp <= ' . $this->stop;
                            $exp = to_chinese_character($i) . '-' . to_chinese_character($j) . '-' . to_chinese_character($k);
                            $m['exp'] = $exp;
                            $m['sql'] = $msql;
                            array_push($sqlInfo, $m);
                        }
                    }
                }
                break;
            case 'viewCount':
                foreach($this->fee as $i) {
                    foreach($this->paras as $j) {
                        foreach($this->target as $k) {
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
                        foreach($this->target as $k) {
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
                        foreach($this->target as $k) {
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
                        foreach($this->target as $k) {
                            $m = array();
                            $msql = 'feeCate=' . str_to_number($i) . ' AND ' . 'cate1Cate=' . str_to_number($j) . ' AND ' . 'typeCate=' . str_to_number($k) . ' AND ' . ' timeStamp >= ' . $this->start . ' AND timeStamp <= ' . $this->stop;
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