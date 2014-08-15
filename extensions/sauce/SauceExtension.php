<?php
namespace Codeception\Extension;

require_once 'vendor/autoload.php';

use Sauce\Sausage\SauceAPI;

/**
 * Class SauceExtension
 *
 * @author Susanne Moog <mail@susanne-moog.de>
 * @license GPL v3
 */
class SauceExtension extends \Codeception\Platform\Extension {
	static $events = array(
		'test.before' => 'beforeTest',
		'test.fail' => 'testFailed',
		'test.error' => 'testFailed',
		'test.success' => 'testSuccess',
	);

	public function beforeTest(\Codeception\Event\TestEvent $e) {
		$username = ($this->config['env_variables'] === true ? getenv('SAUCE_USERNAME') : $this->config['username']);
		$accesskey = ($this->config['env_variables'] === true ? getenv('SAUCE_ACCESS_KEY') : $this->config['accesskey']);
		$s = new SauceAPI($username, $accesskey);
		$test = $e->getTest();
		$newestTest = $this->getFirstJob($s);
		try {
			$build = $this->config['build'];
		} catch (\Exception $e) {
			$build = date('d-M-Y');
		}
		$s->updateJob($newestTest['id'], array('name' => $test->getName(), 'build' => $build));
	}

	public function testFailed(\Codeception\Event\FailEvent $e) {
		$username = ($this->config['env_variables'] === true ? getenv('SAUCE_USERNAME') : $this->config['username']);
		$accesskey = ($this->config['env_variables'] === true ? getenv('SAUCE_ACCESS_KEY') : $this->config['accesskey']);
		$s = new SauceAPI($username, $accesskey);
		$newestTest = $this->getFirstJob($s);
		$s->updateJob($newestTest['id'], array('passed' => false));
	}

	public function testSuccess(\Codeception\Event\TestEvent $e) {
		$username = ($this->config['env_variables'] === true ? getenv('SAUCE_USERNAME') : $this->config['username']);
		$accesskey = ($this->config['env_variables'] === true ? getenv('SAUCE_ACCESS_KEY') : $this->config['accesskey']);
		$s = new SauceAPI($username, $accesskey);
		$newestTest = $this->getFirstJob($s);
		$s->updateJob($newestTest['id'], array('passed' => true));
	}

	/**
	 * Retrieve the first job from a SauceLabs jobs data set
	 *
	 * @param SauceAPI $sauceAPI
	 * @return array
	 */
	private function getFirstJob(SauceAPI $sauceAPI)
	{
		$jobs = $sauceAPI->getJobs(0);
		return $jobs['jobs'][0];
	}
}
