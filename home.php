<!DOCTYPE html>
<html>
<title>Instituto Home</title>
<?php include("head.html"); ?>
<body>
	<div class="content-loggin">
	<?php include('header.html');?>
	<div class="row">
                            <a href="APP/controllers/controler.php?opcion=profesores">
                            <div class="col-md-2 col-sm-3 col-xs-12 center content_">
                                
                                <h3>
                                    Profesores
                                </h3>
                            </div>
                            </a>
                            <a href="APP/controllers/controler.php?opcion=cursos" name="cursos" id="cursos" >
                            <div class="col-md-2 col-sm-3 col-xs-12 center content_" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInLeft;">
                                
                                <h3 class="h3--mod h3--mod--skin">
                                    Cursos
                                </h3>
                            </div>
                            </a>
                            <a href="APP/controllers/controler.php?opcion=pagos" >
                            <div class="col-md-2 col-sm-3 col-xs-12 center content_" data-wow-delay="0.6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInLeft;">
                               
                                <h3 class="h3--mod h3--mod--skin">
                                    Pagos
                                </h3>
                            </div>
                            </a>
                            <a href="APP/controllers/controler.php?opcion=alumnos" >
                            <div class="col-md-2 col-sm-3 col-xs-12 center content_" data-wow-delay="0.6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInLeft;">
                                
                                <h3 class="h3--mod h3--mod--skin">
                                    Alumnos
                                </h3>
                            </div>
                            </a>
                        </div>
	</div>
</body>
</html>