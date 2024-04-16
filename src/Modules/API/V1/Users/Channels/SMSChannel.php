<?php
declare(strict_types=1);

/**
 * @author Volodymyr Artjukh
 * @copyright 2024 Volodymyr Artjukh (vladimir.artjukh@gmail.com)
 */

namespace Modules\API\V1\Users\Channels;

use App\Models\User;
use Illuminate\Notifications\Notification;
use Modules\API\V1\Users\Services\InforuSMSService;

class SMSChannel
{
    /**
     * @param $notifiable
     * @param Notification $notification
     * @return void
     */
    public function send($notifiable, Notification $notification)
    {
        $message = $notification->toSMS($notifiable);

        if (config('external-apis.inforu.service_enabled') && $message && strlen($message) > 0 && $notifiable instanceof User) {
            $smsService = new InforuSMSService();
            $smsService->sendMessage($notifiable->phone, $message);
        }
    }
}
