<?php
/**
 * Created by PhpStorm.
 * User: zhangxinrong
 * Date: 2020/9/6
 * Time: 8:22 PM
 */

namespace app\api\controller\v1;

use app\common\model\AdminModel;
use think\Controller;

class Index extends Controller
{
    public function index()
    {
        $result = model('AdminModel')->getModel();
        return json($result);
    }
}