<?php

declare(strict_types=1);

namespace Bug\View;
/**
 * Undefined class
 */
class View
{
    public function __construct(
        protected string $path,
        protected array $options = [],
        protected bool $is_error = false
        ){}

    public static function make(string $relPath, array $options = [], bool $is_error = false): static
    {
        return new static($relPath, $options, $is_error);
    }

    public static function makeError(string $relPath, array $options = [], bool $is_error = true): static
    {
        return new static($relPath, $options, $is_error);
    }

    public function render(): string
    {
        $relPath = ($this->is_error ? ERROR_PATH : VIEW_PATH) . $this->path . '.php';
        ob_start();
        extract($this->options);
        include_once $relPath;
        return ob_get_clean();
    }

    public function __toString()
    {
        return $this->render();
    }
}
