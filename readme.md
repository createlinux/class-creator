# 安装
```shell
composer require createlinux/class-creator
```

# 类文件生成器
```php
例如我们生成一个Doctor的类，设置命名空间后，设置医生模型，类名称注释为医生
use \Createlinux\ClassCreator\Builders\Basic\VisibilityIdentify;

$doctorBuilder = create_class_builder("Doctor", "App\\Http\\Controllers", "医生");
//创建store方法
$storeMethod = $doctorBuilder->createMethod("store", VisibilityIdentify::protected);
$storeMethod
    //为store方法创建一个参数，名称为name，默认值为空或者输入张三
    ->createArgument('name', "张三")
    //设置参数类型
    ->getDataType()    
    ->pushInt()
    ->pushCallable()
    ->pushNull();
print_r($doctorBuilder->getOutputPlainText());
```
输出
```php
<?php
namespace App\Http\Controllers;

/**
* @class 医生
*
*/
class Doctor
{

    protected function store(string|int|callable|null $name = '张三')
    {
    }

}


```