<?php

use Core\Token\Token;

include HEADER;

if (isset($content))
    foreach ($content as $index => $post) {
?>
    <h2><?= $post->title; ?></h2>
    <p><?= $post->content; ?></p>
<?php
    }
echo $pagination ?? null;

$token = Token::fetch()->data;
?>
<form action="api/user/signup" method="post">
    <label for="username">نام کاربری</label>
    <input type="text" name="username" id="username">
    <label for="password">رمز عبور</label>
    <input type="password" name="password" id="password">
    <input type="submit" value="ثبت نام">
</form>
<span id="signupResult"><?= $token->signupErrorMessage ?? null; ?></span>
<?php
if (!isset($token->userId) || !isset($token->roleId) || $token->roleId !== 2) {
?>
    <br><br>
    <form action="api/user/login" method="post">
        <input type="text" name="username" placeholder="نام کاربری">
        <input type="password" name="password" placeholder="رمز عبور">
        <input type="submit" value="ورود">
    </form>
    <span id="loginResult"><?= $token->loginErrorMessage ?? null; ?></span>
<?php
}
include FOOTER;
