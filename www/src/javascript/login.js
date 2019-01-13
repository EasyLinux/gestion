/**
 *
 * @author Serge NOEL <serge.noel@net6a.com>
 * @version 1.0
 * @description Creates a canvas based particle system background
 *
 * @license The MIT License (MIT)
 * 
 * Copyright (c) 2017 Serge NOEL <serge.noel@net6a.com>
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

/**
 * autoload
 * load dialog as a dialog
 */
$( function() {
  $( "#dialog" ).dialog({
      autoOpen: false,
      height: 400,
      width:  750,
      modal: true,
      show: {
        effect: "blind",
        duration: 500
      },
      hide: {
        effect: "explode",
        duration: 500
      }
    });
  // Enter key must launch jsLogin()
  $("form input").keypress(function (e) 
  {
    if ((e.which && e.which == 13) || (e.keyCode && e.keyCode == 13)) 
    {
      jsLogin();
      return false;
    } else {
      return true;
    }
  });
});

/** jsLogin
 * called when someone push on the login button
 * launch login.php 
 */
function jsLogin()
{
  var Credentials = {
    User: $('#sLogin').val(),
    Pass: $('#password').val()
    }
  Result = $.post("src/Ajax/Login.php",Credentials, loginResult);
}

function loginResult(datas)
{
  if( datas.indexOf('ERROR') !== -1)
    {
    $('#msgAlert').html(datas);
    $('#divAlert').fadeIn(500).delay(5000).fadeOut(500);		
    }
  else
    location.reload();
}

