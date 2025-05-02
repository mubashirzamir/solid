<?php

use App\SOLID\SingleResponsibility\After\Reporting\Repositories\SalesRepository;
use App\SOLID\SingleResponsibility\After\Reporting\SalesOutputs\JsonOutput;
use App\SOLID\SingleResponsibility\After\Reporting\SalesReporter as SalesReporterAfter;
use App\SOLID\SingleResponsibility\Before\Reporting\SalesReporter as SalesReporterBefore;
use Illuminate\Support\Facades\Route;

Route::get('/single-responsibility-before', function () {
    $report = new SalesReporterBefore();

    $begin = now()->subDays(30);
    $end = now();

    return $report->between($begin, $end);
});

Route::get('/single-responsibility-after', function () {
    $repo = new SalesRepository();
    $report = new SalesReporterAfter($repo);
    $report->setOutput(new JsonOutput());

    $begin = now()->subDays(30);
    $end = now();

    return $report->between($begin, $end);
});
