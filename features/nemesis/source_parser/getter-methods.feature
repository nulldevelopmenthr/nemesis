@source_parser
Feature: Getter methods
  In order to parse source code correctly
  As a developer
  I need to be sure getter methods are properly detected & parsed

  Scenario: Class without any methods
    Given source file contains:
    """
    <?php
    namespace MyVendor;
    class Something{}
    """
    When I parse it
    Then result has 0 getter methods


  Scenario: Class constructor is not getter
    Given source file contains:
    """
    <?php
    namespace MyVendor;
    class Something{
      public function __construct(){}
    }
    """
    When I parse it
    Then result has 0 getter methods

  Scenario: Some random function is not considered getter
    Given source file contains:
    """
    <?php
    namespace MyVendor;
    class Something{
      public function doSomething(){}
    }
    """
    When I parse it
    Then result has 0 getter methods

  Scenario: "Get" getter will be detected
    Given source file contains:
    """
    <?php
    namespace MyVendor;
    class Something{
      private $a;
      public function __construct($a){}
      public function getA(){}
    }
    """
    When I parse it
    Then result has 1 getter methods
    Then result will have this getterMethods:
      | className | propertyName | getterName |
      |           | a            | getA       |

  Scenario: "Is" getter for booleans will be detected
    Given source file contains:
    """
    <?php
    namespace MyVendor;
    class Something{
      private $a;
      public function __construct($a){}
      public function isA(){}
    }
    """
    When I parse it
    Then result has 1 getter methods
    Then result will have this getterMethods:
      | className | propertyName | getterName |
      |           | a            | isA        |

  Scenario: "Has" getter for booleans will be detected
    Given source file contains:
    """
    <?php
    namespace MyVendor;
    class Something{
      private $a;
      public function __construct($a){}
      public function hasA(){}
    }
    """
    When I parse it
    Then result has 1 getter methods
    Then result will have this getterMethods:
      | className | propertyName | getterName |
      |           | a            | hasA       |


  Scenario: None of the getters will be detected as there are no properties matching getter names
    Given source file contains:
    """
    <?php
    namespace MyVendor;
    class Something{
      public function getA(){}
      public function isB(){}
      public function hasC(){}
    }
    """
    When I parse it
    Then result has 0 getter methods


  Scenario: Class with constructor argument, property and getter defined will be detected
    Given source file contains:
    """
    <?php
    namespace MyVendor;
    class Something{
      private $a;
      public function __constructor($a){}
      public function getA(){}
    }
    """
    When I parse it
    Then result has 1 getter methods
    Then result will have this getterMethods:
      | className | propertyName | getterName |
      |           | a            | getA       |


  Scenario: Class with property and getter defined will be detected
    Given source file contains:
    """
    <?php
    namespace MyVendor;
    class Something{
      private $a;
      public function getA(){}
    }
    """
    When I parse it
    Then result has 1 getter methods
    Then result will have this getterMethods:
      | className | propertyName | getterName |
      |           | a            | getA       |

  Scenario: It will detect property type from getters return type
    Given source file contains:
    """
    <?php
    namespace MyVendor;
    class Something{
      private $a;
      private $b;
      private $c;
      public function getA() : \DateTime{}
      public function isB() : bool{}
      public function hasC() : bool{}
    }
    """
    When I parse it
    Then result has 3 getter methods
    Then result will have this getterMethods:
      | className | propertyName | getterName |
      | DateTime  | a            | getA       |
      | bool      | b            | isB        |
      | bool      | c            | hasC       |


  Scenario: It will detect property type from constructor
    Given source file contains:
    """
    <?php
    namespace MyVendor;
    class Something{
      private $a;
      private $b;
      private $c;
      public function __construct(\DateTime $a, bool $b, $c){}
      public function getA(){}
      public function isB(){}
      public function hasC(){}
    }
    """
    When I parse it
    Then result has 3 getter methods
    Then result will have this getterMethods:
      | className | propertyName | getterName |
      | DateTime  | a            | getA       |
      | bool      | b            | isB        |
      |           | c            | hasC       |

