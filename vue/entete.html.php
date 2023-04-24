<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <title>AP3.1</title>
        <style type="text/css">
            @import url("css/test.css");
        </style>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    </head>
    <body>
<section id="sidebar">
<h1 class="brand"> Anabase <h1>
<ul class="side-menu">
    <?php
if (strpos($_SERVER['REQUEST_URI'], "activite") !== false) {
    ?>
        <li><a href="./?controleur=activite" class="active" style="text-decoration:none">Activités</a></li>
        <?php
}else{
    ?>
<li><a href="./?controleur=activite" class="activeN" style="text-decoration:none">Activités</a></li>
    <?php
}
?>
    <?php
if (strpos($_SERVER['REQUEST_URI'], "participation" ) !== false || strpos($_SERVER['REQUEST_URI'], "congressiste" ) !== false) {
    ?>
         <li><a href="./?controleur=participation" class="participation" style="text-decoration:none" >Participation activite</a></li>
        <?php
}else{
    ?>
 <li><a href="./?controleur=participation" class="participationN" style="text-decoration:none" >Participation activite</a></li>
    <?php
}
?>
        </ul>
    </nav>

</section>
