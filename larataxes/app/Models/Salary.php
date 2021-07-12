<?php

namespace App\Models;

use Carbon\Carbon;
use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Salary extends Model
{
    use HasFactory;
    protected $guarded = [];

    private $mzp = 42500;
    private $mrp = 2917;

    public function getMonthAttribute()
    {
        $dateObj = DateTime::createFromFormat('!m', $this->calendar_month);
        return $dateObj->format('F');
    }

    public function getPensionerAttribute()
    {
        return $this->is_pensioner ? 'Да' : 'Нет';
    }

    public function getDisabledAttribute()
    {
        return $this->is_disabled_person ? 'Группа ' . $this->is_disabled_person: 'Нет';
    }

    public function getCreatedDateAttribute()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('d/m/y');
    }

    public function getIpnAttribute()
    {
        if(
            ($this->is_pensioner && $this->is_disabled_person) ||
            $this->is_disabled_person && $this->oklad < 882 * $this->mrp) {
            return 0;
        }
        $ipn = (
            $this->oklad
            - $this->getOpvAttribute()
            - ($this->nalog_vichet ? $this->mzp : 0)
            - $this->getVosmsAttribute()
            - $this->getCorrectionsAttribute()) * 0.1;
        return $ipn > 0 ? $ipn : 0;
    }

    public function getOpvAttribute()
    {
        if($this->is_pensioner || $this->is_disabled_person === 1 || $this->is_disabled_person === 2) {
            return 0;
        }
        return $this->oklad * 0.1;
    }

    public function getVosmsAttribute()
    {
        if($this->is_pensioner || $this->is_disabled_person) {
            return 0;
        }
        return $this->oklad * 0.02;
    }

    public function getCorrectionsAttribute(){
        if ($this->oklad < $this->mrp * 25) {
            $correction = (
                $this->oklad
                - $this->getOpvAttribute()
                - ($this->nalog_vichet ? $this->mzp : 0)
                - $this->getVosmsAttribute()) * 0.9;

            return $correction > 0 ? $correction : 0;
        }
        return 0;
    }

    public function getSoAttribute()
    {
        if($this->is_disabled_person) {
            return (
                $this->oklad
                - $this->getOpvAttribute()) * 0.035;
        }

        return 0;
    }
}
