<?php

require __DIR__.'/bootstrap/autoload.php';
use Crada\Apidoc\Builder;
use Crada\Apidoc\Exception;

$classes = array(
    'App\Http\Controllers\Api\AreaApiController',
    'App\Http\Controllers\Api\SmsApiController',
    'App\Http\Controllers\Api\OfficeBuildingApiController',
    'App\Http\Controllers\Api\ShoppingCenterApiController',
    'App\Http\Controllers\Api\VillageApiController',
    'App\Http\Controllers\Api\TotalareaApiController',
    'App\Http\Controllers\Api\PriceApiController',
    'App\Http\Controllers\Api\FormatApiController',
    'App\Http\Controllers\Api\ShopSurroundingApiController',
);

$output_dir  = __DIR__.'/public/apidocs';
$output_file = 'index.blade.php'; // defaults to index.blade.php

try {
    $builder = new Builder($classes, $output_dir, 'Api Title', $output_file);
    $builder->generate();
    echo "Execute Success\n";
} catch (Exception $e) {
    echo 'There was an error generating the documentation: ', $e->getMessage();
}