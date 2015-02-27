<?php

namespace spec\LWI\FeatureChecker\Exception;

use PhpSpec\ObjectBehavior;

class FeatureNotDefinedExceptionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->beConstructedWith('feature-name');
        $this->shouldHaveType('LWI\FeatureChecker\Exception\FeatureNotDefinedException');
    }

    function it_should_return_a_feature_name()
    {
        $this->beConstructedWith('feature-name');
        $this->getFeatureName()->shouldReturn('feature-name');
    }
}
