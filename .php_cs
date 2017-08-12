<?php

$finder = PhpCsFixer\Finder::create()
    ->in('spec')
    ->in('src')
    ->in('tests')
    ->notName('*.xml');

return PhpCsFixer\Config::create()
    ->setRiskyAllowed(true)
    ->setRules(array(
        '@Symfony' => true,
        'array_syntax' => ['syntax' => 'short'],
        'binary_operator_spaces' => [
            'align_double_arrow' => true,
            'align_equals' => true
        ],
        'ordered_imports' => true,
        'phpdoc_order' => true,
        'php_unit_test_class_requires_covers' => true,
        'phpdoc_add_missing_param_annotation' => true,
        'psr4' => true,
        'single_line_comment_style' => true,
        'align_multiline_comment' => true,
        'doctrine_annotation_array_assignment' => true,
        'general_phpdoc_annotation_remove' => true,
        'no_unreachable_default_argument_value' => true,
        'no_useless_else' => true,
        'no_useless_return' => true,

    ))
    ->setFinder($finder)
;
