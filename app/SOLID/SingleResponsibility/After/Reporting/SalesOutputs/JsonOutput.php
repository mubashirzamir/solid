<?php

namespace App\SOLID\SingleResponsibility\After\Reporting\SalesOutputs;

use App\SOLID\SingleResponsibility\After\Reporting\Contracts\SalesOutput;

class JsonOutput implements SalesOutput
{
    public function output($sales)
    {
        return json_encode([
            'total' => $sales,
        ]);
    }
}
