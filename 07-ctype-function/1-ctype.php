<?php
$data = array('ali', 'm\hdi', '123mohammad');
foreach ($data as $value) {
    if (ctype_alnum($value)) {
        echo 'ture' . '<br>';
    } else {
        echo 'false' . '<br>';
    }
}

echo '<hr>';


$data = array('ali', 'm\hdi', '123mohammad');
foreach ($data as $value) {
    if (ctype_alpha($value)) {
        echo 'ture' . '<br>';
    } else {
        echo 'false' . '<br>';
    }
}


echo '<hr>';

$data = array("\n\t", 'm\hdi', '123mohammad');
foreach ($data as $value) {
    if (ctype_cntrl($value)) {
        echo 'ture' . '<br>';
    } else {
        echo 'false' . '<br>';
    }
}
echo '<hr>';

$data = array('10', '12.2', '123mohammad', 2564);
foreach ($data as $value) {
    if (ctype_digit($value)) {
        echo 'ture' . '<br>';
    } else {
        echo 'false' . '<br>';
    }
}
echo '<hr>';

$data = array('10', '12.2', '123mohammad', 2564, '120 4', 'a 4', "\n\t");
foreach ($data as $value) {
    if (ctype_graph($value)) {
        echo 'ture' . '<br>';
    } else {
        echo 'false' . '<br>';
    }
}
echo '<hr>';

$data = array('10', '12.2', 'mohammad', 2564, '120 4', 'a 4', "\n\t", 'Php');
foreach ($data as $value) {
    if (ctype_print($value)) {
        echo 'ture' . '<br>';
    } else {
        echo 'false' . '<br>';
    }
}

echo '<hr>';

$data = array('10', '12.2', 'mohammad', 2564, '120 4', 'a 4', "\n\t", 'Php');
foreach ($data as $value) {
    if (ctype_lower($value)) {
        echo 'ture' . '<br>';
    } else {
        echo 'false' . '<br>';
    }
}

echo '<hr>';

$data = array('10', '12.2', 'mohammad', 2564, '120 4', 'a 4', "\n\t", 'Php', "()");
foreach ($data as $value) {
    if (ctype_punct($value)) {
        echo 'ture' . '<br>';
    } else {
        echo 'false' . '<br>';
    }
}
echo '<hr>';

$data = array('10', '12.2', 'mohammad', 2564, '120 4', 'a  4', "\n", 'Php', "()");
foreach ($data as $value) {
    if (ctype_space($value)) {
        echo 'ture' . '<br>';
    } else {
        echo 'false' . '<br>';
    }
}
echo '<hr>';

$data = array('10', '12.2', 'mohammad', 2564, '120 4', 'a  4', "\n", 'PHP', "()");
foreach ($data as $value) {
    if (ctype_upper($value)) {
        echo 'ture' . '<br>';
    } else {
        echo 'false' . '<br>';
    }
}
echo '<hr>';

$data = array('abc', '12.2', 'mohammad', 2564, '120 4', 'a  4', "\n", 'PHP', "()");
foreach ($data as $value) {
    if (ctype_xdigit($value)) {
        echo 'ture' . '<br>';
    } else {
        echo 'false' . '<br>';
    }
}
