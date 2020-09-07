<?php
/**
 * Created by PhpStorm.
 * User: zhangxinrong
 * Date: 2020/8/11
 * Time: 3:06 PM
 */
namespace app\admin\controller;

class Image extends Base
{
    public function upload(){
        $file = Request::instance()->file('file');
        //把图片上传到指定的文件夹中
        $info = $file->move('upload');
        halt($info);

        if($info && $info->getPathname()){
            $data = [
                'status' => 1,
                'message' => 'OK',
                'data' => '/'.$info->getPathname(),
            ];
            echo json_encode($data);exit;
        }

        echo json_encode(['status' => 0, 'message' => '上传失败']);
    }


}
