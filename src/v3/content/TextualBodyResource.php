<?php

declare(strict_types=1);

namespace digitalarkivet\iiif\presentation\v3\content;

use digitalarkivet\iiif\presentation\v3\traits\WithFormatTrait;
use digitalarkivet\iiif\presentation\v3\traits\WithValueTrait;

/**
 * Textual body resource.
 *
 * See:
 *  - https://iiif.io/api/presentation/3.0/#b-example-manifest-response
 *  - https://www.w3.org/TR/annotation-model/#embedded-textual-body
 *  - https://github.com/Systemik-Solutions/glycerine-viewer?tab=readme-ov-file#annotation-body
 */
class TextualBodyResource extends ContentResource
{
	use WithFormatTrait { setFormat as protected; }
	use WithValueTrait { setValue as protected; }

	/**
	 * Language.
	 */
	protected ?string $language = null;

	/**
	 * Constructor.
	 */
	public function __construct(
		protected string $id,
		string $value,
		?string $format = null,
	) {
		$this->value = $value;
		$this->format = $format ?? 'text/plain';
	}

	/**
	 * {@inheritDoc}
	 */
	public function getResourcetype(): ResourceType
	{
		return ResourceType::TEXTUAL_BODY;
	}

	/**
	 * Set the language.
	 */
	public function setLanguage(string $language): void
	{
		$this->language = $language;
	}

	/**
	 * Returns the language.
	 */
	public function getLanguage(): ?string
	{
		return $this->language;
	}

	/**
	 * {@inheritDoc}
	 */
	public function toArray(): array
	{
		$array = [
			'id' => $this->id,
			'type' => $this->getResourcetype()->value,
		];

		if ($this->value) {
			$array['value'] = $this->value;
		}

		if ($this->format) {
			$array['format'] = $this->format;
		}

		if ($this->language) {
			$array['language'] = $this->language;
		}

		return $array;
	}
}
