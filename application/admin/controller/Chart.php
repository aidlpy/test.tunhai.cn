<?php
/**
 * Created by PhpStorm.
 * User: zhangxinrong
 * Date: 2020/7/29
 * Time: 6:19 PM
 */

namespace app\admin\controller;

use think\Controller;

class Chart extends Base
{
    public function chartOne()
    {
        $this->isLogin();
        return $this->fetch('chartsOne',[]);
    }

}