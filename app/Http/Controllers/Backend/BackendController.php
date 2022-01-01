<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BackendController extends Controller
{
    public $backendPath = 'backend.';
    public $pagePath;

    public function __construct()
    {
        parent::__construct();
        $this->pagePath = $this->backendPath . 'pages.';
    }
}
