<?php

namespace App\Business\Interfaces;

interface IQueryExecutor 
{
	public static function queryMatch($query);

    public function execute($request, $query);
    public function getResponse();
}