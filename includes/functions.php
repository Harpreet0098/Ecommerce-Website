<?php
    function confirm_query($result_set){
            //test for query
        if(!$result_set){
            die("Database query failed.");
        }
    }
?>