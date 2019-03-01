<?php


	$filename = "";
	$dir_name = "/opt/lampp/htdocs/api/scan";

	if (isset($_GET['filename'])) {
		$filename = $_GET['filename'];
	} else {
		echo "bad request - no file name";
		die();
	}

	if (!file_exists($dir_name . "/" . $filename)) {
		echo "bad request - file not found";
		die();
	}

	if (is_dir($dir_name . "/" . $filename)) {
		echo "bad request - file not found.";
		die();
	}

	header("Access-Control-Allow-Origin: *");

	header("Content-Description: File Transfer");
	header("Content-Type: application/octet-stream");
	header("Content-Disposition: attachment; filename=" . $filename);
	header("Content-Transfer-Encoding: binary");
	header("Expires: 0");
	header("Cache-Control: must-revalidate");
	header("Pragma: public");
	header("Content-Length: " . filesize($dir_name . "/" . $filename));
	readfile($dir_name . "/" . $filename);  


	// echo $filename;
	



// $res = $app->response();
// $res['Content-Description'] = 'File Transfer';
// $res['Content-Type'] = 'application/octet-stream';
// $res['Content-Disposition'] ='attachment; filename=' . basename($path);
// $res['Content-Transfer-Encoding'] = 'binary';
// $res['Expires'] = '0';
// $res['Cache-Control'] = 'must-revalidate';
// $res['Pragma'] = 'public';
// $res['Content-Length'] = filesize($path);
// readfile($path);  




?>

