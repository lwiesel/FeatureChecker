<?php

namespace LWI\FeatureChecker;

use LWI\FeatureChecker\Exception\FeatureNotDefinedException;

class FeatureChecker
{
    /**
     * @var array
     */
    protected $features;

    /**
     * Constructor
     *
     * @param array $features
     */
    public function __construct($features)
    {
        // Must be an array
        if (!is_array($features)) {
            throw new \InvalidArgumentException('Features list must be an array of booleans.');
        }

        // Must be an array of booleans
        if (count(array_filter($features, 'is_bool')) !== count($features)) {
            throw new \InvalidArgumentException('Features list must be an array of booleans.');
        }

        // Must have string keys
        if (count(array_filter(array_keys($features), 'is_string')) !== count($features)) {
            throw new \InvalidArgumentException('Features list must have string keys.');
        }

        $this->features = $features;
    }

    /**
     * Tests if given feature is enabled
     *
     * @param string $featureName
     * @return bool
     * @throws FeatureNotDefinedException
     */
    public function isFeatureEnabled($featureName)
    {
        if (!isset($this->features[$featureName])) {
            throw new FeatureNotDefinedException($featureName);
        }

        return $this->features[$featureName];
    }
}
