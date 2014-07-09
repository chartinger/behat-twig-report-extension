<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

/**
 * Behat context class.
 */
class FeatureContext implements SnippetAcceptingContext
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context object.
     * You can also pass arbitrary arguments to the context constructor through behat.yml.
     */
    public function __construct()
    {
    }

    /**
     * @Then Nothing
     */
    public function nothing()
    {
        
    }

    /**
     * @Given Error
     */
    public function error()
    {
        throw new Exception();
    }

    /**
     * @Then Skipped
     */
    public function skipped()
    {
        throw new PendingException();
    }

    /**
     * @Given Pending
     */
    public function pending()
    {
        throw new PendingException();
    }

    /**
     * @Given I have a background
     */
    public function iHaveABackground()
    {
        throw new PendingException();
    }

    /**
     * @Given another background step
     */
    public function anotherBackgroundStep()
    {
        throw new PendingException();
    }

    /**
     * @Given I have a String:
     */
    public function iHaveAString(PyStringNode $string)
    {
    }

    /**
     * @Given i habe a parameter :arg1
     */
    public function iHabeAParameter($arg1)
    {
    }

    /**
     * @Given i have a table:
     */
    public function iHaveATable(TableNode $table)
    {
    }

    /**
     * @Given I am holding meat
     */
    public function iAmHoldingMeat()
    {
    }

    /**
     * @When i give it to my dog
     */
    public function iGiveItToMyDog()
    {
    }

    /**
     * @Then she will be <mood>
     */
    public function sheWillBeMood()
    {
    }

    /**
     * @Given I am holding onion
     */
    public function iAmHoldingOnion()
    {
    }

    /**
     * @Given I am holding treat
     */
    public function iAmHoldingTreat()
    {
    }

    /**
     * @Then she will be happy
     */
    public function sheWillBeHappy()
    {
    }

    /**
     * @Then she will be sad
     */
    public function sheWillBeSad()
    {
    }

    /**
     * @Then she will be excited
     */
    public function sheWillBeExcited()
    {
    }

    /**
     * @Given I am holding candy
     */
    public function iAmHoldingCandy()
    {
        throw new PendingException();
    }

    /**
     * @Given I have a cross variable Test1-:arg1
     */
    public function iHaveACrossVariableTest($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When I do something with Test1-:arg1
     */
    public function iDoSomethingWithTest($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then i sill have Test1-:arg1
     */
    public function iSillHaveTest($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Given I have a cross variable Test2-:arg1
     */
    public function iHaveACrossVariableTest2($arg1)
    {
    }

    /**
     * @When I do something with Test2-:arg1
     */
    public function iDoSomethingWithTest2($arg1)
    {
    }

    /**
     * @Then i sill have Test2-:arg1
     */
    public function iSillHaveTest2($arg1)
    {
        throw new Exception();
    }
}
