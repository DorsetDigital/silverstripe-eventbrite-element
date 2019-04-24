<?php

namespace DorsetDigital\Elements;

use DNADesign\Elemental\Models\BaseElement;
use DorsetDigital\SilverStripeEventBrite\DataObject\Event;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\NumericField;

class EventsCalendar extends BaseElement
{
    private static $singular_name = 'Events Calendar';
    private static $plural_name = 'Events Calendars';
    private static $description = 'Adds a list of current events';
    private static $table_name = 'DDE_EventBrite';

    private static $db = [
        'ShowOnlyLive' => 'Boolean(1)',
        'NumberToShow' => 'Int',
        'ShowPastEvents' => 'Boolean(0)'
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->addFieldsToTab('Root.Main', [
            NumericField::create('NumberToShow')
                ->setTitle(_t(__CLASS__ . '.NumEventsTitle', 'Number of events to show'))
                ->setDescription(_t(__CLASS__ . '.NumEventsDesc', 'Leave blank or set to 0 to show all events')),
            CheckboxField::create('ShowOnlyLive')->setTitle(_t(__CLASS__ . '.ShowLive', 'Show only live events')),
            CheckboxField::create('ShowPastEvents')->setTitle(_t(__CLASS__ . '.ShowPast',
                'Show events which have passed'))
        ]);
        return $fields;
    }

    public function getType()
    {
        return 'Events Calendar';
    }

    /**
     * Get events based on the element settings
     * @return \SilverStripe\ORM\DataList
     */
    public function getEvents() {
        $filters = [];
        if ($this->ShowOnlyLive == 1) {
            $filters['Status'] = 'live';
        }
        if ($this->ShowPastEvents == 1) {
            $filters['Start:GreaterThan'] = DBDatetime::now();
        }

        $limit = ($this->NumberToShow > 0) ? $this->NumberToShow : 10000;
        $events = Event::get()->filter($filters)->limit($limit);

        return $events;
    }
}