<?php
/**
 * Created by PhpStorm.
 * User: zhangxinrong
 * Date: 2020/8/4
 * Time: 5:02 PM
 */
namespace app\common\model;
use think\Model;

class AdminUser extends Model{

    protected $autoWriteTimestamp = true;

    /**
     * 新增
     * @param $data
     * @return mixed
     */
    public function add($data){

        if (!is_array($data)){
           return $this->getError('数据格式不合法');
        }
        $this->allowField(true)->save($data);
        return $this->id;
    }
}