<?php
/**
 * Created by PhpStorm.
 * User: zhangxinrong
 * Date: 2020/7/29
 * Time: 5:17 PM
 */
namespace app\admin\controller;

use think\Controller;

class Admin extends Controller
{
    public function add()
    {
        //判断是否是post请求
        if (request()->isPost()){

            $data = input('post.');
            $validate = validate('AdminUser');
            if (!$validate->check($data)) {
                return ['code' => 0, 'data' => [], 'msg' => $validate->getError()];
            }

            try{
                $data['password'] = md5($data['password'].'aidlpy');
                $data['status'] = 1;
                $id = model('AdminUser')->add($data);
                if ($id){
                    return ['code' => 1, 'data' => [], 'msg' => '用户添加成功'];
                }else {
                    return ['code' => 0, 'data' => [], 'msg' => '用户添加失败'];
                }
            }
            catch (\Exception $e){
                return ['code' => 0, 'data' => [], 'msg' => $e->getMessage()];
            }

        }
        else
        {
            return $this->fetch('add',[]);
        }
    }


}