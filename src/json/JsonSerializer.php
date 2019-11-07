<?php


namespace ndashutin\tools\serializable\json;

use ndashutin\tools\rawdataprocessor\RawDataProcessorInterface;
use ndashutin\tools\serializable\SerializerInterface;

/**
 * Class JsonSerializer
 * @package ndashutin\tools\serializable\json
 */
class JsonSerializer implements SerializerInterface
{
    /**
     * @var RawDataProcessorInterface
     */
    private $jsonRawDataProcessor;

    /**
     * JsonSerializer constructor.
     * @param RawDataProcessorInterface $jsonRawDataProcessor
     */
    public function __construct(?RawDataProcessorInterface $jsonRawDataProcessor = null)
    {
        $this->jsonRawDataProcessor = $jsonRawDataProcessor;
    }

    /**
     * @inheritDoc
     */
    public function serialize($data): string
    {
        $value = $this->makeValue('', $data);
        return $this->encode($value);
    }

    /**
     * Method makeValue
     * @param $propertyName
     * @param $propertyValue
     * @return float|int|string|array
     */
    public function makeValue($propertyName, $propertyValue)
    {
        if (is_array($propertyValue)) {
            $info = [];
            foreach ($propertyValue as $index => $value) {
                $info[$index] = $this->makeValue($index, $value);
            }
            return $info;
        }
        if (is_numeric($propertyValue)) {
            return $this->makeNumeric($propertyName, $propertyValue);
        }
        return $this->makeString($propertyName, $propertyValue);
    }

    /**
     * Method makeNumeric
     * @param $propertyName
     * @param $propertyValue
     * @return float|int
     */
    public function makeNumeric($propertyName, $propertyValue)
    {
        if (false !== strpos('.', (string)$propertyValue)) {
            return $this->makeFloat($propertyName, $propertyValue);
        }
        return $this->makeInt($propertyName, $propertyValue);
    }

    /**
     * Method makeFloat
     * @param $propertyName
     * @param $propertyValue
     * @return float
     */
    public function makeFloat($propertyName, $propertyValue)
    {
        return (float)$propertyValue;
    }

    /**
     * Method makeInt
     * @param $propertyName
     * @param $propertyValue
     * @return int
     */
    public function makeInt($propertyName, $propertyValue)
    {
        return (int)$propertyValue;
    }

    /**
     * Method makeString
     * @param $propertyName
     * @param $propertyValue
     * @return string
     */
    public function makeString($propertyName, $propertyValue)
    {
        return (string)$propertyValue;
    }

    /**
     * Method encode
     * @param array $data
     * @return string
     */
    public function encode(array $data): string
    {
        return null === $this->jsonRawDataProcessor ? json_encode($data, JSON_THROW_ON_ERROR,
            512) : $this->jsonRawDataProcessor->encode($data);
    }
}