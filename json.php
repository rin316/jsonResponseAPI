<?php
	// setting
	// 拡張子が json の場合のみ許可
	$onlyJson = true;
	// 同一階層のみ許可
	$onlySameLayered = true;
	
	
	
//	@include_once('./resources/php/dBug.php');
//	header('Content-Type: text/html; charset=UTF-8');
	header('Content-Type: application/json; charset=utf-8');

	// h = htmlspecialchars
	$get = h($_GET);
	$url = $get['url'];

	// 拡張子がjsonかチェック
	if ($onlyJson) {
		$extArray = explode('.', $url);
		$ext = end($extArray);
		if ($ext !== 'json') {
			echo 'not json file...';
			exit();
		}
	}
	
	// 同一階層以外を拒否
	if ($onlySameLayered) {
		$url = str_replace(['../', '/'], '', $url);
	}

	$json = file_get_contents($url, true);

	// get param に'id'が含まれる場合はそのidの値を返す
	if (isset($get['id']) && $get['id'] != '') {
		$data = json_decode($json);
		$data = $data -> {'id'} -> {$get['id']};
		$json = json_encode($data);
	}

	echo $json;



	//htmlspecialchars
	function h($str){
		if(is_array($str)){
			return array_map('h',$str);
		}else{
			return htmlspecialchars($str,ENT_QUOTES);
		}
	}
?>