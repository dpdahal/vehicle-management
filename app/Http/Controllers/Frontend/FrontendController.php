<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Vehicle\VehicleType;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public $frontendPath = 'frontend.';
    public $pagePath;

    public function __construct()
    {
        parent::__construct();
        $this->data('vehicleTypeData', VehicleType::all());
        $this->pagePath = $this->frontendPath . 'pages.';
    }
}
