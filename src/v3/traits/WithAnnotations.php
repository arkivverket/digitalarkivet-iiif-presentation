<?php

declare(strict_types=1);

namespace digitalarkivet\iiif\presentation\v3\traits;

use digitalarkivet\iiif\presentation\v3\AnnotationPage;

/**
 * Trait for resources with annotations.
 */
trait WithAnnotationsTrait
{
	/**
	 * Annotations.
	 *
	 * @var AnnotationPage[]
	 */
	protected $annotations = [];

	/**
	 * Add annotation.
	 */
	public function addAnnotation(AnnotationPage $annotationPage): void
	{
		$this->annotations[] = $annotationPage;
	}

    /**
     * Returns the annotations.
     *
     * @return AnnotationPage[]
     */
    public function getAnnotations(): array
    {
        return $this->annotations;
    }
}
