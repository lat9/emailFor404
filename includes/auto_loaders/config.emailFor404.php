<?php
/**
 * Autoloader to instantiate observer class
 */
$autoLoadConfig[200][] = array('autoType'=>'class',
                              'loadFile'=>'observers/class.emailFor404.php');
$autoLoadConfig[200][] = array('autoType'=>'classInstantiate',
                              'className'=>'emailFor404',
                              'objectName'=>'emailFor404');


/**
 * errors definitions and destination email address
 */
define('SEND_404_ERRORS_EMAILS_TO', 'id@yoursite.com'); /* This is the email address that the 404 emails are sent to */
define('SEND_404_ERRORS_EMAIL_TO_STATUS', '1');  /* Set to '1' to enable the email sending */
define('SEND_404_ERRORS_EMAIL_ARCHIVE', '0');  /* Set to '0' for no archiving, any other value to write to email_archive in database */
define('EMAIL_PAGE_NOT_FOUND_SUBJECT','A 404 Error Was Generated');  /* This is the email subject */
define('EMAIL_PAGE_NOT_FOUND_CONTENT','A user at host address [%s] with IP address [%s] generated a 404 using the query string [%s].'."\n\n");