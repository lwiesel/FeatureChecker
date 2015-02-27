<?php

namespace LWI\FeatureChecker\Exception;

use Exception;

/**
 * FeatureNotDefinedException
 *
 * Overrides default exception message. Must be constructed with a feature name.
 */
class FeatureNotDefinedException extends \Exception
{
    /**
     * @var string
     */
    protected $featureName;

    /**
     * Constructor
     *
     * @param string $featureName
     */
    public function __construct($featureName)
    {
        $this->featureName = $featureName;

        $message = sprintf("No configuration found for feature '%s'.\n\rDid you forget to add it to your config?", $featureName);

        parent::__construct($message, 500, null);
    }

    /**
     * Get feature name
     *
     * @return string
     */
    public function getFeatureName()
    {
        return $this->featureName;
    }
}
