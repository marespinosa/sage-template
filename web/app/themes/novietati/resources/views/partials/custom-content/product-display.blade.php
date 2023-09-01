<section id="section-{!! $key !!}" class="acf-fc-layout acf-fc-layout-content section-page animate hide ">
    <div class="entry-content container">
        {!! $section['content'] !!}

        <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4"> 
            <?php
            $selected_products = $section['product_featured'];
        
            if ($selected_products) {
                foreach ($selected_products as $product) {
                    $product_id = $product->ID;
                    $product_title = $product->post_title;
                    $product_content = $product->post_content;
                    $product_url = get_permalink($product_id);
                    $product_image = get_the_post_thumbnail($product_id, 'thumbnail');
                    $product_price = wc_price(get_post_meta($product_id, '_regular_price', true)); // Change '_regular_price' to '_sale_price' if needed

                    echo "<div class='product-col text-center mx-7 mb-8'>";
                    
                    echo "<a href='$product_url' class='w-full'>$product_image</a>";
                    echo "<h5 class='pb-4'><a href='$product_url'>$product_title</a><br></h5> ";
                    echo "<p><a href='$product_url'>Enquiry</a><p>";

                    echo "</div>";
                }
            } else {
                echo "No featured products found.";
            }
            ?>
        
        </div>

    </div>

</section>