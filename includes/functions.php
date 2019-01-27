<?php


// Funkcija za ucitavanje layout-a (template parts)
function include_layout_template($template="") {
    include(SITE_ROOT.DS.'layouts'.DS.$template);
}

// Funkcija za ucitavanje komponenti
function include_components_template($components="") {
    include(SITE_ROOT.DS.'components'.DS.$components);
}


?>