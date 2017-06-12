{include file="header.tpl"}
{include file="nav.tpl"}
  <div class="row">
    <div class="filterProducts col-xs-12  col-lg-2 ">
      <h3>Filtrar por</h3>
     <ul>
       <li class="flecha">MARCAS</li>
        <ul>
          {foreach from=$lista item=categoria}
          <li><a href="producto/mostrarProductos/{$categoria['id_categoria']}">{$categoria['nombre']}</a></li>
          {/foreach}
          <li><a href="producto/mostrarProductos">Mostrar Todo</a></li>
        </ul>
        <li class="flecha">S.O</li>
        <ul>
          <li><a href="#">Android</a></li>
          <li><a href="#">Windows Phone</a></li>
        </ul>
        <li class="flecha">Precio</li>
        <ul>
          <li><a href="#">Menos de $4000</a></li>
          <li><a href="#">Entre $4000 y $8000</a></li>
          <li><a href="#">Más de $12000</a></li>
        </ul>
    </ul>
    </div>
    <div class="col-xs-12 col-lg-10">
      <div class="row encabezado">
        <h3>Equipos</h3>
      </div>
      <div class="nav-pagination row">
        <div class="col-xs-12 col-lg-3 ">
          <p class="center">Productos  {$init}{if $init!=$totalProd} -{$fin}{/if} de {$totalProd} </p>
        </div>
        <div class="col-xs-6 col-lg-3">
          <p class="center">Ordenar por</p>
        </div>
        <div class="col-xs-6 col- col-lg-2">
          <p class="center">Mostrar</p>
        </div>
        <div class="col-xs-12 col-lg-4">
          <div class="w3-bar">
            {if $init>1}<a href="" class="w3-button">&laquo;</a>{/if}
            <a href="producto/mostrarProductos?page=1" id="1"   class="w3-button">1</a>
            <a href="producto/mostrarProductos?page=2"   id="2" class="w3-button">2</a>
            <a href="producto/mostrarProductos?page=3"   id="3" class="w3-button">3</a>
            <a href="producto/mostrarProductos?page=4"   id="4" class="w3-button">4</a>
            {if $fin<$totalProd}
            <a href="producto/mostrarProductos?page={$num_prod_page}" class="w3-button">&raquo;</a>
            {/if}
          </div>
        </div>
      </div>
      {if $errores}
        <div class="col-xs-12 col-md-12 col-lg-12">
          <div>
             <span class="label label-danger">{$errores[0]|upper}</span>
          </div>
        </div>
      {/if}
      <div class="row">
        {foreach $productos item=producto}
        {if !$errores}
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
          <div class="thumbnail">
            <h3>{$producto['nombre']}</h3>
            <img src="images/celulares/Iphone7plus.jpg" alt="...">
            <div class="caption">
              <p>Precio en un Pago</p>
              <p>{$producto['precio']}</p>
              <p>Con Plan Control $420 x mes</p>
              <form  action="producto/comparar" method="post">
              <input id="{$producto['id_producto']}" type="checkbox" name="{$producto['id_producto']}"value="{$producto['id_producto']}">
              <label for="{$producto['id_producto']}">Comparar</label>
              <p><a href="producto/verDetalle/{$producto['id_producto']}" class="btn btn-primary" role="button">Ver Detalle</a>
              <a href="producto/eliminar/{$producto['id_producto']}" class="btn btn-default" role="button">Eliminar</a></p>
            </div>
          </div>
        </div>
        {/if}
        {/foreach}
      </div>
      <input type="submit" value="Comparar">
    </form>
      <div class="nav-pagination row">
        <div class="col-xs-12 col-lg-4 ">
          <p class="center">Productos 1-12 de 61</p>
        </div>
        <div class="col-xs-12 col-lg-offset-4 col-lg-4">
          <div class="w3-bar">
            <a href="#" class="w3-button">&laquo;</a>
            <a href="#" class="w3-button">1</a>
            <a href="#" class="w3-button">2</a>
            <a href="#" class="w3-button">3</a>
            <a href="#" class="w3-button">4</a>
            <a href="#" class="w3-button">&raquo;</a>
          </div>
        </div>
      </div>
    </div>
    </div>
{include file="footer.tpl"}
