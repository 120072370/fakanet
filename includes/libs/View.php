<?php
class View{
	static function getView($page,$ext='.php'){
		if(!file_exists(VIEW_PATH.$page.$ext)){
			return VIEW_PATH.'nopage.html';
			}else{
				return VIEW_PATH.$page.$ext;
				}
		}
		
	static function Output(){
		$content=ob_get_clean();
		echo $content;
		ob_end_flush();
		}
	}
