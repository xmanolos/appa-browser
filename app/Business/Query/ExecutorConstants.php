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
     * Keyword of create table queries identification.
     */
    public const KEYWORD_CREATE_TABLE = 'CREATE TABLE';

    /**
     * Keyword of create view queries identification.
     */
    public const KEYWORD_CREATE_VIEW = 'CREATE VIEW';

    /**
     * Keyword of create table queries identification.
     */
    public const KEYWORD_CREATE_PROCEDURE = 'CREATE PROCEDURE';

    /**
     * Keyword of create function queries identification.
     */
    public const KEYWORD_CREATE_FUNCTION = 'CREATE FUNCTION';

    /**
     * Keyword of create index queries identification.
     */
    public const KEYWORD_CREATE_INDEX = 'CREATE INDEX';

    /**

     * Keyword of create unique index queries identification.
     */
    public const KEYWORD_CREATE_UNIQUE_INDEX = 'CREATE UNIQUE INDEX';

    /**
     * Keyword of drop table queries identification.
     */
    public const KEYWORD_DROP_TABLE = 'DROP TABLE';

    /**
     * Keyword of drop view queries identification.
     */
    public const KEYWORD_DROP_VIEW = 'DROP VIEW';

    /**
     * Keyword of drop table queries identification.
     */
    public const KEYWORD_DROP_PROCEDURE = 'DROP PROCEDURE';

    /**
     * Keyword of drop function queries identification.
     */
    public const KEYWORD_DROP_FUNCTION = 'DROP FUNCTION';

    /**
     * Keyword of drop trigger queries identification.
     */
    public const KEYWORD_DROP_TRIGGER = 'DROP TRIGGER';

    /**
     * Keyword of drop index queries identification.
     */
    public const KEYWORD_DROP_INDEX = 'DROP INDEX';

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
