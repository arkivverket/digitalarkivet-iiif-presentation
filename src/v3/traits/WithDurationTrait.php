<?php

declare(strict_types=1);

namespace digitalarkivet\iiif\presentation\v3\traits;

/**
 * Trait for resources with a duration.
 */
trait WithDurationTrait
{
    /**
     * Duration.
     */
    protected ?float $duration = null;

    /**
     * Set the duration.
     */
    public function setDuration(float $duration): void
    {
        $this->duration = $duration;
    }

    /**
     * Returns the duration.
     */
    public function getDuration(): ?float
    {
        return $this->duration;
    }
}
