<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyFinancial_Report_Agency extends Model
{
    public function __construct()
    {
        $this->table = getLang().'_financial_report_agency';
    }


}
