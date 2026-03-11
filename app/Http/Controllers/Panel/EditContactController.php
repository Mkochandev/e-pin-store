<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;

class EditContactController extends BaseController
{
    use BasePattern;
    public function __construct()
    {
        $this->title = 'İletişim Bilgileri';
        $this->page = 'contact';
        $this->model = Contact::class;
        $this->upload = 'contact';

        $this->view = (object)array(
            'breadcrumb' =>[
                'İletişim Bilgileri' => route('panel.contact_list'),
            ]
        );
        
        parent::__construct();
    }   
}
