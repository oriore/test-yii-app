<?php

// change the following paths if necessary
$yiit=dirname(__FILE__).'/../../../vendor/yiisoft/yii/framework/yiit.php';
$config=dirname(__FILE__).'/../config/test.php';

if (!class_exists('PHPUnit_Runner_Version') && class_exists('PHPUnit\Runner\Version')) {
    class_alias('\PHPUnit\Runner\Version', 'PHPUnit_Runner_Version');
}
    
if (!class_exists('PHPUnit_Framework_TestCase') && class_exists('PHPUnit\Framework\TestCase')) {
    class_alias('\PHPUnit\Framework\TestCase', 'PHPUnit_Framework_TestCase');
}

$yiiFiles = [
    __DIR__ . '/../../../vendor/yiisoft/yii/framework/test/CTestCase.php',
    __DIR__ . '/../../../vendor/yiisoft/yii/framework/test/CDbTestCase.php',
    __DIR__ . '/../../../vendor/yiisoft/yii/framework/test/CWebTestCase.php',
];

foreach($yiiFiles as $file) {
    if (file_exists($file)) {
        file_put_contents($file, str_replace(
            "protected function setUp()",
            "protected function\n\tsetUp(): void",
            file_get_contents($file)
        ));
    }
}

require_once($yiit);

Yii::createWebApplication($config);
