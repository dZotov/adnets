<?

session_start("q");

function imageprotect($height, $width, $randnum) {
    $tx = rand (0,40);
    $ty = rand (0,5);
    $im = imagecreate ($width, $height);
    $white = imagecolorallocate ($im, 243, 255, 241);
    $black = imagecolorallocate ($im, 32, 112, 48);
    imagefill ($im, 0, 0, $white);
    for ($i = 1; $i < 8; $i ++) {
    	$bx = rand (0, $width);
        $by = rand (0, $height);
        $ex = rand (0, $width);
        $ey = rand (0, $height);
        imageline ($im, $bx, $by, $ex, $ey, $black);
    }
    imagestring ($im, 5, $tx, $ty, "$randnum", $black);
	header("Content-type: image/png");
	imagepng($im);
}

imageprotect($_GET[height], $_GET[width], $HTTP_SESSION_VARS[sess_login]);

?>
