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
    $body = '<b>Message From:</b> ' . $name . '<br>';
    $body .= '<b>Reason:</b> ' . $reason . '<br><br>';
    $body .= '<b>Event Date:</b> ' . $date . '<br><br>';
    $body .= $message;

    $send = wp_mail($to, $subject, $body, $headers);
?>
