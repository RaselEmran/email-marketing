<?php
function validEmail($garbaseEmail){
    function myfunction($email)
    {
        $a = trim($email);
        if (!filter_var($a, FILTER_VALIDATE_EMAIL)) {
            // invalid emailaddress
        } else {
            return $a;
        }
    }

    $validEmail=array_map("myfunction",$garbaseEmail);
    $validEmail =  array_unique($validEmail);

    if (array_search("",$validEmail)) {
        $position = array_search("",$validEmail);
        unset($validEmail[$position]);
    }
    return $validEmail;
}

function validEmailForFile($data){
    $results = [];
    $email_unique_arr = [];

    array_walk($data, function($value, $key) use (&$results, &$email_unique_arr){
        if (filter_var($value['email'], FILTER_VALIDATE_EMAIL)) {
            if(! in_array($value['email'], $email_unique_arr)) {
                $results[] = $value;
                $email_unique_arr[] = $value['email'];
            }
        }
    });

    return $results;
}

function validEmailNumber($group_id, $par){
    return \App\Models\EmailList\EmailList::where('group_id', $group_id)->where($par, 1)->count();
}

function invalidEmailNumber($group_id, $par){
    return \App\Models\EmailList\EmailList::where('group_id', $group_id)->where($par, 2)->count();
}