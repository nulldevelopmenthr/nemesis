@source_parser
Feature: Imports
  In order to parse source code correctly
  As a developer
  I need to be sure all imports are correctly parsed

  Scenario: Single imported class is correctly parsed
    Given source file contains:
    """
    namespace MyVendor;
    use AnotherNamespace\MyValueObject;
    class Something{}
    """
    When I parse it
    Then result has 1 import
    Then result will have this imports:
      | className                      |
      | AnotherNamespace\MyValueObject |


  Scenario: Multiple imported class is correctly parsed
    Given source file contains:
    """
    namespace MyVendor;
    use AnotherNamespace\MyValueObject;
    use AnotherNamespace\Money;
    use AnotherNamespace\Currency;
    use DateTime;
    class Something{}
    """
    When I parse it
    Then result has 4 imports
    Then result will have this imports:
      | className                      |
      | AnotherNamespace\MyValueObject |
      | AnotherNamespace\Money         |
      | AnotherNamespace\Currency      |
      | DateTime                       |


  Scenario: Imports will work for class without namespaces too
    Given source file contains:
    """
    use AnotherNamespace\MyValueObject;
    use DateTime;
    class Something{}
    """
    When I parse it
    Then result has 2 imports
    Then result will have this imports:
      | className                      |
      | AnotherNamespace\MyValueObject |
      | DateTime                       |


  @todo: maybe it shouldnt be?

  Scenario: Import alias will be disregarded
    Given source file contains:
    """
    namespace MyVendor;
    use AnotherNamespace\MyValueObject as Money;
    class Something{}
    """
    When I parse it
    Then result has 1 import
    Then result will have this imports:
      | className                      |
      | AnotherNamespace\MyValueObject |


