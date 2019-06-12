<?php

function generateLink($url, $label, $class) {
   $link = '<a href="' . $url . '" class="' . $class . '">';
   $link .= $label;
   $link .= '</a>';
   return $link;
}


function outputPostRow($number)  {
    include("travel-data.inc.php");
}

/*
  Function constructs a string containing the <img> tags necessary to display
  star images that reflect a rating out of 5
*/
function constructRating($rating) {
    $imgTags = "";
    
    // first output the gold stars
    for ($i=0; $i < $rating; $i++) {
        $imgTags .= '<img src="images/star-gold.svg" width="16" />';
    }
    
    // then fill remainder with white stars
    for ($i=$rating; $i < 5; $i++) {
        $imgTags .= '<img src="images/star-white.svg" width="16" />';
    }    
    
    return $imgTags;    
}


function display_image($row_image){
    echo "<li>".
     " <a href=\"detail.php?id={$row_image['ImageID']}\" class=\"img-responsive\">".
     "<img src=\"images/square-medium/{$row_image['Path']}\" alt=\"{$row_image['Description']}\">".
     "<div class=\"caption\">".
     "<div class=\"blur\"></div>".
     "<div class=\"caption-text\">".
     "<p>{$row_image['Title']}</p>".
     "</div>"."</div>"."</a>"."</li>";
}

?>