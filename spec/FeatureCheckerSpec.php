<?php

namespace spec\LWI\FeatureChecker;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FeatureCheckerSpec extends ObjectBehavior
{
    protected $proper_config = array('test' => true, 'test-2' => false);

    function it_is_initializable()
    {
        $this->beConstructedWith($this->proper_config);
        $this->shouldHaveType('LWI\FeatureChecker\FeatureChecker');
    }

    function it_should_throw_an_exception_when_parameters_are_not_an_array()
    {
        $parameters = 'string';
        $this->shouldThrow('\InvalidArgumentException')->during('__construct', array($parameters));

        $parameters = 0;
        $this->shouldThrow('\InvalidArgumentException')->during('__construct', array($parameters));

        $parameters = true;
        $this->shouldThrow('\InvalidArgumentException')->during('__construct', array($parameters));
    }

    function it_should_throw_an_exception_when_parameters_are_not_an_array_of_booleans()
    {
        $parameters = array('string', 0, true);
        $this->shouldThrow('\InvalidArgumentException')->during('__construct', array($parameters));

        $parameters = array('string', 'string');
        $this->shouldThrow('\InvalidArgumentException')->during('__construct', array($parameters));

        $parameters = array(0, 0, 0);
        $this->shouldThrow('\InvalidArgumentException')->during('__construct', array($parameters));
    }

    function it_should_throw_an_exception_when_parameters_are_not_indexed_by_strings()
    {
        $parameters = array('test' => true, 2 => false);
        $this->shouldThrow('\InvalidArgumentException')->during('__construct', array($parameters));

        $parameters = array(true, false);
        $this->shouldThrow('\InvalidArgumentException')->during('__construct', array($parameters));
    }

    function it_should_not_throw_an_exception_when_parameters_string_indexed_booleans()
    {
        $this->beConstructedWith($this->proper_config);
    }

    function it_should_throw_an_exception_when_feature_does_not_exist()
    {
        $this->beConstructedWith($this->proper_config);
        $this->shouldThrow('LWI\FeatureChecker\Exception\FeatureNotDefinedException')->during('isFeatureEnabled', array('undefined-feature'));
    }

    function it_should_say_if_a_feature_is_enabled()
    {
        $this->beConstructedWith($this->proper_config);
        $this->isFeatureEnabled('test')->shouldReturn(true);
    }

    function it_should_say_if_a_feature_is_disabled()
    {
        $this->beConstructedWith($this->proper_config);
        $this->isFeatureEnabled('test-2')->shouldReturn(false);
    }
}
