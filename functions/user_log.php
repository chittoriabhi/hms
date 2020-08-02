<?php


function getUserIP(){
	switch (true) {
		case (!empty($_SERVER['HTTP_X_REAL_IP']))  :return $_SERVER['HTTP_X_REAL_IP'];
		case(!empty($_SERVER['HTTP_CLIENT_IP']))   :return $_SERVER['HTTP_CLIENT_IP'];
			case(!empty($_SERVER['HTTP_X_FORWARD_FOR'])) :return $_SERVER['HTTP_X_FORWARD_FOR'];
				default : return $_SERVER['REMOTE_ADDR'];
	}
} 
 ?>