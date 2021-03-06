<?php
/*1、对变量的判断*/

// $this 是一个特殊的变量，它不能被赋值。 

//变量默认总是传值赋值，也可以引用赋值
//isset() 语言结构可以用来检测一个变量是否已被初始化;如果 var 存在并且值不是 NULL 则返回 TRUE，否则返回 FALSE。

$var = '';

// 结果为 TRUE，所以后边的文本将被打印出来。
if (isset($var)) {
    echo "This var is set so I will print.";
}

echo "<br />";

/*
empty支持变量和表达式。
当var存在，并且是一个非空非零的值时返回 FALSE 否则返回 TRUE. 
*/
if (empty($var)) {
    echo "This var is set empty I will print.";
}

$var = 0;

// Evaluates to true because $var is empty
if (empty($var)) {
    echo '$var is either 0, empty, or not set at all';
}

// Evaluates as true because $var is set
if (isset($var)) {
    echo '$var is set even though it is empty';
}

echo "<br />";

/*变量范围，也就是它的生效范围
大部分的 PHP 变量只有一个单独的范围。
1、这个单独的范围也包含了 include 和 require 引入的文件。
2、在用户自定义函数中，一个局部函数范围将被引入。任何用于函数内部的变量按缺省情况将被限制在局部函数范围内。
*/

// PHP 的全局变量和 C 语言有一点点不同，在 C 语言中，全局变量在函数中自动生效，除非被局部变量覆盖。
//PHP 中全局变量在函数中使用时必须声明为 global
$a = 1; /* global scope */

function Test()
{ 
    $a = 2;
    echo $a; /* reference to local scope variable */
}

Test();

echo "<br />";

//超全局变量
//$GLOBALS : 引用全局作用域中可用的全部变量，$GLOBALS 是一个超全局变量
//$GLOBALS 是一个关联数组，每一个变量为一个元素，键名对应变量名，值对应变量的内容。
$b = 2;

function Sum()
{
    $GLOBALS['b'] = $GLOBALS['a'] + $GLOBALS['b'];
}

Sum();
echo $b;
/*
PHP 中的变量用一个美元符号后面跟变量名来表示。变量名是区分大小写的。
一个有效的变量名由字母或者下划线开头，后面跟上任意数量的字母，数字，或者下划线。按照正常的正则表达式，它将被表述为：'[a-zA-Z_\x7f-\xff]	[a-zA-Z0-9_\x7f-\xff]*'。
PHP支持传值赋值和引用赋值，使用引用赋值，简单地将一个 & 符号加到将要赋值的变量前（源变量）。
虽然在 PHP 中并不需要初始化变量，但这是个好习惯。未初始化的变量具有其类型的默认值 - FALSE，零，空字符串或者空数组。 
PHP 超全局变量：
$GLOBALS 包含一个引用指向每个当前脚本的全局范围内有效的变量。该数组的键名为全局变量的名称。  

$_GET 经由 URL 请求提交至脚本的变量。
$_POST 经由 HTTP POST 方法提交至脚本的变量。
$_COOKIE 经由 HTTP Cookies 方法提交至脚本的变量。
$_FILES 经由 HTTP POST 文件上传而提交至脚本的变量。
$_ENV 执行环境提交至脚本的变量。
$_REQUEST  经由 GET，POST 和 COOKIE 机制提交至脚本的变量，因此该数组并不值得信任。所有包含在该数组中的变量的存在与否以及变量的顺序          均按照 php.ini 中的 variables_order 配置指示来定义。
$_SESSION 当前注册给脚本会话的变量。



-----------------------------------------------
$_POST
$_POST 变量用于收集来自 method="post" 的表单中的值。
$_POST 变量用于收集来自 method="post" 的表单中的值。从带有 POST 方法的表单发送的信息，对任何人都是不可见的（不会显示在浏览器的地址栏），并且对发送信息的量也没有限制。

为什么使用 $_POST？

    通过 HTTP POST 发送的变量不会显示在 URL 中。
    变量没有长度限制。

不过，由于变量不显示在 URL 中，所有无法把页面加入书签。

-----------------------------------------------
$_REQUEST 变量

PHP 的 $_REQUEST 变量包含了 $_GET, $_POST 以及 $_COOKIE 的内容。
PHP 的 $_REQUEST 变量可用来取得通过 GET 和 POST 方法发送的表单数据的结果。



12、变量范围
变量的范围即它定义的上下文背景（也就是它的生效范围。大部分的 PHP 变量只有一个单独的范围。这个单独的范围跨度同样包含了 include 和 require 引入的文件。这里变量 $a 将会在包含文件 b.inc 中生效。但是，在用户自定义函数中，一个局部函数范围将被引入。任何用于函数内部的变量按缺省情况将被限制在局部函数范围内。PHP 中全局变量在函数中使用时必须申明为全局。 注意global的使用位置
$GLOBALS 替代 global，在 $GLOBALS 数组中，每一个变量为一个元素，键名对应变量名，值对应变量的内容。
静态变量：静态变量仅在局部函数域中存在，但当程序执行离开此作用域时，其值并不丢失。静态变量可以提供了一种处理递归函数的方法。
在一个函数域内部用 global 语句导入的一个真正的全局变量实际上是建立了一个到全局变量的引用。

13、可变变量：一个变量的变量名可以动态的设置和使用。使用了两个美元符号（$）,一个可变变量获取了一个普通变量的值作为这个可变变量的变量名。
<?php
$a = 'hello';
$$a = 'world';  //两个变量都被定义了：$a 的内容是“hello”并且 $hello 的内容是“world”。
?>
要将可变变量用于数组，必须解决一个模棱两可的问题。这就是当写下 $$a[1] 时，解析器需要知道是想要 $a[1] 作为一个变量呢，还是想要 $$a 作为一个变量并取出该变量中索引为 [1] 的值。解决此问题的语法是，对第一种情况用 ${$a[1]}，对第二种情况用 ${$a}[1]。 
具体怎么使用，还要实践实践。

14、PHP之外的变量
HTML表单，IMAGE SBUMIT变量名，HTTP COOKIES
*/

//静态变量 
//静态变量仅在局部函数域中存在，但当程序执行离开此作用域时，其值并不丢失。

function test1()
{
    static $a = 0;
    echo $a."<br />";
    $a++;
}
//变量 $a 仅在第一次调用 test() 函数时被初始化，之后每次调用 test() 函数都会输出 $a 的值并加一。 
//静态声明是在编译时解析的。 
test1();
test1();

//可变变量
//可变变量就是一个变量的变量名可以动态的设置和使用

//一个可变变量获取了一个普通变量的值作为这个可变变量的变量名。下面的例子中 hello //使用了两个美元符号（$）以后，就可以作为一个可变变量的变量了。
$c = 'hello';	
$$c = 'world';

echo "$c ${$c}";
echo "$c $hello";
/*
使用花括号来给属性名清晰定界: 当写下 $$a[1] 时，解析器需要知道是想要 $a[1] 作为一个变量呢，还是想要 $$a 作为一个变量并取出该变量中索引为 [1] 的值。解决此问题的语法是，对第一种情况用 ${$a[1]}，对第二种情况用 ${$a}[1]。 
*/

/*
类的属性也可以通过可变属性名来访问。可变属性名将在该调用所处的范围内被解析。例如，对于 $foo->$bar 表达式，则会在本地范围来解析 $bar 并且其值将被用于 $foo 的属性名。对于 $bar 是数组单元时也是一样。 
*/
class foo {
    var $bar = 'I am bar.';
    var $arr = array('I am A.', 'I am B.', 'I am C.');
    var $r   = 'I am r.';
}

$foo = new foo();
$bar = 'bar';
$baz = array('foo', 'bar', 'baz', 'quux');
echo $foo->$bar."\n";
echo $foo->$baz[1]."\n";

$start = 'b';
$end   = 'ar';
echo $foo->{$start.$end}."\n";

$arr = 'arr';
echo $foo->$arr[1]."\n";
echo $foo->{$arr}[1]."\n";



//在 PHP 的函数和类的方法中，超全局变量不能用作可变变量。$this 变量也是一个特殊变量，不能被动态引用。 


//确定变量类型 
/*
因为 PHP 会判断变量类型并在需要时进行转换（通常情况下），因此在某一时刻给定的变量是何种类型并不明显。PHP 包括几个函数可以判断变量的类型，例如：gettype()，is_array()，is_float()，is_int()，is_object() 和 is_string()。参见类型一章。 

不要使用 gettype() 来测试某种类型，因为其返回的字符串在未来的版本中可能需要改变。此外，由于包含了字符串的比较，它的运行也是较慢的。 
使用 is_* 函数代替。
*/

/*
返回值为bool 型，ture 、 false
is_array()，is_float()，is_int()，is_object() 和 is_string()
*/























