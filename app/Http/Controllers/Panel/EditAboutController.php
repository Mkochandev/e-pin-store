<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\About;

class EditAboutController extends BaseController
{
    use BasePattern;
    public function __construct()
    {
        $this->title = 'Hakkımızda';
        $this->page = 'about';
        $this->model = About::class;
        $this->upload = 'about';

        $this->view = (object)array(
            'breadcrumb' =>[
                'Hakkımızda' => route('panel.about_list'),
            ]
        );
        
        parent::__construct();
    }   
}
