<?php 

	defined("BASEPATH") or exit("No direct access allowed");
    header('X-Frame-Options: SAMEORIGIN');
    header("Content-Security-Policy: frame-ancestors 'none'");

    $key_api='7t78b78jbjy8778ygjhjhhkgu';
    $url_api = 'http://localhost/elhace/back/api/';
    $root = 'http://localhost/elhace/front/';
    $back_root = 'http://localhost/elhace/back/';

    //$url_api = 'https://back.elhace.com/api/';
    //$root = 'https://front.elhace.com/';
    //$back_root = 'https://back.elhace.com/';

 ?>