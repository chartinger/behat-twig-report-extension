<?php

namespace chartinger\Behat\TwigReportExtension\facades;

use Behat\Behat\EventDispatcher\Event\AfterFeatureTested;
class Feature
{
  private $event;
  private $scenarios;
  private $backgrounds;
  
  public function __construct(AfterFeatureTested $event, $scenarios, $backgrounds)
  {
    $this->event = $event;
    $this->scenarios = $scenarios;
    $this->backgrounds = $backgrounds;
  }
  
  public function getTitle()
  {
    return $this->event->getFeature()->getTitle();
  }
  
  public function getDescription()
  {
    return $this->event->getFeature()->getDescription();
  }
  
  public function getResult()
  {
    return $this->event->getTestResult()->getResultCode();
  }
  
  public function getScenarios()
  {
    return $this->scenarios;
  }
  
  public function getBackgrounds()
  {
    return $this->backgrounds;
  }
}