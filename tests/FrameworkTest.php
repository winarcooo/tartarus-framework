<?php
//tartarus-framework/Tests/FrameworkTest.php

namespace Tartarus\Tests;

use Tartarus\Framework;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

class FrameworkTest extends \PHPUnit_Framework_TestCase
{
    public function TestNotFoundHandling()
    {
        $framework = $this->getFrameworkForException(new ResourceNotFoundException());

        $response = $framework->handle(new Request());

        $this->assertEquals(404, $response->getStatusCode());
    }

    private function getFrameworkForException($exception)
    {
        $matcher = $this->getMock('Symfony\Component\Routing\Matcher\UrlMatcherInterface');

        $matcher->expects($this->once())
                ->method('match')
                ->will($this->throwException($exception));

        $matcher->expects($this->once())
                ->method('getContext')
                ->will($this->returnValue($this->getMock('Symfony\Component\Routing\RequestContext')));

        $resolver = $this->getMock('Symfony\Component\HttpKernel\Controller\ControllerResolverInterface');

        return new Framework($matcher, $resolver);
    }
}
