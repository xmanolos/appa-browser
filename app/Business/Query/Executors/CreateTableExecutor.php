<?php

namespace App\Business\Query\Executors;

use App\Business\Query\ExecutorConstants;

/**
* Executor for Queries of create table type.
*
* @package App\Business\Query\Executors
*/
class CreateTableExecutor extends BaseCreateExecutor
{
    /**
    * Gets the keyword of the type of the Query of the Executor.
    *
    * @return string
    */
    public function getTypeKeywords()
    {
        return ExecutorConstants::KEYWORD_CREATE_TABLE;
    }

    protected function getResponseMessage()
    {
        return 'Table created successfully!';
    }
}
