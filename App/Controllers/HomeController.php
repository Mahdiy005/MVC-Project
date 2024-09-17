<?php

declare(strict_types=1);

namespace App\Controllers;

use Bug\View\View;

class HomeController
{
  public static function index()
  {
    return makeView('main', ['name' => 'Ahmed', 'age' => 21]);
  }
}
