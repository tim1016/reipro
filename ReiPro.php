<?php
/**
 * Plugin Name
 *
 * @package     REIPro
 * @author      Inkant Awasthi
 * @copyright   2016 Inkant Awasthi, Resonance Realty Management
 * @license     GPL-2.0+
 *
 * @wordpress-plugin
 * Plugin Name: REIPro
 * Plugin URI:  https://github.com/tim1016/reipro.git
 * Description: Description of the plugin.
 * Version:     1.0.0
 * Author:      Inkant Awasthi
 * Author URI:  https://example.com
 * Text Domain: REIPro
 * License:     GPL-3.0+
 * License URI: http://www.gnu.org/licenses/gpl-3.0.txt
 */

defined ( 'ABSPATH' ) or die('You are not allowed to access the plugin externally !');

if(file_exists( dirname(__FILE__) . '/vendor/autoload.php'))
{
    require_once dirname(__FILE__).  '/vendor/autoload.php';
}

if(file_exists( dirname(__FILE__) . '/vendor/webdevstudios/cmb2/init.php'))
{
    require_once dirname(__FILE__).  '/vendor/webdevstudios/cmb2/init.php';
}





function rei_get_meta_box( $meta_boxes ) {
    $prefix = 'reipro_';

    $rei_banner_metabox = new_cmb2_box( array(
        'id' => $prefix . 'metabox',
        'title' => __( 'Page Banner', 'cmb2' ),
        'object_types' => array( 'post', 'page')
    ));
    


    $rei_banner_metabox->add_field( array(
        'name'    => 'Test File',
        'desc'    => 'Upload image or enter an URL. This image will be displayed as the banner for this page.',
        'id'      => $prefix . 'pageBanner',
        'type'    => 'file',
        // Optional:
        'options' => array(
            'url' => false, // Hide the text input for the url
        ),
        'text'    => array(
            'add_upload_file_text' => 'Add File' // Change upload button text. Default: "Add or Upload File"
        ),
        // query_args are passed to wp.media's library query.
        'query_args' => array(
            //'type' => 'application/pdf', // Make library only display PDFs.
            // Or only allow gif, jpg, or png images
             'type' => array(
             	'image/gif',
             	'image/jpeg',
             	'image/png',
            ),
        ),
        'preview_size' => 'large', // Image size to use when previewing in the admin.
    ) );


    $rei_banner_metabox->add_field( array(
        'name'    => __('Subtitle for the page', 'cmb2'),
        'desc'    => 'This text will be display after the page title',
        'id'      => $prefix . 'banner_subtitle',
        'type'    => 'Text'
        )
    );



	return $rei_banner_metabox;
}
//add_filter( 'rwmb_meta_boxes', 'rei_get_meta_box' );
add_action( 'cmb2_admin_init', 'rei_get_meta_box');



















// define('PLUGIN_PATH', plugin_dir_path( __FILE__ ));
// define('PLUGIN_URL', plugin_dir_url( __FILE__ ));
// define('PLUGIN', plugin_basename( __FILE__ ));


// if ( class_exists( 'REIInc\\Init' ) ){
//     REIInc\Init::register_services();
// }



// register_activation_hook( __FILE__, 'ActivateReiPlugin');
// register_deactivation_hook( __FILE__, 'DeactivateReiPlugin');
// function ActivateReiPlugin(){
//     Inc\Base\ReiPluginHooks::activate();
// }
// function DeactivateReiPlugin(){
//     Inc\Base\ReiPluginHooks::deactivate();
// }