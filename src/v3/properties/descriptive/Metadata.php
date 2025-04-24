<?php

declare(strict_types=1);

namespace digitalarkivet\iiif\presentation\v3\properties\descriptive;

use digitalarkivet\iiif\presentation\v3\LabelValueItem;

/**
 * Metadata.
 * @link https://iiif.io/api/presentation/3.0/#metadata
 */
class Metadata
{
	/**
	 * Metadata.
	 *
	 * @var LabelValueItem[]
	 */
	protected array $metadata = [];

	/**
	 * Constructor.
	 */
	public function __construct(LabelValueItem ...$metadata)
	{
		$this->metadata = $metadata;
	}

	/**
	 * Add metadata.
	 */
	public function addItem(LabelValueItem $metadata): void
	{
		$this->metadata[] = $metadata;
	}

	/**
	 * Returns the number of metadata items.
	 */
	public function getItemCount(): int
	{
		return count($this->metadata);
	}

	/**
	 * Returns an array representation of the metadata descriptive property.
	 */
	public function toArray(): array
	{
		$array = [];

		foreach ($this->metadata as $metadata) {
			$array[] = $metadata->toArray();
		}

		return $array;
	}
}
