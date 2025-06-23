<?php

declare(strict_types=1);

namespace digitalarkivet\iiif\presentation\v3\traits;

use digitalarkivet\iiif\presentation\v3\extensions\navplace\NavPlace;

/**
 * Trait for resources with a nav place.
 *
 * @property string $id
 */
trait WithNavPlaceTrait
{
    /**
     * Nav place.
     */
    protected ?NavPlace $navPlace = null;

    /**
     * Set the nav place.
     */
    public function setNavPlace(NavPlace $navPlace): void
    {
        $this->navPlace = $navPlace;

		if ($this->navPlace->getId() === null) {
			$this->navPlace->setId("{$this->id}#navplace");
		}
    }

    /**
     * Returns the nav place.
     */
    public function getNavPlace(): ?NavPlace
    {
        return $this->navPlace;
    }
}
