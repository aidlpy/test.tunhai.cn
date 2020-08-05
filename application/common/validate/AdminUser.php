<?php
/**
 * Created by PhpStorm.
 * User: zhangxinrong
 * Date: 2020/8/3
 * Time: 4:09 PM
 */
namespace app\common\validate;

use think\Validate;

class AdminUser extends Validate{
    protected $rule = [
        'username' => 'require|max:20',
        'password' => 'require|max:20'
    ];
}