@phpparser_source_parser @reflection_source_parser
Feature: Getter methods
  In order to parse source code correctly
  As a developer
  I need to be sure getter methods are properly detected & parsed

  Scenario: Class without any methods
    Given source file contains:
    """
    namespace MyVendor;
    class Something300{}
    """
    When I parse it
    Then result has 0 getter methods


  Scenario: Class constructor is not getter
    Given source file contains:
    """
    namespace MyVendor;
    class Something305{
      public function __construct(){}
    }
    """
    When I parse it
    Then result has 0 getter methods

  Scenario: Some random function is not considered getter
    Given source file contains:
    """
    namespace MyVendor;
    class Something310{
      public function doSomething(){}
    }
    """
    When I parse it
    Then result has 0 getter methods

  Scenario: "Get" getter will be detected
    Given source file contains:
    """
    namespace MyVendor;
    class Something315{
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
    namespace MyVendor;
    class Something320{
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
    namespace MyVendor;
    class Something325{
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
    namespace MyVendor;
    class Something330{
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
    namespace MyVendor;
    class Something335{
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


  Scenario: Class without property in constuctor will not be detected
    Given source file contains:
    """
    namespace MyVendor;
    class Something340{
      private $a;
      public function getA(){}
    }
    """
    When I parse it
    Then result has 0 getter methods

  Scenario: It will detect property type from getters return type
    Given source file contains:
    """
    namespace MyVendor;
    class Something345{
      private $a;
      private $b;
      private $c;
      public function __construct($a,$b,$c){}
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
    namespace MyVendor;
    class Something350{
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


  Scenario: It skips getter methods that are not public
    Given source file contains:
    """
    namespace MyVendor;
    class Something355{
      private $a;
      private $b;
      public function __construct(\DateTime $a, bool $b){}
      private function getA() : \DateTime{}
      protected function isB() : bool{}
    }
    """
    When I parse it
    Then result has 0 getter methods

  Scenario: It skips getters for properties not set in constructor
    Given source file contains:
    """
    namespace MyVendor;
    class Something360{
      private $a;
      private $b;
      private $c;
      public function __construct(\DateTime $a){}
      public function getA(){}
      public function isB(){}
      public function hasC(){}
    }
    """
    When I parse it
    Then result has 1 getter methods
    Then result will have this getterMethods:
      | className | propertyName | getterName |
      | DateTime  | a            | getA       |


  Scenario: It skips getters when constructor is private
    Given source file contains:
    """
    namespace MyVendor;
    class Something365{
      private $a;
      private $b;
      private $c;
      private function __construct(\DateTime $a,$b,$c){}
      public function getA(){}
      public function isB(){}
      public function hasC(){}
    }
    """
    When I parse it
    Then result has 0 getter methods

  Scenario: It skips getters when constructor is protected
    Given source file contains:
    """
    namespace MyVendor;
    class Something375{
      private $a;
      private $b;
      private $c;
      private function __construct(\DateTime $a,$b,$c){}
      public function getA(){}
      public function isB(){}
      public function hasC(){}
    }
    """
    When I parse it
    Then result has 0 getter methods
