<?php

declare(strict_types=1);

namespace digitalarkivet\iiif\presentation\v3;

use JsonSerializable;
use ReflectionClass;

/**
 * Resource.
 */
abstract class Resource implements JsonSerializable
{
	/**
	 * IIIF Presentation API 3 context.
	 */
	public const string CONTEXT = 'http://iiif.io/api/presentation/3/context.json';

	/**
	 * Is this a top-level resource?
	 */
	protected bool $isTopLevel = true;

    /**
     * Returns the type of the resource.
     */
    protected function getType(): string
    {
        return (new ReflectionClass(static::class))->getShortName();
    }

	/**
	 * Returns the context for the resource.
	 */
	protected function getContext(): array|string
	{
		return self::CONTEXT;
	}

	/**
	 * Returns an array representation of the resource.
	 */
	public function toArray(): array
	{
		$array = [];

		if ($this->isTopLevel) {
			$array['@context'] = $this->getContext();
		}

		$array['type'] = $this->getType();

		return $array;
	}

	/**
	 * Returns the data which should be serialized to JSON.
	 */
	public function jsonSerialize(): mixed
	{
		return $this->toArray();
	}
}
