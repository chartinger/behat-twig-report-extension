Feature: Step arguments

Scenario: display PyStrings

    Given I have a String:
    """
    <?
        // Sample PHP
        echo("Sample PHP File");
    ?>
    """
    Then nothing


Scenario: display normal arguments:

    Given i habe a parameter "test"
    Then nothing


Scenario: display table argument

    Given i have a table:
    | Title    | Message        |
    | Header 1 | Fist Message   |
    | Header 2 | Second Message |