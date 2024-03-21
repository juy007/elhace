<!DOCTYPE html>
<html>
<head>
    <title>Coding Rakitan</title>
    <link rel="stylesheet" type="text/css" href="css.css">
</head>
<style type="text/css">
    body{
    margin: 0px;
    padding: 0px;
    background: #dedede;
    display: flex;
    height: 100%;
    width: 100%;
    position: absolute;
    font-family: roboto;
}.container{
    width: 50%;
    overflow: hidden;
    min-height: 200px;
    background: white;  
    margin: auto;
    border-radius: 4px;
    box-shadow: 1px 1px 3px black;
}.image{
    min-height: 200px;
    width: 50%;
    margin: auto;
    object-fit: cover;
    padding: 20px;
    margin-top: 20px;
}.image img{
    width: 100%;
}.tombol{
    margin-top: 20px;
    padding: 20px;
    text-align: center;
}button{
    padding: 20px;
    padding-top: 10px;
    padding-bottom: 10px;
    background: unset;
    border-radius: 4px;
    border: 1px solid #dedede;
    cursor: pointer;
}.btn-success{
    background: green;
    color: white;
}.btn-danger{
    background: red;
    color: white;
}.btn-primary{
    background: blue;
    color: white;
}p{
    color: grey;
    font-size: 12px;
    text-align: center;
}.head{
    background: #baffae;
    padding: 20px;
    border-bottom: 1px solid #c8c8c8;
}.head h2{
    margin: 0px;
    font-weight: 300;
}.fot{
    padding: 10px;
    border-top: 1px solid #c8c8c8;
    font-size: 12px;
}.kata{
    padding-top: 20px;
    padding-left: 20px;
}.kata p{
    color: black;
    font-size: 15px;
    text-align: left;
}
</style>
<body>
    <div class="container">
        <div class="head">
            <h2>Upload Image</h2>  
        </div>  
        <div class="kata">
            <p>Gambar yang dipilih nantinya akan muncul dibawah ini.</p>
        </div>
        <div class="image">
            <img src="<?php echo base_url() ?>assets/backend/images/avatars/thumb-1.jpg" id="gambar">
        </div>
        <p>Klik tombol pilih file untuk memilih file dari komputer anda.</p>
        <div class="tombol">
            <input type="file" name="files" id="file" style="display: none;">
            <button id="pilih" class="btn-primary">Pilih file</button>
        </div>
        <div class="fot">
            created by @ <a href="http://codingrakitan.blogspot.com">codingrakitan.blogspot.com</a>
        </div>
    </div>
    <script type="text/javascript">
        var tm_pilih = document.getElementById('pilih');
        var file = document.getElementById('file');
        tm_pilih.addEventListener('click', function () {
            file.click();
        })
        file.addEventListener('change', function () {
            gambar(this);
        })
        function gambar(a) {
            if (a.files && a.files[0]) {     
                 var reader = new FileReader();    
                 reader.onload = function (e) {
                     document.getElementById('gambar').src=e.target.result;
                 }    
                 reader.readAsDataURL(a.files[0]);
            }

        }
    </script>

</body>
</html>