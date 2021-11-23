<?php

namespace App\Http\Helpers;

use Illuminate\Support\Facades\DB;
use App\Http\Helpers;

class MessageHelper {
    public static function HasMessages() {
        $account = Helpers\LoginHelper::GetAccount();
        return DB::table('messages')
            ->where('person_id', '=', $account->id)
            ->where('message_read', '=', 0)
            ->exists();
    }

    public static function CreateMessage($person_id, $template_id, $data) {
        switch($template_id) {
            case 1:
                $message = MessageHelper::CreateMessageTemplateTestPositive($person_id, $data);
                break;
            case 2:
                $message = MessageHelper::CreateMessageTemplateTestNegative($person_id, $data);
                break;
            case 3:
                $message = MessageHelper::CreateMessageTemplateGroupZoneWarning($person_id, $data);
                break;
            case 4:
                $message = MessageHelper::CreateMessageTemplateReportDue($person_id, $data);
                break;
            case 5:
                $message = MessageHelper::CreateMessageTemplateAlertLevelChange($person_id, $data);
                break;
        }

        return DB::table('messages')->insert($message);
    }

    private static function CreateMessageTemplateTestPositive($person_id, $data) {
        $person = DB::table('people')->find($person_id);
        $template = DB::table('message_templates')->find(1);
        $recommendations = DB::table('recommendations')->get();

        $recommendString = '<ul>';
        foreach ($recommendations as $recommendation) {
            $recommendString .= '<li>' . $recommendation->text . '</li>';
        }
        $recommendString .= '</ul>';

        $text = $template->Template;
        $text = str_replace('{PersonName}', $person->first_name . ' ' . $person->last_name, $text);
        $text = str_replace('{PublicHealthCentreName}', $data['public_health_centre_name'], $text);
        $text = str_replace('{PCRTestDateOfTest}', $data['pcr_test_date_of_test'], $text);
        $text = str_replace('{url}', 'http://' . $_SERVER['HTTP_HOST'], $text);
        $text = str_replace('{Recommendations}', $recommendString, $text);

        return [
            'person_id' => $person_id,
            'template_id' => 1,
            'message_read' => 0,
            'text' => $text,
            'date_time' => date('Y-m-d')
        ];
    }

    private static function CreateMessageTemplateTestNegative($person_id, $data) {
        $person = DB::table('people')->find($person_id);
        $template = DB::table('message_templates')->find(2);

        $text = $template->Template;
        $text = str_replace('{PersonName}', $person->first_name . ' ' . $person->last_name, $text);
        $text = str_replace('{PublicHealthCentreName}', $data['public_health_centre_name'], $text);
        $text = str_replace('{PCRTestDateOfTest}', $data['pcr_test_date_of_test'], $text);
        $text = str_replace('{url}', 'http://' . $_SERVER['HTTP_HOST'], $text);

        return [
            'person_id' => $person_id,
            'template_id' => 2,
            'message_read' => 0,
            'text' => $text,
            'date_time' => date('Y-m-d')
        ];
    }

    private static function CreateMessageTemplateGroupZoneWarning($person_id, $data) {
        $person = DB::table('people')->find($person_id);
        $template = DB::table('message_templates')->find(3);

        $text = $template->Template;
        $text = str_replace('{PersonName}', $person->first_name . ' ' . $person->last_name, $text);

        return [
            'person_id' => $person_id,
            'template_id' => 3,
            'message_read' => 0,
            'text' => $text,
            'date_time' => date('Y-m-d')
        ];
    }

    private static function CreateMessageTemplateReportDue($person_id, $data) {
        $person = DB::table('people')->find($person_id);
        $template = DB::table('message_templates')->find(4);
        $recommendations = DB::table('recommendations')->get();

        $recommendString = '<ul>';
        foreach ($recommendations as $recommendation) {
            $recommendString .= '<li>' . $recommendation->text . '</li>';
        }
        $recommendString .= '</ul>';

        $text = $template->Template;
        $text = str_replace('{PersonName}', $person->first_name . ' ' . $person->last_name, $text);
        $text = str_replace('{url}', 'http://' . $_SERVER['HTTP_HOST'], $text);
        $text = str_replace('{Recommendations}', $recommendString, $text);

        return [
            'person_id' => $person_id,
            'template_id' => 4,
            'message_read' => 0,
            'text' => $text,
            'date_time' => date('Y-m-d')
        ];
    }

    private static function CreateMessageTemplateAlertLevelChange($person_id, $data) {
        $person = DB::table('people')->find($person_id);
        $template = DB::table('message_templates')->find(5);
        $alert = DB::table('alert_levels')->find($data['alert_level_id']);

        $text = $template->Template;
        $text = str_replace('{PersonName}', $person->first_name . ' ' . $person->last_name, $text);
        $text = str_replace('{RegionName}', $data['region_name'], $text);
        $text = str_replace('{AlertLevelid}', $data['alert_level_id'], $text);
        $text = str_replace('{AlertLevelName}', $alert->Name, $text);
        $text = str_replace('{AlertLevelDescription}', $alert->Description, $text);

        return [
            'person_id' => $person_id,
            'template_id' => 5,
            'message_read' => 0,
            'text' => $text,
            'date_time' => date('Y-m-d'),
            'new_alert_id' => $data['alert_level_id'],
            'old_alert_id' => $data['old_alert_id']
        ];
    }
}