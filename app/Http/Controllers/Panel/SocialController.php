<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Social;

class SocialController extends BaseController
{
    use BasePattern;
    public function __construct()
    {
        $this->title = 'Sosyal Medya Linkleri';
        $this->page = 'social';
        $this->model = Social::class;
        $this->upload = 'social';

        $this->view = (object)array(
            'breadcrumb' =>[
                'Sosyal Medya Linkleri' => route('panel.social_list'),
            ]
        );
        
        parent::__construct();
    }   
}
