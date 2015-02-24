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
        $this->ensureVarIsArrayOrMultiArrayOfBooleans($features);

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
        try {
            $path = preg_split('/\./', $featureName);

            return $this->findValueInMultiArray($path, $this->features);
        } catch (\OutOfRangeException $e) {
            throw new FeatureNotDefinedException($featureName);
        }
    }

    /**
     * Configuration checker
     *
     * Ensures recursively that features list is an array or a multi-array of
     * booleans, indexed by strings.
     *
     * @param $testedVar
     * @return void
     * @throws \InvalidArgumentException
     */
    protected function ensureVarIsArrayOrMultiArrayOfBooleans($testedVar)
    {
        // Must be an array
        if (!is_array($testedVar)) {
            throw new \InvalidArgumentException('Features list must be an array or a multi-array of booleans.');
        }

        foreach ($testedVar as $key => $element) {
            // Must be indexed by string
            if (!is_string($key)) {
                throw new \InvalidArgumentException('Features must be indexed by string keys.');
            }

            // Must be boolean or array
            if (!is_bool($element) && !is_array($element)) {
                throw new \InvalidArgumentException('Features list must be an array or a multi-array of booleans.');
            }

            // Recursive check
            if (is_array($element)) {
                $this->ensureVarIsArrayOrMultiArrayOfBooleans($element);
            }
        }
    }

    /**
     * Find value in a multi-array
     *
     * Recursively find a value in a multi-array, successively
     * following the different keys defined in a path.
     *
     * @param array $path
     * @param array $reference
     * @return bool
     * @throws \OutOfRangeException
     */
    protected function findValueInMultiArray(array $path, array $reference)
    {
        // Checks path existence
        if (
            count($path) == 0
            || !isset($reference[$path[0]])
        ) {
            throw new \OutOfRangeException();
        }

        $currentElement = $reference[$path[0]];

        if (is_array($currentElement)) {
            return $this->findValueInMultiArray(array_slice($path, 1), $currentElement);
        } else {
            return $currentElement;
        }
    }
}
