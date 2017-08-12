@source_parser
Feature: Constructor
  In order to parse source code correctly
  As a developer
  I need to be sure constructor is properly parsed

  Scenario: Class without defined constructor will have no constructor method defined
    Given source file contains:
    """
    namespace MyVendor;
    use AnotherNamespace\MyValueObject;
    class Something{}
    """
    When I parse it
    Then result has no constructor method defined


  Scenario: Class with defined constructor will have constructor method defined
    Given source file contains:
    """
    namespace MyVendor;
    use AnotherNamespace\MyValueObject;
    class Something{
        public function __construct(){}
    }
    """
    When I parse it
    Then result has constructor method defined


  Scenario: Both constructor arguments without type will be parsed
    Given source file contains:
    """
    namespace MyVendor;
    use AnotherNamespace\MyValueObject;
    class Something{
        public function __construct($param1,$param2){}
    }
    """
    When I parse it
    Then result has 2 constructor parameters
    Then result will have this constructor parameters:
      | className | name   |
      |           | param1 |
      |           | param2 |

  Scenario: Constructor arguments will be parsed
    Given source file contains:
    """
    namespace MyVendor;
    use AnotherNamespace\MyValueObject;
    class Something{
        public function __construct(\DateTime $param1, MyValueObject $param2){}
    }
    """
    When I parse it
    Then result has 2 constructor parameters
    Then result will have this constructor parameters:
      | className                      | name   |
      | DateTime                       | param1 |
      | AnotherNamespace\MyValueObject | param2 |

  Scenario: Nullable constructor arguments will be parsed
    Given source file contains:
    """
    namespace MyVendor;
    use AnotherNamespace\MyValueObject;
    class Something{
        public function __construct(?\DateTime $param1, ?MyValueObject $param2){}
    }
    """
    When I parse it
    Then result has 2 constructor parameters
    Then result will have this constructor parameters:
      | className                      | name   |
      | DateTime                       | param1 |
      | AnotherNamespace\MyValueObject | param2 |


  Scenario: Scalar type constructor arguments will be parsed
    Given source file contains:
    """
    namespace MyVendor;
    use AnotherNamespace\MyValueObject;
    class Something{
        public function __construct(int $param1, string $param2, bool $param3, float $param4){}
    }
    """
    When I parse it
    Then result has 4 constructor parameters
    Then result will have this constructor parameters:
      | className | name   |
      | int       | param1 |
      | string    | param2 |
      | bool      | param3 |
      | float     | param4 |

  Scenario: Nullable scalar type constructor arguments will be parsed
    Given source file contains:
    """
    namespace MyVendor;
    use AnotherNamespace\MyValueObject;
    class Something{
        public function __construct(?int $param1, ?string $param2, ?bool $param3, ?float $param4){}
    }
    """
    When I parse it
    Then result has 4 constructor parameters
    Then result will have this constructor parameters:
      | className | name   |
      | int       | param1 |
      | string    | param2 |
      | bool      | param3 |
      | float     | param4 |


  Scenario: Array constructor arguments will be parsed
    Given source file contains:
    """
    namespace MyVendor;
    use AnotherNamespace\MyValueObject;
    class Something{
        public function __construct(array $param1){}
    }
    """
    When I parse it
    Then result has 1 constructor parameters
    Then result will have this constructor parameters:
      | className | name   |
      | array     | param1 |

  Scenario: Nullable array constructor arguments will be parsed
    Given source file contains:
    """
    namespace MyVendor;
    use AnotherNamespace\MyValueObject;
    class Something{
        public function __construct(?array $param1){}
    }
    """
    When I parse it
    Then result has 1 constructor parameters
    Then result will have this constructor parameters:
      | className | name   |
      | array     | param1 |


