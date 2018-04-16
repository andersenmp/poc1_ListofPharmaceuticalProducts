@extends('layouts.master')

@section('content')
<h1>Welcome to Proof of concept for List of Pharmaceutical Products in Php/Laravel</h1>

<div class="col-sm-4">
    <h4>Requirments</h4>
    <pre>
        "require": {
            "php": ">=7.1.3",
            "barryvdh/laravel-debugbar": "^3.1",
            "doctrine/dbal": "^2.6",
            "fideloper/proxy": "~4.0",
            "jasig/phpcas": "1.3.x-dev",
            "laravel/framework": "5.6.*",
            "laravel/tinker": "~1.0",
            "subfission/cas": "dev-master"
        },
        "require-dev": {
            "filp/whoops": "~2.0",
            "nunomaduro/collision": "~1.1",
            "fzaninotto/faker": "~1.4",
            "mockery/mockery": "~1.0",
            "phpunit/phpunit": "~7.0",
            "symfony/thanks": "^1.0"
        },
    </pre>
</div>

<hr class="clear" />

<p>More details about this research can be found on
    <a href="https://webgate.ec.europa.eu/ispedia/display/ISSTANDARDS/PQTM+2017-011%2C+Research+on+Scripting+Languages+and+Development+Frameworks" target="_new">
        PQTM 2017-011, Research on Scripting Languages and Development Frameworks</a>.
</p>
@stop
