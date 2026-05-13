<?php

namespace Yosida001\Qoo10Sdk\ValueObjects;

class ReturnType
{
    public const JSON = 'application/json';
    public const XML = 'text/xml';

    /**
     * @var string
     */
    private $value;

    /**
     * @param string $value
     */
    private function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * @return self
     */
    public static function json(): self
    {
        return new self(self::JSON);
    }

    /**
     * @return self
     */
    public static function xml(): self
    {
        return new self(self::XML);
    }

    /**
     * @return string
     */
    public function forGet(): string
    {
        if ($this->value === self::JSON) {
            return 'json';
        } else {
            return "xml";
        }
    }

    /**
     * @return string
     */
    public function forPost(): string
    {
        if ($this->value === self::JSON) {
            return 'application/json';
        } else {
            return "text/xml";
        }
    }

    public function isJson(): bool
    {
        return $this->value === self::JSON;
    }
}