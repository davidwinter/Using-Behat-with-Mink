<?php

require_once __DIR__.'/../../vendor/.composer/autoload.php';

use Behat\Behat\Context\ClosuredContextInterface,
	Behat\Behat\Context\TranslatedContextInterface,
	Behat\Behat\Context\BehatContext,
	Behat\Behat\Exception\PendingException,
	Behat\Behat\Context\Step;
use Behat\Gherkin\Node\PyStringNode,
	Behat\Gherkin\Node\TableNode;

/**
 * Features context.
 */
class FeatureContext extends Behat\Mink\Behat\Context\MinkContext
{
	/**
	 * Initializes context.
	 * Every scenario gets it's own context object.
	 *
	 * @param   array   $parameters     context parameters (set them up through behat.yml)
	 */
	public function __construct(array $parameters)
	{
		// Initialize your context here
	}

	/**
	 * @Given /^I am logged in as "([^"]*)" with password "([^"]*)"$/
	 */
	public function iAmLoggedInAsWithPassword($email, $password)
	{
		return array(
			new Step\Given('I am on "/"'),
			new Step\When('I fill in "email" with "'.$email.'"'),
			new Step\When('I fill in "password" with "'.$password.'"'),
			new Step\When('I press "Login"'),
		);
	}
}
