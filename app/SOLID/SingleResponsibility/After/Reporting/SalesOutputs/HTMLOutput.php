<?php

namespace App\SOLID\SingleResponsibility\After\Reporting\SalesOutputs;

use App\SOLID\SingleResponsibility\After\Reporting\Contracts\SalesOutput;

class HTMLOutput implements SalesOutput
{
    public function output($sales)
    {
        return "<h1>Sales Report</h1>" .
            "<p>Total Sales: $sales</p>";
    }
}
