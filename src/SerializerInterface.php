<?php

namespace ndashutin\tools\serializable;

/**
 * Class SerializerInterface
 * @package ndashutin\tools\serializable
 */
interface SerializerInterface
{
    /**
     * Serialize data to string
     *
     * @param $data
     * @return string
     */
    public function serialize($data): string;
}