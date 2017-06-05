<?php

$validator->extend(
    'phone',
    function($attribute, $value, $parameters) {
        return preg_match("/^1[3|4|5|7|8]\d{9}$/", $value);
    },
    "the number is not a valid phone."
);

$validator->extend(
    'score',
    function($attribute, $value, $parameters) {
        return ($value >= 0) and ($value <= 100);
    },
    "the score is not a valid score."
);