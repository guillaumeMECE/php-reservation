<?php
function display()
{
    echo "hello ".$_POST["path"];
}
if(isset($_POST['submit']))
{
   display();
}
?>
