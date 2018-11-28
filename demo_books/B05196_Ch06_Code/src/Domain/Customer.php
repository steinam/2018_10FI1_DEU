<?php

namespace Bookstore\Domain;

interface Customer extends Payer {
    public function getMonthlyFee();
    public function getAmountToBorrow();
    public function getType();
}