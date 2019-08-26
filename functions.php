<?php

if (!defined('ABSPATH')) die();

// Update CSS within in Admin
function admin_style() {
  wp_enqueue_style('admin-styles', get_stylesheet_directory_uri().'/admin.css');
}
add_action('admin_enqueue_scripts', 'admin_style');

function ds_ct_enqueue_parent() { wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' ); }

function ds_ct_loadjs() {
//   wp_enqueue_script( 'jq-steps', get_stylesheet_directory_uri() . '/js/jquery.steps.min.js',
//   array( 'jquery' )
// );
  wp_enqueue_script( 'jq-steps', get_stylesheet_directory_uri() . '/js/wizard.js',
  array( 'jquery' )
);

	wp_enqueue_script( 'ds-theme-script', get_stylesheet_directory_uri() . '/ds-script.js',
        array( 'jquery' )
        
    );
}

//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js
add_action( 'wp_enqueue_scripts', 'ds_ct_enqueue_parent' );
add_action( 'wp_enqueue_scripts', 'ds_ct_loadjs' );

/* Widgetbuilder Widget */
require_once('custom-widgets/divi-widgetbuilder/class-widget-divi-widgetbuilder.php');

/* Woo - disable image zoom */
add_action( 'after_setup_theme', 'hc_remove_zoom_lightbox_theme_support', 99 );
 
function hc_remove_zoom_lightbox_theme_support() { 
	remove_theme_support( 'wc-product-gallery-zoom' );
	remove_theme_support( 'wc-product-gallery-lightbox' );
	remove_theme_support( 'wc-product-gallery-slider' );
}

/* Woo - change single product price location */
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
add_action( 'woocommerce_after_single_variation', 'woocommerce_template_single_price', 25 );

/* Woo - remove SKU */
add_filter( 'wc_product_sku_enabled', 'hc_remove_product_page_sku' );
 
function hc_remove_product_page_sku( $enabled ) {
    if ( !is_admin() && is_product() ) {
        return false;
    }
 
    return $enabled;
}

/* Woo - remove categories from single product page */
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

/* Woo - Add custom field input @ Product Data > Variations > Single Variation */
 
add_action( 'woocommerce_variation_options_pricing', 'hc_add_initials_color_field_to_variations', 10, 3 ); 
  
function hc_add_initials_color_field_to_variations( $loop, $variation_data, $variation ) {
	woocommerce_wp_text_input( array(
		'id' => 'initials_color_field[' . $loop . ']',
		'class' => 'short',
		'label' => __( 'Initials Color - Paste HEX Initials color (ex. #ffffff).', 'woocommerce' ),
		'value' => get_post_meta( $variation->ID, 'initials_color_field', true )
		)
	);
}

/* Woo - Save custom field on product variation save */
 
add_action( 'woocommerce_save_product_variation', 'hc_save_initials_color_field_variations', 10, 2 );
 
function hc_save_initials_color_field_variations( $variation_id, $i ) {
	$initials_color_field = $_POST['initials_color_field'][$i];
	if ( isset( $initials_color_field ) ) update_post_meta( $variation_id, 'initials_color_field', esc_attr( $initials_color_field ) );
}
 
/* Woo - Store custom field value into variation data */
 
add_filter( 'woocommerce_available_variation', 'hc_add_initials_color_field_variation_data' );
 
function hc_add_initials_color_field_variation_data( $variations ) {
	$variations['initials_color_field'] = '<div class="woocommerce_initials_color_field no-data"><div class="var-desc2">' . get_post_meta( $variations[ 'variation_id' ], 'initials_color_field', true ) . '</div></div>';
    return $variations;
}

/* Woo - variations summary */
function hc_variations_summary() { ?>

	<div id="summary">
		<div class="designer-panel">
    <div class="designer-wrapper">
			<span class="layout-regular-wrapper">
              <div class="wizard-summary multi untouched">
                <div class="property" id="label-variation_pa_body-size"><span class="property-title">
                    <div class="title-wrapper"><span>Body Size</span>
                    </div>
                  </span>
                  <div class="selected"><a><span>Medium</span></a></div>
                </div>
                <div class="property" id="label-variation_pa_body-type"><span class="property-title">
                    <div class="title-wrapper"><span>Body Type</span>
                    </div>
                  </span>
                  <div class="selected"><a><span>burly-tall</span></a></div>
                </div>
                <div class="property" id="label-variation_pa_head-size"><span class="property-title">
                    <div class="title-wrapper"><span>Head Size</span>
                    </div>
                  </span>
                  <div class="selected"><a><span>57</span></a></div>
                </div>
                <div class="property" id="label-variation_pa_fabric-color"><span class="property-title">
                    <div class="title-wrapper"><span>Fabric & Color</span>
                    </div>
                  </span>
                  <div class="selected"><a><span>blue</span></a></div>
                </div>
                <div class="property" id="label-variation_pa_closing"><span class="property-title">
                    <div class="title-wrapper"><span>Closing</span>
                    </div>
                  </span>
                  <div class="selected"><a><span>XXX</span></a></div>
                </div>
                <div class="property" id="label-custom_initials"><span class="property-title">
                    <div class="title-wrapper"><span>Initials</span>
                    </div>
                  </span>
                  <div class="selected"><a><span>No Initials</span></a></div>
                </div>
              </div>
            </span>
        </div>
		</div>
	</div>
	<div id="bottom-panel">
		<div id="bottom-links">
			<span class="summary-bottom-btn">Summary</span>   |   <span class="next-bottom-btn">Next</span>
		</div>
		<div id="sizes-links"><span class="add-sizes-bottom-btn">Add New Size</span><span class="login-bottom-btn">Login for saved sizes</span></div>
	</div>
<?php }
// add_action( 'woocommerce_after_single_product_summary', 'hc_variations_summary', 25 );
add_action( 'woocommerce_before_add_to_cart_form', 'hc_variations_summary', 25 );
?>