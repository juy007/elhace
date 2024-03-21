<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>coba</title>
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="ha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
	<style type="text/css">
		*{
		font-family: verdana;
		}
		
		.field_wrapper div{
		margin-bottom:10px;
		width: 100%;
		}
		.add_button{
		margin-top:10px;
		margin-left:10px;
		vertical-align: text-bottom;
		}
		.remove_button{
		color: #FFF;
		text-decoration: none;
		font-weight: bold;
		background: #D00000;
		padding: 0px 6px 4px 6px;
		border-radius: 100%;
		float: right;	
		}
		
		.parent_tag{
			text-align: left;
			background: #939393;
			color: #FFF;
			border-radius: 20px;
			padding: 3px 5px 7px 5px;
			margin-left: 3px;
			margin-right: 3px;
			min-width: 130px;
			max-width: 200px;
			overflow-x: hidden;
			
	</style>
	
</head>
<body>
	<form name="input" action="proses_coba" method="POST" enctype="multipart/form-data" style="text-align: center; margin-top: 70px;">
		<div>
			<div>
				<input type="text" name="tag_input" id="tag_input" value=""/>
				<a href="#" class="add_button" title="Add field" onclick="add_form();">add</a>
			</div>
		</div>
		<div class="field_wrapper" style="">
		</div>
		<input type="submit" name="submit" value="KIRIM"/>
		<input type="hidden" id="tagar" name="ctagar">
	</form>



<script type="text/javascript">

	function add_form()
	{
		var str = $('#tag_input').val();
		if (str == "") {
			
		}else{
			var i=0; 

			var input = document.getElementById("tag_input");		
			var filter = input.value.toLowerCase();
			var input_multi = document.querySelectorAll("#tagar");
			
			var tag_input = $('#tag_input').val();
			var addButton = $('.add_button');
			var wrapper = $('.field_wrapper');
			var fieldHTML = '<div class="parent_tag" style="">#'+tag_input.substr(0,15)+'<input type="hidden" id="tagar" name="tagar[]" value="'+tag_input+'" readonly/><a href="#" class="remove_button" onclick="remove_form(this);">x</a></div>';
			
			for(var i = 0; i<input_multi.length; i++){
				var ahref = document.querySelectorAll("#tagar")[i];
				if(ahref.value.toLowerCase().indexOf(filter) > -1){
					
				}else{

					$(wrapper).append(fieldHTML); 
					$('#tag_input').val('');

				}
			}
		}
	}

	function remove_form(e)
	{
		$(e).parent('div').remove();
	}
</script>



<style>
.container_app {
  display: inline-block;
  cursor: pointer;
}

.bar_app1, .bar_app2, .bar_app3 {
  width: 35px;
  height: 5px;
  background-color: #333;
  margin: 6px 0;
  transition: 0.4s;
  border-radius: 5px;
}

.change_app .bar_app1 {
  -webkit-transform: rotate(-45deg) translate(-9px, 6px);
  transform: rotate(-45deg) translate(-9px, 6px);
}

.change_app .bar_app2 {opacity: 0;}

.change_app .bar_app3 {
  -webkit-transform: rotate(45deg) translate(-8px, -8px);
  transform: rotate(45deg) translate(-8px, -8px);
}
</style>
</head>
<body>

<p>Click on the Menu Icon to transform it to "X":</p>
<div class="container_app" onclick="icon_app_click(this)">
  <div class="bar_app1"></div>
  <div class="bar_app2"></div>
  <div class="bar_app3"></div>
</div>

<script>
function icon_app_click(x) {
  x.classList.toggle("change_app");
}
</script>




  =============================================================================================<br>
  <style>

.content {
  padding: 0 18px;
 
  overflow: hidden;
  transition: max-height 0.2s ease-out;
  background-color: #f1f1f1;
}
.content_open {
  max-height: 50px;
}
.content_off {
  max-height: 0px;
}
</style>
<button onclick="ok()">menu</button>
<button onclick="ok2()">menu2</button>
<button class="collapsible">Open Collapsible</button>
<div id="content" class="content" style="max-height: 0px;">
  <p>Hello Semua!!!
    Ini merupakan contoh dari collapse yang berfungsi untuk menampilkan dan menyebunyikan suatu konten pada halaman web.</p>
</div>


<script>
	function ok(){
		document.querySelector('#content').style.maxHeight="50px";
		//document.querySelector('#content').classList.add('content_open');
		//document.querySelector('#content').classList.remove('content_off');
	}
	function ok2(){
		//document.querySelector('#content').classList.remove('content_open');
		//document.querySelector('#content').classList.add('content_off');
	}
	/*
	document.getElementsById("ok").addEventListener("click", function() {
		document.getElementsById("content").style.maxHeight="40px;";
	})
	
	/*
	var coll = document.getElementsByClassName("collapsible");
	var i;

	for (i = 0; i < coll.length; i++) {
	  coll[i].addEventListener("click", function() {
	  
	    var content = this.nextElementSibling;
	    if (content.style.maxHeight){
	      content.style.maxHeight = null;
	    } else {
	      content.style.maxHeight = content.scrollHeight + "px";
	    } 
	  });
	}
	*/
</script>
</body>
</html>