<?php
	// вернуть содержимое каталога в виде json массива
	// возвращаемые значения 
	//  - имя файла
	//  - размер
	//  - ссылка
	//  - расширение

	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	// header("Access-Control-Allow-Methods: POST");
	header("Access-Control-Max-Age: 3600");
	header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

	$dir_name = "/opt/lampp/htdocs/api/scan";

	$files_arr = [];
	if ($dir = opendir($dir_name)) {
		while (false !== ($file = readdir($dir))) {
			if (!is_dir($file)) {
				$file_one = [
					"name" => basename($file),
					"size" => filesize($dir_name . "/" . $file),
				];
				$files[] = $file_one;
			}
		}
	}
	echo json_encode($files) ;
?>