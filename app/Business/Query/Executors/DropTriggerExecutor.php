<?php

namespace App\Business\Query\Executors;

use App\Business\Query\ExecutorConstants;

/**
* Executor for Queries of drop trigger type.
*
* @package App\Business\Query\Executors
*/
class DropTriggerExecutor extends BaseCreateExecutor
{
    /**
    * Gets the keyword of the type of the Query of the Executor.
    *
    * @return string
    */
    public function getTypeKeywords()
    {
        return ExecutorConstants::KEYWORD_DROP_TRIGGER;
    }

    protected function getResponseMessage()
    {
        return 'Trigger dropped successfully!';
    }
}
