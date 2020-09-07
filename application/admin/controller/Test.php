<?php
/**
 * Created by PhpStorm.
 * User: zhangxinrong
 * Date: 2020/8/12
 * Time: 11:47 AM
 */
namespace app\admin\controller;
use Qiniu\Auth;
use Qiniu\Storage\UploadManager;
use think\Config;
use think\Exception;

class Test extends Base
{
    public function index(){
        return $this->fetch('test');
    }

    //上传图片到本地成功
    public function add()
    {
        $file= request()->file('img');
        if (!$file){
            return json(['code'=>0,'message'=>'请选择图片','imgURL'=>'']);
        }
        $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
        $imageName = $info->getSaveName();
        $data = ROOT_PATH .DS . 'uploads' . DS . $imageName;
        $urlPath = 'uploads' . DS . $imageName;
        if ($data){
            return json(['code'=>1,'message'=>'上传成功','imgURL'=>$urlPath]);
        }
        else{
            return json(['code'=>0,'message'=>'上传失败','imgURL'=>'']);
        }

    }

        public function  uploadToQN(){
        $file   = request()->file('file');
        if (!$file){
            return json(["code"=>1,"msg"=>"请选择图片","data"=>""]);
        }
        //获取上传的路径
        $filePath = $file->getRealPath();
        $ext = pathinfo($file->getInfo('name'),PATHINFO_EXTENSION);//获取是JPG,PNG的文件后缀名
        $key =substr(md5($file->getRealPath()) , 0, 5). date('YmdHis') . rand(0, 9999) . '.' . $ext;
        $qiniuConfig = config('qiniu');
        $auth = new Auth($qiniuConfig['accessKey'],$qiniuConfig['secretKey']);
        $bucket = $qiniuConfig['bucket'];
        $domain = $qiniuConfig['domain'];
        $uploadMgr = new UploadManager();
        $token = $auth->uploadToken($bucket);
        list($ret, $err) = $uploadMgr->putFile($token, $key, $filePath);
        if ($err !== null) {
            return json(["code"=>0,"msg"=>$err,"data"=>""]);
        } else {
            $imageUrl ='https://'.$domain.'/'.$ret['key'] ;
            return json(["code"=>1,"msg"=>"上传完成","data"=>['imageURL' => $imageUrl]]);
        }
    }

    public function test(){
        return json('12121212');
    }
}