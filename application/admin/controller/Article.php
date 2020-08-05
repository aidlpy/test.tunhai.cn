<?php
/**
 * Created by PhpStorm.
 * User: zhangxinrong
 * Date: 2020/8/5
 * Time: 3:42 PM
 */
namespace app\admin\controller;

use app\admin\common\Base;
use think\Controller;


class Article extends Base
{
    public function index(){
        $this->isLogin();
        return $this->fetch('article-list');
    }
}