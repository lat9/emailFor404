<?php
class emailFor404 extends base {

 /**  constructor method !
   *
   * Attach observer class to the global $zco_notifier and watch for a single notifier event.
   */
  function emailFor404() {
    global $zco_notifier;
    if (SEND_404_ERRORS_EMAIL_TO_STATUS == '1' and SEND_404_ERRORS_EMAILS_TO != '' and SEND_404_ERRORS_EMAILS_TO != 'id@yoursite.com') {
      $zco_notifier->attach($this, array('NOTIFY_HEADER_END_PAGE_NOT_FOUND'));
    }
  }


 /**   Actual Method that does the desired activity
   *
   * Called by observed class when any of the notifiable events occur
   *
   * @param object $class
   * @param string $eventID
   */
  function update(&$class, $eventID, $paramsArray = array()) {
    // BOF Send email to admin for 404 errors
    $email_text = sprintf(EMAIL_PAGE_NOT_FOUND_CONTENT, $_SESSION['customers_host_address'], $_SESSION['customers_ip_address'], $_SERVER['REQUEST_URI'])."\n\n";
    $email_subject = EMAIL_PAGE_NOT_FOUND_SUBJECT;
    $module = (SEND_404_ERRORS_EMAIL_ARCHIVE != '0') ? 'default' : 'no_archive';
    $html_msg['EMAIL_SUBJECT'] = EMAIL_PAGE_NOT_FOUND_SUBJECT;
    $html_msg['EMAIL_MESSAGE_HTML'] = str_replace('\n','',$email_text);
    zen_mail('', SEND_404_ERRORS_EMAILS_TO, $email_subject, $email_text, STORE_NAME, EMAIL_FROM, $html_msg, $module);
    // EOF Send email to admin for 404 errors
  }
}
?>
