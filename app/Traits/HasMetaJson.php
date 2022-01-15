<?php

namespace App\Traits;

/**
 * @property string $meta_json
 */
trait HasMetaJson
{
    protected function getMeta(string $name): mixed
    {
        return json_decode($this->meta_json)->$name ?? null;
    }

    protected function setMeta(string $name, mixed $value) {
        $meta = json_decode($this->meta_json);
        $meta->$name = $value;
        $this->meta_json = json_encode($meta);
    }
}
