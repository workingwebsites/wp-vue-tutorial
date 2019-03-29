<?php
/**
 * Plugin Name: WordPress Vue Tutorial
 * Description: A demo on how to use Vue in WordPress.
 */

//Register scripts to use
function func_load_vuescripts() {
	wp_register_script('wpvue_vuejs', 'https://cdn.jsdelivr.net/npm/vue/dist/vue.js');
	wp_register_script('my_vuecode', plugin_dir_url( __FILE__ ).'vuecode.js', 'wpvue_vuejs', true );
}
//Tell WordPress to register the scripts
add_action('wp_enqueue_scripts', 'func_load_vuescripts');


//Return string for shortcode
function func_wp_vue(){
  //Add Vue.js
  wp_enqueue_script('wpvue_vuejs');
  //Add my code to it
  wp_enqueue_script('my_vuecode');

  //Build String
  $str= "<div id='divWpVue'>"
  	."Message from Vue: {{ message }}"
  	."</div>";

  //Return to display
  return $str;
} // end function

//Add shortcode to WordPress
add_shortcode( 'wpvue', 'func_wp_vue' );
?>
