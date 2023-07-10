<?php

use App\Models\featured_service;
use App\Models\FeaturedBrand;
use App\Models\manu_sortable;
use App\Models\ManuSortable;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;

    function getSetting(){
        return Setting::first();
    }






    function getServices(){
        $services = FeaturedBrand::leftJoin('services', 'services_id', 'featured_services.service_id')
        ->orderBy('sort_order', 'ASC')
        ->get();

        return $services;
    }


    function getManu(){
        $manus = manu_sortable::leftJoin('manulinks','manulinks_id','manu_sortables.manulink_id')
        ->orderBy('sort_order', 'ASC')->get();

        return $manus;
    }
?>
