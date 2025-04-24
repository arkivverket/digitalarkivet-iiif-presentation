<?php

declare(strict_types=1);

namespace digitalarkivet\iiif\presentation\v3\properties\descriptive;

use digitalarkivet\iiif\presentation\v3\traits\WithDimensionsTrait;
use digitalarkivet\iiif\presentation\v3\traits\WithFormatTrait;

/**
 * Thumbnail.
 * @link https://iiif.io/api/presentation/3.0/#thumbnail
 */
class Thumbnail
{
	use WithDimensionsTrait { setHeight as protected; setWidth as protected; }
	use WithFormatTrait { setFormat as protected; }

	/**
	 * Constructor.
	 */
	protected function __construct(
		protected string $id,
		protected string $type = 'Image',
		?string $format = null,
		?int $height = null,
		?int $width = null
	) {
		$this->format = $format;
		$this->height = $height;
		$this->width = $width;
	}

	/**
	 * Returns an array representation of the thumbnail.
	 */
	public function toArray(): array
	{
		$array = [
			'id' => $this->id,
			'type' => $this->type,
		];

		if ($this->format) {
			$array['format'] = $this->format;
		}

		if ($this->height) {
			$array['height'] = $this->height;
		}

		if ($this->width) {
			$array['width'] = $this->width;
		}

		return $array;
	}
}
