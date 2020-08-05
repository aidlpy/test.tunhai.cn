<?php
/**
 * Created by PhpStorm.
 * User: zhangxinrong
 * Date: 2020/7/29
 * Time: 6:19 PM
 */

namespace app\admin\controller;

use think\Controller;

class Chart extends Controller
{
    public function chartOne()
    {

//        dump('1212');
        return $this->fetch('chartsOne',[]);
    }

}