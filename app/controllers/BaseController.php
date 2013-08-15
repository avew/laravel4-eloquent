<?php

class BaseController extends Controller {

    public $restful = true;

    public function __call($method, $parameters) {
        return Response::error('404');
    }

    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    protected function setupLayout() {
        if (!is_null($this->layout)) {
            $this->layout = View::make($this->layout);
        }
    }

}