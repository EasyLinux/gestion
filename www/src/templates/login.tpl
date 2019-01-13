{config_load file='login.txt'}
<!DOCTYPE html>
<html lang="{#lang#}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" href="favicon.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{#Title#}</title>
    <meta name="description" content="{#content#}">
    <meta name="author" content="Serge NOEL">
    <link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="src/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="vendor/components/jqueryui/themes/base/jquery-ui.css">
    <script src="vendor/components/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="vendor/components/jqueryui/jquery-ui.min.js" type="text/javascript"></script>

    <link href="src/css/login.css" rel="stylesheet">
    <script src="src/javascript/login.js" type="text/javascript"></script>
  </head>
  <body >
    <div class="container">    
      <div id="loginbox" class="mainbox col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3"> 
        <div class="panel panel-default" >
          <div class="panel-heading">
            <div class="panel-title text-center">{#panelTitle#}</div>
          </div>
          <div class="panel-body" >
            <form name="form" id="form" class="form-horizontal">
              <input type="hidden" name="action" value="tryLogin" />
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input name="sLogin" id="sLogin" type="text" class="form-control" value="" placeholder="{#User#}">
              </div>
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                <input id="password" type="password" class="form-control" name="password" placeholder="{#Password#}">
              </div>
              <div class="form-group">
                <!-- Button -->
                <div class="col-sm-12 controls">
                  <button type="button" class="btn btn-primary pull-right" onclick="jsLogin();">
                    <i class="glyphicon glyphicon-log-in"></i> {#Login#}</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-12">&nbsp;</div>
    <div class="col-md-12 AlertBox" id='bAlert'>
      <div class="alert alert-dismissable alert-danger AlertMsg" id="divAlert">
        <h4 id="msgAlert"></h4> 
      </div>
    </div>

  </body>
</html>