<?php

namespace App\Business\Query\Executors;

use App\Business\Query\ExecutorConstants;

/**
* Executor for Queries of create index type.
*
* @package App\Business\Query\Executors
*/
class CreateIndexExecutor extends BaseCreateExecutor
{
    /**
    * Gets the keyword of the type of the Query of the Executor.
    *
    * @return array
    */
    public function getTypeKeywords()
    {
        return [ExecutorConstants::KEYWORD_CREATE_INDEX, ExecutorConstants::KEYWORD_CREATE_UNIQUE_INDEX];
    }

    protected function getResponseMessage()
    {
        return 'Index created successfully!';
    }
}
