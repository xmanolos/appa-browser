<?php

namespace App\Business\Query\Executors;

use App\Business\Query\ExecutorConstants;

/**
* Executor for Queries of drop function type.
*
* @package App\Business\Query\Executors
*/
class DropFunctionExecutor extends BaseCreateExecutor
{
    /**
    * Gets the keyword of the type of the Query of the Executor.
    *
    * @return string
    */
    public function getTypeKeywords()
    {
        return ExecutorConstants::KEYWORD_DROP_FUNCTION;
    }

    protected function getResponseMessage()
    {
        return 'Function dropped successfully!';
    }
}
