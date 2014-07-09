<?php

namespace chartinger\Behat\TwigReportExtension\facades;

use Behat\Behat\EventDispatcher\Event\AfterBackgroundTested;

class Background
{
  private $event;
  private $steps;
  
  public function __construct(AfterBackgroundTested $event, $steps)
  {
    $this->event = $event;
    $this->steps = $steps;
  }
  
  public function getTitle()
  {
    $this->event->getBackground()->getTitle();
  }
  
  public function getSteps()
  {
    return $this->steps;
  }
  
  public function getResult()
  {
    return $this->event->getTestResult()->getResultCode();
  }
}