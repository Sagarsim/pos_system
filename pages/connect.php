<?php

$conn=mysqli_connect("localhost","root","","intern"); 
if (!$conn) {
	die("Connection failed" . mysqli_connect_error());
}