<?php
//Post Index/Tax Pagination
function pagination($pages = '', $paged = '', $range = 4)
{
    $showitems = ($range * 2) + 1;
    if (empty($paged)) {
        $paged = 1;
    }

    if ($pages == '') {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if (!$pages) {
            $pages = 1;
        }
    }

    if (1 != $pages) {
        echo "<div class='archive-pagination mb-28 container text-center flex items-center justify-center'>";
        if ($paged != 1) {
            echo "<a href='" . get_pagenum_link($paged - 1) . "' class='archive-pagination-navigation left'>prev</a>";
        }
        for ($i = 1; $i <= $pages; $i++) {
            if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems)) {
                echo ($paged == $i) ? "<span class=\"archive-pagination-item current\"><span>" . $i . "</span></span>" : "<a href='" . get_pagenum_link($i) . "' class=\"archive-pagination-item inactive\"><span>" . $i . "</span></a>";
            }
        }
        if ($paged != $pages) {
            echo "<a href='" . get_pagenum_link($i - 1) . "' class='archive-pagination-navigation right'>next</a>";
        }

        echo "</div>";

    }
}