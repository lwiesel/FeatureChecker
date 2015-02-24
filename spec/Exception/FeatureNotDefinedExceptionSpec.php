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
}
