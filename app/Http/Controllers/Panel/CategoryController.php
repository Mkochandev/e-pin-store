<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categories;

class CategoryController extends BaseController
{
      use BasePattern;
    public function __construct()
    {
        $this->title = 'Kategoriler';
        $this->page = 'category';
        $this->model = Categories::class;
        $this->upload = 'category';

        $this->view = (object)array(
            'breadcrumb' =>[
                'Kategoriler' => route('panel.category_list'),
            ]
        );
        
        parent::__construct();
    }   
}
