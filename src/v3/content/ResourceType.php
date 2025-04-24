<?php

declare(strict_types=1);

namespace digitalarkivet\iiif\presentation\v3\content;

/**
 * Resource types.
 */
enum ResourceType: string
{
	case DATASET = 'Dataset';
	case IMAGE = 'Image';
	case MODEL = 'Model';
	case SOUND = 'Sound';
	case TEXT = 'Text';
	case TEXTUAL_BODY = 'TextualBody';
	case VIDEO = 'Video';
}
