<?php

namespace App\Listeners;

use App\Events\ArticleCreated;
use App\Events\ArticleDeleted;
use App\Events\ArticleUpdated;
use Illuminate\Events\Dispatcher;
use Illuminate\Support\Facades\Notification;

class ArticleEventSubscriber
{
    public function handleArticleCreated(ArticleCreated $event): void
    {
        if($email = config('mail.to.address')) {
            Notification::route('mail', $email)
                ->notify(new \App\Notifications\ArticleCreated($event->article));
        }
    }

    public function handleArticleUpdated(ArticleUpdated $event): void
    {
        if($email = config('mail.to.address')) {
            Notification::route('mail', $email)
                ->notify(new \App\Notifications\ArticleUpdated($event->article));
        }
    }

    public function handleArticleDeleted(ArticleDeleted $event): void
    {
        if($email = config('mail.to.address')) {
            Notification::route('mail', $email)
                ->notify(new \App\Notifications\ArticleDeleted($event->article));
        }
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param Dispatcher $events
     * @return array
     */
    public function subscribe(Dispatcher $events): array
    {
        return [
          ArticleCreated::class => 'handleArticleCreated',
          ArticleUpdated::class => 'handleArticleUpdated',
          ArticleDeleted::class => 'handleArticleDeleted'
        ];
    }
}
