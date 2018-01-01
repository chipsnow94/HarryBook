<?php

class HarryPotter
{
    private $valuetypes;

    const PIECE_BOOK = 8;
    const DISCOUNT = [
            1 => 0,
            2 => 0.05,
            3 => 0.1,
            4 => 0.2,
            5 => 0.25
    ];

    public function pieceBiggestDiscount($buybook)
    {
        $piecediscount = 0;
        $totaldiscount = '';

        $this->valuetypes = array_count_values($buybook);
        $piece = $this->totalPieceDefault();
        
        $counttypes = $this->countTypes();
        
        for (; $counttypes> 1; $counttypes = $this->countTypes()) {
            $totaldiscount .= (string)$counttypes;
            $piecediscount += $counttypes * self::PIECE_BOOK * self::DISCOUNT[$counttypes]; //= 10
            $this->updateValueTypes($counttypes);
        }

        if (count($this->valuetypes) == 5) {
            $threediscount = $this->countDiscount($totaldiscount, 3);
            $fivediscount = $this->countDiscount($totaldiscount, 5);
            $bountdiscount = min($threediscount,$fivediscount);
            $piecediscount += $bountdiscount*0.4;
        }

        return (double)$piece - $piecediscount;
    }

    public function totalPieceDefault()
    {
        $piece = 0;
        for ($i = 1; $i <= count($this->valuetypes); $i++) {
            $piece += self::PIECE_BOOK * $this->valuetypes[$i];
        }
        return $piece;
    }

    public function countDiscount($totaldiscount, $searchdiscount)
    {
        $totalsearch = 0;
        for ($i = 0; $i < strlen($totaldiscount); $i++) {
            if ($totaldiscount[$i] == $searchdiscount) {
                $totalsearch++;
            }
        }
        return $totalsearch;
    }

    public function countTypes()
    {
        $counttypes = 0;
        for ($i = 1; $i <= count($this->valuetypes); $i++) {
            if ($this->valuetypes[$i] > 0) {
                $counttypes++;
            }
        }
        return $counttypes;
    }

    public function updateValueTypes($discounttypes)
    {
        for ($i = 1; $i <= count($this->valuetypes);  $i++) {
            if ($this->valuetypes[$i] >= 1) {
                $this->valuetypes[$i]--;
                $discounttypes--;
            }
        }
    }
}
