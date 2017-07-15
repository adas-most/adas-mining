<? 
    session_start();
    if($_POST['form-name'] AND "contact" === $_POST['form-name']) {
         /** Absolute path to the WordPress directory. */
         if ( !defined('ABSPATH') )
	    define('ABSPATH', dirname(__FILE__) . '/');
         require_once(ABSPATH. 'contact-form-functions.php');
         echo "Start sending ...";
	 send_message();
         echo "Finish sending ...";
     }
?>