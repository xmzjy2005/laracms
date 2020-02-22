<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $fillable = ['title','name','is_default','front_access'];
    public function setDefault(){
        \DB::table('modules')->update(['is_default'=>0]);
        $this->is_default = 1;
        return $this->save();
    }
    public function getDefaultModule(){
        return $this->where(['front_access'=>1,'is_default'=>1])->first()?:$this->where('name','article')->first();
    }
}
