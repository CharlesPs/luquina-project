
        <!-- Modal -->
        <div id="modal-frame-photos" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Seleccionar Foto</h3>
            </div>
            <div class="modal-body">

                <div class="modal-uploading hidden">
                    <ul class="breadcrumb">
                        <li><a class="btn btn-upload-back"><i class="icon-chevron-left"></i> Atras</a></li>
                    </ul>

                    <div class="upload-container"></div>

                    <div class="preview-container hidden"></div>
                </div>
                <div class="modal-tabs">
                    <ul class="nav nav-tabs" id="select-photos-tabs">
                        <li class="active"><a href="#upload">Cargar</a></li>
                        <li><a href="#paginas">Páginas</a></li>
                        <li><a href="#posts">Blog</a></li>
                        <li><a href="#galerias">Galerías</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="upload">

                            <input type="file" id="files" name="files[]" class="hidden" />
                            
                            <div class="upload-photo-container">
                                <div class="wc-icon-upload"></div>
                                <div class="wc-text-upload">Sube una foto desde tu computadora.</div>
                                <div class="wc-text-upload">Haz click aquí.</div>
                            </div>
                        </div>
                        <div class="tab-pane" id="paginas">
                            <div class="photos-from-web">
                                <div class="input-append">
                                    <input class="span4" id="search-paginas" type="text" placeholder="Introduzca un criterio de busqueda" />
                                    <button class="btn" id="btn-search-paginas" type="button">Buscar</button>
                                </div>

                                <h4 class="title">Últimas Fotos</h4>

                                <div class="photos-paginas-result"></div>
                            </div>
                        </div>
                        <div class="tab-pane" id="posts">
                            <div class="photos-from-web">
                                <div class="input-append">
                                    <input class="span4" id="search-blog" type="text" placeholder="Introduzca un criterio de busqueda" />
                                    <button class="btn" id="btn-search-blog" type="button">Buscar</button>
                                </div>

                                <h4 class="title">Últimas Fotos</h4>

                                <div class="photos-blog-result"></div>
                            </div>
                        </div>
                        <div class="tab-pane" id="galerias">
                            <div class="photos-from-web">
                                <div class="input-append">
                                    <input class="span4" id="search-galerias" type="text" placeholder="Introduzca un criterio de busqueda" />
                                    <button class="btn" id="btn-search-galerias" type="button">Buscar</button>
                                </div>

                                <h4 class="title">Últimas Fotos</h4>

                                <div class="photos-galerias-result"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="select-photo" class="btn btn-primary disabled" aria-hidden="true">
                    Selecciona una foto
                </button>
                <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
            </div>
        </div>
