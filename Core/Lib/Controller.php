<?php 
namespace Core\Lib;
/**
* 控制器基类
*/
class Controller
{
	public function assign($name,$value)
 	{
 		$this->assign[$name]=$value;
 	}
 	public function display($file)
 	{
 		$path=APP.'/Views/'.$file;
 		if (is_file($path))
 		{
			\Twig_Autoloader::register();
			$loader = new \Twig_Loader_Filesystem(APP.'/Views');
			$twig = new \Twig_Environment($loader,[
			'cache' =>CORE.'/Log/twig',
			'debug' =>DEBUG,
			]);
			$template=$twig->loadTemplate($file);
			$template->display($this->assign?$this->assign:'');
 		}
 	}
	 
}

?>