<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Challan;

class Company extends Model
{
    protected $fillable = ["company_name"];

    public function challans()
    {
        return $this->hasMany(Challan::class);
    }

    public static function store($request, $company = null)
    {
        if ($company === null)
            $company = new Company();

        $company->fill($request)->save();

        return $company;
    }

    public function updateCompany($request)
    {
        return self::store($request, $this);
    }
}