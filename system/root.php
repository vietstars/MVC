<?php
/*
khởi tạo đối tượng root để điều hướng các action vào mô hình MVC
 */
//* root là 1 class cũng là 1 object
class root
{	
	function __construct()
	{
		//$url được gọi là property
		$url = isset($_GET['url'])?$_GET['url']:'index';
		$url = rtrim($url,S);
		//kiểm tra kí tự đặt biệt trên url
		$url = filter_var($url, FILTER_SANITIZE_URL);
		$url = explode(S,$url);
		$ctrl = current($url);
		//lấy danh sách folder trong app và loại bỏ thư mục gốc
		$sysFolder = array_diff(scandir(_APP), array('.', '..'));
		//kiểm tra url muốn truy cập vào hệ thóng
		if( in_array($ctrl,$sysFolder) )
		{
			$this->error();
		}

		if( strtolower($ctrl)!='error' )
		{
			// kiểm tra controller vừa gọi có file tồn tại không?
			if( file_exists(_CTRL.$ctrl._EXT) )
			{
				if( class_exists($ctrl) )
				{
					// *controller được gọi là instance, $ctrl là 1 object
					$controller = new $ctrl;
					// lập giá trị constant CTL để tiện sử dụng cho ngoài client
					defined('CTL') || define('CTL',$ctrl);
					$act = next($url);
					// kiểm tra method đã khởi tạo chưa?
					if( $act&&method_exists($controller,$act) )
					{
						//lập giá trị constant ATC để tiện sử dụng cho ngoài client
						defined('ACT') || define('ACT',$act);	
						array_shift($url);
						array_shift($url);	
						array_values($url);
						$this->get_act($controller,$act,$url);
						//không đặt view là controller vì php7 có nhũng thay đổi chưa nắm vững 
						if( file_exists(_VIEW.$ctrl.'_'.$act._EXT) )
						{
							$controller->view->render($ctrl.'_'.$act);
						}else 
							$this->error('notView');
						exit;
					}else
						$this->error('notMethod');
				}else
					$this->error('notClass');
			}else				
				$this->error();	
		}else $this->error();
	}
	private function error( $act=false )
	{
		$ctrl = new error();
		if( empty($act) )
			$ctrl->index();
		else
			$this->get_act($ctrl,$act);
		exit(); 
	}
	private function get_act( $ctrl=false,$act=false,$params=false )
	{
		if( $ctrl&&$act )
		{
			if( is_array($params) )
				return call_user_func_array(array($ctrl,$act),$params);
			else
				return call_user_func_array(array($ctrl,$act),array($params));
		}else
			$this->error();
	}
}
