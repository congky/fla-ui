<?php

$blade = new \Illuminate\Support\Facades\Blade;


$blade::directive('authorize', function ($expression) {
    return "<?php if(authTask($expression)) { ?>";
});

$blade::directive('endauthorize', function ($expression) {
    return "<?php } ?>";
});