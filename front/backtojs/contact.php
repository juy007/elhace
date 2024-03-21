<?php 
    define("BASEPATH", dirname(__FILE__));
    include 'config/api_config.php';
    include 'config/api_address.php';
    $meta_description = 'Elhace Home - '.$data_get_website['meta_description'];
    $meta_keyword = $data_get_website['meta_keyword'];
    include 'nav_start.php';
?>

<div id="contact" class="tokyo_tm_section">
    <div class="container">
        <div class="tokyo_tm_contact">
            <div class="tokyo_tm_title">
                <div class="title_flex">
                    <div class="left">
                        <span>Contact</span>
                        <h3>Get in Touch</h3>
                    </div>
                </div>
            </div>
            <style type="text/css">
                iframe{
                    width: 100%;
                }
            </style>
        <div class="map_wrap">
            <div class="map" id="ieatmaps">
                <?php echo $data_get_website['embed_map'] ?>
            </div>
        </div>


        
        <div class="fields" style="max-width:500px;">
            <form action="http://localhost/elhace/back/admin/send_message" method="post" class="contact_form" autocomplete="off">
               <div class="returnmessage" data-success="Your message has been received, We will contact you soon."></div>
               <div  class="empty_notice"><span>Please Fill Required Fields</span></div>
               <div id="empty_notice"></div>
               <div class="first">
                    <ul>
                        <li>
                          <input id="name" type="text" name="name" placeholder="Name">
                        </li>
                        <li>
                            <input id="email" type="text" name="email" placeholder="Email">
                        </li>
                    </ul>
                </div>
                <div class="last">
                  <textarea id="message" name="message" placeholder="Message"></textarea>
                </div>
                <div class="tokyo_tm_button" data-position="left">
                    <a id="" type="button" onclick="send_message();">
                        <span>Send Message</span>
                    </a>
                </div>
            </form>
        </div>
    </div>                         
</div>

<?php include 'nav_end.php'; ?>

<script type="text/javascript">
    var _0x36ae13=_0x1dd7;function _0x1dd7(_0x33bb21,_0x5b724a){var _0x5152b5=_0x5152();return _0x1dd7=function(_0x1dd7c2,_0x55c433){_0x1dd7c2=_0x1dd7c2-0x92;var _0x260a98=_0x5152b5[_0x1dd7c2];return _0x260a98;},_0x1dd7(_0x33bb21,_0x5b724a);}function _0x5152(){var _0x16e910=['24945525ZGFava','add','2820363eoPTNy','active','4399902MTSZDi','20FXanEz','12yeTMfR','ready','48NblYIi','8814008xdAxoF','53994gskZvc','125780mqqYUj','classList','7KQnPBc','4858356YdgfJE','querySelector'];_0x5152=function(){return _0x16e910;};return _0x5152();}(function(_0x55e652,_0x30bb79){var _0x566663=_0x1dd7,_0x3ee73e=_0x55e652();while(!![]){try{var _0x2e9e5d=-parseInt(_0x566663(0x9e))/0x1*(parseInt(_0x566663(0xa0))/0x2)+parseInt(_0x566663(0x98))/0x3+-parseInt(_0x566663(0x94))/0x4+-parseInt(_0x566663(0xa1))/0x5*(parseInt(_0x566663(0x9c))/0x6)+parseInt(_0x566663(0x93))/0x7*(parseInt(_0x566663(0x9f))/0x8)+-parseInt(_0x566663(0x9a))/0x9*(parseInt(_0x566663(0x9b))/0xa)+parseInt(_0x566663(0x96))/0xb;if(_0x2e9e5d===_0x30bb79)break;else _0x3ee73e['push'](_0x3ee73e['shift']());}catch(_0x42c7c5){_0x3ee73e['push'](_0x3ee73e['shift']());}}}(_0x5152,0xbc43e),$(document)[_0x36ae13(0x9d)](function(){var _0x216552=_0x36ae13;document[_0x216552(0x95)]('#contact')[_0x216552(0x92)][_0x216552(0x97)](_0x216552(0x99)),document[_0x216552(0x95)]('#m_contact')[_0x216552(0x92)]['add'](_0x216552(0x99));}));
     /*
     $(document).ready(function() {
         document.querySelector('#contact').classList.add('active');
         document.querySelector('#m_contact').classList.add('active');
    })
    */
</script>
<script type="text/javascript">

    function _0x5769(_0x255ae4,_0x1c2f75){var _0x28104c=_0x2810();return _0x5769=function(_0x576936,_0x3baad0){_0x576936=_0x576936-0x173;var _0x5a80d4=_0x28104c[_0x576936];return _0x5a80d4;},_0x5769(_0x255ae4,_0x1c2f75);}function _0x2810(){var _0x5f3cec=['false','<span\x20style=color:#AF0000;>email\x20is\x20already\x20used,\x20please\x20use\x20it\x20again\x20tomorrow</span>','32348uQSLpK','1634778mzaNCU','application/x-www-form-urlencoded','<span\x20style=color:#CDBC00;>sending\x20message...</span>','851019QlzSYQ','<span\x20style=color:#AF0000;>Email\x20failed\x20to\x20send.\x20Please\x20try\x20again\x20in\x20a\x20moment</span>','POST','#empty_notice','459112RdFHri','#name','50805HhXOoZ','indexOf','val','<span\x20style=color:#AF0000;>all\x20forms\x20must\x20be\x20filled</span>','<span\x20style=color:#AF0000;>email\x20is\x20not\x20correct</span>','<span\x20style=color:#00890C;>Email\x20sent\x20successfully</span>','https://back.elhace.com/admin/send_message','#email','966280qYEztg','lastIndexOf','notif_email','#message','true','html','1694645htzWoo'];_0x2810=function(){return _0x5f3cec;};return _0x2810();}(function(_0x1c676a,_0x23e741){var _0x1f3d45=_0x5769,_0xdf355b=_0x1c676a();while(!![]){try{var _0x2ede14=-parseInt(_0x1f3d45(0x187))/0x1+-parseInt(_0x1f3d45(0x185))/0x2+parseInt(_0x1f3d45(0x181))/0x3+-parseInt(_0x1f3d45(0x17d))/0x4+parseInt(_0x1f3d45(0x17a))/0x5+-parseInt(_0x1f3d45(0x17e))/0x6+parseInt(_0x1f3d45(0x174))/0x7;if(_0x2ede14===_0x23e741)break;else _0xdf355b['push'](_0xdf355b['shift']());}catch(_0x151134){_0xdf355b['push'](_0xdf355b['shift']());}}}(_0x2810,0x30c33));function send_message(){var _0x1e1397=_0x5769,_0x5f0d43=$(_0x1e1397(0x186))[_0x1e1397(0x189)](),_0x36945c=$(_0x1e1397(0x173))[_0x1e1397(0x189)](),_0x757df=$(_0x1e1397(0x177))[_0x1e1397(0x189)]();if(_0x5f0d43==''||_0x36945c==''||_0x757df=='')$(_0x1e1397(0x184))[_0x1e1397(0x179)](_0x1e1397(0x18a));else{var _0x1be0a1=_0x36945c[_0x1e1397(0x188)]('@'),_0x6aa688=_0x36945c[_0x1e1397(0x175)]('.');_0x1be0a1<0x1||_0x6aa688<_0x1be0a1+0x2||_0x6aa688+0x2>=_0x36945c['length']?$(_0x1e1397(0x184))[_0x1e1397(0x179)](_0x1e1397(0x18b)):($('#empty_notice')[_0x1e1397(0x179)](_0x1e1397(0x180)),$['ajax']({'type':_0x1e1397(0x183),'url':_0x1e1397(0x18d),'headers':{'Content-Type':_0x1e1397(0x17f)},'data':{'name':_0x5f0d43,'email':_0x36945c,'message':_0x757df,'ip':ip,'browser':browser,'os':os},'dataType':'json','success':function(_0x423e09){var _0x3187e4=_0x1e1397;if(_0x423e09[_0x3187e4(0x176)]==_0x3187e4(0x178))$('#name')[_0x3187e4(0x189)](''),$('#email')[_0x3187e4(0x189)](''),$(_0x3187e4(0x177))[_0x3187e4(0x189)](''),$(_0x3187e4(0x184))[_0x3187e4(0x179)](_0x3187e4(0x18c));else{if(_0x423e09['notif_email']==_0x3187e4(0x17b))$('#name')['val'](''),$(_0x3187e4(0x173))['val'](''),$(_0x3187e4(0x177))[_0x3187e4(0x189)](''),$(_0x3187e4(0x184))['html'](_0x3187e4(0x182));else _0x423e09[_0x3187e4(0x176)]=='no'&&($(_0x3187e4(0x186))[_0x3187e4(0x189)](''),$(_0x3187e4(0x173))[_0x3187e4(0x189)](''),$(_0x3187e4(0x177))['val'](''),$(_0x3187e4(0x184))[_0x3187e4(0x179)](_0x3187e4(0x17c)));}}}));}}

    /*
    function send_message()
    {
        var name = $('#name').val();
        var email = $('#email').val();
        var message = $('#message').val();

        if (name == '' || email == '' || message == '') {
            $('#empty_notice').html('<span style=color:#AF0000;>all forms must be filled</span>');
        }else{
            
            var atps=email.indexOf("@");
            var dots=email.lastIndexOf(".");
            if (atps<1 || dots<atps+2 || dots+2>=email.length) {
                $('#empty_notice').html('<span style=color:#AF0000;>email is not correct</span>');
                
            }else{
                $('#empty_notice').html('<span style=color:#CDBC00;>sending message...</span>');
                $.ajax({
                    type: 'POST',
                    //url: 'http://localhost/elhace/back/admin/send_message',
                    url: 'https://back.elhace.com/admin/send_message',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    data : {'name':name, 'email':email, 'message':message, 'ip': ip, 'browser': browser, 'os':os},
                    dataType: "json",
                    
                    success: function(response){ 
                        if (response.notif_email=='true') {
                            $('#name').val(''); $('#email').val(''); $('#message').val('');
                            $('#empty_notice').html('<span style=color:#00890C;>Email sent successfully</span>');
                        }else if (response.notif_email=='false') {
                            $('#name').val(''); $('#email').val(''); $('#message').val('');
                            $('#empty_notice').html('<span style=color:#AF0000;>Email failed to send. Please try again in a moment</span>');
                        }else if (response.notif_email=='no') {
                            $('#name').val(''); $('#email').val(''); $('#message').val('');
                            $('#empty_notice').html('<span style=color:#AF0000;>email is already used, please use it again tomorrow</span>');
                        }
                    }
                });
            }
        }
    }
    */
</script>