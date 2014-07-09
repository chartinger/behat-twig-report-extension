Feature: Test

Scenario: First Test
    Then Nothing

Scenario: Second Test
    Then Nothing

Scenario: Mixed Test
    Given Error
    Then Skipped

Scenario: Pending Test
    Given Pending
    Then Skipped

Scenario: Pending Only
    Given Pending

Scenario: Empty Scenario
    