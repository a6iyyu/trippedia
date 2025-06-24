<?php

declare(strict_types=1);

namespace Vendor;

class Component
{
    public function render(): void
    {
        $class = static::class;
        $parts = explode('\\', $class);
        $name = end($parts);
        $view = strtolower(preg_replace('/(?<!^)[A-Z]/', '-$0', $name));

        $data = get_object_vars($this);
        extract($data);

        require base_path("resources/views/components/{$view}.php");
    }

    public function __toString(): string
    {
        ob_start();
        $this->render();
        return ob_get_clean();
    }
}