<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Helpers;

class MessagesController extends Controller {
    public function index() {
        return $this->FetchData([]);
    }

    public function view($id) {
        $alerts = [];

        DB::table('messages')
            ->where('id', '=', $id)
            ->update(['message_read' => 1]);
            $messages = DB::table('messages')
            ->join('message_templates', 'message_templates.id', '=', 'messages.template_id')
            ->select('messages.id as id', 'messages.date_time as date_time', 'message_templates.subject as subject', 'messages.text as text')
            ->where('messages.id', '=', $id)
            ->first();
        
        return view ('/messagesDetails', [
            'messages' => $messages,
            'alerts' => $alerts
        ]);
    }

    public function delete($id) {
        $alerts = [];
        try {
            DB::table('messages')->delete($id);
        } catch(\Illuminate\Database\QueryException $ex) {
            $messages = $ex->getMessage();
            array_push($alerts, [
                'type' => 'danger',
                'text' => "Query exception: $messages"
            ]);
        }
        
        return $this->FetchData($alerts);
    }

    private function FetchData($alerts) {
        $account = Helpers\LoginHelper::GetAccount();

        $messagess = DB::table('messages')
            ->join('message_templates', 'message_templates.id', '=', 'messages.template_id')
            ->where('person_id', '=', $account->id)
            ->select('messages.id as id', 'messages.person_id as person_id', 'messages.message_read as read', 'messages.date_time as date_time', 'message_templates.subject as subject')
            ->orderByDesc('messages.date_time')
            ->get();
        
        return view ('/messages', [
            'messages' => $messagess,
            'alerts' => $alerts
        ]);
    }
}