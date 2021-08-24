<?php require("admin/vt.php");?>
<!doctype html>
<html lang="tr">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" style="width: 128px; height: 128px;" href="img/logo1.png" type="image/x-icon" />
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
 <link rel="stylesheet" href="css.css">
 <link rel="stylesheet" href="sidebar.css">
 <link rel="preconnect" href="https://fonts.gstatic.com">
<link rel="preconnect" href="https://fonts.gstatic.com">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
 <link rel="stylesheet" href="css.css">
 <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=MuseoModerno:wght@100;200;300&display=swap" rel="stylesheet">

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@100;200;300&display=swap" rel="stylesheet">
  <title>noon mimarlık</title>
</head>
<style>
    .card {
            height: 350px;
            transition: 300ms;
            overflow-y: hidden;
            
            box-shadow: rgba(0, 0, 0, 0.07) 0px 1px 1px, rgba(0, 0, 0, 0.07) 0px 2px 2px, rgba(0, 0, 0, 0.07) 0px 4px 4px, rgba(0, 0, 0, 0.07) 0px 8px 8px, rgba(0, 0, 0, 0.07) 0px 16px 16px;
        }
        
        .card:hover {
          box-shadow: 5px 10px 18px black;
            transform: scale(1.05);
        }
        
        .card-img-top {
            size: cover;
        }
        .nav-link{
          transition: 300ms;
        }
        
        .nav-link:hover{
          transform: scale(1.1);
        }
        p{
         font-size:16px;
         font-weight:599;
          
        }
        .navbar-brand {
    margin-left: 0px;
}
body{
  font-family: 'Exo 2', sans-serif;
  }
  .card-img-top{
      
      overflow: hidden;
  }
  </style>
<body>
  
<div class="sidenav" id="sidebarNav">
        <a href="javascript:void(0)" class="closeBtn" onclick="closeNav()">&times;</a>
        <a href="index.php">ANA SAYFA</a>
        <a href="hakkinda.php">BİZ KİMİZ?</a>
        <a href="iletisim.php">İLETİŞİM</a>
        
    </div>
    <div class="navbar">
        <div class="clsbtn">
    <span class="open" id="btn" onclick="openNav()">&#9776; </span>
    </div>
    <a href="index.php"> <img class="logo1" src="img/logo2kck.png" width="auto" height="75px" title="Atolye Noon" alt="Atolye Noon"></a>
   
    <a href="index.php" id="logo">
        <img src="img/logo1.png" width="auto" height="50px" title="Atolye Noon" alt="Atolye Noon" loading="lazy">
       
      </a>
      
    </div>
   
    


    <script>
        function openNav() {
            document.getElementById("sidebarNav").classList.toggle("active");
            document.getElementById("sidebarNav").style.width = "250px";
           document.getElementById("btn").style.display="none";
        }

        function closeNav() {
            

            document.getElementById("sidebarNav").classList.toggle("active");
            document.getElementById("sidebarNav").style.width = "0";
            document.getElementById("btn").style.display="block";


        }
    </script>
  <div class="container" style="margin-top: 80px;">