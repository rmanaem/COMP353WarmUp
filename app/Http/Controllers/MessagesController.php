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

        DB::table('Message')
            ->where('id', '=', $id)
            ->update(['MessageRead' => 1]);
        $message = DB::table('Message')
            ->join('MessageTemplate', 'MessageTemplate.id', '=', 'Message.templateid')
            ->select('Message.ID as ID', 'Message.DateTime as DateTime', 'MessageTemplate.Subject as Subject', 'Message.Text as Text')
            ->where('Message.ID', '=', $id)
            ->first();
        
        return view ('/messageDetails', [
            'message' => $message,
            'alerts' => $alerts
        ]);
    }

    public function delete($id) {
        $alerts = [];
        try {
            DB::table('Message')->delete($id);
        } catch(\Illuminate\Database\QueryException $ex) {
            $message = $ex->getMessage();
            array_push($alerts, [
                'type' => 'danger',
                'text' => "Query exception: $message"
            ]);
        }
        
        return $this->FetchData($alerts);
    }

    private function FetchData($alerts) {
        $account = Helpers\LoginHelper::GetAccount();

        $messages = DB::table('Message')
            ->join('MessageTemplate', 'MessageTemplate.id', '=', 'message.templateid')
            ->where('PersonID', '=', $account->ID)
            ->select('Message.id as ID', 'Message.PersonID as PersonID', 'Message.MessageRead as Read', 'Message.DateTime as DateTime', 'MessageTemplate.Subject as Subject')
            ->orderByDesc('Message.datetime')
            ->get();
        
        return view ('/messages', [
            'messages' => $messages,
            'alerts' => $alerts
        ]);
    }
}