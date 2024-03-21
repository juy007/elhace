
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo Slick Banner</title>

    <!-- Slick CSS -->
    
    <link rel="stylesheet" type="text/css" href="assets/slick/slick-theme.css"/>
      <link rel="stylesheet" type="text/css" href="assets/slick/slick.css"/>

    <!-- css -->
    <style type="text/css">
       
    </style>
    <style>
        body {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            background: #dedede;
        }

        .container {
            max-width: 900px;
            padding: 15px;
            background-color: #fff;
            margin-left: auto;
            margin-right: auto;
        }

    </style>
</head>
<body>
    <div class="container">
        <h1>Slick Slider</h1>
        <p>
            Hello. Look at beautiful laptops below!
        </p>
        <div class="slider">
            <div class="img-slide" style="background-image: url('https://media.istockphoto.com/photos/purple-violet-summer-field-wild-flower-close-up-green-blurred-card-picture-id961924360?s=612x612');">
                  <a class="link-slide" href="https://media.istockphoto.com/photos/purple-violet-summer-field-wild-flower-close-up-green-blurred-card-picture-id961924360?s=612x612"></a>
            </div>
            <div class="img-slide" style="background-image: url('https://images.unsplash.com/photo-1627062598433-016841c1f1e6?crop=entropy&cs=tinysrgb&fm=jpg&ixlib=rb-1.2.1&q=80&raw_url=true&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=774');background-repeat:no-repeat ;background-size: cover;">
                         
            </div>
            <div class="img-slide" style="background-image: url('https://images.unsplash.com/photo-1643319952831-40ffc56731e3?crop=entropy&cs=tinysrgb&fm=jpg&ixlib=rb-1.2.1&q=80&raw_url=true&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=926');background-repeat:no-repeat ;background-size: cover;">
                         
            </div>
            <div class="img-slide" style="background-image: url('https://images.unsplash.com/photo-1642790261487-5b7e444c0dce?crop=entropy&cs=tinysrgb&fm=jpg&ixlib=rb-1.2.1&q=80&raw_url=true&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1129');background-repeat:no-repeat ;background-size: cover;">
                         
            </div>
            <div class="img-slide" style="background-image: url('https://images.unsplash.com/photo-1642790551116-18e150f248e3?crop=entropy&cs=tinysrgb&fm=jpg&ixlib=rb-1.2.1&q=80&raw_url=true&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1033');background-repeat:no-repeat ;background-size: cover;">
                         
            </div>
            
        </div>
    </div>
        

    
    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <!-- Slick JS -->    
    <script type="text/javascript" src="assets/slick/slick.js">
          
    </script>

    <!-- Our Script -->
    <script>
        $(document).ready(function(){
            $('.slider').slick({
            autoplay: false,
            autoplaySpeed: 2500
            });
        });
    </script>

</body>
</html>