<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
/**
Plugin Name: Webchecker
Description: Plugin for Webchecker
Author: Zanteres
Version: 1.0
 * Plugin Name:       My Basics Plugin
 * Plugin URI:        https://webcheck.zanteres.com/
 * Description:       Monitors accesstimes of your website
 * Version:           1.0
 * Requires at least: 5.0
 * Requires PHP:      7.0
 * Author:            Michael Hofmayer
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
**/

$progname = "Webchecker";

## prefix = zant_mh_

add_action('admin_menu', 'zant_mh_menu_register');


function zant_mh_menu_register () {
    add_menu_page('webcheck-admin', 'Webchecker', 'edit_posts', 'moomoc-administration', 'zant_mh_theme_settings_page');
}



function zant_mh_theme_settings_page()
{
    ?>
    <div class="wrap">
        <h1>Webchecker</h1>
	<?php
	    $current_user = wp_get_current_user();
	    echo 'If you are not registered, please <a href="https://webcheck.zanteres.com/wp-login.php?action=register">register</a> at first with your email ('.$current_user->user_email.') - it is free!';
	?>
	<br><br>

<style>                                                                              
.iframe-container {                                                                  
  overflow: hidden;                                                                  
}                                                                                    
                                                                                     
.iframe-container iframe {                                                           
   border: 0;                                                                        
   height: 100%;                                                                     
   left: 0;                                                                          
   position: absolute;                                                               
   top: 0;                                                                           
   width: 100%;                                                                      
}                                                                                    
</style>                                                                             


<?php
$current_user = wp_get_current_user();
?>
                                                                                     
<form id="myform" action="https://webalyze.zanteres.com/" method="get" target="my_iframe">
  <input name="accessdata" type="text" hidden value='{"apikey": "<?php echo get_option('webchecker_apikey');?>", "email": "<?php echo $current_user->user_email; ?>", "hostname": "<?php echo $current_user->user_url;?>"}'/>
</form>



<div id="sf">
  <iframe name="my_iframe" width="1100" height="800" frameborder="0"></iframe>
</div>

                                                                                     
<script type="text/javascript">                                                      
    document.getElementById('myform').submit();                                      
</script>                                                                            


    </div>
    <?php
}


function zant_mh_display_articleteaser()
{
    ?>
    <input type="text" id="webchecker_apikey" style="width:100%" name="webchecker_apikey" value="<?php echo get_option('webchecker_apikey'); ?>"></input>
    <?php
}


function zant_mh_add_theme_options()
{
}

add_action("admin_init", "zant_mh_add_theme_options");



?>
