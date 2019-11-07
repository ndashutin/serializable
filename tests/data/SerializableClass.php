<?php


namespace ndashutin\tools\serializable\tests\data;

use ndashutin\tools\serializable\json\JsonSerializableTrait;

/**
 * Class SerializableClass
 * @package ndashutin\tools\serializable\tests\data
 */
class SerializableClass extends SerializableClassParent
{
    use JsonSerializableTrait;
    /**
     * @var string
     */
    public $value4 = '2';
    /**
     * @var array
     */
    protected $value5 = [2];
    /**
     * @var array
     */
    private $value6 = [1, '2', 1.1];
}