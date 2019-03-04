<?php
// create custom plugin settings menu
add_action('admin_menu', 'wpvg_create_menu');

function wpvg_create_menu() {

	//create new top-level menu
	add_menu_page('WPVG', 'WPVG', 'administrator', __FILE__, 'wpvg_settings_page' , plugins_url('/images/icon.png', __FILE__) );

	//call register settings function
	add_action( 'admin_init', 'register_wpvg_settings' );
}


function register_wpvg_settings() {
	//register our settings
	register_setting( 'wpvg-settings-group', 'new_option_name' );
	register_setting( 'wpvg-settings-group', 'some_other_option' );
	register_setting( 'wpvg-settings-group', 'option_etc' );
}

function wpvg_settings_page() {
?>
<div class="wrap">
<h1>WPVG</h1>

<form method="post" action="options.php">
    <?php settings_fields( 'wpvg-settings-group' ); ?>
    <?php do_settings_sections( 'wpvg-settings-group' ); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">CLIENT ID</th>
        <td><input type="text" name="new_option_name" value="<?php echo esc_attr( get_option('new_option_name') ); ?>" /></td>
        </tr>
         
        <tr valign="top">
        <th scope="row">API KEY</th>
        <td><input type="text" name="some_other_option" value="<?php echo esc_attr( get_option('some_other_option') ); ?>" /></td>
        </tr>
        
        <tr valign="top">
        <th scope="row">API SECRET</th>
        <td><input type="text" name="option_etc" value="<?php echo esc_attr( get_option('option_etc') ); ?>" /></td>
        </tr>
    </table>
    
    <?php submit_button(); ?>

</form>
</div>
<?php } ?>
