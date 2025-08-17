@extends('errors::minimal')

<?php $pos = strrpos($exception->getMessage(), "ErrorMessage"); ?>
<?php $len = strlen($exception->getMessage()); ?>
<?php $rest = substr($exception->getMessage(), $pos-$len-1); ?>

@section('title', __('Server Error'))
@section('code', '500')
@section('message', __($rest ))