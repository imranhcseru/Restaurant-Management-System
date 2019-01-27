<?php
    $user_email = Session::get('user_email');
    if(!$user_email){
        return redirect()->back();
    }else{
 ?>

@extends('back_end.layout')

    <?php }?>