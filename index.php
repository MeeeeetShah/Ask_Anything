<!DOCTYPE html>
<html lang="en">

<head>
   <title>Ask Anything</title>
   <?php include('./client/commonFiles.php') ?>
</head>

<body>
<?php
   session_start();
   include('./client/header.php');

   if (isset($_GET['signup']) && (!isset($_SESSION['user']['username']) || !$_SESSION['user']['username'])) {
      include('./client/signup.php');

   } else if (isset($_GET['login']) && (!isset($_SESSION['user']['username']) || !$_SESSION['user']['username'])) {
      include('./client/login.php');

   } else if (isset($_GET['ask'])) {
      include('./client/ask.php');

   } else if (isset($_GET['q-id'])) { // Check if 'q-id' exists
      $qid = $_GET['q-id'];
      include('./client/question-details.php');

   } else if (isset($_GET['c-id'])) { // Check if 'c-id' exists
      $cid = $_GET['c-id'];
      include('./client/questions.php');

   } else if (isset($_GET['u-id'])) { // Check if 'u-id' exists
      $uid = $_GET['u-id'];
      include('./client/questions.php');

   } else if (isset($_GET['latest'])) { // Check if 'latest' exists
      include('./client/questions.php');

   } else if (isset($_GET['search'])) { // Check if 'search' exists
      $search = $_GET['search'];
      include('./client/questions.php');

   } else {
      include('./client/questions.php');
   }
?>
</body>

</html>
