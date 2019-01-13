/**
 * Exit program (logout)
 * 
 */
/**
 * call Ajax to release Php session
 */
function Quit()
{
  $.post("src/Ajax/Quit.php",retQuit);
}

/**
 * When session is destroyed, reload page, to force login prompt
 */
function retQuit()
{
  location.reload();
}

$(function() {
  $('#jsTree').on('dblclick', '.jstree-anchor', function (e) {
    console.log(e.target.id);
  });
});


function Callback(operation, node, parent, position, more) 
{
  if(operation === "copy_node" || operation === "move_node") 
    {
    if(parent.id === "#") 
      {
      return false; // prevent moving a child above or below the root
      }
    }
  return true; // allow everything else 
}

function SendMail()
{
  alert('Envoi mail');
}