<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="row">
    <div class="col-md-3">
      <div class="navbar-header">
        <button type="button" class="sidebar-toggle">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Monkey Admin</a>
      </div>
    </div>
    <div class="col-md-9">
      <form class="navbar-form navbar-left">
        <div class="form-group">
          <input id="admin-search" type="text" class="typeahead" placeholder="Buscar">
        </div>
      </form>

      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <span class="on_browser_show">Administrador <b class="caret"></b></span>
            <span class="admin-menu on_browser_hide">
              <span class="icon-square"></span>
              <span class="icon-square"></span>
              <span class="icon-square"></span>
            </span>
          </a>
          <ul class="dropdown-menu">
            <li><a href="#settings"><span class="glyphicon glyphicon-cog"></span> Configuración</a></li>
            <li class="divider"></li>
            <li class="dropdown-header">Session</li>
            <li><a href="#logout"><span class="glyphicon glyphicon-log-out"></span> Salir</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</div>
