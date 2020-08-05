<?php
/**
 * Created by PhpStorm.
 * User: zhangxinrong
 * Date: 2020/7/29
 * Time: 5:48 PM
 */

namespace app\admin\controller;

use think\Controller;

class System extends Controller
{
    public function log()
    {
        return $this->fetch('system-log',[]);
    }

    public function shielding(){
        return $this->fetch('system-shielding',[]);
    }

    public function data(){
        return $this->fetch('system-data',[]);
    }

}