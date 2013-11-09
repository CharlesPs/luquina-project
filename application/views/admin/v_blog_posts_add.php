<div class="row">
  <div class="col-md-3 sidebar-fixed">
    <?php echo $sidebar; ?>
  </div>
  
  <div class="col-md-9 col-md-offset-3 web-content" role="main" data-script="blog">
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="page-header">
        <h1><?php echo $mod_title; ?></h1>
    </div>
        
        <ul class="breadcrumb">
            <li><a href="admin">Inicio</a> <span class="divider">/</span></li>
            <li><a href="admin/blog">Noticias</a> <span class="divider">/</span></li>
            <li class="active"><?php echo $mod_title; ?></li>
        </ul>

        <div class="row-fluid">

            <div class="btn-toolbar">
                <div class="btn-group text-right">
                    <a class="btn btn-primary btn-preview" href="#preview">
                        <span class="glyphicon glyphicon-search"></span> Vista Previa
                    </a>
                </div>
                <div class="btn-group text-right">
                    <a class="btn btn-success btn-submit" href="#save">
                        <span class="glyphicon glyphicon-floppy-disk"></span> Guardar
                    </a>
                </div>
                <div class="btn-group text-right">
                    <a class="btn btn-warning btn-cancel" href="#cancel">
                        <span class="glyphicon glyphicon-floppy-remove"></span> Cancelar
                    </a>
                </div>
            </div>

            <ul class="nav nav-tabs" id="admin-tabs">
                <li class="active"><a href="#tab1">General</a></li>
                <li><a href="#tab2">Español</a></li>
                <li><a href="#tab3">Inglés</a></li>
            </ul>

            <form class="form-horizontal" id="form-save">

                <div class="tab-content">

                    <input type="hidden" id="entry" value="" />

                    <div class="tab-pane active" id="tab1">

                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="active" /> Activo
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail1" class="col-lg-2 control-label">Foto</label>
                            <div class="col-lg-10">

                                <input type="hidden" id="idPhoto" value="0" />

                                <span class="selected-photo hidden">No image</span>



                                <button class="btn btn-select-photo">
                                    <i class="icon-picture"></i> 
                                    Elegir Foto
                                </button>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword1" class="col-lg-2 control-label">Etiquetas</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="tags" placeholder="Etiquetas">
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab2">

                        <div class="form-group">
                            <label for="caption_es" class="col-lg-2 control-label">Bajada</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="caption_es" placeholder="Escribe una bajada">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="title_es" class="col-lg-2 control-label">Título</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="title_es" placeholder="Escribe un título">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="intro_es" class="col-lg-2 control-label">Introducción</label>
                            <div class="col-lg-10">
                                <textarea class="form-control" id="intro_es" placeholder="Escribe una breve introducción"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="intro_es" class="col-lg-2 control-label">Contenido</label>
                            <div class="col-lg-10">
                                <div class="">
                                    <textarea class="form-control form-wysihtml5" id="content_es" rows="50"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab3">

                        <div class="form-group">
                            <label for="caption_en" class="col-lg-2 control-label">Bajada</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="caption_en" placeholder="Escribe una bajada">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="title_en" class="col-lg-2 control-label">Título</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="title_en" placeholder="Escribe un título">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="intro_en" class="col-lg-2 control-label">Introducción</label>
                            <div class="col-lg-10">
                                <textarea class="form-control" id="intro_en" placeholder="Escribe una breve introducción"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="intro_en" class="col-lg-2 control-label">Contenido</label>
                            <div class="col-lg-10">
                                <div class="">
                                    <textarea class="form-control form-wysihtml5" id="content_en" rows="50"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
