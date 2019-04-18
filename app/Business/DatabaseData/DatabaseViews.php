<?php

namespace App\Business\DatabaseData;

use App\Business\DatabaseData\DataStructures\StructureView;

class DatabaseViews extends DatabaseData
{
    public function get($schema)
    {
        $views = array();

        $query = "SELECT TABLE_NAME AS name FROM information_schema.VIEWS WHERE TABLE_SCHEMA = '$schema';";
        $viewsResults = $this->connection->select($query);

        sort($viewsResults);

        foreach($viewsResults as $viewResult)
        {
            $view = new StructureView();
            $view->setName($viewResult->name);

            array_push($views, $view);
        }

        return $views;
    }
}