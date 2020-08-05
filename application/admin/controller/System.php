<?php
/**
 * Created by PhpStorm.
 * User: zhangxinrong
 * Date: 2020/7/29
 * Time: 5:48 PM
 */

namespace app\admin\controller;

use app\admin\common\Base;
use think\Controller;

class System extends Base
{
    public function log()
    {
        $this->isLogin();
        return '1111';
//        return $this->fetch('system-log');
    }

    public function shielding(){
        $this->isLogin();
        return '1111';
//        return $this->fetch('system-shielding');
    }

    public function data(){
        $this->isLogin();
        return '1111';
//        return $this->fetch('system-data');
    }

}