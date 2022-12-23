<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'FA_historical_transaction';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'asset_fa_account',
        'asset_name',
        'Purchase_Price',
        'Purchase_month',
        'Acc_Dep_PY',
        'Acc_Dep_CY',
        'Dep_Method',
        'Life',
        'Next_Dep_Month',
        'remaining_life',
        'company_id',
        'QBO_txn_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'asset_serial',
        'asset_location',
        'asset_memo',
        'asset_warranty_end',
        
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        
    ];
}
