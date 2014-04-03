<?php

/**
 * Class SauceExtensionTest
 */
class SauceExtensionTest extends \Codeception\TestCase\Test
{
    /** @var \CodeGuy */
    protected $codeGuy;
    /**  @var \Codeception\Extension\SauceExtension */
    protected $object;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    /**
     * Simple test that exercises the __construct
     *
     * @small
     * @covers Codeception\Extension\SauceExtension::__construct
     */
    public function testConstructor()
    {
        $config = array();
        $object = array();
        $this->object = new \Codeception\Extension\SauceExtension($config, $object);
        $this->assertSame(
            'Codeception\Extension\SauceExtension',
            get_class($this->object)
        );
    }

}
