<?php
    require 'PHPMailer/PHPMailerAutoload.php';  // 引用PHPMailer類別庫   
    $C_name=$_POST['C_name'];
    $C_email=$_POST['C_email'];
    $C_lineid=$_POST['C_lineid'];
    $C_tel=$_POST['C_tel'];
    $C_message=$_POST['C_message'];
   
    $mail= new PHPMailer();                          //建立新物件
    // $mail->IsSMTP();                                    //設定使用SMTP方式寄信
    // $mail->SMTPAuth = true;                        //設定SMTP需要驗證
    $mail->SMTPSecure = "tls";                    // Gmail的SMTP主機需要使用SSL連線
    $mail->Host = "smtp.gmail.com";             //Gamil的SMTP主機
    $mail->Port = 587;                                 //Gamil的SMTP主機的埠號(Gmail為465)。
    $mail->CharSet = "utf-8";                       //郵件編碼
    $mail->Username = "artminda0117@gmail.com"; //Gamil帳號
    $mail->Password = "winfreedom0117";                 //Gmail密碼
    $mail->From = "artminda0117@gmail.com";        //寄件者信箱
    $mail->FromName = "AMINDA DESIGN";                  //寄件者姓名
	
	
    $mail->Subject ="來自粉絲".$C_name."留言"; //郵件標題
    $mail->Body = "姓名:".$C_name."<br />信箱:".$C_email."<br />電話:".$C_tel."<br />LINE:".$C_lineid."<br />回應內容:".$C_message."<br />感謝您的留言，我們將盡快給您回復!"; //郵件內容
    $mail->IsHTML(true);                             //郵件內容為html
    $mail->AddAddress("$C_email");            //收件者郵件及名稱
	$mail->AddAddress("artminda0117@gmail.com");            //收件者郵件及名稱
    if(!$mail->Send()){
        echo "Error: " . $mail->ErrorInfo;
    }else{
        echo"<div class='container'>";
          echo"<div class='row'>";
            echo"<div class='col-md-8 col-md-offset-2 col-xs-12'>";
               echo"<div class='video embed-responsive embed-responsive-4by3 col-xs-12'>";
                     echo"<embed src='https://www.youtube.com/embed/3v79CLLhoyE?autoplay=1' autostart='true' height='70%' width='100%'>";
                    echo"</div>";
                    echo"<h1 style='font-family: 微軟正黑體'>非常感謝您的寶貴意見，我將盡速回復您!</h1>";
            echo"</div>";
        echo"</div>";
    echo"</div>";
    }
?>