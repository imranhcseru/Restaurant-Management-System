<?php
    $user_email = Session::get('user_email');
    if(!$user_email){
        echo("You are not authorized to watch this section");
    }
 ?>

@extends('back_end.layout')