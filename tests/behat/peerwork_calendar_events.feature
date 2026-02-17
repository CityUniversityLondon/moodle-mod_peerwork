@mod @mod_peerwork
Feature: Peerwork calendar entries
  In order to see upcoming peerwork due dates
  As a student
  I should see peerwork due dates in the course calendar

  Background:
    Given the following "users" exist:
      | username | firstname | lastname | email                |
      | student1 | Student   | One      | student1@example.com |
    And the following "courses" exist:
      | fullname | shortname |
      | Course 1 | C1        |
    And the following "course enrolments" exist:
      | user     | course | role    |
      | student1 | C1     | student |
    And the following "groups" exist:
      | course | name    | idnumber |
      | C1     | Group 1 | G1       |
    And the following "group members" exist:
      | user     | group |
      | student1 | G1    |

  Scenario: Student can see the peerwork due date in the course calendar
    Given the following "activity" exists:
      | activity           | peerwork                                    |
      | course             | C1                                          |
      | name               | Peerwork Activity                           |
      | fromdate           | ##first day of this month noon##            |
      | duedate            | ##first day of this month noon +24 hours##  |
    When I am on the "C1" Course page logged in as student1
    And I follow "Calendar" in the user menu
    Then I should see "Peerwork Activity"
