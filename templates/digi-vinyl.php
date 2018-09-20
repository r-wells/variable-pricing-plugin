<?php
 
function jquery_custom_action() {

    $id = get_the_ID();

    //if( 19222 === $id ) 
    if( 11 === $id ) {
    ?>
        <div>
            <form action="">
                <p>Please input you desired quantity and the length and width of your design.</p>
                <p><strong>(Minimum order amount is $25. Price per sq in. varies based on quantity.)</strong></p>
                <label for="quantity">Quantity: </label>
                <input id="quantity" class="custom-input" name="quantity" type="text"/><br>
                <label for="length">Length: </label>
                <input id="length" class="custom-input" name="length" type="text"/><br>
                <label for="width">Width: </label>
                <input id="width" type="number" class="custom-input" name="width"/><br>
                <label for="pics">Number Of Pics: </label>
                <input id="pics" type="text" class="custom-input" name="pics"><br>
            </form>
        </div>
        <div class="dg_left">
            <label for="area">Area: </label>
            <p><span id="area">0.00</span> sq in. per pirce</p>
            <p><span id="totalarea">0.00</span> total sq in.</p>
            <label for="cost">Total cost: </label>
            <p>$<span id="cost">0.00</span></p>
            <p>Cost Per Transfer: </p>
            <p>$<span id="costpertransfer">0.00</span> Per Transfer</p>
        </div>
        <div id="hidden_paragraph" class="dg_right dg_hidden">
            <p class="dg_paragraph"><strong>The minimum order amount for this product is $25. Please increase the item quantity or,
             if you prefer to maintain your current quantity, the item price in the cart will increase to $25.</strong>
            </p>
        </div>
        <div class="dg_clear"></div>
    <?php  
    } 

}

add_action( 'woocommerce_before_add_to_cart_form', 'jquery_custom_action', 5 );

// Adding a custom imput hidden field in add to cart form
add_action( 'woocommerce_before_add_to_cart_button', 'custom_hidden_product_field', 11, 0 );
function custom_hidden_product_field() {
    echo '<input type="hidden" id="hidden_field" name="custom_price" class="custom_price" value="">';
}

// Save custom calculated price as custom cart item data
add_action( 'woocommerce_add_cart_item_data', 'save_custom_fields_data_to_cart', 10, 2 );
function save_custom_fields_data_to_cart( $cart_item_data, $product_id ) {

    if( ! empty( $_REQUEST['custom_price'] ) ) {
        // Set the custom data in the cart item
        if($_REQUEST['custom_price'] < 25) {
            $cart_item_data['custom_price'] = 25.00;
        } else {
            $cart_item_data['custom_price'] = $_REQUEST['custom_price'];
        }
        // Make each item as a unique separated cart item
        $cart_item_data['unique_key'] = md5( microtime().rand() );
    }
    return $cart_item_data;
}

// Updating cart item price
add_action( 'woocommerce_before_calculate_totals', 'change_cart_item_price', 30, 1 );
function change_cart_item_price( $cart ) {
    if ( ( is_admin() && ! defined( 'DOING_AJAX' ) ) )
        return;

    // Loop through cart items
    foreach ( $cart->get_cart() as $cart_item ) {
        // Set the new price
        if( isset($cart_item['custom_price']) ){
            $cart_item['data']->set_price($cart_item['custom_price']);
        }
    }
}
?>