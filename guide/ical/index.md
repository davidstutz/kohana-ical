# iCal

The module allows to use [fangel/SG-iCalendar](https://github.com/fangel/SG-iCalendar/blob/master/demo/index.php)
comfortably without manually loading the involved classes. An exampl eis given below.
Further examples can be found at [fangel/SG-iCalendar](https://github.com/fangel/SG-iCalendar/blob/master/demo/index.php).

    $ical = new SG_iCal($directory . $filename);
    $events = $ical->getEvents();

    foreach ($events as $event) {
        print $event->getProperty('summary') . ': ' . $event->getStart() . ' ' . $event->getEnd() . '<br>';
    }