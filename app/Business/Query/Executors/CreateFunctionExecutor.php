<?php

namespace App\Business\Query\Executors;

use App\Business\Query\ExecutorConstants;

/**
* Executor for Queries of create function type.
*
* @package App\Business\Query\Executors
*/
class CreateFunctionExecutor extends BaseCreateExecutor
{
    /**
    * Gets the keyword of the type of the Query of the Executor.
    *
    * @return string
    */
    public function getTypeKeywords()
    {
        return ExecutorConstants::KEYWORD_CREATE_FUNCTION;
    }

    protected function getResponseMessage()
    {
        return 'Function created successfully!';
    }
}
