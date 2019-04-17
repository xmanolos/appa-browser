<?php

namespace App\Business\Query\Executors;

use App\Business\Query\ExecutorConstants;

/**
* Executor for Queries of drop procedure type.
*
* @package App\Business\Query\Executors
*/
class DropProcedureExecutor extends BaseCreateExecutor
{
    /**
    * Gets the keyword of the type of the Query of the Executor.
    *
    * @return string
    */
    public function getTypeKeywords()
    {
        return ExecutorConstants::KEYWORD_DROP_PROCEDURE;
    }

    protected function getResponseMessage()
    {
        return 'Procedure dropped successfully!';
    }
}
