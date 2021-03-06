<?php // BUILD: Remove line

/**
 * A simple Factory for converting a section/data pair into the
 * corrosponding block-object. If the section isn't known a simple
 * ArrayObject is used instead.
 *
 * @package SG_iCalReader
 * @author Morten Fangel (C) 2008
 * @license http://creativecommons.org/licenses/by-sa/2.5/dk/deed.en_GB CC-BY-SA-DK
 */
class SG_iCal_Factory {
	/**
	 * Returns a new block-object for the section/data-pair. The list
	 * of returned objects is:
	 *
	 * vcalendar => SG_iCal_VCalendar
	 * vtimezone => SG_iCal_VTimeZone
	 * vevent => SG_iCal_VEvent
	 * * => ArrayObject
	 *
	 * @param $ical SG_iCalReader The reader this section/data-pair belongs to
	 * @param $section string
	 * @param SG_iCal_Line[]
	 */
	public static function factory( SG_iCal $ical, $section, $data ) {
		switch( $section ) {
			case "vcalendar":
				return new SG_iCal_VCalendar(SG_iCal_Line::Remove_Line($data), $ical );
			case "vtimezone":
				return new SG_iCal_VTimeZone(SG_iCal_Line::Remove_Line($data), $ical );
			case "vevent":
				return new SG_iCal_VEvent($data, $ical );

			default:
				return new ArrayObject(SG_iCal_Line::Remove_Line((array) $data) );
		}
	}
}
