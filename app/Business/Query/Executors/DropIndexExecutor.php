<?php

namespace App\Business\Query\Executors;

use App\Business\Query\ExecutorConstants;

/**
* Executor for Queries of drop index type.
*
* @package App\Business\Query\Executors
*/
class DropIndexExecutor extends BaseCreateExecutor
{
    /**
    * Gets the keyword of the type of the Query of the Executor.
    *
    * @return string
    */
    public function getTypeKeywords()
    {
        return ExecutorConstants::KEYWORD_DROP_INDEX;
    }

    protected function getResponseMessage()
    {
        return 'Index dropped successfully!';
    }
}
