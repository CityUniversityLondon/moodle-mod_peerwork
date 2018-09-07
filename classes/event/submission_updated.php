<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * The submission_updated event.
 *
 * @package    mod_peerassessment
 * @copyright  2015 Amanda Doughty
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace mod_peerassessment\event;

defined('MOODLE_INTERNAL') || die();

/**
 * The mod_peerassessment submission created event class.
 *
 * @property-read array $other {
 *      Extra information about the event.
 *
 *      - int groupid: The group ID.
 * }
 *
 * @package    mod_peerassessment
 * @since      Moodle 2.8
 * @copyright  2015 Amanda Doughty
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class submission_updated extends \core\event\base {

    protected function init() {
        // This is c(reate), r(ead), u(pdate), d(elete).
        $this->data['crud'] = 'u';
        $this->data['edulevel'] = self::LEVEL_PARTICIPATING;
        $this->data['objecttable'] = 'peerassessment_submission';
    }

    public static function get_name() {
        return get_string('eventsubmission_updated', 'mod_peerassessment');
    }

    public function get_url() {
        return new \moodle_url(
            '/mod/peerassessment/view.php',
            array(
                'id' => $this->contextinstanceid
                )
            );
    }

    public function get_description() {
        $descriptionstring = "The user with id '$this->userid' updated a submission in the" .
            " peerassessment with course module id '$this->contextinstanceid'";
        if (!empty($this->other['groupid'])) {
            $descriptionstring .= " for the group with id '{$this->other['groupid']}'.";
        } else {
            $descriptionstring .= ".";
        }

        return $descriptionstring;
    }

    /**
     * Custom validation.
     *
     * @throws \coding_exception
     * @return void
     */
    protected function validate_data() {
        parent::validate_data();
        if (!isset($this->other['groupid'])) {
            throw new \coding_exception('The \'groupid\' value must be set in other.');
        }
    }
}