<?php

namespace App\Business\Query;

/**
 * Provides constant values of Executors.
 *
 * @package App\Business\SessionProcessor
 */
class ExecutorConstants
{
    /**
     * Keyword of select queries identification.
     */
    public const KEYWORD_SELECT = 'SELECT';

    /**
     * Keyword of insert queries identification.
     */
    public const KEYWORD_INSERT = 'INSERT';

    /**
     * Keyword of update queries identification.
     */
    public const KEYWORD_UPDATE = 'UPDATE';

    /**
     * Keyword of delete queries identification.
     */
    public const KEYWORD_DELETE = 'DELETE';

    /**
     * Keyword of procedure queries identification.
     */
    public const KEYWORD_PROCEDURE = 'CALL';

    /**
     * Keyword of any queries identification.
     */
    public const KEYWORD_ANY = 'ANY';

    /**
     * Identifier o UTF-8 encode.
     */
    public const UTF8_ENCODE = 'UTF8';
}
