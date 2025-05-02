<?php

namespace App\SOLID\SingleResponsibility\Before\Reporting;

use Exception;
use Illuminate\Support\Facades\DB;

class SalesReporter
{
    /**
     * @throws Exception
     */
    public function between($startDate, $endDate): string
    {
//        if (!Auth::check()) {
//            throw new Exception('Unauthenticated.');
//        }

        $sales = $this->queryDBForSalesBetween($startDate, $endDate);

        return $this->format($sales);
    }

    protected function queryDBForSalesBetween($startDate, $endDate): float
    {
        return DB::table('sales')
                ->whereBetween('created_at', [$startDate, $endDate])
                ->sum('charge') / 100;
    }

    public function format($sales): string
    {
        return "<h1>Sales Report</h1>" .
            "<p>Sales: {$sales}</p>";
    }
}
