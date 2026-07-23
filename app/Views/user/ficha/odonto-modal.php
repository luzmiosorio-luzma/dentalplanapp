<!-- Modal Odontograma-->
<div class="modal fade p-0" id="modalOdontograma" tabindex="-1" aria-labelledby="modalOdontogramaLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg n-box n-body n-border h-auto">
        <div class="modal-content n-body border-0 n-border">
            <div class="modal-header text-white">
                <h5 class="modal-title n-color" id="modalOdontogramaLabel">Registrar item odontograma</h5>
                <button type="button" class="btn-close n-color" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex flex-column">
                <div class="col-12 d-flex align-items-start justify-content-center flex-column flex-md-row">
                    <div class="col-12 col-md-8 d-flex align-items-center justify-content-center flex-column">
                        <div class="col-12 d-flex align-items-center justify-content-center">
                            <h4 id="top-word">V</h4>
                        </div>
                        <div class="col-12 d-flex align-items-center justify-content-center flex-row">
                            <div class="col-1 d-flex align-items-center justify-content-center">
                                <h4 id="left-word">D</h4>
                            </div>
                            <div class="d-flex align-items-center justify-content-center">
                                <svg viewBox="0 0 27 27" class="sd-odontograma-dente__faces piece_detail" pre_selected="false">
                                    <path d="M18.2439 18.2354L24.0947 24.0999C20.7001 27.4945 13.9521 24.7899 13.4002 24.7899C12.8228 24.7899 6.08666 27.4945 2.70581 24.0999C4.85848 21.9473 6.16935 20.6433 8.57728 18.2354H18.2368H18.2439Z"
                                          class="cara_item_space"
                                          data-area="area1"></path>
                                    <path d="M8.58244 18.2344C6.27799 20.5112 5.03609 21.7531 2.71097 24.0989C-0.683593 20.7182 2.02103 13.9564 2.02103 13.4045C2.02103 12.7836 -0.683593 6.09093 2.71097 2.71008L8.57557 8.58155V18.2411L8.58244 18.2344Z"
                                          class="cara_item_space"
                                          data-area="area2"></path>
                                    <path d="M8.5815 8.57556C6.27705 6.278 5.05583 5.0361 2.73071 2.71098C6.12528 -0.683584 12.8733 2.02103 13.4251 2.02103C14.0026 2.02101 20.7387 -0.683584 24.1196 2.71098C21.9669 4.86365 20.656 6.16762 18.2481 8.57556H8.58854H8.5815Z"
                                          class="cara_item_space"
                                          data-area="area3"></path>
                                    <path d="M18.2446 8.57504C20.5491 6.27059 21.7841 5.05632 24.1092 2.72424C27.5038 6.11881 24.7991 12.8668 24.7991 13.4187C24.7992 13.9962 27.5038 20.7323 24.1092 24.1131L18.2446 18.2416V8.58207V8.57504Z"
                                          class="cara_item_space"
                                          data-area="area4"></path>
                                    <path d="M8.58374 8.57568V18.2353H18.2433V8.57568H8.58374Z"
                                          class="cara_item_space"
                                          data-area="area5"></path>
                                </svg>
                            </div>
                            <div class="col-1 d-flex align-items-center justify-content-center">
                                <h4 id="right-word">M</h4>
                            </div>
                        </div>
                        <div class="col-12 d-flex align-items-center justify-content-center">
                            <h4 id="bottom-word">P</h4>
                        </div>
                    </div>

                    <div class="col-12 col-md-4 d-flex align-items-start justify-content-center  flex-column">
                        <div class="col-12 d-flex align-items-start justify-content-center  flex-column mb-3">


                            <div class="dropdown w-100 mb-3">
                                <label for="btn_item_cara" class="n-color">Cara</label>
                                <button class="btn btn-secondary btn-sm dropdown-toggle w-100 d-flex justify-content-between btn_item_cara"
                                        type="button" id="btn_item_cara" data-bs-toggle="dropdown" val="0"
                                        aria-expanded="false">
                                    Sano
                                </button>
                                <ul class="dropdown-menu w-100 p-0" aria-labelledby="btn_item_cara">
                                    <?php foreach ($caras as $cara){?>
                                        <li>
                                            <a class="cara_item dropdown-item bg_<?=$cara['item_id']?>" href="#" val="<?=$cara['item_id']?>"
                                               bg_opt="bg_<?=$cara['item_id']?>"><?=$cara['item_nombre']?></a>
                                        </li>
                                    <?php }?>
                                </ul>
                            </div>

                            <div class="dropdown w-100">
                                <label for="btn_item_raiz" class="n-color">Raíz</label>
                                <button class="btn btn-secondary btn-sm dropdown-toggle w-100 d-flex justify-content-between"
                                        type="button" id="btn_item_raiz" data-bs-toggle="dropdown" val="0"
                                        aria-expanded="false">
                                    Sano
                                </button>
                                <ul class="dropdown-menu w-100 p-0" aria-labelledby="btn_item_raiz">
                                    <?php foreach ($raices as $raiz){?>
                                        <li>
                                            <a class="raiz_item dropdown-item bgr_<?=$raiz['item_id']?>" href="#" val="<?=$raiz['item_id']?>"
                                               bg_opt="bg_<?=$raiz['item_id']?>"><?=$raiz['item_nombre']?></a>
                                        </li>
                                    <?php }?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 d-flex align-items-center justify-content-end">
                    <button id="btn_agregar_odonto_trat" type="button" class="btn btn-secondary btn-sm">
                        Agregar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal New Odontograma-->
<div class="modal fade p-0" id="modalNewOdontograma" tabindex="-1" aria-labelledby="modalNewOdontogramaLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-md n-box n-body n-border h-auto">
        <div class="modal-content n-body border-0 n-border">
            <div class="modal-header text-white">
                <h5 class="modal-title n-color" id="modalNewOdontogramaLabel">Registrar Nuevo odontograma</h5>
                <button type="button" class="btn-close n-color" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex flex-column">
                <form id="formNewOdonto" class="col-12 d-flex align-items-start justify-content-center flex-column">
                    <label for="inputNombreOdonto" class="n-color">Nombre
                        <span class="text-danger fw-bold">(*)</span>
                    </label>
                    <div class="input-group mb-3">
                        <label for="inputNombreOdonto" class="input-group-text form-linear" >
                            <i class="fa-solid fa-chevron-right n-color"></i>
                        </label>
                        <input type="text" class="form-control form-control-sm form-linear" id="inputNombreOdonto" required>
                    </div>
                </form>
                <div class="col-12 d-flex align-items-center justify-content-end">
                    <button id="btn_agregar_new_odonto" type="button" class="btn btn-secondary btn-sm">
                        Agregar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
