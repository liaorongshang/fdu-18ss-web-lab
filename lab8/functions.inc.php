<?php

    function outputOrderRow($file, $title, $quantity, $price) {
        echo "<tr><td><img src=images/books/tinysquare/$file>";
        echo "<td class=\"mdl-data-table__cell--non-numeric\">$title</td>";
        echo "<td>$quantity</td>";
        echo "<td>$price</td>";
        echo "<td>$quantity*$price</td>";
        echo "</tr>";
    }
?>