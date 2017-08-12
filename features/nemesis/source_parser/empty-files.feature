@phpparser_source_parser @reflection_source_parser
Feature: Empty files
  In order to parse source code correctly
  As a developer
  I need to be sure empty files return no results

  Scenario: Empty PHP file will give no results
    Given source file contains:
    """

    """
    When I parse it
    Then result is an empty array

  Scenario: File with only namespace will give no results
    Given source file contains:
    """
    namespace Vendor\Something;
    """
    When I parse it
    Then result is an empty array


  Scenario: File without class definitions will give no results
    Given source file contains:
    """
    namespace Vendor\Something;

    $a = 1;
    $b = 2;
    echo $a + $b;
    function myEcho($a){
       echo $a.PHP_EOL;
    }

    myEcho($a);

    """
    When I parse it
    Then result is an empty array




