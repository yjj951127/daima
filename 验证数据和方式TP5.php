<?php 
namespace app\api\controller;
use \think\Request;
use \think\Validate;
class user{
	public function index(){
			//要验证的字段 | 要验证的规则
			$rule = [
				'name'	=>'require|max:25|chs',
				'age' 	=>'number|between:1,128',
				'email'	=>'email',
			];	
			//验证错误的规则
			$msg = [
				'name.require'	=> '名称必须',
				'name.chs'		=> '必须是汉字',
				'name.max'		=> '名称最长不能超过25字节',
				'age.number'	=> '年龄必须是数字',
				'age.between'	=> '年龄错误',
				'email'			=> '邮箱格式错误',
			];
			$data = input('post.');
			//验证规则类库
			$validate = new Validate($rule,$msg);
			//验证传递方式类库
			$request = Request::instance();
			if($request->isPost())echo 'post数据';
			//数据自动验证
			$result = $validate->check($data);
			if(!$result){
				dump($validate->getError());
			}

	}
}