<?php
/**
 * Created by PhpStorm.
 * User: zhangxinrong
 * Date: 2020/8/5
 * Time: 12:07 AM
 */

namespace app\admin\controller;

use app\admin\common\Base;
use app\common\model\AdminUser;
use think\Controller;
use think\Session;


class Login extends Base
{
    public function index()
    {

        $this->existLogin();

        if ($this->request->isPost()) {
            $data = input('post.');
            //验证码检验
            $captcha = $data['captcha'];
            if (!captcha_check($captcha)) {
                $this->error('验证码错误', 'login/index');
            }
            //表单数据检验
            $validate = validate('AdminUser');
            if (!$validate->check($data)) {
                $this->error($validate->getError(), 'login/index');
            }

            //用户表查询
            $userModel = AdminUser::get(['username' => $data['username']]);
            if (!$userModel) {
                $this->error('该用户不存在', 'login/index');
            }

            if (md5($data['password'] . 'aidlpy') == $userModel->password) {
                $info = ['user_id'=>$userModel->id,'user_name'=>$userModel->username,'user_status'=>$userModel->status];
                Session::set('user_info',$info);
                $this->success('登录成功', 'index/index');
            } else {
                $this->error('用户名或密码错误', 'login/index');
            }
        }
        return $this->fetch('login');
    }

}