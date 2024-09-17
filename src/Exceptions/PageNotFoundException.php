<?php

namespace Bug\Exceptions;


class PageNotFoundException extends \Exception
{
  protected $message = '404 This Page Not Found';
}
