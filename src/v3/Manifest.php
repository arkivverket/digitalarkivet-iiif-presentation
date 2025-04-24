<?php

declare(strict_types=1);

namespace digitalarkivet\iiif\presentation\v3;

use digitalarkivet\iiif\presentation\v3\traits\WithAnnotationsTrait;
use digitalarkivet\iiif\presentation\v3\traits\WithBehaviorTrait;
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
use digitalarkivet\iiif\presentation\v3\traits\WithServicesTrait;
use digitalarkivet\iiif\presentation\v3\traits\WithServiceTrait;
use digitalarkivet\iiif\presentation\v3\traits\WithStartTrait;
use digitalarkivet\iiif\presentation\v3\traits\WithSummaryTrait;
use digitalarkivet\iiif\presentation\v3\traits\WithThumbnailTrait;
use digitalarkivet\iiif\presentation\v3\traits\WithViewingDirectionTrait;

/**
 * Manifest resource.
 */
class Manifest extends Resource
{
	use WithAnnotationsTrait;
	use WithBehaviorTrait;
	use WithHomepageTrait;
	use WithLabelTrait { setLabel as protected; }
	use WithMetadataTrait;
	use WithNavDateTrait;
	use WithPartOfTrait;
	use WithProviderTrait;
	use WithRenderingTrait;
	use WithRequiredStatementTrait;
	use WithRightsTrait;
	use WithSeeAlsoTrait;
	use WithServicesTrait;
	use WithServiceTrait;
	use WithStartTrait;
	use WithStartTrait;
	use WithSummaryTrait;
	use WithThumbnailTrait;
	use WithViewingDirectionTrait;

	/**
	 * Items.
	 *
	 * @var Canvas[]
	 */
	protected $items = [];

	/**
	 * Constructor.
	 */
	public function __construct(
		protected string $id,
		LanguageStrings $label,
		bool $isTopLevel = true,
	) {
		$this->label = $label;
		$this->isTopLevel = $isTopLevel;
	}

	/**
	 * Add item.
	 */
	public function addItem(Canvas $canvas): void
	{
		$this->items[] = $canvas;
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

		if ($this->metadata !== null) {
			$array['metadata'] = $this->metadata->toArray();
		}

		if ($this->summary !== null) {
			$array['summary'] = $this->summary->toArray();
		}

		if ($this->requiredStatement !== null) {
			$array['requiredStatement'] = $this->requiredStatement->toArray();
		}

		if ($this->rights !== null) {
			$array['rights'] = $this->rights;
		}

		if ($this->navDate !== null) {
			$array['navDate'] = $this->getNavDateString();
		}

		if ($this->provider !== null) {
			$array['provider'] = $this->provider->toArray();
		}

		if ($this->thumbnail !== null) {
			$array['thumbnail'] = $this->thumbnail->toArray();
		}

		if ($this->viewingDirection !== null) {
			$array['viewingDirection'] = $this->viewingDirection->value;
		}

		if ($this->behavior !== null) {
			$array['behavior'] = $this->behavior->toArray();
		}

		if ($this->seeAlso !== null) {
			$array['seeAlso'] = $this->seeAlso->toArray();
		}

		if ($this->service !== null) {
			$array['service'] = $this->service->toArray();
		}

		if ($this->homepage !== null) {
			$array['homepage'] = $this->homepage->toArray();
		}

		if ($this->rendering !== null) {
			$array['rendering'] = $this->rendering->toArray();
		}

		if ($this->partOf !== null) {
			$array['partOf'] = $this->partOf->toArray();
		}

		if ($this->start !== null) {
			$array['start'] = $this->start->toArray();
		}

		if (!empty($this->services)) {
			$services = [];

			foreach ($this->services as $service) {
				$services[] = $service->toArray();
			}

			$array['services'] = $services;
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
