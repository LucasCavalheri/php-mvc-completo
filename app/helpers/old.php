<?php

use app\classes\Old;

function old($field)
{
    return Old::get($field);
}
