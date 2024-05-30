<?php

include "Sheep.php";


for ($i = 0; $i < rand(1, 50); $i++) {
    $s = new Sheep();
    $s->baaa();
}

echo Sheep::getCount();
