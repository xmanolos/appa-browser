<?php

namespace App\Business\Query\Executors;

use App\Business\Query\ExecutorConstants;

/**
* Executor for Queries of create view type.
*
* @package App\Business\Query\Executors
*/
class CreateViewExecutor extends BaseCreateExecutor
{
    /**
    * Gets the keyword of the type of the Query of the Executor.
    *
    * @return string
    */
    public function getTypeKeywords()
    {
        return ExecutorConstants::KEYWORD_CREATE_VIEW;
    }

    protected function getResponseMessage()
    {
        return 'View created successfully!';
    }
}
