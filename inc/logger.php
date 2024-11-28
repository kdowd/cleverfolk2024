<?php


// add_action('wp_footer', function () {
//     global $post;
//     logger($post);
//     $blocks = parse_blocks($post->post_content);
//     foreach ($blocks as $block) {
//         logger($block);
//     }
// });


/**
 * Pretty Printing
 */
function logger($obj, $label = '')
{
    if (empty($obj)) {
        return;
    };
   $data = json_encode(print_r($obj, true));
?>

<script>
var doStuff = function() {
    var obj = <?php echo $data; ?>;
    var logger = document.getElementById('bsdLogger');

    if (!logger) {
        logger = document.createElement('div');
        logger.id = 'bsdLogger';
        document.body.appendChild(logger);
        logger.addEventListener("click", (evt) => {
            if (evt.ctrlKey && document.querySelector('#bsdLogger')) {
                document.querySelector('#bsdLogger').remove();
            }
        }, {
            once: true
        });
    }
    console.log("++++++++++++++++++++++++++++++++++++++");
    console.log(obj);
    console.log("++++++++++++++++++++++++++++++++++++++");
    var pre = document.createElement('pre');
    var h2 = document.createElement('h2');
    pre.innerHTML = obj;
    h2.innerHTML = '<?php echo addslashes($label); ?>';
    logger.appendChild(h2);
    logger.appendChild(pre);
};
window.addEventListener("load", doStuff, false);
</script>
<?php
}