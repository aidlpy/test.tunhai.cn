<?php
/**
 * Created by PhpStorm.
 * User: zhangxinrong
 * Date: 2020/9/6
 * Time: 8:42 PM
 */
namespace app\common\model;
use think\Model;

class AdminModel extends Model{

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


    public function getModel(){

        $result = $this->where(['catid'=>1])->paginate();
        return $result;

    }
}