<?php
/**
* Main Class
* Dynamically call method, controller, url
*/
class Main
{
	public $url;
	public $controllerName = "Index";
	public $methodName = "Index";
	public $controllerPath = "app/controllers/";
	public $controller;

	public function __construct(){
		
		$this->getUrl();
		$this->loadController();
		$this->callMethod();
	}

	// Dynamically get url
	public function getURL(){

		$this->url = isset($_GET['url']) ? $_GET['url'] : NULL;
		if($this->url != NULL){
			$this->url = rtrim($this->url);
			$this->url = explode("/", filter_var($this->url,FILTER_SANITIZE_URL));
		}else{
			unset($this->url);
		}
	}

	// Dynamically load Controller 
	public function loadController(){

		if(!isset($this->url[0])){
			include $this->controllerPath.$this->controllerName.".php";
			$this->controller = new $this->controllerName();
		}else{
			$this->controllerName = $this->url[0];
			$filename = $this->controllerPath.$this->controllerName.".php";
			if(file_exists($filename)){
				include $filename;
				if(class_exists($this->controllerName)){
					$this->controller = new $this->controllerName();
				}else{
					# code if class not exists
					header("Location:".BASE_URL."/Index/notFound");
				}
			}else{
				# if file not exist;
				header("Location:".BASE_URL."/Index/notFound");

			}
		}
	}

	// dynamically method call
	public function callMethod(){

		if(isset($this->url[2])){ // Parameter

			$this->methodName = $this->url[1];
			if(method_exists($this->controller, $this->methodName)){
				$this->controller->{$this->methodName}($this->url[2]);
			}else{
				# if method parameter not exists
				header("Location:".BASE_URL."/Index/notFound");

			}
		}else{ // Method 
	
			if(isset($this->url[1])){
				$this->methodName = $this->url[1];
				if(method_exists($this->controller, $this->methodName)){
					$this->controller->{$this->methodName}();
				}else{
					# if method not found
					header("Location:".BASE_URL."/Index/notFound");
				}
			}else{
				if(method_exists($this->controller, $this->methodName)){
					$this->controller->{$this->methodName}();
				}else{
					# if method not found
					header("Location:".BASE_URL."/Index/notFound");	
				}
			}
		}

	}
}

?>