<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\MinkContext;

/**
 * Defines application features from the specific context.
 */
class AperoContext extends MinkContext implements SnippetAcceptingContext
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }

    public static function bootstrapLaravel()
    {
        $unitTesting = true;

        $testEnvironment = 'testing';
        $app=require __DIR__.'/../../../../bootstrap/start.php';
        $app->boot();
    }

    public function setUp(){
        Artisan::call('migrate:refresh');
        Artisan::call('migrate');
        Artisan::call('db:seed');
    }
    /**
     * @Given i am on :arg1
     */
    public function iAmOn($arg1)
    {
        $this->visitPath($arg1);
        $this->assertPageAddress($arg1);
    }

    /**
     * @When I submit press :arg1
     */
    public function iSubmitPress($arg1)
    {
        $this->pressButton($arg1);
    }

    /**
     * @Then I should be redirected to :arg1
     */
    public function iShouldBeRedirectedTo($arg1)
    {
        $this->assertPageAddress($arg1);
    }

    /**
     * @When I fill :arg1 with :arg2
     */
    public function iFillWith($arg1, $arg2)
    {
        $this->fillField($arg1, $arg2);
    }

    /**
     * @Then I should be redirected on :arg1
     */
    public function iShouldBeRedirectedOn($arg1)
    {
        $this->assertPageAddress($arg1);

    }

    /**
     * @Then I should message :arg1
     */
    public function iShouldMessage($arg1)
    {
        $this->assertPageContainsText($arg1);
    }
}
