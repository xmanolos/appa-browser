<?php

namespace App\Business\Query\Executors;

use App\Business\Query\Executors\BaseSelectExecutor;
use App\Business\Query\ExecutorConstants;
use Exception;

/**
* Executor for Queries of unknown type.
*
* @package App\Business\Query\Executors
*/
class AnyExecutor extends BaseSelectExecutor
{
    /**
    * Gets the keyword of the type of the Query of the Executor.
    *
    * @return string
    */
    public function getTypeKeyword()
    {
        return ExecutorConstants::KEYWORD_ANY;
    }
}
