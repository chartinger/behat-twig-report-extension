Feature: Scenario Outlines

    Scenario Outline: Feeding a dog
    
        Given I am holding <food>
        When i give it to my dog
        Then she will be <mood>

    Examples:
        | food  | mood    |
        | meat  | happy   |
        | onion | sad     |
        | candy | happy   |
        | treat | excited |

    Scenario Outline: No Outline
    
    Examples:
    
    Scenario Outline: Crossvariable
        Given I have a cross variable <var1>
        When I do something with <var2>
        Then i sill have <var1>
    
    Examples:
      | var1    | var2    |
      | Test1-1 | Test1-2 |
      | Test2-1 | Test2-2 |