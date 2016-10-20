<?php

namespace App\Core\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $layout = '';

    protected function view($view, $data = [])
    {
        if (!is_null($this->layout)) {
            return $this->layout->nest('child', $view, $data);
        }

        return response()->view($view, $data);
    }

    protected function setLayout($name)
    {
        $this->layout = $name;
    }

    /**
     * Setup the layout used by the controller.
     */
    protected function setupLayout()
    {
        if (!is_null($this->layout)) {
            $this->layout = view($this->layout);
        }
    }

    public function callAction($method, $parameters)
    {
        $this->setupLayout();

        $response = call_user_func_array(array($this, $method), $parameters);

        if (is_null($response) && !is_null($this->layout)) {
            $response = $this->layout;
        }

        return $response;
    }
}
