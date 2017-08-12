@phpparser_source_parser @reflection_source_parser
Feature: Class name
  In order to parse source code correctly
  As a developer
  I need to be sure class name is detected correctly

  Scenario: Class inside namespace
    Given source file contains:
    """
    namespace MyVendor;
    class Something101{}
    """
    When I parse it
    Then result is an instance of "MyVendor\Something101"

  Scenario: Class doesnt have to be in a namespace
    Given source file contains:
    """
    class Something102{}
    """
    When I parse it
    Then result is an instance of "Something102"
