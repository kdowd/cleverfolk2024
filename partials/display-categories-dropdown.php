<?php
$args = array('taxonomy'=>'product_cat' );
$args['orderby'] = 'name';
$args['show_counts'] = true;
$args['empty'] = false;
$all_categories = get_categories( $args );
?>

<?php if (count($all_categories) ) : ?>
<div class="categories-dropdown-wrapper">
    <label class="screen-reader-text" for="product-categories-select">
        Other Sports
    </label>
    <select class="select" id="product-categories-select">
        <option value="false" hidden="">
            Other Sports
        </option>
        <?php foreach ($all_categories as $cat) :  ?>
        <option value=<?php echo htmlspecialchars(home_url($cat->slug), ENT_QUOTES); ?>>
            <?php $uc = ucfirst($cat->category_nicename); echo "$uc ($cat->count)"; ?>
        </option>
        <?php endforeach; ?>
    </select>
</div>



<?php endif ?>

<script>
var categoriesElement = document.getElementById("product-categories-select");
categoriesElement.addEventListener("change", function(evt) {
    if (evt.target.value) {
        document.location.href = evt.target.value;
    }

});
</script>