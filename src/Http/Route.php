<?php

declare(strict_types=1);

namespace Bug\Http;

use Bug\Exceptions\PageNotFoundException;
use Symfony\Component\VarDumper\VarDumper;

class Route
{
    protected static array $routes = [];

    private static function registre(string $method, string $route, callable|array $target): static
    {
        static::$routes[$method][$route] = $target;
        return new static();
    }

    public static function get(string $route, callable|array $target): static
    {
      return static::registre('get', $route, $target);
    }

    public static function post(string $route, callable|array $target): static
    {
        return static::registre('post', $route, $target);
    }

    public static function resolve()
    {
        $method = strtolower($_SERVER['REQUEST_METHOD']);
        $uri    = explode('?', $_SERVER['REQUEST_URI'])[0];
        $target = static::$routes[$method][$uri] ?? null;
        
        if(is_callable($target)) {
            return call_user_func($target);
        }
        if(is_array($target)) {
            [$class, $methodPass] = $target;
            if(class_exists($class)) {
                $class = new $class();
                if(method_exists($class, $methodPass)) {
                    return call_user_func_array($methodPass, []);
                }
            }
        }
        // here we must create custome exception to make it easy when catch it
        throw new PageNotFoundException();
    }
}
