    <div class="col-md-12">
    	<nav class="navbar navbar-default" role="navigation">
        <ul class="nav navbar-nav">
{foreach from=$Menu item=MenuItem}
	{if $MenuItem->Type == "Item"}
    	<li><a href="{$MenuItem->Ref}" onClick='{$MenuItem->Action}' id='{$MenuItem->Id}'>{$MenuItem->Label}</a> </li>
  {else}
        <li class="dropdown">
          		<a data-toggle="dropdown" href="#" id='{$MenuItem->Id}'>{$MenuItem->Title} <b class="caret"></b></a>
          		<ul class="dropdown-menu">
    {foreach from=$MenuItem->Items item=SubItem}
      {if $SubItem->Action == "divider"}
      				<li class="divider"></li>
      {else}
              <li><a onClick='{$SubItem->Action}' href="{$SubItem->Ref}" id='{$SubItem->Id}' >{$SubItem->Label}</a></li>
      {/if}
    {/foreach}
          </ul>
        </li>
  {/if}
{/foreach}
        </ul>
  		</nav>
    </div>