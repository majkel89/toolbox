<?php
/**
 * Created by PhpStorm.
 * User: Michał (majkel) Kowalik <maf.michal@gmail.com>
 * Date: 22.08.16
 * Time: 13:09
 */

namespace org\majkel\toolbox\datetime;

/**
 * Class Comarch

 * Convert DateTime <-> Comarch date

 * Comarch date is number of seconds since 1900-01-01. Comarch date can store date and time information.
 * Maximum resolution is one second
 *
 * @package org\majkel\toolbox\datetime
 */
final class Comarch
{
    /** @var \DateTimeImmutable */
    private static $refDate;

    /**
     * Comarch constructor.
     *
     * @codeCoverageIgnore
     */
    private function __construct()
    {
    }

    /**
     * @return \DateTimeImmutable Returns date object containing value `1990-01-01 00:00:00`
     */
    public static function getReferenceDate()
    {
        if (is_null(self::$refDate)) {
            self::$refDate = (new \DateTimeImmutable())->setDate(1990, 01, 01)->setTime(0, 0, 0);
        }
        return self::$refDate;
    }

    /**
     * Checks if value is valid Comarch date
     *
     * @param int $seconds Number of seconds since 1990-01-01
     *
     * @return bool Whether value is valid comarch date
     */
    public static function isValid($seconds)
    {
        return is_numeric($seconds) && $seconds >= 0;
    }

    /**
     * Converts Comarch date to date object
     *
     * @param int $seconds Number of seconds since 1990-01-01
     *
     * @return \DateTime|null Comarch date represented as DateTime object or null if value is invalid
     */
    public static function toDate($seconds)
    {
        if (!self::isValid($seconds)) {
            return null;
        }
        $seconds = (int)$seconds;
        return self::getReferenceDate()->modify("+$seconds seconds");
    }

    /**
     * Converts date object to comarch date format (number of seconds since 1900-01-01)
     *
     * @param \DateTime $date Date to convert to
     *
     * @return int Comarch date (number of seconds since 1990-01-01)
     */
    public static function fromDate(\DateTime $date)
    {
        $diff = $date->diff(self::getReferenceDate());
        return $diff->days * 24 * 60 * 60 + $diff->h * 60 * 60 + $diff->i * 60 + $diff->s;
    }
}
