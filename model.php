<?php
use Illuminate\Database\Eloquent\Model as EModel;

class Manufacturer extends EModel {
    public $timestamps = false;
    protected $table = 'manufacturers';

    public function models() {
        return $this->hasMany(VehicleModel::class, 'id_manufacturer');
    }
}

class VehicleModel extends EModel {
    public $timestamps = false;
    protected $table = 'models';

    public function manufacturer() {
        return $this->belongsTo(Manufacturer::class, 'id_manufacturer');
    }

    public function cars() {
        return $this->hasMany(Car::class, 'id_model');
    }
}

class Owner extends EModel {
    public $timestamps = false;
    protected $table = 'owners';
}

class Car extends EModel {
    public $timestamps = false;
    protected $table = 'cars';

    public function owner() {
        return $this->belongsTo(Owner::class, 'id_owner');
    }

    public function model() {
        return $this->belongsTo(VehicleModel::class, 'id_model');
    }
}
