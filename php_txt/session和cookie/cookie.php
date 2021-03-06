<?php

/*
1. 记录用户访问的部分信息
2. 在页面间传递变量
3. 将所查看的internet页存储在cookies临时文件夹中，可以提高以后的浏览速度。

创建cookie：
	setcookie(string cookiename , string value , int expire);
读取cookie：
	通过超级全局数组$_COOKIE来读取浏览器端的cookie的值。
删除cookie：有两种方法
	1.手工删除方法：
	右击浏览器属性，可以看到删除cookies，执行操作即可将所有cookie文件删除。
	2.setcookie()方法：
	跟设置cookie的方法一样，不过此时讲cookie的值设置为空，有效时间为0或小于当前时间戳。
	

PHP 透明地支持 HTTP cookie。cookie 是一种在远程浏览器端储存数据并以此来跟踪和识别用户的机制。可以用 setcookie() 或 setrawcookie()函数来设置cookie。cookie是HTTP标头的一部分，因此setcookie()函数必须在其它信息被输出到浏览器前调用，这和对 header() 函数的限制类似。可以使用输出缓冲函数来延迟脚本的输出，直到按需要设置好了所有的 cookie 或者其它 HTTP 标头。 
cookie是存在客户端上的一小段数据，浏览器（即客户端）通过HTTP协议和服务器端进行cookie交互。
cookie独立于语言存在，在客户端（如js）均能读取到。PHP是实现对cookie的间接操作，即发送HTTP指令，浏览器收到指令便操作cookie并返回给服务器。实际上PHP并没有真正设置过cookie，它只是发出命令让浏览器来做这件事而已。
Cookie是由浏览器实现和管理的。

在PHP中可使用setcookie()或setrawcookie()函数设置cookie。
*/


