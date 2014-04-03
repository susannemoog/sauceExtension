<?php
use Codeception\Util\Stub;

/**
 * Class GoogleTest
 */
class GoogleTest extends \Codeception\TestCase\Test
{
    /** @var \WebGuy */
    protected $webGuy;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    /**
     * Checks Google's home page.
     *
     * @covers SauceExtension
     */
    public function testGoogleSearchPage()
    {
        $this->webGuy->am('Anonymous User');
        $this->webGuy->wantTo('test home page');
        $this->webGuy->amOnPage('/');
        $this->webGuy->canSeeInTitle('Google');
    }
    /**
     * Executes a search on Google's home page using return key.
     *
     * @covers SauceExtension
     */
    public function testGoogleSearchResults()
    {
        $this->webGuy->am('Anonymous User');
        $this->webGuy->wantTo('execute search on home page');
        $this->webGuy->amOnPage('/');
        $this->webGuy->canSeeInTitle('Google');
        $this->webGuy->fillField('#gbqfq', 'dogecoin');
        $this->webGuy->pressKey('#gbqfq', WebDriverKeys::ENTER);
        $this->webGuy->canSeeInField('input#gbqfq', 'dogecoin');
        $this->webGuy->canSeeInTitle('dogecoin - Google Search');
    }

    /**
     * @todo This test has the following problems: It fails to find the button to click. Codeception throws an error because of the failure.
     */
    /* public function testGoogleSearchResultsWithButtonClick()
    {
        $this->markTestIncomplete('This should work but does not due to a bug in WebDriver maybe. Even with it officially skipped it throws an error.');
        $this->webGuy->am('Anonymous User');
        $this->webGuy->wantTo('execute search using Google Search button on home page');
        $this->webGuy->amOnPage('/');
        $this->webGuy->canSeeInTitle('Google');
        $this->webGuy->fillField('#gbqfq', 'dogecoin');
        $this->webGuy->click('button#gbqfba.gbqfba');
        $this->webGuy->canSeeInField('input#gbqfq', 'dogecoin');
        $this->webGuy->canSeeInTitle('dogecoin - Google Search');
    }*/
}
