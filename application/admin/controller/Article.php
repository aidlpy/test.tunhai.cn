<?php
/**
 * Created by PhpStorm.
 * User: zhangxinrong
 * Date: 2020/8/5
 * Time: 3:42 PM
 */
namespace app\admin\controller;

class Article extends Base
{
    public function index(){
        $this->isLogin();
        return $this->fetch('article-list');
    }

    public function  add(){
        $this->isLogin();
        $cats = config('news_cats');
        return $this->fetch('article-add',['cats' =>$cats]);
    }
}