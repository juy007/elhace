<?php 
    define("BASEPATH", dirname(__FILE__));
    include 'config/api_config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="<?php echo $root; ?>assets/frontend/img/favicon.ico">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Elhace 404</title>
	<style type="text/css">
		*{
    transition: all 0.6s;
		}

		html {
		    height: 100%;
		}

		body{
		    font-family: 'Lato', sans-serif;
		    color: #888;
		    margin: 0;
		}

		#main{
		    display: table;
		    width: 100%;
		    height: 100vh;
		    text-align: center;
		}

		.fof{
			  display: table-cell;
			  vertical-align: middle;
		}

		.fof h1{
			  font-size: 50px;
			  display: inline-block;
			  padding-right: 12px;
			  animation: type .5s alternate infinite;
		}

		@keyframes type{
			  from{box-shadow: inset -3px 0px 0px #888;}
			  to{box-shadow: inset -3px 0px 0px transparent;}
		}
		.btn-home{
			width: 200px;
			height: 100px;
			background: #888888;
			color: #FFF;
			text-decoration: none;
			padding: 10px 20px 10px 20px;
			font-weight: bold;
			font-size: 30px;
			border-radius: 5px;
		}
		.btn-home:hover{
			background: #000;
		}
	</style>
</head>
<body>
	<div id="main">
    <div class="fof">
     		<h1>404 Not Found</h1><br>
     		<a class="btn-home" href="<?php echo $root; ?>"><i class="fa fa-home"></i> Home</a>
    </div>
	</div>
</body>
</html>