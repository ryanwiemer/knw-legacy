<?php
    require_once('../../../wp-load.php');
    $to = get_option( 'admin_email' );
    $name =  sanitize_text_field( $_POST["name"] );
    $subject = "KNW Photography Inquiry From $name";
    $headers = "From: " . sanitize_email( $_POST["email"] ) . "\r\n";
    $headers .= "Reply-To: ". sanitize_email( $_POST["email"] ) . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $reason =  sanitize_text_field( $_POST["reason"] );
    $date = sanitize_text_field( $_POST["date"] );
    $message = esc_textarea( $_POST["message"] );
    $body = '<b>Name:</b> ' . $name . '<br>';
    $body .= '<b>Reason For Contacting:</b> ' . $reason . '<br>';
    $body .= '<b>Event Date:</b> ' . $date . '<br><br>';
    $body .= $message;

    $send = wp_mail($to, $subject, $body, $headers);
?>

/*
  Generated Auto Response
 */
<?php
    require_once('../../../wp-load.php');
    $to = sanitize_email( $_POST["email"] );
    $subject = "KNW Photography is Out for the Holidays";
    $headers = "From: " . get_option( 'admin_email' ) . "\r\n";
    $headers .= "Reply-To: " . get_option( 'admin_email' ) . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $body = 'Hi there!<br><br>';
    $body .= 'Thanks for reaching out. I am currently out of the country on vacation for the holidays and will respond to your email as soon as I arrive home. I will be back and responding December 26th but will have very limited internet access before then. Thanks so much for your patience and happy holidays!<br><br>';
    $body .= '- Kirsten at KNW Photography';
    $send = wp_mail($to, $subject, $body, $headers);
?>
