@source_parser
Feature: Methods
  In order to parse source code correctly
  As a developer
  I need to be sure methods are properly detected & parsed

  Scenario: Class without any methods
    Given source file contains:
    """
    <?php
    namespace MyVendor;
    class Something{}
    """
    When I parse it
    Then result has 0 methods


  Scenario: Class with constructor will have 1 method
    Given source file contains:
    """
    <?php
    namespace MyVendor;
    class Something{
      public function __construct(){}
    }
    """
    When I parse it
    Then result has 1 methods

  Scenario: Getter will be detected correctly
    Given source file contains:
    """
    <?php
    namespace MyVendor;
    class Something{
      public function getA(){}
    }
    """
    When I parse it
    Then result has 1 methods

  Scenario: "Is" getter for booleans will be detected
    Given source file contains:
    """
    <?php
    namespace MyVendor;
    class Something{
      private $a;
      public function isA(){}
    }
    """
    When I parse it
    Then result has 1 methods

  Scenario: "Has" getter for booleans will be detected
    Given source file contains:
    """
    <?php
    namespace MyVendor;
    class Something{
      private $a;
      public function hasA(){}
    }
    """
    When I parse it
    Then result has 1 methods

