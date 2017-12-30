<?php

$finder = PhpCsFixer\Finder::create()
    ->in('spec')
    ->in('src')
    ->in('tests');

return PhpCsFixer\Config::create()
    ->setRiskyAllowed(true)
    ->setRules(array(
        '@Symfony' => true,
        'array_syntax' => ['syntax' => 'short'],
        'declare_strict_types' => true,
        'binary_operator_spaces' => [
            'default' => 'align_single_space_minimal',
        ],
        'ordered_imports' => true,
        'phpdoc_order' => true,
        'php_unit_test_class_requires_covers' => true,
        'phpdoc_add_missing_param_annotation' => true,
        'psr4' => false,
        'single_line_comment_style' => true,
        'align_multiline_comment' => true,
        'doctrine_annotation_array_assignment' => true,
        'general_phpdoc_annotation_remove' => true,
        'no_unreachable_default_argument_value' => true,
        'no_useless_else' => true,
        'no_useless_return' => true,
        'class_attributes_separation' => ['const', 'method', 'property']

    ))
    ->setCacheFile(__DIR__.'/vendor/.php_cs.cache')
    ->setFinder($finder)
;
