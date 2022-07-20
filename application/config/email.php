<?php
// This config file would be autoloaded in the autoload.php file and can be called 
// whenever creating function that uses email functionatliy 
$config = array(  
  'useragent'=>'CodeIgniter',
  'protocol'=>'smtp',
  'smtp_host'=>'smtp.ionos.com', // example: smtp.gmail.com
  'smtp_port'=>587, // email port
  'smtp_crypto'=>'tls', // email encryption protocol 
  'smtp_user'=>'', // Not showing email credentials
  'smtp_pass'=>'', // Not showing email credentials
  'mailtype'=>'html', // allows rich HTML emails 
  'smtp_timeout'=>'30', //timeout after 30 seconds if email failed to send 
  'charset'=>'iso-8859-1',
//  'validate'=>TRUE, // Validates the legitimacy of the email
  'wordwrap'=>TRUE,
  'newline'=>'\r\n' // recommended to comply with RFC 822
);

?>
