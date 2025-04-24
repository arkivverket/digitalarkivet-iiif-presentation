<?php

declare(strict_types=1);

namespace digitalarkivet\iiif\presentation\v3;

use digitalarkivet\iiif\presentation\v3\traits\WithAnnotationsTrait;
use digitalarkivet\iiif\presentation\v3\traits\WithBehaviorTrait;
use digitalarkivet\iiif\presentation\v3\traits\WithDimensionsTrait;
use digitalarkivet\iiif\presentation\v3\traits\WithDurationTrait;
use digitalarkivet\iiif\presentation\v3\traits\WithHomepageTrait;
use digitalarkivet\iiif\presentation\v3\traits\WithLabelTrait;
use digitalarkivet\iiif\presentation\v3\traits\WithMetadataTrait;
use digitalarkivet\iiif\presentation\v3\traits\WithNavDateTrait;
use digitalarkivet\iiif\presentation\v3\traits\WithPartOfTrait;
use digitalarkivet\iiif\presentation\v3\traits\WithProviderTrait;
use digitalarkivet\iiif\presentation\v3\traits\WithRenderingTrait;
use digitalarkivet\iiif\presentation\v3\traits\WithRequiredStatementTrait;
use digitalarkivet\iiif\presentation\v3\traits\WithRightsTrait;
use digitalarkivet\iiif\presentation\v3\traits\WithSeeAlsoTrait;
use digitalarkivet\iiif\presentation\v3\traits\WithServiceTrait;
use digitalarkivet\iiif\presentation\v3\traits\WithSummaryTrait;
use digitalarkivet\iiif\presentation\v3\traits\WithThumbnailTrait;

/**
 * Canvas resource.
 */
class Canvas extends Resource
{
	use WithAnnotationsTrait;
	use WithBehaviorTrait;
	use WithDimensionsTrait;
	use WithDurationTrait;
	use WithHomepageTrait;
	use WithLabelTrait;
	use WithMetadataTrait;
	use WithNavDateTrait;
	use WithPartOfTrait;
	use WithProviderTrait;
	use WithRenderingTrait;
	use WithRequiredStatementTrait;
	use WithRightsTrait;
	use WithSeeAlsoTrait;
	use WithServiceTrait;
	use WithSummaryTrait;
	use WithThumbnailTrait;

	/**
	 * Items.
	 *
	 * @var AnnotationPage[]
	 */
	protected $items = [];

	/**
	 * Constructor.
	 */
	public function __construct(
		protected string $id,
		bool $isTopLevel = true,
	) {
		$this->isTopLevel = $isTopLevel;
	}

	/**
	 * Add item.
	 */
	public function addItem(AnnotationPage $annotationPage): void
	{
		$this->items[] = $annotationPage;
	}

	/**
	 * {@inheritDoc}
	 */
	public function toArray(): array
	{
		$array = [
			'id' => $this->id,
		];

		if ($this->label !== null) {
			$array['label'] = $this->label->toArray();
		}

		if ($this->metadata) {
			$array['metadata'] = $this->metadata->toArray();
		}

		if ($this->summary) {
			$array['summary'] = $this->summary->toArray();
		}

		if ($this->requiredStatement) {
			$array['requiredStatement'] = $this->requiredStatement->toArray();
		}

		if ($this->rights) {
			$array['rights'] = $this->rights;
		}

		if ($this->navDate) {
			$array['navDate'] = $this->getNavDateString();
		}

		if ($this->provider) {
			$array['provider'] = $this->provider->toArray();
		}

		if ($this->thumbnail) {
			$array['thumbnail'] = $this->thumbnail->toArray();
		}

		if ($this->height) {
			$array['height'] = $this->height;
		}

		if ($this->width) {
			$array['width'] = $this->width;
		}

		if ($this->duration) {
			$array['duration'] = $this->duration;
		}

		if ($this->behavior) {
			$array['behavior'] = $this->behavior->toArray();
		}

		if ($this->seeAlso) {
			$array['seeAlso'] = $this->seeAlso->toArray();
		}

		if ($this->service) {
			$array['service'] = $this->service->toArray();
		}

		if ($this->homepage) {
			$array['homepage'] = $this->homepage->toArray();
		}

		if ($this->rendering) {
			$array['rendering'] = $this->rendering->toArray();
		}

		if ($this->partOf) {
			$array['partOf'] = $this->partOf->toArray();
		}

		if (!empty($this->items)) {
			$items = [];

			foreach ($this->items as $item) {
				$items[] = $item->toArray();
			}

			$array['items'] = $items;
		}

		if (!empty($this->annotations)) {
			$annotations = [];

			foreach ($this->annotations as $item) {
				$annotations[] = $item->toArray();
			}

			$array['annotations'] = $annotations;
		}

		return [...parent::toArray(), ... $array];
	}
}
