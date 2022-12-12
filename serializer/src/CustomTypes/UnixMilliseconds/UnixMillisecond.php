<?php

declare(strict_types=1);

namespace Example\CustomTypes\UnixMilliseconds;

class UnixMillisecond
{
    public function __construct(private int $unixTimeWithMilliseconds)
    {
    }

    public function getValue(): int
    {
        return $this->unixTimeWithMilliseconds;
    }

    public function setValue(int $unixTimeWithMilliseconds): void
    {
        $this->unixTimeWithMilliseconds = $unixTimeWithMilliseconds;
    }

    public function asDateTime(): \DateTime
    {
        $value = (string)$this->getValue();

        $unixTime = substr($value, 0, -3);
        $milliseconds = substr($value, -3);

        return \DateTime::createFromFormat('U.v', sprintf('%s.%s', $unixTime, $milliseconds));
    }

    /**
     * Интересно, что создать объект DateTime из формата Uv нельзя, а вот готовый объект отформатировать в Uv можно...
     */
    public static function fromDateTime(\DateTime $date): self
    {
        return new self((int)$date->format('Uv'));
    }
}
