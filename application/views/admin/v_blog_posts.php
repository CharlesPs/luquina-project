<div class="row">
  <div class="col-md-3 sidebar-fixed">
    <?php echo $sidebar; ?>
  </div>
  
  <div class="col-md-9 col-md-offset-3 web-content" role="main">
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="page-header">
        <h1><?php echo $mod_title; ?></h1>
    </div>
        
        <ul class="breadcrumb">
            <li><a href="admin">Inicio</a> <span class="divider">/</span></li>
            <li class="active">Noticias</li>
        </ul>

        <div class="div-pagination pull-right">
            <?php echo $paginator; ?>
        </div>

                    <div class="row-fluid">

                        <div class="btn-toolbar">
                            <div class="btn-group text-right">
                                <a class="btn btn-primary" href="admin/blog/add">
                                    <span class="glyphicon glyphicon-plus"></span> Nueva
                                </a>
                            </div>
                        </div>

                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th width="20"><input type="checkbox" class="check-select-all"></th>
                                        <th>Título</th>
                                        <th width="200">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php
foreach($result as $row){
?>
                                    <tr>
                                        <td><input type="checkbox" id="<?php echo $row->entry; ?>"></td>
                                        <td><?php echo $row->title_es; ?></td>
                                        <td>
                                            <a href="admin/blog/edit/<?php echo $row->entry; ?>" class="btn">
                                                <i class="icon-edit"></i> Editar
                                            </a>
                                            <a href="admin/blog/delete/<?php echo $row->entry; ?>" class="btn btn-danger btn-delete">
                                                <i class="icon-trash icon-white"></i> Eliminar
                                            </a>
                                        </td>
                                    </tr>
<?php
}
?>                                    
                                </tbody>
                            </table>
                    </div>
  </div>
</div>
