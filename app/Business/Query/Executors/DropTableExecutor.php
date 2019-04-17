<?php

namespace App\Business\Query\Executors;

use App\Business\Query\ExecutorConstants;

/**
* Executor for Queries of drop table type.
*
* @package App\Business\Query\Executors
*/
class DropTableExecutor extends BaseCreateExecutor
{
    /**
    * Gets the keyword of the type of the Query of the Executor.
    *
    * @return string
    */
    public function getTypeKeywords()
    {
        return ExecutorConstants::KEYWORD_DROP_TABLE;
    }

    protected function getResponseMessage()
    {
        return 'Table dropped successfully!';
    }
}
