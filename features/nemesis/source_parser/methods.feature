@phpparser_source_parser @reflection_source_parser
Feature: Methods
  In order to parse source code correctly
  As a developer
  I need to be sure methods are properly detected & parsed

  Scenario: Class without any methods
    Given source file contains:
    """
    namespace MyVendor;
    class Something500{}
    """
    When I parse it
    Then result has 0 methods


  Scenario: Class with constructor will have 1 method
    Given source file contains:
    """
    namespace MyVendor;
    class Something505{
      public function __construct(){}
    }
    """
    When I parse it
    Then result has 1 methods
    Then result will have this methods:
      | methodClass                                               | methodName    |
      | NullDev\Skeleton\Definition\PHP\Methods\ConstructorMethod | __constructor |

  Scenario: Getter will be detected correctly
    Given source file contains:
    """
    namespace MyVendor;
    class Something510{
      private $a;
      public function __construct($a){}
      public function getA(){}
    }
    """
    When I parse it
    Then result has 2 methods
    Then result will have this methods:
      | methodClass                                               | methodName    |
      | NullDev\Skeleton\Definition\PHP\Methods\ConstructorMethod | __constructor |
      | NullDev\Skeleton\Definition\PHP\Methods\GetterMethod      | getA          |

  Scenario: "Is" getter for booleans will be detected
    Given source file contains:
    """
    namespace MyVendor;
    class Something515{
      private $a;
      public function __construct($a){}
      public function isA(){}
    }
    """
    When I parse it
    Then result has 2 methods
    Then result will have this methods:
      | methodClass                                               | methodName    |
      | NullDev\Skeleton\Definition\PHP\Methods\ConstructorMethod | __constructor |
      | NullDev\Skeleton\Definition\PHP\Methods\GetterMethod      | isA           |

  Scenario: "Has" getter for booleans will be detected
    Given source file contains:
    """
    namespace MyVendor;
    class Something520{
      private $a;
      public function __construct($a){}
      public function hasA(){}
    }
    """
    When I parse it
    Then result has 2 methods
    Then result will have this methods:
      | methodClass                                               | methodName    |
      | NullDev\Skeleton\Definition\PHP\Methods\ConstructorMethod | __constructor |
      | NullDev\Skeleton\Definition\PHP\Methods\GetterMethod      | hasA          |


  Scenario: Non getter methods will be detected
    Given source file contains:
    """
    namespace MyVendor;
    class Something525{
      public function doSomething(){}
      public function doMore(){}
    }
    """
    When I parse it
    Then result has 2 methods
    Then result will have this methods:
      | methodClass                                           | methodName  |
      | NullDev\Skeleton\Definition\PHP\Methods\GenericMethod | doSomething |
      | NullDev\Skeleton\Definition\PHP\Methods\GenericMethod | doMore      |

  Scenario: __toString will be detected
    Given source file contains:
    """
    namespace MyVendor;
    class Something530{
      public function __toString(){}
    }
    """
    When I parse it
    Then result has 1 methods
    Then result will have this methods:
      | methodClass                                           | methodName |
      | NullDev\Skeleton\Definition\PHP\Methods\GenericMethod | __toString |

