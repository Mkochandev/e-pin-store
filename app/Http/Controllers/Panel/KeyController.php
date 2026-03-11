<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Key;
use App\Models\Game;

class KeyController extends BaseController
{
    use BasePattern;

    public function __construct()
    {
        $this->title = 'Key Yönetimi';
        $this->page = 'key';
        $this->model = Key::class;
        $this->upload = 'keys';
        $this->view = 'key';

        $this->view = (object)[
            'breadcrumb' => [
                'Oyun Anahtarları' => route('panel.key_list')
            ]
        ];

        parent::__construct();
    }

    public function listQuery($query)
    {
        return $query->with(['game', 'platform']);
    }

    public function save(Request $request, $unique = NULL)
    {
        if ($request->has('keys') && !empty(trim($request->keys))) {
            $keys = preg_split('/\r\n|\r|\n/', $request->keys);
            $count = 0;

            foreach ($keys as $keyCode) {
                $trimmedKey = trim($keyCode);
                if (!empty($trimmedKey)) {
                    $this->model::create([
                        'platform_id' => $request->platform_id,
                        'game_id'     => $request->game_id,
                        'key_code'    => $trimmedKey,
                        'price'       => $request->price,
                        'is_sold'     => 0,
                        'user_id' => null,
                    ]);
                    $count++;
                }
            }
            return redirect()->route("panel." . $this->page . "_list")
                ->with('success', $count . ' adet anahtar başarıyla eklendi.');
        }

        $item = is_null($unique) ? new $this->model : $this->model::find((int)$unique);
        if (!$item) {
            return redirect()->back()->with('error', 'Kayıt bulunamadı.');
        }
        $item->fill($request->all());
        $item->save();

        return $this->saveBack($item);
    }

    public function form(Request $request, $unique = NULL)
    {
        if (!is_null($unique)) {
            $item = $this->model::find((int)$unique);
        } else {
            $item = new $this->model;
        }

        $games = \App\Models\Game::all();
        $platforms = \App\Models\Platform::all();

        return view("panel.$this->page.form", compact('item', 'games', 'platforms'));
    }

    public function saveBack($obj)
    {

        return redirect()->route("panel." . $this->page . "_list")->with('success', 'Oyun anahtarı başarıyla kaydedildi.');
    }
}
