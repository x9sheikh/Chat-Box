<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatoController extends Controller
{
    public function store(Request $request)
    {
        $chat = new Chat();
        $chat->sender_id = $request->sender_id;
        $chat->reciever_id = $request->reciever_id;
        $chat->text = $request->text;
        $chat->is_read = 1;
        $chat->save();
        $data = array(
            'flash_message' => 'Data is created Successfully'
        );
        return response()->json($data);
    }
}
