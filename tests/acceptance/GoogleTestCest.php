<?php
use \WebGuy;

/**
 * Class GoogleTestCest
 */
class GoogleTestCest
{
    /**
     * Test Google home page
     *
     * @param WebGuy $I WebGuy with Sausage
     */
    public function testGoogleHomePage(WebGuy $I)
    {
        $I->am('Anonymous User');
        $I->wantTo('test home page');
        $I->amOnPage('/');
        $I->canSeeInTitle('Google');
    }

    /**
     * Test execute search on Google home page with button click
     * This is a test that fails do to a WebDriver bug when it clicks
     * Google "Search Google" button.
     *
     * @param WebGuy $I WebGuy with Sausage
     * @param $scenario
     */
    public function testGoogleSearchResultsWithButtonClick(WebGuy $I, $scenario)
    {
        $scenario->skip(
            'This is a test that fails do to a WebDriver bug'
            . 'when it clicks Google "Search Google" button.'
        );
        $I->am('Anonymous User');
        $I->wantTo('execute search using Google Search button on home page');
        $I->amOnPage('/');
        $I->canSeeInTitle('Google');
        $I->fillField('#gbqfq', 'dogecoin');
        $I->click('button#gbqfba.gbqfba');
        $I->canSeeInField('input#gbqfq', 'dogecoin');
        $I->canSeeInTitle('dogecoin - Google Search');
    }
}