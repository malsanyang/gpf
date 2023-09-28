<?php

namespace App\Listeners;

use ZeroDaHero\LaravelWorkflow\Events\EnteredEvent;
use ZeroDaHero\LaravelWorkflow\Events\EnterEvent;
use ZeroDaHero\LaravelWorkflow\Events\GuardEvent;
use Illuminate\Events\Dispatcher;
use ZeroDaHero\LaravelWorkflow\Events\LeaveEvent;

class CrimeWorkflowSubscriber
{
    /**
     * Handle workflow guard events.
     */
    public function onGuard(GuardEvent $event)
    {
    }

    /**
     * Handle workflow leave event.
     */
    public function onLeave(LeaveEvent $event)
    {
        // The event can also proxy to the original event
        $subject = $event->getSubject();
        // is the same as:
        //$subject = $event->getOriginalEvent()->getSubject();
    }

    /**
     * Handle workflow transition event.
     */
    public function onTransition($event)
    {

    }

    /**
     * Handle workflow enter event.
     */
    public function onEnter(EnterEvent $event)
    {

    }

    /**
     * Handle workflow entered event.
     */
    public function onEntered(EnteredEvent $event)
    {

    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  Dispatcher  $events
     */
    public function subscribe(Dispatcher $events): array
    {
        return [
            'workflow.crime_workflow.enter'      => 'onEnter',
            'workflow.crime_workflow.entered'    => 'onEntered',
            'workflow.crime_workflow.transition' => 'onTransition',
            'workflow.crime_workflow.leave'      => 'onLeave',
            'workflow.crime_workflow.guard'      => 'onGuard',
        ];
    }
}
