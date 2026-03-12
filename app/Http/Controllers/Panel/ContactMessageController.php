<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Models\ContactMessage;

class ContactMessageController extends BaseController
{
    use BasePattern;

    public function __construct()
    {
        $this->title = 'Gelen Mesajlar';
        $this->page = 'contact_message'; 
        $this->model = ContactMessage::class;
        $this->view = 'contact_message';

        $this->view = (object)[
            'breadcrumb' => [
                'İletişim Mesajları' => route('panel.contact_message_list')
            ]
        ];
        
        parent::__construct();
    }

    public function show($id)
    {
        $message = ContactMessage::findOrFail($id);
        
        $message->update(['is_read' => 1]);

        return view("panel.$this->page.detail", compact('message'));
    }
}