<?php
namespace App\Command;

use App\Components\Notification;
use Cake\Console\Arguments;
use Cake\Console\Command;
use Cake\Console\ConsoleIo;
use Cake\I18n\Time;
use Cake\ORM\Locator\TableLocator;

class ReminderCommand extends Command
{
    public function execute(Arguments $args, ConsoleIo $io)
    {
        $endTime = new Time('+30 minutes', 'CET');
        $startTime = new Time(null, 'CET');
        $schedulers = (new TableLocator)->get('Schedulers')->find()->where([
            'start_on >=' => $startTime->format('Y-m-d H:i:s'),
            'start_on <=' => $endTime->format('Y-m-d H:i:s'),
            'is_send' => false
        ])->toArray();

        $notification = new Notification();

        foreach ($schedulers as $scheduler) {
            $reminder = new Time("+{$scheduler->alert} minutes", 'CET');
            $startOn = new Time($scheduler->start_on->format('Y-m-d H:i:s'), 'CET');
            $diff = $startOn->getTimestamp() - $reminder->getTimestamp();

            if ($diff > 60 || $diff < 0) {
                continue;
            }

            $content = $startOn->format('H:i');
            $model = (new TableLocator)->get($scheduler->model)->get($scheduler->model_id);
            $device = (new TableLocator)->get('Devices')->find()->where(['user_id' => $scheduler->user_id])->first();

            if(!$notification->send($device->token, ['title' => $model->title, 'content' => "You have a scheduled event at {$content}."])) {
                $io->out($notification->getErrorMessage());
            }
            $schedulerTable = (new TableLocator)->get('Schedulers');
            $scheduler->is_send = true;
            $schedulerTable->save($scheduler);
        }
    }
}
