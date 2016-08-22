<?php
/**
 * Created by PhpStorm.
 * User: Michał (majkel) Kowalik <maf.michal@gmail.com>
 * Date: 22.08.16
 * Time: 13:09
 */

namespace org\majkel\toolbox\datetime;

/**
 * Class ClarionTest
 *
 * @coversDefaultClass \org\majkel\toolbox\datetime\Clarion
 */
class ClarionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @covers ::getReferenceDate
     */
    public function testGetReferenceDate()
    {
        $date = Clarion::getReferenceDate();
        self::assertSame("1800-12-28 00:00:00", $date->format('Y-m-d H:i:s'));
        $date->modify("+1 day");
        self::assertSame("1800-12-28 00:00:00", $date->format('Y-m-d H:i:s'));
    }

    /**
     * @return array
     */
    public function dataIsValid()
    {
        return array(
            array('', false),
            array(-1, false),
            array(array(), false),
            array('qwe', false),
            array(123, true),
            array(123.5, true),
            array('123.5', true),
        );
    }

    /**
     * @test
     *
     * @param string  $days
     * @param boolean $valid
     * @covers ::isValid
     *
     * @dataProvider dataIsValid
     */
    public function testIsValid($days, $valid)
    {
        self::assertSame($valid, Clarion::isValid($days));
    }

    /**
     * @test
     * @covers ::toDate
     */
    public function testToDateInvalid()
    {
        self::assertNull(Clarion::toDate(-1));
    }

    /**
     * @return array
     */
    public function dataFormat()
    {
        return array(
            array('2011-11-20 00:00:00', 77028),
        );
    }

    /**
     * @test
     * @covers ::toDate
     *
     * @param string $dateTime
     * @param int    $days
     *
     * @dataProvider dataFormat
     */
    public function testToDate($dateTime, $days)
    {
        self::assertSame($dateTime, Clarion::toDate($days)->format('Y-m-d H:i:s'));
    }

    /**
     * @test
     * @covers ::fromDate
     *
     * @param $dateTime
     * @param $days
     *
     * @dataProvider dataFormat
     */
    public function testFromDate($dateTime, $days)
    {
        $date = \DateTime::createFromFormat('Y-m-d H:i:s', $dateTime);
        self::assertSame($days, Clarion::fromDate($date));
    }
}
