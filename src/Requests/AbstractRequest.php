<?php

namespace Yosida001\Qoo10Sdk\Requests;

use InvalidArgumentException;

abstract class AbstractRequest
{
    /**
     * @var array
     */
    protected $parameters = [];

    /**
     * 空文字（未設定プロパティ）をtoArrayに含めるかどうか。
     * true=含めない。false=含める。
     * @return bool
     */
    abstract protected function omitEmptyString(): bool;

    /**
     * @param array $params
     */
    public function __construct(array $params = [])
    {
        $this->fill($params);
    }

    /**
     * @param array $params
     * @return $this
     */
    public function fill(array $params)
    {
        foreach ($params as $key => $value) {
            $this->__set($key, $value);
        }

        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $result = [];
        $omitEmptyString = $this->omitEmptyString();

        foreach ($this->getParameterNames() as $name) {
            if (!array_key_exists($name, $this->parameters)) {
                if (!$omitEmptyString) {
                    $result[$name] = '';
                }

                continue;
            }

            $value = $this->parameters[$name];

            if ($omitEmptyString && $value === '') {
                continue;
            }

            $result[$name] = $value;
        }

        return $result;
    }

    /**
     * @param string $name
     * @param mixed $value
     */
    public function __set($name, $value)
    {
        if (!in_array($name, $this->getParameterNames(), true)) {
            throw new InvalidArgumentException($name . ' is not a valid parameter.');
        }

        $this->parameters[$name] = $value;
    }

    /**
     * @param string $name
     * @return mixed|null
     */
    public function __get($name)
    {
        if (!in_array($name, $this->getParameterNames(), true)) {
            throw new InvalidArgumentException($name . ' is not a valid parameter.');
        }

        if (!array_key_exists($name, $this->parameters)) {
            return null;
        }

        return $this->parameters[$name];
    }

    /**
     * @param string $name
     * @return bool
     */
    public function __isset($name)
    {
        if (!in_array($name, $this->getParameterNames(), true)) {
            return false;
        }

        return array_key_exists($name, $this->parameters);
    }

    /**
     * @return array
     */
    abstract protected function getParameterNames();

}
