<?php

namespace App\Business;

class CustomResponse
{
    protected $response;

    public function add($key, $value)
    {
        if (!isset($this->response))
            $this->response = array();

        $this->response[$key] = $value;
    }

    public function addStatus($status)
    {
        $this->add('STATUS', $status);
    }

    public function addMessage($message)
    {
        $this->add('MESSAGE', $message);
    }

    public function addSuccessStatus($message = 'Yeah! Operation executed successfully.')
    {
        $this->addStatus('SUCCESS');
        $this->addMessage($message);
    }

    public function addErrorStatus($message = 'Oh... It looks like something went wrong.')
    {
        $this->addStatus('ERROR');
        $this->addMessage($message);
    }

    public function getJson()
    {
        return \json_encode($this->response);
    }
}
