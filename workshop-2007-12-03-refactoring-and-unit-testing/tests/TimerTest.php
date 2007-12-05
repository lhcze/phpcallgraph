<?php
// Call TimerTest::main() if this source file is executed directly.
if (!defined('PHPUnit_MAIN_METHOD')) {
    define('PHPUnit_MAIN_METHOD', 'TimerTest::main');
}

require_once 'PHPUnit/Framework.php';

require_once '../classes/Timer.php';

/**
 * Test class for Timer.
 * Generated by PHPUnit on 2007-12-04 at 15:57:45.
 */
class TimerTest extends PHPUnit_Framework_TestCase {

    /**
     * Fixture
     * @link http://www.phpunit.de/pocket_guide/3.2/en/fixtures.html PHPUnit Pocket Guide: Fixtures
     * @var Timer
     */
    protected $timer;

    const waitTime = 1;

    /**
     * Runs the test methods of this class.
     *
     * @access public
     * @static
     */
    public static function main() {
        require_once 'PHPUnit/TextUI/TestRunner.php';

        $suite  = new PHPUnit_Framework_TestSuite('TimerTest');
        $result = PHPUnit_TextUI_TestRunner::run($suite);
    }

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     *
     * @access protected
     */
    protected function setUp() {
        $this->timer = new Timer();
        sleep(self::waitTime); // wait three seconds
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     *
     * @access protected
     */
    protected function tearDown() {
        $this->timer = null; // not really neccessary since setUp() creates a new timer object
    }

    /**
     *
     */
    public function testStop() {
        $this->timer->stop();
        sleep(2); // wait another two seconds to see if the timer has been stopped correctly

        /**
         * @link http://www.phpunit.de/pocket_guide/3.2/en/api.html#api.assert.tables.assertions List of all PHPUnit assertions
         */
        $this->assertEquals(self::waitTime, floor($this->timer->getTime()));
    }

    /**
     *
     */
    public function testGetTime() {
        $this->assertEquals(self::waitTime, floor($this->timer->getTime()));
    }

    /**
     *
     */
    public function testStopAndGetTime() {
        $this->assertEquals(self::waitTime, floor($this->timer->stopAndGetTime()));
        sleep(2); // wait another two seconds to see if the timer has been stopped correctly
        $this->assertEquals(self::waitTime, floor($this->timer->getTime()));
    }

    /**
     *
     */
    public function test__toString() {
        $this->timer->stop();
        $this->assertEquals((string) $this->timer->getTime(), $this->timer->__toString());
    }

    /**
     *
     */
    public function testSubtractMicrotimes() {
        $microtime = microtime();
        $this->assertEquals(0.0, Timer::subtractMicrotimes($microtime, $microtime));
    }
}

// Call TimerTest::main() if this source file is executed directly.
if (PHPUnit_MAIN_METHOD == 'TimerTest::main') {
    TimerTest::main();
}
?>
