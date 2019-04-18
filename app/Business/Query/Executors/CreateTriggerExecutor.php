<?php

namespace App\Business\Query\Executors;

use App\Business\Query\ExecutorConstants;

/**
* Executor for Queries of create trigger type.
*
* @package App\Business\Query\Executors
*/
class CreateTriggerExecutor extends BaseCreateExecutor
{
    /**
    * Gets the keyword of the type of the Query of the Executor.
    *
    * @return string
    */
    public function getTypeKeywords()
    {
        return ExecutorConstants::KEYWORD_CREATE_TRIGGER;
    }

    protected function getResponseMessage()
    {
        return 'Trigger created successfully!';
    }
}
