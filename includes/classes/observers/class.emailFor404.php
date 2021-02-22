<?php
class emailFor404 extends base
{
    // -----
    // Enable the plugin only if all the variables (present in /languages/english/extra_definitions/emailFor404_extra_definitions.php) are
    // set to "sane" values.
    //
    public function __construct()
    {
        if (SEND_404_ERRORS_EMAIL_TO_STATUS === '1' && SEND_404_ERRORS_EMAILS_TO !== '' && SEND_404_ERRORS_EMAILS_TO !== 'id@yoursite.com') {
            $this->attach($this, ['NOTIFY_HEADER_END_PAGE_NOT_FOUND']);
        }
    }

    // -----
    // This is the method that sends the email, if a page-not-found is detected.
    //

    public function update(&$class, $eventID, $p1): void
    {
        $email_subject = EMAIL_PAGE_NOT_FOUND_SUBJECT;
        $html_msg['EMAIL_SUBJECT'] = $email_subject;

        $email_text = sprintf(EMAIL_PAGE_NOT_FOUND_CONTENT, var_export($_SERVER, true), var_export($_SESSION, true));
        $html_msg['EMAIL_MESSAGE_HTML'] = nl2br($email_text);

        $module = (SEND_404_ERRORS_EMAIL_ARCHIVE !== '0') ? 'default' : 'no_archive';
        zen_mail('', SEND_404_ERRORS_EMAILS_TO, $email_subject, $email_text, STORE_NAME, EMAIL_FROM, $html_msg, $module);
    }
}
