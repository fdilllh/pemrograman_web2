<?php
function repeat($text, $num = 10)
{
    echo "<ol>\r\n";
    for ($i = 0; $i < $num; $i++) {
        echo "<li>$text </li>\r\n";
    }
    echo "</ol>";
}

// dipanggil dengan dua argumen
repeat("I'm the best", 15);
// dipanggil dengan satu argumen
repeat("You're the man");

?>