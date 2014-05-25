<?php

    $to = "knwphotography1@gmail.com"; 
    $from = preg_replace("([\r\n])", "", $_REQUEST['email']);  
    $name = preg_replace("([\r\n])", "", $_REQUEST['name']);    
    $headers = "From: $from"; 
    $subject = "Contact Form Inquiry From $from"; 
 
    $fields = array(); 
    $fields{"name"} = "name"; 
    $fields{"email"} = "email"; 
    $fields{"message"} = "message";
 
    $body = "Here is what was sent:\n\n"; foreach($fields as $a => $b){   $body .= sprintf("%20s: %s\n",$b,$_REQUEST[$a]); }
 
    $match = "/(bcc:|cc:|content\-type:)/i";
if (preg_match($match, $_REQUEST['email']) ||
    preg_match($match, $_REQUEST['message']) ||
    preg_match($match, $_REQUEST['name'])) {
  die("Header injection detected.");
}

    $send = mail($to, $subject, $body, $headers);

?>
