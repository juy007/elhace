<!DOCTYPE html>
<html> 
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>
    <div style="width: 600px;margin-left: auto;margin-right: auto;background: #E7E5E5;padding: 15px;border-radius: 12px;">
        <table border="0" width="100%">
            <tr>
                <td width="100%" align="left">
                    <img height="50" src="https://back.elhace.com/assets/backend/images/logo/email-logo.png" alt="Logo">
                </td>
            </tr>
        </table><hr>
        <br><br><br>
        <table border="0" width="100%">
           
            <tr style="font-family: Arial;color: #000;line-height: 1.8;">
                <td style="padding: 9px 15px 9px 15px;background: #fff;border-radius: 10px;font-size: 20px">Name : <?php echo $name; ?>
                </td>
            </tr>
            <tr style="font-family: Arial;color: #000;line-height: 1.8;">
                <td style="padding: 9px 15px 9px 15px;background: #fff;border-radius: 10px;font-size: 20px">E-mail : <?php echo $email; ?>
                </td>
            </tr>
            <tr style="font-family: Arial;color: #000;line-height: 1.8;">
                <td style="text-align: justify; padding: 9px 15px 9px 15px;background: #fff;border-radius: 10px;font-size: 20px">Message : <br><?php echo $message; ?>
                </td>
            </tr>
           
         
        </table>
       <br>
        <br>
        <br>
        <hr>
        <table border="0" width="100%">
            <tr style="font-family: Arial;color: #000; font-size: 15px;">
                <td >
                   
                    &copy; <?php echo date("Y") ?> Bodro Bilowo all rights reserved
                </td>
            </tr>
            
        </table>

    </div>
</body>
</html>
