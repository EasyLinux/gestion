{include file='header.tpl'}
  <!-- <link  href = "vendor/vakata/jstree/dist/themes/default/style.min.css" rel="stylesheet"> -->
  <link href="/src/css/style.css" rel="stylesheet">
  <!-- <script src = "vendor/vakata/jstree/dist/jstree.min.js"></script> -->

  <script src = "src/javascript/contextMenu.php"></script>  
  <script src = "src/javascript/main.js"></script>

</head>
<body>

  <div class="container-fluid" >

    <!-- Boîte modale de type Popup -->
    <div class="modal fade" id="popModal">
      <div class="modal-header">
        <a class="close" data-dismiss="modal">&times;&nbsp;&nbsp;</a>
        <h3 id="popTitle"></h3>
      </div>
      <div class="modal-body" id="popContent">

      </div>
      <div class="modal-footer">
        <a href="#" class="btn" data-dismiss="modal" id='popClose'>Fermer</a>
        <a href="#" class="btn btn-primary"  
           id='popAction' onClick='myValid();' >Enregistrer</a>
      </div>
    </div>
    <!-- /Boîte modale de type Popup -->

    <!-- Menu de l'application -->
    {include file='menu.tpl'}
    <!-- /Menu de l'application -->  

    <div class="col-md-12" >
<!--    <div class="col-md-12" id='jsTree'>&nbsp;</div> -->
    </div>
  </div> <!-- /container -->
  
{* Boîte d'affichage d'erreur *}
  <div class="col-md-12">&nbsp;</div>
	<div class="col-md-12 AlertBox" id='bAlert'>
		<div class="alert alert-dismissable alert-danger AlertMsg">
			<h4>Erreur</h4> 
			<span>Message d'erreur</span>
		</div>
	</div>
{* /Boîte d'affichage d'erreur *}

{include file='footer.tpl'}
