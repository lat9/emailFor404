<?php
// -----
// Part of the "Email on 404" plugin by lat9.
//
/**
 * errors definitions and destination email address
 */
define('SEND_404_ERRORS_EMAILS_TO', 'id@yoursite.com');     // This is the email address that the 404 emails are sent to
define('SEND_404_ERRORS_EMAIL_TO_STATUS', '1');             // Set to '1' to enable the email sending
define('SEND_404_ERRORS_EMAIL_ARCHIVE', '0');               // Set to '0' for no archiving, any other value to write to email_archive in database

// -----
// Email subject.
//
define('EMAIL_PAGE_NOT_FOUND_SUBJECT', 'A 404 Error Was Generated');

// -----
// Email content.  The following variables are supplied by the observer-class:
//
// %1$s:  The contents of the $_SERVER array, in var_export format.
// %2$s:  The contents of the $_SESSION array, in var_export format.
//
// NOTE: Since the content is a double-quoted string (for brevity), each of the $ values must be escaped (i.e. \$) so
// that they're not presumed to be a variable name!  For example, %1$s becomes %1\$s.
//
define('EMAIL_PAGE_NOT_FOUND_CONTENT', "At the time of the error:\n\n\$_SERVER contents:\n%1\$s\n\n\$_SESSION contents:\n%2\$s");
