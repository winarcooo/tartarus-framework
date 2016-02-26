<?php
// tartarus-framework/src/Calendar/Controller/LeapYearController.php

namespace Calendar\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Calendar\Model\LeapYear;

class LeapYearController
{
    public function indexAction(Request $request, $year)
    {
        $LeapYear = new LeapYear();
        if($LeapYear->isLeapYear($year)){
            return new Response('yep, this is a leap year');
        }
        return new Response('Nope, this is not a leap year');
    }
}