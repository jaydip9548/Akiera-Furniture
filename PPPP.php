<?php
session_start();
$_SESSION['jay'] = "jaydip";

if(isset($_SESSION['jay'])){
    echo "Session Set";
}
