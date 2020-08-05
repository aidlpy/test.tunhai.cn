<?php
namespace app\admin\controller;

use app\admin\common\Base;
use think\Controller;

class Index extends Base
{
    public function index()
    {
        $this->isLogin();
        return $this->fetch();
    }

    public function welcome(){
        $this->isLogin();
        return $this->fetch();
    }

    public function articleList(){
        $this->isLogin();
        return '1212';
    }

}