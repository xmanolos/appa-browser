<?php

namespace App\Http\Controllers;

use App\Business\Driver\AvailableDrivers;
use Exception;

class DriversController
{
    public function get()
    {
        try
        {
            $drivers = AvailableDrivers::getInstance()->getAll();

            return response(json_encode($drivers), 200);
        }
        catch (Exception $error)
        {
            return response($error->getMessage(), 500);
        }
    }
}