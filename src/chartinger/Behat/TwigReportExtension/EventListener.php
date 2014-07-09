<?php

namespace chartinger\Behat\TwigReportExtension;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Behat\Behat\EventDispatcher\Event\ScenarioTested;
use Behat\Behat\EventDispatcher\Event\AfterScenarioTested;
use Behat\Behat\EventDispatcher\Event\FeatureTested;
use Behat\Behat\EventDispatcher\Event\AfterFeatureTested;
use Behat\Testwork\EventDispatcher\Event\SuiteTested;
use Behat\Testwork\EventDispatcher\Event\AfterSuiteTested;
use Behat\Behat\EventDispatcher\Event\StepTested;
use Behat\Behat\EventDispatcher\Event\AfterStepTested;
use Behat\Testwork\Tester\Result\TestResult;
use Behat\Behat\EventDispatcher\Event\BackgroundTested;
use Behat\Behat\EventDispatcher\Event\AfterBackgroundTested;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Behat\EventDispatcher\Event\OutlineTested;
use Behat\Behat\EventDispatcher\Event\AfterOutlineTested;
use chartinger\Behat\TwigReportExtension\facades\Step;
use chartinger\Behat\TwigReportExtension\facades\Feature;
use chartinger\Behat\TwigReportExtension\facades\Background;
use chartinger\Behat\TwigReportExtension\facades\Scenario;
use chartinger\Behat\TwigReportExtension\facades\OutlineScenario;

class EventListener implements EventSubscriberInterface
{
  private $templating;
  private $template;
  private $output;
  
  private $features = array();
  private $scenarios = array();
  private $backgrounds = array();
  private $steps = array();
  
  private $statistics = array();
  
  public function __construct(\Twig_Environment $templating)
  {
    $this->templating = $templating;
    $this->counter = 0;
    
    $this->statistics["scenarios"] = array("total" => 0, "passed" => 0, "failed" => 0, "skipped" => 0, "pending" => 0);
    $this->statistics["steps"] = array("total" => 0, "passed" => 0, "failed" => 0, "skipped" => 0, "pending" => 0);
  }
  
  static public function getSubscribedEvents()
  {
    return array (
        StepTested::AFTER => 'afterStep',
        FeatureTested::AFTER => 'afterFeature', 
        ScenarioTested::AFTER => 'afterScenario', 
        SuiteTested::AFTER => 'afterSuite',
        BackgroundTested::AFTER => 'afterBackground', 
        OutlineTested::AFTER => 'afterOutline'
    );
  }

  public function afterStep(AfterStepTested $event)
  {
    $this->steps[] = new Step($event);
    $this->updateStats("steps",$event->getTestResult()->getResultCode());
  }
  
  public function afterScenario(AfterScenarioTested $event)
  {
    $this->scenarios[] = new Scenario($event, $this->steps);
    $this->updateStats("scenarios", $event->getTestResult()->getResultCode());
    $this->steps = array();
  }
  
  public function afterOutline(AfterOutlineTested $event)
  {
    $this->scenarios[] = new OutlineScenario($event, $this->steps);
    $this->updateStats("scenarios",$event->getTestResult()->getResultCode());
    $this->steps = array();
  }
  
  public function afterFeature(AfterFeatureTested $event)
  {
    $this->features[] = new Feature($event, $this->scenarios, $this->backgrounds);
    $this->scenarios = array();
    $this->backgrounds = array();
  }

  public function afterBackground(AfterBackgroundTested $event)
  {
    $this->backgrounds[] = new Background($event, $this->steps);
    $this->steps = array();
  }
  
  
  public function afterSuite(AfterSuiteTested $event)
  {
    $features = $this->features;
    $rendered = $this->templating->render($this->template, array('features' => $features, 'statistics' => $this->statistics));
    file_put_contents($this->output, $rendered);
  }
  
  private function updateStats($category,$result)
  {
    switch($result)
    {
      case TestResult::PASSED:
        $this->statistics[$category]["passed"]++;
        break;
      case TestResult::FAILED:
        $this->statistics[$category]["failed"]++;
        break;
      case TestResult::PENDING:
        $this->statistics[$category]["pending"]++;
        break;
      default:
        $this->statistics[$category]["skipped"]++;
    }
    $this->statistics[$category]["total"]++;
  }
  
  public function setTemplate($file)
  {
    $this->template = $file;
  }
  
  public function setOutputFile($file)
  {
    $this->output = $file;
  }
}