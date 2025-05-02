<?php

namespace App\SOLID\SingleResponsibility\After\Reporting\Repositories;

use DB;

class SalesRepository
{
    public function between($startDate, $endDate): float
    {
        return DB::table('sales')
                ->whereBetween('created_at', [$startDate, $endDate])
                ->sum('charge') / 100;
    }
}
