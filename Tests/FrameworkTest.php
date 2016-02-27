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
        $framework = $this->getFrameworkForException(new ResourceNotFoundException);
        
        $response = $framework->handle(new Request());
        
        $this->assertEquals(404, $response->getStatusCode());
    }
}