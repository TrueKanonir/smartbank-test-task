<?php

namespace Domain\Shop\ValueObject;

use Domain\Shop\Data\CoordinateData;

class DistanceCalculator
{
    /** @var int */
    const R = 6371000;

    /**
     * @param \Domain\Shop\Data\CoordinateData $from
     * @param \Domain\Shop\Data\CoordinateData $to
     * @return float|int
     */
    public static function calculate(CoordinateData $from, CoordinateData $to): float | int
    {
        $phi1 = deg2rad($from->latitude);
        $phi2 = deg2rad($to->latitude);

        $dPhi = deg2rad($to->latitude - $from->latitude);
        $dLambda = deg2rad($to->longitude - $from->longitude);

        $a = sin($dPhi / 2) * sin($dPhi / 2) + cos($phi1) * cos($phi2) * sin($dLambda / 2) * sin($dLambda / 2);

        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        return self::R * $c;
    }
}
