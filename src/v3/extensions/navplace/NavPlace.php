<?php

declare(strict_types=1);

namespace digitalarkivet\iiif\presentation\v3\extensions\navplace;

/**
 * Nav place.
 *
 * See:
 * - https://iiif.io/api/extension/navplace/
 */
class NavPlace
{
	/**
	 * Nav place extension context.
	 */
	public const string CONTEXT = 'http://iiif.io/api/extension/navplace/context.json';

	/**
	 * Nav place type.
	 */
	public const string TYPE = 'FeatureCollection';

	/**
	 * Nav place id.
	 */
	protected ?string $id = null;

	/**
	 * Nav place features.
	 */
	protected array $features = [];

	/**
	 * Sets the ID of the nav place.
	 */
	public function setId(string $id): void
	{
		$this->id = $id;
	}

	/**
	 * Returns the ID of the nav place.
	 */
	public function getId(): ?string
	{
		return $this->id;
	}

	/**
	 * Adds a feature to the nav place.
	 */
	public function addFeature(object $geometry): void
	{
		$this->features[] = [
			'id' => "{$this->id}-feature-" . count($this->features),
			'type' => 'Feature',
			'geometry' => $geometry,
		];
	}

	/**
	 * Returns the nav place as an array.
	 */
	public function toArray(): array
	{
		return [
			'id' => $this->id,
			'type' => self::TYPE,
			'features' => $this->features,
		];
	}
}
