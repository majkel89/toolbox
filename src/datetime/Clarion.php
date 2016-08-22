<?php
/**
 * Created by PhpStorm.
 * User: Michał (majkel) Kowalik <maf.michal@gmail.com>
 * Date: 22.08.16
 * Time: 13:09
 */

namespace org\majkel\toolbox\datetime;

/**
 * Class Clarion
 *
 * Convert DateTime <-> Clarion date
 *
 * Clarion date is number of days since 1800-12-28. Clarion date can only store dates (no time part).
 * Maximum resolution is one day
 *
 * @package org\majkel\toolbox\datetime
 */
final class Clarion
{
    /** @var \DateTime */
    private static $refDate;

    /**
     * Clarion constructor.
     *
     * @codeCoverageIgnore
     */
    private function __construct()
    {
    }

    /**
     * @return \DateTime Returns date object containing value `1800-12-28 00:00:00`
     */
    public static function getReferenceDate()
    {
        if (is_null(self::$refDate)) {
            self::$refDate = new \DateTime();
            self::$refDate->setDate(1800, 12, 28)->setTime(0, 0, 0);
        }
        return clone self::$refDate;
    }

    /**
     * Checks if value is valid Clarion date
     *
     * @param int $days Number of days since 1800-12-28
     *
     * @return bool Whether value is valid Clarion date
     */
    public static function isValid($days)
    {
        return is_numeric($days) && $days >= 0;
    }

    /**
     * Converts Clarion date to date object
     *
     * @param int $days Number of days since 1800-12-28
     *
     * @return \DateTime|null Clarion date represented as DateTime object or null if value is invalid
     */
    public static function toDate($days)
    {
        if (!self::isValid($days)) {
            return null;
        }
        $days = (int) $days;
        return self::getReferenceDate()->modify("+$days days");
    }

    /**
     * Converts date object to Clarion date format (number of days since 1800-12-28)
     *
     * @param \DateTime $date Date to convert to
     *
     * @return int Clarion date (number of days since 1800-12-28)
     */
    public static function fromDate(\DateTime $date)
    {
        return $date->diff(self::getReferenceDate())->days;
    }
}
