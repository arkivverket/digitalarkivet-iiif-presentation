<?php

declare(strict_types=1);

namespace digitalarkivet\iiif\presentation\v3\traits;

/**
 * Trait for resources with a value.
 */
trait WithValueTrait
{
    /**
     * Value.
     */
    protected ?string $value = null;

    /**
     * Set the value.
     */
    public function setValue(string $value): void
    {
        $this->value = $value;
    }

    /**
     * Returns the value.
     */
    public function getValue(): ?string
    {
        return $this->value;
    }
}
