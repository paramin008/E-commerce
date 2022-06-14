<?php
 
function random_strings($length_of_string) {
     
    return substr(md5(time()), 0, $length_of_string);
}
 
echo random_strings(1000);
 
echo "\n";
?>
