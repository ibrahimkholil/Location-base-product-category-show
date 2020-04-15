function is_geo_country_belgium() {
    // Get an instance of the WC_Geolocation object class
    $geolocation_instance = new WC_Geolocation();
    // Get user IP
    $user_ip_address = $geolocation_instance->get_ip_address();
    // Get geolocated user IP country code.
    $user_geolocation = $geolocation_instance->geolocate_ip( $user_ip_address );

    return $user_geolocation['country'] === 'BD' ? true : false;
}

add_filter( 'woocommerce_product_is_visible', 'change_specific_products_price', 10, 2 );
function change_specific_products_price( $visible, $product ) {
global $product;
   $visible = false;
    $category = 'landscape';
    //var_dump($product->get_id());
    if ( has_term( $category, 'product_cat', $product->get_id() ) && is_geo_country_belgium() ) {
     $visible = true;
    }
    return $visible;
} 
