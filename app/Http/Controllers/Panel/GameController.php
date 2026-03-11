<?php

namespace App\Http\Controllers\Panel;

use App\Models\Categories;
use App\Models\Game;
use App\Models\GameMode;
use App\Models\Rated;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GameController extends BaseController
{
    use BasePattern;

    public function __construct()
    {
        $this->title = 'Oyun Yönetimi';
        $this->page = 'game';
        $this->model = Game::class;
        $this->upload = 'games';
        $this->view = 'game';

        $this->view = (object)[
        'breadcrumb' => [
            'Oyunlar' => route('panel.game_list')
        ]
    ];
        
        parent::__construct();
    }

    public function form(Request $request, $unique = NULL)
    {
        if (!is_null($unique)) {
            $item = $this->model::find((int)$unique);
        } else {
            $item = new $this->model;
        }

        $categories = \App\Models\Categories::all();
        $gameModes = \App\Models\GameMode::all();
        $rateds = \App\Models\Rated::all();

        return view("panel.$this->page.form", compact('item', 'categories', 'gameModes', 'rateds'));
    }

    public function saveHook(Request $request)
    {
        $params = $request->all();
        $params['slug'] = Str::slug($request->name);

        if ($request->has('rated_id')) {
        $params['rated_id'] = $request->rated_id;
    }
        
        return $params;
    }

    public function saveBack($obj)
    {
        if (request()->has('categories')) {
            $obj->categories()->sync(request()->categories);
        } else {
            $obj->categories()->detach();
        }

        if (request()->has('game_modes')) {
            $obj->gameModes()->sync(request()->game_modes);
        } else {
            $obj->gameModes()->detach();
        }

        return redirect()->route("panel." . $this->page . "_list")->with('success', 'Oyun başarıyla kaydedildi.');
    }
}