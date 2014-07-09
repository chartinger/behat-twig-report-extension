<?php

namespace chartinger\Behat\TwigReportExtension\facades;

use Behat\Behat\EventDispatcher\Event\AfterStepTested;

class Step implements StepInterface
{
  private $event;
  
  public function __construct(AfterStepTested $event)
  {
    $this->event = $event;
  }
  
  public function getText()
  {
    return $this->event->getStep()->getKeyword() . " ". $this->event->getStep()->getText();
  }
  
  public function getResult()
  {
    return $this->event->getTestResult()->getResultCode();
  }
  
  public function getArguments()
  {
    $arguments = array();
    
    foreach ($this->event->getStep()->getArguments() as $argument)
    {
      $argument_array = array();
      $argument_array["type"] = $argument->getNodeType();
      switch ($argument->getNodeType())
      {
        case "PyString":
          $argument_array["text"] = $argument->getRaw();
          break;
        case "Table":
          $argument_array["table"] = $argument->getTable();
          break;
      }
      $arguments[] = $argument_array;
    }
    return $arguments;
  }

  public function getLine()
  {
    return $this->event->getStep()->getLine();
  }
  
}