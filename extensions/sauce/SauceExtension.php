<?php
require_once('SauceAPI.php');

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

	public function beforeTest(\Codeception\Event\Test $e) {
		$s = new SauceAPI($this->config['username'], $this->config['accesskey']);
		$test = $e->getTest();
		$newestTest = $s->getJobs(0)['jobs'][0];
		try {
			$build = $this->config['build'];
		} catch (Exception $e) {
			$build = date('d-M-Y');
		}
		$s->updateJob($newestTest['id'], array('name' => $test->getName(), 'build' => $build));
	}

	public function testFailed(\Codeception\Event\Fail $e) {
		$s = new SauceAPI($this->config['username'], $this->config['accesskey']);
		$newestTest = $s->getJobs(0)['jobs'][0];
		$s->updateJob($newestTest['id'], array('passed' => false));
	}

	public function testSuccess(\Codeception\Event\Test $e) {
		$s = new SauceAPI($this->config['username'], $this->config['accesskey']);
		$newestTest = $s->getJobs(0)['jobs'][0];
		$s->updateJob($newestTest['id'], array('passed' => true));
	}
}
?>