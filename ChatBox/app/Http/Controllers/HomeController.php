<?php

namespace App\Http\Controllers;

use App\Chat;
use App\Friend;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // GETTING AUTHENTICATED USER ID
        $user_id = Auth::user()->id;

        // GETTING ALL THE FRIENDS_LIST OF THE AUTHENTICATED USER
        $friends = DB::select('SELECT * FROM users INNER JOIN friends on users.id = friends.friend_id AND friends.user_id = :user_id ORDER BY friend_id' , ['user_id' => $user_id] );

        // NOW, GETTING ALL THE PROFILES OF THAT FRIENDS
        $profiles = DB::select('SELECT * FROM profiles INNER JOIN friends  on profiles.user_id = friends.friend_id AND friends.user_id = :user_id ORDER BY friend_id' , ['user_id' => $user_id] );

        // ************************************************* // FRIENDS LIST COMPLETE

        // GETTING ALL THE AUTHENTICATED USER INFORMATION
        $user = Auth::user();

        // ************************************************ // MY PROFILE COMPLETED

        // GETTING ALL THE CHAT LISTS ID's IN ORDER WISE BUT IT IS NOT DISTINICT( AND IT CAN'T BE DISTISNIT BY ADDING THE KEYWORD OF DISTINT)
        $unordered_chats_list = DB::select('SELECT sender_id, reciever_id FROM chats WHERE chats.sender_id = :user_id1 OR chats.reciever_id = :user_id2 ORDER BY created_at DESC', ['user_id1' => $user_id, 'user_id2' => $user_id]);

        // Now,
        $chats_list = $this->process_of_chat_list_professionally($unordered_chats_list);
        // CHAT LIST Completed

        $chats_lists_detail = $this->process_of_chat_list_detail_professionally($chats_list);
        // CHATS LIST DETAIL COMPLETED

        #print_r($unordered_chats_list);


        #foreach ($chats_lists_detail as $chat_list_detail_key => $chat_list_detail){
        #    if ($chat_list_detail_key == 215){
        #        for ($i=0; $i<=count($chats_lists_detail[215])-1; $i++  ){
        #            print_r($chats_lists_detail[215][$i]->text);
        #        }
        #    }
        #}



        #return $chats_list;
        $data = array(
            'friends' => $friends,
            'profiles' => $profiles,
            'user' => $user,
            'chats_list' => $chats_list,
            'chats_list_detail' => $chats_lists_detail,
        );
        return view('home')->with($data);
    }



    public function process_of_chat_list_detail_professionally($chats_list){
        $user_id = Auth::user()->id;
        $list = [];
        foreach ($chats_list as $chats_list){
            $list += [ "$chats_list->id" =>  DB::select('SELECT DISTINCT * FROM chats  WHERE (chats.reciever_id = :reciever_id1 AND chats.sender_id = :sender_id1) OR (chats.sender_id = :sender_id2 AND chats.reciever_id = :reciever_id2)', ['reciever_id1' => $user_id, 'sender_id1' => $chats_list->id, 'sender_id2' =>$user_id,  'reciever_id2' =>$chats_list->id ])];

        }
        return $list;
    }

    public function process_of_chat_list_professionally($unordered_chats_list){
        $all_list = [];

        foreach ($unordered_chats_list as $list){
            if ($list->sender_id !=1){
                if (count($all_list) == 0){
                    array_push($all_list,$list->sender_id);
                }
                elseif (count($all_list)>0){
                    if (($all_list[count($all_list)-1]) != ($list->sender_id)){
                        array_push($all_list,$list->sender_id);
                    }
                }
            }
            elseif ($list->reciever_id !=1){
                if (count($all_list) == 0){
                    array_push($all_list,$list->reciever_id);
                }
                elseif (count($all_list)>0){
                    if (($all_list[count($all_list)-1]) != ($list->reciever_id)){
                        array_push($all_list,$list->reciever_id);
                    }
                }
            }

        }
        $sql = DB::select('SELECT * 
          FROM `users` 
         WHERE `id` IN (' . implode(',', array_map('intval', $all_list)) . ') ');
        return $sql;
    }

    public function store(Request $request)
    {
        $sender_id = Auth::user()->id;
        $chat = new Chat();
        $chat->sender_id = $sender_id;
        $chat->reciever_id = $request->reciever_id;
        $chat->text = $request->text;
        $chat->is_read = 1;
        $chat->save();
        $data = array(
            'flash_message' => 'Data is created Successfully,.....'
        );
        return response()->json($data);
    }
}
