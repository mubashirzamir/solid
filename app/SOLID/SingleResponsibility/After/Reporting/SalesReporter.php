<?php

namespace App\SOLID\SingleResponsibility\After\Reporting;

use App\SOLID\SingleResponsibility\After\Reporting\Contracts\SalesOutput;
use App\SOLID\SingleResponsibility\After\Reporting\Repositories\SalesRepository;
use App\SOLID\SingleResponsibility\After\Reporting\SalesOutputs\HTMLOutput;
use Exception;

class SalesReporter
{
    protected SalesRepository $salesRepository;
    protected SalesOutput $salesOutput;

    public function __construct(SalesRepository $salesRepository)
    {
        $this->salesRepository = $salesRepository;
        $this->salesOutput = new HTMLOutput();
    }

    public function setOutput(SalesOutput $salesOutput): void
    {
        $this->salesOutput = $salesOutput;
    }

    /**
     * @throws Exception
     */
    public function between($startDate, $endDate): string
    {
        // Should not be the responsibility of this class
//        if (!Auth::check()) {
//            throw new Exception('Unauthenticated.');
//        }

        $sales = $this->salesRepository->between($startDate, $endDate);

        return $this->salesOutput->output($sales);
    }
}
