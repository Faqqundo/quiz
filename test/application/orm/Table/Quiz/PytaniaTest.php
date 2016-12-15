<?php

namespace Table\Quiz;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2016-12-14 at 22:24:37.
 */
class PytaniaTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var Pytania
     */
    protected $object;


    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->object = new Pytania;

    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {

    }

    /**
     * @covers Table\Quiz\Pytania::getInstance
     * @covers Table\Quiz\Pytania::__construct
     */
    public function testGetInstance() {
        PytaniaHelper::resetInstance();

        $quiz = Pytania::getInstance();

        $this->assertInstanceOf(Pytania::class, $this->object);
        $this->assertInstanceOf(Pytania::class, $quiz);

        $this->assertSame($quiz, Pytania::getInstance());
        $this->assertNotSame($quiz, $this->object);        
    }

}

class PytaniaHelper extends Pytania {
    public static function resetInstance() {
        static::$instance = null;
    }
}