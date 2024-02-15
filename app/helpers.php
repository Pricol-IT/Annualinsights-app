<?php 
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
// use Illuminate\Support\Carbon;
 
if (! function_exists('authUser')) {
    function authUser()
    {
        return auth()->user();
    }
}