<?php

namespace App\Business\Query\Executors;

use App\Business\Query\ExecutorConstants;

/**
* Executor for Queries of create procedure type.
*
* @package App\Business\Query\Executors
*/
class CreateProcedureExecutor extends BaseCreateExecutor
{
    /**
    * Gets the keyword of the type of the Query of the Executor.
    *
    * @return array
    */
    public function getTypeKeywords()
    {
        return [ExecutorConstants::KEYWORD_CREATE_PROCEDURE];
    }

    protected function getResponseMessage()
    {
        return 'Procedure created successfully!';
    }
}
