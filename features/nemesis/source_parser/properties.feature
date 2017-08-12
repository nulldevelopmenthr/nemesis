@source_parser
Feature: Properties
  In order to parse source code correctly
  As a developer
  I need to be sure properties are properly parsed

  Scenario: Class without properties
    Given source file contains:
    """
    namespace MyVendor;
    class Something{}
    """
    When I parse it
    Then result has 0 properties


  Scenario: Class with properties of all visibilities
    Given source file contains:
    """
    namespace MyVendor;
    class Something{
      private $a;
      protected $b;
      public $c;
    }
    """
    When I parse it
    Then result has 3 properties
    Then result will have this properties:
      | className | name |
      |           | a    |
      |           | b    |
      |           | c    |

  Scenario: Constructor arguments will not be added as property by default
    Given source file contains:
    """
    namespace MyVendor;
    class Something{
      private $a;
      public function __construct(\DateTime $b){}
    }
    """
    When I parse it
    Then result has 1 properties
    Then result will have this properties:
      | className | name |
      |           | a    |


  Scenario: Since there is a property and constructor argument of same name, add constructor argument as a property so we know the class
    Given source file contains:
    """
    namespace MyVendor;
    class Something{
      private $a;
      public function __construct(\DateTime $a){}
    }
    """
    When I parse it
    Then result has 1 properties
    Then result will have this properties:
      | className | name |
      | DateTime  | a    |