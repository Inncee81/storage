<!--

Name: Anselmo D. Oduca 
Course: BSIT - 2nd Year
Subject: ITMC231 - Platform Technologies
Mideterm Requirement

Honor Code:

This is my own work and I have not received any unauthorized help in completing this. I have not copied from my classmate, friend, nor any unauthorized resource. I am well aware of the policies stipulated in the handbook regarding academic dishonesty. If proven guilty, I won't be credited any points for this endeavor.



-->

<?php
	session_start();
	unset($_SESSION['sess_user']);
	session_destroy();
	header("Location: katoari.php");
?>