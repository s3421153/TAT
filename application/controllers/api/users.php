<?php

class Welcome extends REST_Controller {
    public function index()
      {
      $foo = array('fake' => 'data');
          $this->response($foo, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
      }
}

?>