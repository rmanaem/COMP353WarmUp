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

        DB::table('message')
            ->where('id', '=', $id)
            ->update(['messageread' => 1]);
        $message = DB::table('message')
            ->join('messagetemplate', 'messagetemplate.id', '=', 'message.templateid')
            ->select('message.id as ID', 'message.datetime as DateTime', 'messageTemplate.subject as Subject', 'message.text as Text')
            ->where('message.ID', '=', $id)
            ->first();
        
        return view ('/messageDetails', [
            'message' => $message,
            'alerts' => $alerts
        ]);
    }

    public function delete($id) {
        $alerts = [];
        try {
            DB::table('message')->delete($id);
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

        $messages = DB::table('message')
            ->join('messagetemplate', 'messagetemplate.id', '=', 'message.templateid')
            ->where('PersonID', '=', $account->ID)
            ->select('message.id as ID', 'message.personID as PersonID', 'message.messageread as Read', 'message.datetime as DateTime', 'messageTemplate.subject as Subject')
            ->orderByDesc('message.datetime')
            ->get();
        
        return view ('/messages', [
            'messages' => $messages,
            'alerts' => $alerts
        ]);
    }
}