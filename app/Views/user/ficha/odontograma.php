<div id="odonto" class="container-fluid col-12 ficha-container">

    <fieldset class="mb-4 d-flex flex-row flex-wrap justify-content-between px-0 px-md-2">
        <legend class="n-color">Odontograma</legend>

        <div class="container-fluid w-100 d-flex align-items-center justify-content-between flex-column flex-md-row p-0 p-md-2">
            <div class="container-fluid d-flex align-items-center justify-content-start flex-row mb-3 mb-md-0 col-12 col-md-auto">

                <div class="btn-group col-12 col-md-auto" role="group">
                    <button id="btn_dento_perma" type="button" class="btn btn-secondary btn-sm col-5 odonto-item active"
                            onclick="switchAreaTipoDent(1)">
                        Permanentes
                    </button>
                    <button id="btn_dento_deciduos" type="button" class="btn btn-secondary btn-sm col-5 odonto-item"
                            onclick="switchAreaTipoDent(2)">
                        Deciduos
                    </button>
                </div>
            </div>
            <div class="container-fluid d-flex align-items-center justify-content-end flex-row p-0 p-2">
                <div class="btn-group col-12 col-md-auto" role="group">
                    <button class="btn btn-secondary btn-sm dropdown-toggle w-100 d-flex justify-content-between"
                            type="button" id="btn_select_odonto" data-bs-toggle="dropdown" val="">
                        Seleccione Odontograma
                    </button>
                    <ul class="dropdown-menu w-100 p-0" aria-labelledby="btn_item_cara" id="menu_odontos">
                        <?php if ($odontos) {
                            foreach ($odontos as $odonto) { ?>
                                <li>
                                    <a onclick="selOdonto(<?= $odonto['idodontograma'] ?>, '<?= $odonto['nombre'] ?>')"
                                       class="dropdown-item item_odonto" href="#"
                                       val="<?= $odonto['idodontograma'] ?>"><?= $odonto['nombre'] ?></a>
                                </li>
                            <?php }
                        } ?>
                        <li>
                            <a onclick="selOdonto(0)" class="dropdown-item item_odonto" href="#" val="0">Nuevo
                                Odontograma <i
                                        class="fa fa-add"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="w-100">
            <div id="dento_perma" class="dento-diagram_complete">
                <div class="top-diagram diagram-row d-flex flex-column flex-md-row">
                    <div class="col-12 col-md-6 d-flex flex-column mb-5 mb-md-2">

                        <div class="col-12 d-flex align-items-center justify-content-center">
                            <h5 class="fs-6">P</h5>
                        </div>
                        <div class="col-12 d-flex align-items-center justify-content-center">
                            <div class="col-1 d-flex align-items-center justify-content-center">
                                <h5 class="fs-6">D</h5>
                            </div>
                            <div class="d-flex align-items-center justify-content-center">
                                <div class="diagram-cell">
                                    <sd-odontograma-dente _ngcontent-wak-c445="" _nghost-wak-c443=""
                                                          class="ng-star-inserted"
                                                          style="margin-right: 8px;">
                                        <div _ngcontent-wak-c443="" class="sd-odontograma-dente">
                                            <span _ngcontent-wak-c443="" class="sd-odontograma-dente__label"> 18 </span>
                                            <svg class="mat-tooltip-trigger sd-odontograma-dente__dente"
                                                 viewBox="0 0 23 47"
                                                 data-testid="area18"
                                                 height="47" aria-describedby="cdk-describedby-message-wak-1-29"
                                                 cdk-describedby-host="wak-1">
                                                <path _ngcontent-wak-c443=""
                                                      d="M5.31293 4.03889C7.15726 4.01259 7.52616 19.952 11.7937 22.0337C17.6516 18.8843 13.8038 7.0686 16.4068 2.32958C20.4843 -0.496074 21.3312 28.6569 20.4536 27.1165C18.2741 25.1744 15.0739 24.1435 12.343 23.8694C9.61178 23.5953 7.14236 24.9849 4.75641 25.4588C3.3314 20.7635 2.72466 9.89214 5.3132 4.03942L5.31293 4.03889Z"
                                                      class="ng-star-inserted"></path>
                                                <path _ngcontent-wak-c443=""
                                                      d="M11.8219 19.303C12.8002 18.7427 13.9171 13.9419 13.6594 9.65472C13.4152 5.59253 12.0892 3.9084 10.3939 1.62561C7.85979 -0.173733 8.25777 3.73621 9.1482 8.74905C10.0465 13.8063 10.3338 16.5569 11.8219 19.3024V19.303Z"
                                                      class="ng-star-inserted"></path>
                                                <path _ngcontent-wak-c443=""
                                                      d="M2.73169 43.8554C4.24648 45.6526 11.8646 45.4087 13.7156 44.9831C16.7177 46.1645 21.1081 44.7197 21.1849 42.3739C21.5278 37.4969 21.2763 31.4344 20.3986 29.894C18.2192 27.9519 15.0191 26.9209 12.288 26.6469C9.55686 26.3729 7.08744 27.7625 4.7015 28.2363C2.31556 28.7101 1.00747 32.5503 1.19424 35.6499C1.381 38.7499 1.21743 42.0584 2.73195 43.8553L2.73169 43.8554Z"
                                                      class="ng-star-inserted"></path><!----></svg><!---->
                                            <svg _ngcontent-wak-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 viewBox="0 0 27 27"
                                                 width="27"
                                                 height="27" class="sd-odontograma-dente__faces">
                                                <path _ngcontent-wak-c443=""
                                                      d="M18.2439 18.2354L24.0947 24.0999C20.7001 27.4945 13.9521 24.7899 13.4002 24.7899C12.8228 24.7899 6.08666 27.4945 2.70581 24.0999C4.85848 21.9473 6.16935 20.6433 8.57728 18.2354H18.2368H18.2439Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      item-data-area="area1"
                                                      data-testid="area18Vestibular"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.58244 18.2344C6.27799 20.5112 5.03609 21.7531 2.71097 24.0989C-0.683593 20.7182 2.02103 13.9564 2.02103 13.4045C2.02103 12.7836 -0.683593 6.09093 2.71097 2.71008L8.57557 8.58155V18.2411L8.58244 18.2344Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      item-data-area="area2"
                                                      data-testid="area18Distal"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.5815 8.57556C6.27705 6.278 5.05583 5.0361 2.73071 2.71098C6.12528 -0.683584 12.8733 2.02103 13.4251 2.02103C14.0026 2.02101 20.7387 -0.683584 24.1196 2.71098C21.9669 4.86365 20.656 6.16762 18.2481 8.57556H8.58854H8.5815Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      item-data-area="area3"
                                                      data-testid="area18Palatina"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M18.2446 8.57504C20.5491 6.27059 21.7841 5.05632 24.1092 2.72424C27.5038 6.11881 24.7991 12.8668 24.7991 13.4187C24.7992 13.9962 27.5038 20.7323 24.1092 24.1131L18.2446 18.2416V8.58207V8.57504Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      item-data-area="area4"
                                                      data-testid="area18Mesial"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.58374 8.57568V18.2353H18.2433V8.57568H8.58374Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      item-data-area="area5"
                                                      data-testid="area18Oclusal"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!----></svg>
                                        </div>
                                    </sd-odontograma-dente>
                                    <sd-odontograma-dente _ngcontent-wak-c445="" _nghost-wak-c443=""
                                                          class="ng-star-inserted"
                                                          style="margin-right: 8px;">
                                        <div _ngcontent-wak-c443="" class="sd-odontograma-dente"><span
                                                    _ngcontent-wak-c443=""
                                                    class="sd-odontograma-dente__label"> 17 </span>
                                            <svg _ngcontent-wak-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 class="mat-tooltip-trigger sd-odontograma-dente__dente"
                                                 viewBox="0 0 24 51"
                                                 data-testid="area17"
                                                 height="51" aria-describedby="cdk-describedby-message-wak-1-31"
                                                 cdk-describedby-host="wak-1">
                                                <path _ngcontent-wak-c443=""
                                                      d="M6.64509 5.91923C10.796 10.5656 6.11229 18.7549 12.0274 24.5977C18.4344 24.4115 14.1473 3.36455 17.7388 4.32388C21.0475 4.3474 23.2125 31.3349 20.6871 29.9085C18.6176 27.9664 16.0764 27.5053 13.345 27.2312C10.6139 26.9572 6.82649 27.549 4.55006 28.9346C2.66711 28.0772 4.04284 8.41164 6.64463 5.91923H6.64509Z"
                                                      class="ng-star-inserted"></path>
                                                <path _ngcontent-wak-c443=""
                                                      d="M12.7539 22.1451C13.7321 21.5848 14.5195 16.556 14.2619 12.2689C14.0177 8.20672 13.0212 4.01521 11.3258 1.73282C8.7919 -0.0665226 9.94091 6.73579 10.2999 11.8191C10.649 16.7623 10.3872 20.5385 12.7539 22.1445V22.1451Z"
                                                      class="ng-star-inserted"></path>
                                                <path _ngcontent-wak-c443=""
                                                      d="M2.27131 47.7058C3.89594 50.7566 12.1734 49.7149 14.0244 49.2892C20.102 50.1287 22.1854 48.3421 22.2622 45.9963C22.6052 41.1193 23.0127 34.0311 20.4873 32.6041C18.4178 30.662 15.9865 29.8589 13.2553 29.5849C10.5241 29.3109 9.04327 29.7887 7.42619 30.2626C5.80917 30.7364 2.96331 33.095 2.38122 35.967C1.79906 38.8391 0.646735 44.6547 2.27137 47.7056L2.27131 47.7058Z"
                                                      class="ng-star-inserted"></path><!----></svg><!---->
                                            <svg _ngcontent-wak-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 viewBox="0 0 27 27"
                                                 width="27"
                                                 height="27" class="sd-odontograma-dente__faces">
                                                <path _ngcontent-wak-c443=""
                                                      d="M18.2439 18.2354L24.0947 24.0999C20.7001 27.4945 13.9521 24.7899 13.4002 24.7899C12.8228 24.7899 6.08666 27.4945 2.70581 24.0999C4.85848 21.9473 6.16935 20.6433 8.57728 18.2354H18.2368H18.2439Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      item-data-area="area1"
                                                      data-testid="area17Vestibular"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.58244 18.2344C6.27799 20.5112 5.03609 21.7531 2.71097 24.0989C-0.683593 20.7182 2.02103 13.9564 2.02103 13.4045C2.02103 12.7836 -0.683593 6.09093 2.71097 2.71008L8.57557 8.58155V18.2411L8.58244 18.2344Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      item-data-area="area2"
                                                      data-testid="area17Distal"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.5815 8.57556C6.27705 6.278 5.05583 5.0361 2.73071 2.71098C6.12528 -0.683584 12.8733 2.02103 13.4251 2.02103C14.0026 2.02101 20.7387 -0.683584 24.1196 2.71098C21.9669 4.86365 20.656 6.16762 18.2481 8.57556H8.58854H8.5815Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      item-data-area="area3"
                                                      data-testid="area17Palatina"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M18.2446 8.57504C20.5491 6.27059 21.7841 5.05632 24.1092 2.72424C27.5038 6.11881 24.7991 12.8668 24.7991 13.4187C24.7992 13.9962 27.5038 20.7323 24.1092 24.1131L18.2446 18.2416V8.58207V8.57504Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      item-data-area="area4"
                                                      data-testid="area17Mesial"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.58374 8.57568V18.2353H18.2433V8.57568H8.58374Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      item-data-area="area5"
                                                      data-testid="area17Oclusal"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!----></svg>
                                        </div>
                                    </sd-odontograma-dente>
                                    <sd-odontograma-dente _ngcontent-wak-c445="" _nghost-wak-c443=""
                                                          class="ng-star-inserted"
                                                          style="margin-right: 8px;">
                                        <div _ngcontent-wak-c443="" class="sd-odontograma-dente"><span
                                                    _ngcontent-wak-c443=""
                                                    class="sd-odontograma-dente__label"> 16 </span>
                                            <svg _ngcontent-wak-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 class="mat-tooltip-trigger sd-odontograma-dente__dente"
                                                 viewBox="0 0 24 51"
                                                 data-testid="area16"
                                                 height="51" aria-describedby="cdk-describedby-message-wak-1-32"
                                                 cdk-describedby-host="wak-1">
                                                <path _ngcontent-wak-c443=""
                                                      d="M5.74685 4.42955C9.34858 6.79654 6.97146 21.7101 12.0078 23.5638C18.0854 24.4033 12.8097 3.81208 17.3898 2.8342C21.687 7.07447 22.3142 30.9854 20.8873 29.1025C18.7079 27.1604 15.6176 25.3316 13.216 25.3996C10.8143 25.4674 5.37901 27.3129 3.76246 27.7867C1.73501 24.2515 3.4318 4.79255 5.74718 4.42948L5.74685 4.42955Z"
                                                      class="ng-star-inserted"></path>
                                                <path _ngcontent-wak-c443=""
                                                      d="M12.2768 20.7474C13.255 20.1871 13.6031 16.298 13.3454 12.0114C13.1012 7.94922 12.3243 3.52979 10.629 1.24741C9.19334 0.359825 9.46371 5.33861 9.82273 10.422C10.1719 15.3653 10.7887 20.0531 12.2768 20.7474Z"
                                                      class="ng-star-inserted"></path>
                                                <path _ngcontent-wak-c443=""
                                                      d="M1.72828 48.5462C3.35291 51.597 13.4973 49.3017 15.3484 48.876C21.426 49.7155 22.4109 49.0685 22.4877 46.7227C22.8307 41.8457 23.0185 34.4157 21.5917 32.5328C19.4122 30.5907 16.7613 28.306 14.0303 28.032C11.2991 27.758 5.97405 29.4895 4.35683 29.9633C2.73975 30.4371 0.662808 35.303 0.849573 38.4031C1.03627 41.5031 0.103641 45.4954 1.72828 48.5464V48.5462Z"
                                                      class="ng-star-inserted"></path><!----></svg><!---->
                                            <svg _ngcontent-wak-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 viewBox="0 0 27 27"
                                                 width="27"
                                                 height="27" class="sd-odontograma-dente__faces">
                                                <path _ngcontent-wak-c443=""
                                                      d="M18.2439 18.2354L24.0947 24.0999C20.7001 27.4945 13.9521 24.7899 13.4002 24.7899C12.8228 24.7899 6.08666 27.4945 2.70581 24.0999C4.85848 21.9473 6.16935 20.6433 8.57728 18.2354H18.2368H18.2439Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      item-data-area="area1"
                                                      data-testid="area16Vestibular"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.58244 18.2344C6.27799 20.5112 5.03609 21.7531 2.71097 24.0989C-0.683593 20.7182 2.02103 13.9564 2.02103 13.4045C2.02103 12.7836 -0.683593 6.09093 2.71097 2.71008L8.57557 8.58155V18.2411L8.58244 18.2344Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      item-data-area="area2"
                                                      data-testid="area16Distal"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.5815 8.57556C6.27705 6.278 5.05583 5.0361 2.73071 2.71098C6.12528 -0.683584 12.8733 2.02103 13.4251 2.02103C14.0026 2.02101 20.7387 -0.683584 24.1196 2.71098C21.9669 4.86365 20.656 6.16762 18.2481 8.57556H8.58854H8.5815Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      item-data-area="area3"
                                                      data-testid="area16Palatina"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M18.2446 8.57504C20.5491 6.27059 21.7841 5.05632 24.1092 2.72424C27.5038 6.11881 24.7991 12.8668 24.7991 13.4187C24.7992 13.9962 27.5038 20.7323 24.1092 24.1131L18.2446 18.2416V8.58207V8.57504Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      item-data-area="area4"
                                                      data-testid="area16Mesial"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.58374 8.57568V18.2353H18.2433V8.57568H8.58374Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      item-data-area="area5"
                                                      data-testid="area16Oclusal"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!----></svg>
                                        </div>
                                    </sd-odontograma-dente>
                                    <sd-odontograma-dente _ngcontent-wak-c445="" _nghost-wak-c443=""
                                                          class="ng-star-inserted"
                                                          style="margin-right: 8px;">
                                        <div _ngcontent-wak-c443="" class="sd-odontograma-dente"><span
                                                    _ngcontent-wak-c443=""
                                                    class="sd-odontograma-dente__label"> 15 </span>
                                            <svg _ngcontent-wak-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 class="mat-tooltip-trigger sd-odontograma-dente__dente"
                                                 viewBox="0 0 21 54"
                                                 data-testid="area15"
                                                 height="54" aria-describedby="cdk-describedby-message-wak-1-33"
                                                 cdk-describedby-host="wak-1">
                                                <path _ngcontent-wak-c443=""
                                                      d="M6.19967 2.55361C8.30861 5.44121 14.5103 24.1041 17.7329 32.3108C17.0128 31.1333 14.1265 29.7278 10.3736 29.9175C10.3736 29.9175 5.50249 29.7794 4.1051 32.1907C5.1984 25.0951 3.58635 -1.89675 6.1998 2.55341L6.19967 2.55361Z"
                                                      class="ng-star-inserted"></path>
                                                <path _ngcontent-wak-c443=""
                                                      d="M13.5465 2.55966C12.4261 4.5355 11.6066 6.78721 11.3499 8.61193C11.9643 11.0319 13.4737 14.6804 15.4215 19.8887C15.9758 15.4146 15.9403 0.958478 13.5465 2.55979V2.55966Z"
                                                      class="ng-star-inserted"></path>
                                                <path _ngcontent-wak-c443=""
                                                      d="M10.5135 53.2426C12.8565 53.2843 18.6029 47.9885 19.0813 46.7586C19.5589 45.5287 19.3699 43.1222 19.2966 41.3558C19.2234 39.5893 18.593 35.9697 17.873 34.7921C17.153 33.6146 14.2666 32.2091 10.5137 32.3988C10.5137 32.3988 5.64266 32.2607 4.24527 34.672C2.84788 37.0832 0.880781 45.4823 1.50686 47.7839C2.96276 50.1878 7.28584 52.2328 10.5138 53.2423L10.5135 53.2426Z"
                                                      class="ng-star-inserted"></path><!----></svg><!---->
                                            <svg _ngcontent-wak-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 viewBox="0 0 27 27"
                                                 width="27"
                                                 height="27" class="sd-odontograma-dente__faces">
                                                <path _ngcontent-wak-c443=""
                                                      d="M18.2439 18.2354L24.0947 24.0999C20.7001 27.4945 13.9521 24.7899 13.4002 24.7899C12.8228 24.7899 6.08666 27.4945 2.70581 24.0999C4.85848 21.9473 6.16935 20.6433 8.57728 18.2354H18.2368H18.2439Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area15Vestibular"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.58244 18.2344C6.27799 20.5112 5.03609 21.7531 2.71097 24.0989C-0.683593 20.7182 2.02103 13.9564 2.02103 13.4045C2.02103 12.7836 -0.683593 6.09093 2.71097 2.71008L8.57557 8.58155V18.2411L8.58244 18.2344Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area15Distal"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.5815 8.57556C6.27705 6.278 5.05583 5.0361 2.73071 2.71098C6.12528 -0.683584 12.8733 2.02103 13.4251 2.02103C14.0026 2.02101 20.7387 -0.683584 24.1196 2.71098C21.9669 4.86365 20.656 6.16762 18.2481 8.57556H8.58854H8.5815Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area15Palatina"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M18.2446 8.57504C20.5491 6.27059 21.7841 5.05632 24.1092 2.72424C27.5038 6.11881 24.7991 12.8668 24.7991 13.4187C24.7992 13.9962 27.5038 20.7323 24.1092 24.1131L18.2446 18.2416V8.58207V8.57504Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area15Mesial"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.58374 8.57568V18.2353H18.2433V8.57568H8.58374Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area15Oclusal"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!----></svg>
                                        </div>
                                    </sd-odontograma-dente>
                                    <sd-odontograma-dente _ngcontent-wak-c445="" _nghost-wak-c443=""
                                                          class="ng-star-inserted"
                                                          style="margin-right: 8px;">
                                        <div _ngcontent-wak-c443="" class="sd-odontograma-dente"><span
                                                    _ngcontent-wak-c443=""
                                                    class="sd-odontograma-dente__label"> 14 </span>
                                            <svg _ngcontent-wak-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 class="mat-tooltip-trigger sd-odontograma-dente__dente"
                                                 viewBox="0 0 21 52"
                                                 data-testid="area14"
                                                 height="52" aria-describedby="cdk-describedby-message-wak-1-34"
                                                 cdk-describedby-host="wak-1">
                                                <path _ngcontent-wak-c443=""
                                                      d="M10.6704 0.811045C14.5287 0.974628 14.5451 19.6373 16.4819 27.7644C16.7479 28.8801 15.9954 26.6541 10.8898 26.3517C10.8898 26.3517 6.01879 26.3276 3.85254 29.1947C4.5454 23.174 7.70457 3.96054 10.6706 0.810913L10.6704 0.811045Z"
                                                      class="ng-star-inserted"></path>
                                                <path _ngcontent-wak-c443=""
                                                      d="M10.9177 51.1826C13.8099 50.9964 18.7494 47.6142 19.1555 45.3824C19.9459 43.3854 19.2437 35.2358 17.7102 32.9024C15.2013 28.909 10.4781 28.9715 10.4781 28.9715C10.4781 28.9715 6.26606 29.0614 4.09981 31.9285C1.93357 34.7956 0.735332 43.8784 1.58111 46.1806C2.50731 49.5514 6.96953 50.6892 10.9174 51.1831L10.9177 51.1826Z"
                                                      class="ng-star-inserted"></path><!----></svg><!---->
                                            <svg _ngcontent-wak-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 viewBox="0 0 27 27"
                                                 width="27"
                                                 height="27" class="sd-odontograma-dente__faces">
                                                <path _ngcontent-wak-c443=""
                                                      d="M18.2439 18.2354L24.0947 24.0999C20.7001 27.4945 13.9521 24.7899 13.4002 24.7899C12.8228 24.7899 6.08666 27.4945 2.70581 24.0999C4.85848 21.9473 6.16935 20.6433 8.57728 18.2354H18.2368H18.2439Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area14Vestibular"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.58244 18.2344C6.27799 20.5112 5.03609 21.7531 2.71097 24.0989C-0.683593 20.7182 2.02103 13.9564 2.02103 13.4045C2.02103 12.7836 -0.683593 6.09093 2.71097 2.71008L8.57557 8.58155V18.2411L8.58244 18.2344Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area14Distal"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.5815 8.57556C6.27705 6.278 5.05583 5.0361 2.73071 2.71098C6.12528 -0.683584 12.8733 2.02103 13.4251 2.02103C14.0026 2.02101 20.7387 -0.683584 24.1196 2.71098C21.9669 4.86365 20.656 6.16762 18.2481 8.57556H8.58854H8.5815Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area14Palatina"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M18.2446 8.57504C20.5491 6.27059 21.7841 5.05632 24.1092 2.72424C27.5038 6.11881 24.7991 12.8668 24.7991 13.4187C24.7992 13.9962 27.5038 20.7323 24.1092 24.1131L18.2446 18.2416V8.58207V8.57504Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area14Mesial"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.58374 8.57568V18.2353H18.2433V8.57568H8.58374Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area14Oclusal"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!----></svg>
                                        </div>
                                    </sd-odontograma-dente>
                                    <sd-odontograma-dente _ngcontent-wak-c445="" _nghost-wak-c443=""
                                                          class="ng-star-inserted"
                                                          style="margin-right: 8px;">
                                        <div _ngcontent-wak-c443="" class="sd-odontograma-dente"><span
                                                    _ngcontent-wak-c443=""
                                                    class="sd-odontograma-dente__label"> 13 </span>
                                            <svg _ngcontent-wak-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 class="mat-tooltip-trigger sd-odontograma-dente__dente"
                                                 viewBox="0 0 21 62"
                                                 data-testid="area13"
                                                 height="62" aria-describedby="cdk-describedby-message-wak-1-35"
                                                 cdk-describedby-host="wak-1">
                                                <path _ngcontent-wak-c443=""
                                                      d="M10.3319 1.62256C15.6124 1.20132 15.0854 26.2611 17.0221 36.6673C17.2321 37.7957 15.8765 34.6453 10.771 34.3429C10.771 34.3429 5.89982 34.3187 3.73364 37.1859C4.09697 26.1509 8.24469 3.17597 10.3318 1.62236L10.3319 1.62256Z"
                                                      class="ng-star-inserted"></path>
                                                <path _ngcontent-wak-c443=""
                                                      d="M9.69877 61.1169C12.9205 60.3608 19.3974 55.1552 19.8036 52.9235C20.5939 50.9265 19.1229 43.2328 17.5894 40.8994C15.0804 36.9059 10.3573 36.9684 10.3573 36.9684C10.3573 36.9684 6.14533 37.0583 3.97901 39.9254C1.81277 42.7925 0.504684 50.0514 1.35046 52.3537C2.27673 55.7244 4.87157 59.3698 9.69824 61.1168L9.69877 61.1169Z"
                                                      class="ng-star-inserted"></path><!----></svg><!---->
                                            <svg _ngcontent-wak-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 viewBox="0 0 27 27"
                                                 width="27"
                                                 height="27" class="sd-odontograma-dente__faces">
                                                <path _ngcontent-wak-c443=""
                                                      d="M18.2439 18.2354L24.0947 24.0999C20.7001 27.4945 13.9521 24.7899 13.4002 24.7899C12.8228 24.7899 6.08666 27.4945 2.70581 24.0999C4.85848 21.9473 6.16935 20.6433 8.57728 18.2354H18.2368H18.2439Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area13Vestibular"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.58244 18.2344C6.27799 20.5112 5.03609 21.7531 2.71097 24.0989C-0.683593 20.7182 2.02103 13.9564 2.02103 13.4045C2.02103 12.7836 -0.683593 6.09093 2.71097 2.71008L8.57557 8.58155V18.2411L8.58244 18.2344Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area13Distal"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.5815 8.57556C6.27705 6.278 5.05583 5.0361 2.73071 2.71098C6.12528 -0.683584 12.8733 2.02103 13.4251 2.02103C14.0026 2.02101 20.7387 -0.683584 24.1196 2.71098C21.9669 4.86365 20.656 6.16762 18.2481 8.57556H8.58854H8.5815Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area13Palatina"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M18.2446 8.57504C20.5491 6.27059 21.7841 5.05632 24.1092 2.72424C27.5038 6.11881 24.7991 12.8668 24.7991 13.4187C24.7992 13.9962 27.5038 20.7323 24.1092 24.1131L18.2446 18.2416V8.58207V8.57504Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area13Mesial"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.58374 8.57568V18.2353H18.2433V8.57568H8.58374Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area13Oclusal"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!----></svg>
                                        </div>
                                    </sd-odontograma-dente>
                                    <sd-odontograma-dente _ngcontent-wak-c445="" _nghost-wak-c443=""
                                                          class="ng-star-inserted"
                                                          style="margin-right: 8px;">
                                        <div _ngcontent-wak-c443="" class="sd-odontograma-dente"><span
                                                    _ngcontent-wak-c443=""
                                                    class="sd-odontograma-dente__label"> 12 </span>
                                            <svg _ngcontent-wak-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 class="mat-tooltip-trigger sd-odontograma-dente__dente"
                                                 viewBox="0 0 20 55"
                                                 data-testid="area12"
                                                 height="55" aria-describedby="cdk-describedby-message-wak-1-36"
                                                 cdk-describedby-host="wak-1">
                                                <path _ngcontent-wak-c443=""
                                                      d="M10.9267 1.18149C15.7018 0.206127 11.4953 17.4769 16.9503 31.5647C9.73614 28.6585 7.05558 29.7241 4.32864 31.8444C3.84467 25.4202 7.63403 4.22259 10.9268 1.18162L10.9267 1.18149Z"
                                                      class="ng-star-inserted"></path>
                                                <path _ngcontent-wak-c443=""
                                                      d="M4.08972 52.6326C8.51981 52.9595 12.2454 53.3598 16.3914 53.5565C21.439 52.3262 18.4818 38.714 17.6921 34.9224C12.0846 30.3848 5.26914 32.9691 3.42269 35.658C2.05995 40.6304 -0.411521 51.4578 4.08946 52.6331L4.08972 52.6326Z"
                                                      class="ng-star-inserted"></path><!----></svg><!---->
                                            <svg _ngcontent-wak-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 viewBox="0 0 27 27"
                                                 width="27"
                                                 height="27" class="sd-odontograma-dente__faces">
                                                <path _ngcontent-wak-c443=""
                                                      d="M18.2439 18.2354L24.0947 24.0999C20.7001 27.4945 13.9521 24.7899 13.4002 24.7899C12.8228 24.7899 6.08666 27.4945 2.70581 24.0999C4.85848 21.9473 6.16935 20.6433 8.57728 18.2354H18.2368H18.2439Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area12Vestibular"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.58244 18.2344C6.27799 20.5112 5.03609 21.7531 2.71097 24.0989C-0.683593 20.7182 2.02103 13.9564 2.02103 13.4045C2.02103 12.7836 -0.683593 6.09093 2.71097 2.71008L8.57557 8.58155V18.2411L8.58244 18.2344Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area12Distal"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.5815 8.57556C6.27705 6.278 5.05583 5.0361 2.73071 2.71098C6.12528 -0.683584 12.8733 2.02103 13.4251 2.02103C14.0026 2.02101 20.7387 -0.683584 24.1196 2.71098C21.9669 4.86365 20.656 6.16762 18.2481 8.57556H8.58854H8.5815Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area12Palatina"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M18.2446 8.57504C20.5491 6.27059 21.7841 5.05632 24.1092 2.72424C27.5038 6.11881 24.7991 12.8668 24.7991 13.4187C24.7992 13.9962 27.5038 20.7323 24.1092 24.1131L18.2446 18.2416V8.58207V8.57504Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area12Mesial"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.58374 8.57568V18.2353H18.2433V8.57568H8.58374Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area12Oclusal"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!----></svg>
                                        </div>
                                    </sd-odontograma-dente>
                                    <sd-odontograma-dente _ngcontent-wak-c445="" _nghost-wak-c443=""
                                                          class="ng-star-inserted">
                                        <div _ngcontent-wak-c443="" class="sd-odontograma-dente"><span
                                                    _ngcontent-wak-c443=""
                                                    class="sd-odontograma-dente__label"> 11 </span>
                                            <svg _ngcontent-wak-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 class="mat-tooltip-trigger sd-odontograma-dente__dente"
                                                 viewBox="0 0 23 56"
                                                 data-testid="area11"
                                                 height="56" aria-describedby="cdk-describedby-message-wak-1-37"
                                                 cdk-describedby-host="wak-1">
                                                <path _ngcontent-wak-c443=""
                                                      d="M11.9942 0.817178C16.4798 0.743181 13.5942 15.1899 17.7982 28.8074C13.8613 26.6374 11.9941 27.7256 11.9941 27.7256C11.9941 27.7256 6.57379 27.2457 3.30908 32.2782C6.62971 21.4857 8.29117 1.51528 11.9941 0.817643L11.9942 0.817178Z"
                                                      class="ng-star-inserted"></path>
                                                <path _ngcontent-wak-c443=""
                                                      d="M2.40441 53.3221C3.69951 55.803 10.6588 54.8753 12.5099 54.4497C18.5874 55.2892 21.8792 54.7561 21.6262 48.4215L21.736 41.3557C21.736 41.3557 22.1406 33.6665 18.2038 31.4967C14.2669 29.3267 12.3996 30.415 12.3996 30.415C12.3996 30.415 6.97939 29.935 3.71461 34.9675C0.449968 39.9999 0.679677 44.0679 0.866442 47.1678C1.05321 50.2678 1.10906 50.8411 2.40423 53.322L2.40441 53.3221Z"
                                                      class="ng-star-inserted"></path><!----></svg><!---->
                                            <svg _ngcontent-wak-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 viewBox="0 0 27 27"
                                                 width="27"
                                                 height="27" class="sd-odontograma-dente__faces">
                                                <path _ngcontent-wak-c443=""
                                                      d="M18.2439 18.2354L24.0947 24.0999C20.7001 27.4945 13.9521 24.7899 13.4002 24.7899C12.8228 24.7899 6.08666 27.4945 2.70581 24.0999C4.85848 21.9473 6.16935 20.6433 8.57728 18.2354H18.2368H18.2439Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area11Vestibular"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.58244 18.2344C6.27799 20.5112 5.03609 21.7531 2.71097 24.0989C-0.683593 20.7182 2.02103 13.9564 2.02103 13.4045C2.02103 12.7836 -0.683593 6.09093 2.71097 2.71008L8.57557 8.58155V18.2411L8.58244 18.2344Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area11Distal"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.5815 8.57556C6.27705 6.278 5.05583 5.0361 2.73071 2.71098C6.12528 -0.683584 12.8733 2.02103 13.4251 2.02103C14.0026 2.02101 20.7387 -0.683584 24.1196 2.71098C21.9669 4.86365 20.656 6.16762 18.2481 8.57556H8.58854H8.5815Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area11Palatina"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M18.2446 8.57504C20.5491 6.27059 21.7841 5.05632 24.1092 2.72424C27.5038 6.11881 24.7991 12.8668 24.7991 13.4187C24.7992 13.9962 27.5038 20.7323 24.1092 24.1131L18.2446 18.2416V8.58207V8.57504Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area11Mesial"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.58374 8.57568V18.2353H18.2433V8.57568H8.58374Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area11Oclusal"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!----></svg>
                                        </div>
                                    </sd-odontograma-dente><!----></div>
                            </div>
                            <div class="col-1 d-flex align-items-center justify-content-center">
                                <h5 class="fs-6">M</h5>
                            </div>
                        </div>
                        <div class="col-12 d-flex align-items-center justify-content-center">
                            <h5 class="fs-6">V</h5>
                        </div>

                    </div>


                    <div class="col-12 col-md-6 d-flex flex-column">
                        <div class="col-12 d-flex align-items-center justify-content-center">
                            <h5 class="fs-6">P</h5>
                        </div>
                        <div class="col-12 d-flex align-items-center justify-content-center">
                            <div class="col-1 d-flex align-items-center justify-content-center">
                                <h5 class="fs-6">M</h5>
                            </div>
                            <div class="d-flex align-items-center justify-content-center">
                                <div class="diagram-cell "
                                     style="flex-direction: row; box-sizing: border-box; display: flex;">
                                    <sd-odontograma-dente _ngcontent-wak-c445="" _nghost-wak-c443=""
                                                          class="ng-star-inserted"
                                                          style="margin-right: 8px;">
                                        <div _ngcontent-wak-c443="" class="sd-odontograma-dente"><span
                                                    _ngcontent-wak-c443=""
                                                    class="sd-odontograma-dente__label"> 21 </span>
                                            <svg _ngcontent-wak-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 class="mat-tooltip-trigger sd-odontograma-dente__dente"
                                                 viewBox="0 0 23 56"
                                                 data-testid="area21"
                                                 height="56" aria-describedby="cdk-describedby-message-wak-1-38"
                                                 cdk-describedby-host="wak-1">
                                                <path _ngcontent-wak-c443=""
                                                      d="M10.7383 0.883218C6.25275 0.809214 9.13829 15.256 4.93433 28.8734C8.87117 26.7034 10.7384 27.7917 10.7384 27.7917C10.7384 27.7917 16.1587 27.3117 19.4234 32.3442C16.1028 21.5517 14.4413 1.58132 10.7384 0.88368L10.7383 0.883218Z"
                                                      class="ng-star-inserted"></path>
                                                <path _ngcontent-wak-c443=""
                                                      d="M20.3434 53.3892C19.0483 55.8701 12.089 54.9425 10.2379 54.5168C4.1604 55.3563 0.868525 54.8233 1.12161 48.4887L1.01176 41.4229C1.01176 41.4229 0.607168 33.7336 4.544 31.5639C8.48084 29.3938 10.3482 30.4821 10.3482 30.4821C10.3482 30.4821 15.7684 30.0021 19.0331 35.0346C22.2978 40.0671 22.0681 44.135 21.8813 47.235C21.6946 50.3349 21.6387 50.9082 20.3436 53.3891L20.3434 53.3892Z"
                                                      class="ng-star-inserted"></path><!----></svg><!---->
                                            <svg _ngcontent-wak-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 viewBox="0 0 27 27"
                                                 width="27"
                                                 height="27" class="sd-odontograma-dente__faces">
                                                <path _ngcontent-wak-c443=""
                                                      d="M18.2439 18.2354L24.0947 24.0999C20.7001 27.4945 13.9521 24.7899 13.4002 24.7899C12.8228 24.7899 6.08666 27.4945 2.70581 24.0999C4.85848 21.9473 6.16935 20.6433 8.57728 18.2354H18.2368H18.2439Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area21Vestibular"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.58244 18.2344C6.27799 20.5112 5.03609 21.7531 2.71097 24.0989C-0.683593 20.7182 2.02103 13.9564 2.02103 13.4045C2.02103 12.7836 -0.683593 6.09093 2.71097 2.71008L8.57557 8.58155V18.2411L8.58244 18.2344Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area21Mesial"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.5815 8.57556C6.27705 6.278 5.05583 5.0361 2.73071 2.71098C6.12528 -0.683584 12.8733 2.02103 13.4251 2.02103C14.0026 2.02101 20.7387 -0.683584 24.1196 2.71098C21.9669 4.86365 20.656 6.16762 18.2481 8.57556H8.58854H8.5815Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area21Palatina"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M18.2446 8.57504C20.5491 6.27059 21.7841 5.05632 24.1092 2.72424C27.5038 6.11881 24.7991 12.8668 24.7991 13.4187C24.7992 13.9962 27.5038 20.7323 24.1092 24.1131L18.2446 18.2416V8.58207V8.57504Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area21Distal"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.58374 8.57568V18.2353H18.2433V8.57568H8.58374Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area21Oclusal"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!----></svg>
                                        </div>
                                    </sd-odontograma-dente>
                                    <sd-odontograma-dente _ngcontent-wak-c445="" _nghost-wak-c443=""
                                                          class="ng-star-inserted"
                                                          style="margin-right: 8px;">
                                        <div _ngcontent-wak-c443="" class="sd-odontograma-dente"><span
                                                    _ngcontent-wak-c443=""
                                                    class="sd-odontograma-dente__label"> 22 </span>
                                            <svg _ngcontent-wak-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 class="mat-tooltip-trigger sd-odontograma-dente__dente"
                                                 viewBox="0 0 20 55"
                                                 data-testid="area22"
                                                 height="55" aria-describedby="cdk-describedby-message-wak-1-39"
                                                 cdk-describedby-host="wak-1">
                                                <path _ngcontent-wak-c443=""
                                                      d="M9.48946 1.24741C4.7144 0.272044 8.92089 17.5428 3.46582 31.6307C10.68 28.7244 13.3606 29.79 16.0875 31.9104C16.5715 25.4861 12.7821 4.28852 9.4894 1.24754L9.48946 1.24741Z"
                                                      class="ng-star-inserted"></path>
                                                <path _ngcontent-wak-c443=""
                                                      d="M16.33 52.699C11.8999 53.0258 8.17431 53.426 4.02824 53.6227C-1.01931 52.3924 1.93786 38.7802 2.72758 34.9886C8.3351 30.4511 15.1505 33.0354 16.997 35.7242C18.3597 40.6966 20.8312 51.524 16.3302 52.6994L16.33 52.699Z"
                                                      class="ng-star-inserted"></path><!----></svg><!---->
                                            <svg _ngcontent-wak-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 viewBox="0 0 27 27"
                                                 width="27"
                                                 height="27" class="sd-odontograma-dente__faces">
                                                <path _ngcontent-wak-c443=""
                                                      d="M18.2439 18.2354L24.0947 24.0999C20.7001 27.4945 13.9521 24.7899 13.4002 24.7899C12.8228 24.7899 6.08666 27.4945 2.70581 24.0999C4.85848 21.9473 6.16935 20.6433 8.57728 18.2354H18.2368H18.2439Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area22Vestibular"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.58244 18.2344C6.27799 20.5112 5.03609 21.7531 2.71097 24.0989C-0.683593 20.7182 2.02103 13.9564 2.02103 13.4045C2.02103 12.7836 -0.683593 6.09093 2.71097 2.71008L8.57557 8.58155V18.2411L8.58244 18.2344Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area22Mesial"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.5815 8.57556C6.27705 6.278 5.05583 5.0361 2.73071 2.71098C6.12528 -0.683584 12.8733 2.02103 13.4251 2.02103C14.0026 2.02101 20.7387 -0.683584 24.1196 2.71098C21.9669 4.86365 20.656 6.16762 18.2481 8.57556H8.58854H8.5815Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area22Palatina"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M18.2446 8.57504C20.5491 6.27059 21.7841 5.05632 24.1092 2.72424C27.5038 6.11881 24.7991 12.8668 24.7991 13.4187C24.7992 13.9962 27.5038 20.7323 24.1092 24.1131L18.2446 18.2416V8.58207V8.57504Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area22Distal"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.58374 8.57568V18.2353H18.2433V8.57568H8.58374Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area22Oclusal"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!----></svg>
                                        </div>
                                    </sd-odontograma-dente>
                                    <sd-odontograma-dente _ngcontent-wak-c445="" _nghost-wak-c443=""
                                                          class="ng-star-inserted"
                                                          style="margin-right: 8px;">
                                        <div _ngcontent-wak-c443="" class="sd-odontograma-dente"><span
                                                    _ngcontent-wak-c443=""
                                                    class="sd-odontograma-dente__label"> 23 </span>
                                            <svg _ngcontent-wak-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 class="mat-tooltip-trigger sd-odontograma-dente__dente"
                                                 viewBox="0 0 22 62"
                                                 data-testid="area23"
                                                 height="62" aria-describedby="cdk-describedby-message-wak-1-40"
                                                 cdk-describedby-host="wak-1">
                                                <path _ngcontent-wak-c443=""
                                                      d="M11.0857 1.68847C5.80518 1.26724 6.33213 26.327 4.39551 36.7332C4.18549 37.8617 5.54108 34.7112 10.6466 34.4088C10.6466 34.4088 15.5177 34.3843 17.6839 37.2519C17.3206 26.2169 13.1729 3.24196 11.0858 1.68834L11.0857 1.68847Z"
                                                      class="ng-star-inserted"></path>
                                                <path _ngcontent-wak-c443=""
                                                      d="M11.7313 61.1831C8.50955 60.4271 2.03259 55.2214 1.62647 52.9897C0.836145 50.9927 2.30717 43.2989 3.84064 40.9655C6.34962 36.9721 11.0727 37.0346 11.0727 37.0346C11.0727 37.0346 15.2847 37.1245 17.451 39.9916C19.6173 42.8587 20.9254 50.1176 20.0796 52.4198C19.1533 55.7905 16.5585 59.4359 11.7318 61.183L11.7313 61.1831Z"
                                                      class="ng-star-inserted"></path><!----></svg><!---->
                                            <svg _ngcontent-wak-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 viewBox="0 0 27 27"
                                                 width="27"
                                                 height="27" class="sd-odontograma-dente__faces">
                                                <path _ngcontent-wak-c443=""
                                                      d="M18.2439 18.2354L24.0947 24.0999C20.7001 27.4945 13.9521 24.7899 13.4002 24.7899C12.8228 24.7899 6.08666 27.4945 2.70581 24.0999C4.85848 21.9473 6.16935 20.6433 8.57728 18.2354H18.2368H18.2439Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area23Vestibular"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.58244 18.2344C6.27799 20.5112 5.03609 21.7531 2.71097 24.0989C-0.683593 20.7182 2.02103 13.9564 2.02103 13.4045C2.02103 12.7836 -0.683593 6.09093 2.71097 2.71008L8.57557 8.58155V18.2411L8.58244 18.2344Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area23Mesial"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.5815 8.57556C6.27705 6.278 5.05583 5.0361 2.73071 2.71098C6.12528 -0.683584 12.8733 2.02103 13.4251 2.02103C14.0026 2.02101 20.7387 -0.683584 24.1196 2.71098C21.9669 4.86365 20.656 6.16762 18.2481 8.57556H8.58854H8.5815Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area23Palatina"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M18.2446 8.57504C20.5491 6.27059 21.7841 5.05632 24.1092 2.72424C27.5038 6.11881 24.7991 12.8668 24.7991 13.4187C24.7992 13.9962 27.5038 20.7323 24.1092 24.1131L18.2446 18.2416V8.58207V8.57504Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area23Distal"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.58374 8.57568V18.2353H18.2433V8.57568H8.58374Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area23Oclusal"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!----></svg>
                                        </div>
                                    </sd-odontograma-dente>
                                    <sd-odontograma-dente _ngcontent-wak-c445="" _nghost-wak-c443=""
                                                          class="ng-star-inserted"
                                                          style="margin-right: 8px;">
                                        <div _ngcontent-wak-c443="" class="sd-odontograma-dente"><span
                                                    _ngcontent-wak-c443=""
                                                    class="sd-odontograma-dente__label"> 24 </span>
                                            <svg _ngcontent-wak-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 class="mat-tooltip-trigger sd-odontograma-dente__dente"
                                                 viewBox="0 0 20 52"
                                                 data-testid="area24"
                                                 height="52" aria-describedby="cdk-describedby-message-wak-1-41"
                                                 cdk-describedby-host="wak-1">
                                                <path _ngcontent-wak-c443=""
                                                      d="M9.75101 0.876965C5.89268 1.04054 5.87624 19.7032 3.93942 27.8304C3.67348 28.946 4.42592 26.72 9.53151 26.4176C9.53151 26.4176 14.4026 26.3937 16.5688 29.2606C15.876 23.2399 12.7168 4.02646 9.7508 0.876831L9.75101 0.876965Z"
                                                      class="ng-star-inserted"></path>
                                                <path _ngcontent-wak-c443=""
                                                      d="M9.50444 51.2488C6.6122 51.0625 1.67275 47.6803 1.26663 45.4485C0.476238 43.4515 1.17839 35.302 2.71193 32.9679C5.22084 28.9744 9.94403 29.037 9.94403 29.037C9.94403 29.037 14.1561 29.1269 16.3223 31.994C18.4886 34.8611 19.6868 43.9439 18.841 46.2462C17.9148 49.617 13.4526 50.7548 9.50477 51.2487L9.50444 51.2488Z"
                                                      class="ng-star-inserted"></path><!----></svg><!---->
                                            <svg _ngcontent-wak-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 viewBox="0 0 27 27"
                                                 width="27"
                                                 height="27" class="sd-odontograma-dente__faces">
                                                <path _ngcontent-wak-c443=""
                                                      d="M18.2439 18.2354L24.0947 24.0999C20.7001 27.4945 13.9521 24.7899 13.4002 24.7899C12.8228 24.7899 6.08666 27.4945 2.70581 24.0999C4.85848 21.9473 6.16935 20.6433 8.57728 18.2354H18.2368H18.2439Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area24Vestibular"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.58244 18.2344C6.27799 20.5112 5.03609 21.7531 2.71097 24.0989C-0.683593 20.7182 2.02103 13.9564 2.02103 13.4045C2.02103 12.7836 -0.683593 6.09093 2.71097 2.71008L8.57557 8.58155V18.2411L8.58244 18.2344Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area24Mesial"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.5815 8.57556C6.27705 6.278 5.05583 5.0361 2.73071 2.71098C6.12528 -0.683584 12.8733 2.02103 13.4251 2.02103C14.0026 2.02101 20.7387 -0.683584 24.1196 2.71098C21.9669 4.86365 20.656 6.16762 18.2481 8.57556H8.58854H8.5815Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area24Palatina"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M18.2446 8.57504C20.5491 6.27059 21.7841 5.05632 24.1092 2.72424C27.5038 6.11881 24.7991 12.8668 24.7991 13.4187C24.7992 13.9962 27.5038 20.7323 24.1092 24.1131L18.2446 18.2416V8.58207V8.57504Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area24Distal"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.58374 8.57568V18.2353H18.2433V8.57568H8.58374Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area24Oclusal"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!----></svg>
                                        </div>
                                    </sd-odontograma-dente>
                                    <sd-odontograma-dente _ngcontent-wak-c445="" _nghost-wak-c443=""
                                                          class="ng-star-inserted"
                                                          style="margin-right: 8px;">
                                        <div _ngcontent-wak-c443="" class="sd-odontograma-dente"><span
                                                    _ngcontent-wak-c443=""
                                                    class="sd-odontograma-dente__label"> 25 </span>
                                            <svg _ngcontent-wak-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 class="mat-tooltip-trigger sd-odontograma-dente__dente"
                                                 viewBox="0 0 20 54"
                                                 data-testid="area25"
                                                 height="54" aria-describedby="cdk-describedby-message-wak-1-42"
                                                 cdk-describedby-host="wak-1">
                                                <path _ngcontent-wak-c443=""
                                                      d="M14.2192 2.61953C12.1103 5.50713 5.90854 24.17 2.68604 32.3767C3.40606 31.1992 6.29239 29.7937 10.0453 29.9834C10.0453 29.9834 14.9164 29.8453 16.3138 32.2566C15.2205 25.161 16.8325 -1.83083 14.2191 2.61933L14.2192 2.61953Z"
                                                      class="ng-star-inserted"></path>
                                                <path _ngcontent-wak-c443=""
                                                      d="M6.88066 2.62537C8.00105 4.60127 8.82054 6.85292 9.07733 8.67764C8.46284 11.0976 6.95345 14.7461 5.00563 19.9544C4.45137 15.4802 4.48684 1.02418 6.88066 2.6255V2.62537Z"
                                                      class="ng-star-inserted"></path>
                                                <path _ngcontent-wak-c443=""
                                                      d="M9.90949 53.3085C7.56648 53.3502 1.82009 48.0544 1.34175 46.8245C0.864072 45.5946 1.05313 43.1882 1.12634 41.4217C1.19962 39.6552 1.83001 36.0355 2.54997 34.858C3.27 33.6805 6.15636 32.275 9.90929 32.4647C9.90929 32.4647 14.7803 32.3266 16.1777 34.7379C17.5751 37.1491 19.5422 45.5483 18.9161 47.8505C17.4602 50.2543 13.1371 52.2994 9.90912 53.3088L9.90949 53.3085Z"
                                                      class="ng-star-inserted"></path><!----></svg><!---->
                                            <svg _ngcontent-wak-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 viewBox="0 0 27 27"
                                                 width="27"
                                                 height="27" class="sd-odontograma-dente__faces">
                                                <path _ngcontent-wak-c443=""
                                                      d="M18.2439 18.2354L24.0947 24.0999C20.7001 27.4945 13.9521 24.7899 13.4002 24.7899C12.8228 24.7899 6.08666 27.4945 2.70581 24.0999C4.85848 21.9473 6.16935 20.6433 8.57728 18.2354H18.2368H18.2439Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area25Vestibular"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.58244 18.2344C6.27799 20.5112 5.03609 21.7531 2.71097 24.0989C-0.683593 20.7182 2.02103 13.9564 2.02103 13.4045C2.02103 12.7836 -0.683593 6.09093 2.71097 2.71008L8.57557 8.58155V18.2411L8.58244 18.2344Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area25Mesial"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.5815 8.57556C6.27705 6.278 5.05583 5.0361 2.73071 2.71098C6.12528 -0.683584 12.8733 2.02103 13.4251 2.02103C14.0026 2.02101 20.7387 -0.683584 24.1196 2.71098C21.9669 4.86365 20.656 6.16762 18.2481 8.57556H8.58854H8.5815Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area25Palatina"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M18.2446 8.57504C20.5491 6.27059 21.7841 5.05632 24.1092 2.72424C27.5038 6.11881 24.7991 12.8668 24.7991 13.4187C24.7992 13.9962 27.5038 20.7323 24.1092 24.1131L18.2446 18.2416V8.58207V8.57504Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area25Distal"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.58374 8.57568V18.2353H18.2433V8.57568H8.58374Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area25Oclusal"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!----></svg>
                                        </div>
                                    </sd-odontograma-dente>
                                    <sd-odontograma-dente _ngcontent-wak-c445="" _nghost-wak-c443=""
                                                          class="ng-star-inserted"
                                                          style="margin-right: 8px;">
                                        <div _ngcontent-wak-c443="" class="sd-odontograma-dente"><span
                                                    _ngcontent-wak-c443=""
                                                    class="sd-odontograma-dente__label"> 26 </span>
                                            <svg _ngcontent-wak-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 class="mat-tooltip-trigger sd-odontograma-dente__dente"
                                                 viewBox="0 0 24 51"
                                                 data-testid="area26"
                                                 height="51" aria-describedby="cdk-describedby-message-wak-1-43"
                                                 cdk-describedby-host="wak-1">
                                                <path _ngcontent-wak-c443=""
                                                      d="M17.6694 4.49559C14.0677 6.86258 16.4448 21.7761 11.4085 23.6299C5.33088 24.4694 10.6066 3.87812 6.02648 2.90024C1.72929 7.14051 1.10207 31.0515 2.52895 29.1686C4.70838 27.2264 7.7987 25.3978 10.2003 25.4656C12.6019 25.5334 18.0373 27.379 19.6538 27.8527C21.6813 24.3176 19.9845 4.85859 17.6691 4.49553L17.6694 4.49559Z"
                                                      class="ng-star-inserted"></path>
                                                <path _ngcontent-wak-c443=""
                                                      d="M11.1408 20.8135C10.1626 20.2532 9.81451 16.364 10.0722 12.0774C10.3164 8.01526 11.0933 3.59583 12.7886 1.31345C14.2243 0.425865 13.9539 5.40465 13.5949 10.4881C13.2457 15.4313 12.6289 20.1191 11.1408 20.8135Z"
                                                      class="ng-star-inserted"></path>
                                                <path _ngcontent-wak-c443=""
                                                      d="M21.6879 48.6123C20.0633 51.6631 9.91888 49.3678 8.06779 48.9422C1.99021 49.7817 1.0053 49.1347 0.928449 46.7889C0.585528 41.9118 0.397662 34.4819 1.82454 32.599C4.00397 30.6569 6.6549 28.3722 9.38588 28.0982C12.1171 27.8242 17.4422 29.5557 19.0594 30.0294C20.6765 30.5033 22.7534 35.3692 22.5666 38.4693C22.3799 41.5692 23.3125 45.5616 21.6879 48.6125V48.6123Z"
                                                      class="ng-star-inserted"></path><!----></svg><!---->
                                            <svg _ngcontent-wak-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 viewBox="0 0 27 27"
                                                 width="27"
                                                 height="27" class="sd-odontograma-dente__faces">
                                                <path _ngcontent-wak-c443=""
                                                      d="M18.2439 18.2354L24.0947 24.0999C20.7001 27.4945 13.9521 24.7899 13.4002 24.7899C12.8228 24.7899 6.08666 27.4945 2.70581 24.0999C4.85848 21.9473 6.16935 20.6433 8.57728 18.2354H18.2368H18.2439Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area26Vestibular"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.58244 18.2344C6.27799 20.5112 5.03609 21.7531 2.71097 24.0989C-0.683593 20.7182 2.02103 13.9564 2.02103 13.4045C2.02103 12.7836 -0.683593 6.09093 2.71097 2.71008L8.57557 8.58155V18.2411L8.58244 18.2344Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area26Mesial"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.5815 8.57556C6.27705 6.278 5.05583 5.0361 2.73071 2.71098C6.12528 -0.683584 12.8733 2.02103 13.4251 2.02103C14.0026 2.02101 20.7387 -0.683584 24.1196 2.71098C21.9669 4.86365 20.656 6.16762 18.2481 8.57556H8.58854H8.5815Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area26Palatina"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M18.2446 8.57504C20.5491 6.27059 21.7841 5.05632 24.1092 2.72424C27.5038 6.11881 24.7991 12.8668 24.7991 13.4187C24.7992 13.9962 27.5038 20.7323 24.1092 24.1131L18.2446 18.2416V8.58207V8.57504Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area26Distal"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.58374 8.57568V18.2353H18.2433V8.57568H8.58374Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area26Oclusal"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!----></svg>
                                        </div>
                                    </sd-odontograma-dente>
                                    <sd-odontograma-dente _ngcontent-wak-c445="" _nghost-wak-c443=""
                                                          class="ng-star-inserted"
                                                          style="margin-right: 8px;">
                                        <div _ngcontent-wak-c443="" class="sd-odontograma-dente"><span
                                                    _ngcontent-wak-c443=""
                                                    class="sd-odontograma-dente__label"> 27 </span>
                                            <svg _ngcontent-wak-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 class="mat-tooltip-trigger sd-odontograma-dente__dente"
                                                 viewBox="0 0 23 51"
                                                 data-testid="area27"
                                                 height="51" aria-describedby="cdk-describedby-message-wak-1-44"
                                                 cdk-describedby-host="wak-1">
                                                <path _ngcontent-wak-c443=""
                                                      d="M16.7851 5.98518C12.6342 10.6315 17.3179 18.8209 11.4028 24.6637C4.99576 24.4774 9.28284 3.43049 5.69131 4.38983C2.38261 4.41301 0.217635 31.4008 2.74304 29.9744C4.81256 28.0323 7.3537 27.5712 10.0851 27.2972C12.8162 27.0231 16.6037 27.6149 18.8801 29.0005C20.763 28.1432 19.3873 8.47758 16.7855 5.98518H16.7851Z"
                                                      class="ng-star-inserted"></path>
                                                <path _ngcontent-wak-c443=""
                                                      d="M10.6782 22.2111C9.69999 21.6508 8.91257 16.622 9.17023 12.3348C9.41437 8.27265 10.4109 4.08114 12.1063 1.79875C14.6402 -0.000525475 13.4912 6.80172 13.1322 11.885C12.7831 16.8283 13.0449 20.6044 10.6782 22.2104V22.2111Z"
                                                      class="ng-star-inserted"></path>
                                                <path _ngcontent-wak-c443=""
                                                      d="M21.1553 47.7717C19.5306 50.8225 11.2532 49.7808 9.40212 49.3551C3.32454 50.1946 1.24116 48.408 1.16431 46.0622C0.821389 41.1852 0.413882 34.0971 2.93922 32.67C5.0088 30.7279 7.44007 29.9249 10.1713 29.6508C12.9025 29.3768 14.3833 29.8547 16.0004 30.3285C17.6174 30.8023 20.4633 33.1609 21.0454 36.0329C21.6275 38.905 22.7798 44.7206 21.1552 47.7715L21.1553 47.7717Z"
                                                      class="ng-star-inserted"></path><!----></svg><!---->
                                            <svg _ngcontent-wak-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 viewBox="0 0 27 27"
                                                 width="27"
                                                 height="27" class="sd-odontograma-dente__faces">
                                                <path _ngcontent-wak-c443=""
                                                      d="M18.2439 18.2354L24.0947 24.0999C20.7001 27.4945 13.9521 24.7899 13.4002 24.7899C12.8228 24.7899 6.08666 27.4945 2.70581 24.0999C4.85848 21.9473 6.16935 20.6433 8.57728 18.2354H18.2368H18.2439Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area27Vestibular"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.58244 18.2344C6.27799 20.5112 5.03609 21.7531 2.71097 24.0989C-0.683593 20.7182 2.02103 13.9564 2.02103 13.4045C2.02103 12.7836 -0.683593 6.09093 2.71097 2.71008L8.57557 8.58155V18.2411L8.58244 18.2344Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area27Mesial"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.5815 8.57556C6.27705 6.278 5.05583 5.0361 2.73071 2.71098C6.12528 -0.683584 12.8733 2.02103 13.4251 2.02103C14.0026 2.02101 20.7387 -0.683584 24.1196 2.71098C21.9669 4.86365 20.656 6.16762 18.2481 8.57556H8.58854H8.5815Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area27Palatina"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M18.2446 8.57504C20.5491 6.27059 21.7841 5.05632 24.1092 2.72424C27.5038 6.11881 24.7991 12.8668 24.7991 13.4187C24.7992 13.9962 27.5038 20.7323 24.1092 24.1131L18.2446 18.2416V8.58207V8.57504Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area27Distal"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.58374 8.57568V18.2353H18.2433V8.57568H8.58374Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area27Oclusal"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!----></svg>
                                        </div>
                                    </sd-odontograma-dente>
                                    <sd-odontograma-dente _ngcontent-wak-c445="" _nghost-wak-c443=""
                                                          class="ng-star-inserted">
                                        <div _ngcontent-wak-c443="" class="sd-odontograma-dente"><span
                                                    _ngcontent-wak-c443=""
                                                    class="sd-odontograma-dente__label"> 28 </span>
                                            <svg _ngcontent-wak-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 class="mat-tooltip-trigger sd-odontograma-dente__dente"
                                                 viewBox="0 0 22 47"
                                                 data-testid="area28"
                                                 height="47" aria-describedby="cdk-describedby-message-wak-1-45"
                                                 cdk-describedby-host="wak-1">
                                                <path _ngcontent-wak-c443=""
                                                      d="M17.1012 4.10639C15.2569 4.07989 14.8879 20.0195 10.6204 22.1012C4.76249 18.9519 8.61034 7.1361 6.00729 2.39708C1.9298 -0.428511 1.0829 28.7244 1.96055 27.184C4.13998 25.2419 7.34016 24.211 10.0711 23.9369C12.8023 23.6628 15.2717 25.0525 17.6577 25.5263C19.0827 20.831 19.6894 9.95964 17.1009 4.10692L17.1012 4.10639Z"
                                                      class="ng-star-inserted"></path>
                                                <path _ngcontent-wak-c443=""
                                                      d="M10.5868 19.3705C9.60849 18.8102 8.49154 14.0093 8.74926 9.72222C8.9934 5.66003 10.3194 3.97584 12.0148 1.69312C14.5488 -0.106228 14.1509 3.80371 13.2604 8.81655C12.3621 13.8738 12.0748 16.6244 10.5868 19.3699V19.3705Z"
                                                      class="ng-star-inserted"></path>
                                                <path _ngcontent-wak-c443=""
                                                      d="M19.6973 43.9231C18.1825 45.7202 10.5644 45.4763 8.71336 45.0507C5.71127 46.232 1.3209 44.7873 1.24405 42.4415C0.901131 37.5645 1.15264 31.5019 2.03035 29.9616C4.20978 28.0194 7.4099 26.9884 10.1409 26.7144C12.8721 26.4404 15.3415 27.83 17.7275 28.3038C20.1134 28.7776 21.4215 32.6178 21.2348 35.7174C21.048 38.8174 21.2115 42.1259 19.697 43.9228L19.6973 43.9231Z"
                                                      class="ng-star-inserted"></path><!----></svg><!---->
                                            <svg _ngcontent-wak-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 viewBox="0 0 27 27"
                                                 width="27"
                                                 height="27" class="sd-odontograma-dente__faces">
                                                <path _ngcontent-wak-c443=""
                                                      d="M18.2439 18.2354L24.0947 24.0999C20.7001 27.4945 13.9521 24.7899 13.4002 24.7899C12.8228 24.7899 6.08666 27.4945 2.70581 24.0999C4.85848 21.9473 6.16935 20.6433 8.57728 18.2354H18.2368H18.2439Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area28Vestibular"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.58244 18.2344C6.27799 20.5112 5.03609 21.7531 2.71097 24.0989C-0.683593 20.7182 2.02103 13.9564 2.02103 13.4045C2.02103 12.7836 -0.683593 6.09093 2.71097 2.71008L8.57557 8.58155V18.2411L8.58244 18.2344Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area28Mesial"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.5815 8.57556C6.27705 6.278 5.05583 5.0361 2.73071 2.71098C6.12528 -0.683584 12.8733 2.02103 13.4251 2.02103C14.0026 2.02101 20.7387 -0.683584 24.1196 2.71098C21.9669 4.86365 20.656 6.16762 18.2481 8.57556H8.58854H8.5815Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area28Palatina"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M18.2446 8.57504C20.5491 6.27059 21.7841 5.05632 24.1092 2.72424C27.5038 6.11881 24.7991 12.8668 24.7991 13.4187C24.7992 13.9962 27.5038 20.7323 24.1092 24.1131L18.2446 18.2416V8.58207V8.57504Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area28Distal"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.58374 8.57568V18.2353H18.2433V8.57568H8.58374Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area28Oclusal"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!----></svg>
                                        </div>
                                    </sd-odontograma-dente><!----></div>
                            </div>
                            <div class="col-1 d-flex align-items-center justify-content-center">
                                <h5 class="fs-6">D</h5>
                            </div>
                        </div>
                        <div class="col-12 d-flex align-items-center justify-content-center">
                            <h5 class="fs-6">V</h5>
                        </div>
                    </div>

                </div>

                <div class="bop-diagram diagram-row d-flex flex-column flex-md-row py-3">

                    <div class="col-12 col-md-6 d-flex flex-column">
                        <div class="col-12 d-flex align-items-center justify-content-center">
                            <h5 class="fs-6">V</h5>
                        </div>
                        <div class="col-12 d-flex align-items-center justify-content-center">
                            <div class="col-1 d-flex align-items-center justify-content-center">
                                <h5 class="fs-6">D</h5>
                            </div>
                            <div class="d-flex align-items-center justify-content-center">
                                <div class="diagram-cell "
                                     style="flex-direction: row; box-sizing: border-box; display: flex;">
                                    <sd-odontograma-dente _ngcontent-wak-c445="" _nghost-wak-c443=""
                                                          class="ng-star-inserted"
                                                          style="margin-right: 8px;">
                                        <div _ngcontent-wak-c443=""
                                             class="sd-odontograma-dente sd-odontograma-dente--reversed"><span
                                                    _ngcontent-wak-c443=""
                                                    class="sd-odontograma-dente__label"> 48 </span>
                                            <svg _ngcontent-wak-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 class="mat-tooltip-trigger sd-odontograma-dente__dente"
                                                 viewBox="0 0 23 51"
                                                 data-testid="area48"
                                                 height="51" aria-describedby="cdk-describedby-message-wak-1-46"
                                                 cdk-describedby-host="wak-1">
                                                <path _ngcontent-wak-c443=""
                                                      d="M7.53584 49.2495C10.8497 48.395 6.35642 29.3255 11.6105 29.0048C16.2301 29.3551 12.558 44.9312 15.6954 46.5219C16.6568 46.9955 17.5933 40.641 18.4935 33.8903C19.4557 26.6741 19.7443 21.8496 19.096 20.9307C17.1278 22.2268 16.6146 22.0006 14.6422 21.8433C10.7811 21.418 7.87651 22.2038 4.71032 21.3733C2.74912 20.7756 3.0939 26.9788 3.89741 33.7407C4.72841 40.7342 4.60154 48.0776 7.53578 49.2496L7.53584 49.2495Z"
                                                      class="ng-star-inserted"></path>
                                                <path _ngcontent-wak-c443=""
                                                      d="M2.68525 3.2977C4.80141 1.08647 5.74232 2.25039 7.8616 1.70401C11.1755 0.849491 14.7598 1.5234 15.8198 1.76694C17.1774 2.03665 19.7318 1.27363 21.0698 3.97241C21.8784 5.60341 21.9659 8.57568 21.5767 11.8644C21.2359 14.7434 20.0857 16.276 19.2666 17.7068C18.4634 19.2448 16.6298 19.8245 14.6574 19.6672C10.7964 19.2419 7.89174 20.0275 4.72555 19.1972C2.73673 19.219 2.19651 15.9328 1.91726 12.1241C1.6386 8.32485 0.685097 5.53597 2.68525 3.29665V3.2977Z"
                                                      class="ng-star-inserted"></path><!----></svg><!---->
                                            <svg _ngcontent-wak-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 viewBox="0 0 27 27"
                                                 width="27"
                                                 height="27" class="sd-odontograma-dente__faces">
                                                <path _ngcontent-wak-c443=""
                                                      d="M18.2439 18.2354L24.0947 24.0999C20.7001 27.4945 13.9521 24.7899 13.4002 24.7899C12.8228 24.7899 6.08666 27.4945 2.70581 24.0999C4.85848 21.9473 6.16935 20.6433 8.57728 18.2354H18.2368H18.2439Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area48Vestibular"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.58244 18.2344C6.27799 20.5112 5.03609 21.7531 2.71097 24.0989C-0.683593 20.7182 2.02103 13.9564 2.02103 13.4045C2.02103 12.7836 -0.683593 6.09093 2.71097 2.71008L8.57557 8.58155V18.2411L8.58244 18.2344Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area48Distal"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.5815 8.57556C6.27705 6.278 5.05583 5.0361 2.73071 2.71098C6.12528 -0.683584 12.8733 2.02103 13.4251 2.02103C14.0026 2.02101 20.7387 -0.683584 24.1196 2.71098C21.9669 4.86365 20.656 6.16762 18.2481 8.57556H8.58854H8.5815Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area48Palatina"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M18.2446 8.57504C20.5491 6.27059 21.7841 5.05632 24.1092 2.72424C27.5038 6.11881 24.7991 12.8668 24.7991 13.4187C24.7992 13.9962 27.5038 20.7323 24.1092 24.1131L18.2446 18.2416V8.58207V8.57504Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area48Mesial"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.58374 8.57568V18.2353H18.2433V8.57568H8.58374Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area48Oclusal"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!----></svg>
                                        </div>
                                    </sd-odontograma-dente>
                                    <sd-odontograma-dente _ngcontent-wak-c445="" _nghost-wak-c443=""
                                                          class="ng-star-inserted"
                                                          style="margin-right: 8px;">
                                        <div _ngcontent-wak-c443=""
                                             class="sd-odontograma-dente sd-odontograma-dente--reversed"><span
                                                    _ngcontent-wak-c443=""
                                                    class="sd-odontograma-dente__label"> 47 </span>
                                            <svg _ngcontent-wak-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 class="mat-tooltip-trigger sd-odontograma-dente__dente"
                                                 viewBox="0 0 24 52"
                                                 data-testid="area47"
                                                 height="52" aria-describedby="cdk-describedby-message-wak-1-47"
                                                 cdk-describedby-host="wak-1">
                                                <path _ngcontent-wak-c443=""
                                                      d="M3.82767 37.8464C4.23519 42.5655 5.31027 51.5824 7.37303 50.8384C11.3083 49.42 5.8053 30.3499 11.603 30.9164C15.8343 31.9114 12.0472 46.7421 15.921 48.5945C18.5153 49.835 19.4554 32.8 19.9229 29.4907C20.2993 26.8269 20.1406 19.9609 19.3215 21.3913C18.8503 22.0685 17.1884 22.7667 16.2658 22.5459C12.4047 22.1205 10.5097 22.9868 7.34361 22.1565C5.19287 21.5923 4.91097 21.7763 3.99854 20.308C2.24359 17.4498 3.42009 33.1272 3.82761 37.8463L3.82767 37.8464Z"
                                                      class="ng-star-inserted"></path>
                                                <path _ngcontent-wak-c443=""
                                                      d="M2.0559 2.62743C4.17213 0.4162 6.20038 1.82195 8.31965 1.2755C11.6336 0.421044 14.5188 1.09495 15.5789 1.33843C16.9365 1.60814 20.6055 0.160202 22.1492 2.73801C23.6569 5.25552 22.0357 7.5831 21.6465 10.8718C21.3057 13.7508 21.7865 15.2834 20.9674 16.7142C20.1643 18.2522 18.3306 20.1213 16.3582 19.9641C12.4972 19.5386 10.6022 20.4049 7.43605 19.5745C5.2853 19.0105 3.68306 17.0187 2.77064 15.5503C2.33602 11.0804 -0.0601921 4.83801 2.05597 2.62717L2.0559 2.62743Z"
                                                      class="ng-star-inserted"></path><!----></svg><!---->
                                            <svg _ngcontent-wak-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 viewBox="0 0 27 27"
                                                 width="27"
                                                 height="27" class="sd-odontograma-dente__faces">
                                                <path _ngcontent-wak-c443=""
                                                      d="M18.2439 18.2354L24.0947 24.0999C20.7001 27.4945 13.9521 24.7899 13.4002 24.7899C12.8228 24.7899 6.08666 27.4945 2.70581 24.0999C4.85848 21.9473 6.16935 20.6433 8.57728 18.2354H18.2368H18.2439Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area47Vestibular"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.58244 18.2344C6.27799 20.5112 5.03609 21.7531 2.71097 24.0989C-0.683593 20.7182 2.02103 13.9564 2.02103 13.4045C2.02103 12.7836 -0.683593 6.09093 2.71097 2.71008L8.57557 8.58155V18.2411L8.58244 18.2344Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area47Distal"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.5815 8.57556C6.27705 6.278 5.05583 5.0361 2.73071 2.71098C6.12528 -0.683584 12.8733 2.02103 13.4251 2.02103C14.0026 2.02101 20.7387 -0.683584 24.1196 2.71098C21.9669 4.86365 20.656 6.16762 18.2481 8.57556H8.58854H8.5815Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area47Palatina"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M18.2446 8.57504C20.5491 6.27059 21.7841 5.05632 24.1092 2.72424C27.5038 6.11881 24.7991 12.8668 24.7991 13.4187C24.7992 13.9962 27.5038 20.7323 24.1092 24.1131L18.2446 18.2416V8.58207V8.57504Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area47Mesial"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.58374 8.57568V18.2353H18.2433V8.57568H8.58374Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area47Oclusal"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!----></svg>
                                        </div>
                                    </sd-odontograma-dente>
                                    <sd-odontograma-dente _ngcontent-wak-c445="" _nghost-wak-c443=""
                                                          class="ng-star-inserted"
                                                          style="margin-right: 8px;">
                                        <div _ngcontent-wak-c443=""
                                             class="sd-odontograma-dente sd-odontograma-dente--reversed"><span
                                                    _ngcontent-wak-c443=""
                                                    class="sd-odontograma-dente__label"> 46 </span>
                                            <svg _ngcontent-wak-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 class="mat-tooltip-trigger sd-odontograma-dente__dente"
                                                 viewBox="0 0 24 52"
                                                 data-testid="area46"
                                                 height="52" aria-describedby="cdk-describedby-message-wak-1-48"
                                                 cdk-describedby-host="wak-1">
                                                <path _ngcontent-wak-c443=""
                                                      d="M11.5001 30.5259C16.5857 30.3928 11.9413 49.2342 15.5073 49.0096C18.1228 48.8448 19.9529 21.6879 19.5292 22.8539C18.0271 24.6336 14.6401 24.0852 12.7457 23.9279C9.32593 23.2364 4.83979 24.6183 3.35243 22.0123C2.29643 20.927 3.59504 50.2517 6.75421 50.7519C11.3599 51.4585 6.09858 30.4628 11.5005 30.5251L11.5001 30.5259Z"
                                                      class="ng-star-inserted"></path>
                                                <path _ngcontent-wak-c443=""
                                                      d="M2.75202 2.65382C5.52288 -0.0688851 9.22001 1.01997 11.0713 1.44557C12.4289 1.71535 20.925 0.184661 22.3792 3.57055C23.2083 5.501 22.4754 14.5273 22.0517 15.6934C20.6273 20.2935 17.3179 21.9209 14.8793 21.6024C11.4595 20.911 4.09938 22.4542 2.61202 18.5587C2.02205 15.7812 -0.0191174 5.37652 2.75168 2.65355L2.75202 2.65382Z"
                                                      class="ng-star-inserted"></path><!----></svg><!---->
                                            <svg _ngcontent-wak-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 viewBox="0 0 27 27"
                                                 width="27"
                                                 height="27" class="sd-odontograma-dente__faces">
                                                <path _ngcontent-wak-c443=""
                                                      d="M18.2439 18.2354L24.0947 24.0999C20.7001 27.4945 13.9521 24.7899 13.4002 24.7899C12.8228 24.7899 6.08666 27.4945 2.70581 24.0999C4.85848 21.9473 6.16935 20.6433 8.57728 18.2354H18.2368H18.2439Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area46Vestibular"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.58244 18.2344C6.27799 20.5112 5.03609 21.7531 2.71097 24.0989C-0.683593 20.7182 2.02103 13.9564 2.02103 13.4045C2.02103 12.7836 -0.683593 6.09093 2.71097 2.71008L8.57557 8.58155V18.2411L8.58244 18.2344Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area46Distal"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.5815 8.57556C6.27705 6.278 5.05583 5.0361 2.73071 2.71098C6.12528 -0.683584 12.8733 2.02103 13.4251 2.02103C14.0026 2.02101 20.7387 -0.683584 24.1196 2.71098C21.9669 4.86365 20.656 6.16762 18.2481 8.57556H8.58854H8.5815Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area46Palatina"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M18.2446 8.57504C20.5491 6.27059 21.7841 5.05632 24.1092 2.72424C27.5038 6.11881 24.7991 12.8668 24.7991 13.4187C24.7992 13.9962 27.5038 20.7323 24.1092 24.1131L18.2446 18.2416V8.58207V8.57504Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area46Mesial"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.58374 8.57568V18.2353H18.2433V8.57568H8.58374Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area46Oclusal"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!----></svg>
                                        </div>
                                    </sd-odontograma-dente>
                                    <sd-odontograma-dente _ngcontent-wak-c445="" _nghost-wak-c443=""
                                                          class="ng-star-inserted"
                                                          style="margin-right: 8px;">
                                        <div _ngcontent-wak-c443=""
                                             class="sd-odontograma-dente sd-odontograma-dente--reversed"><span
                                                    _ngcontent-wak-c443=""
                                                    class="sd-odontograma-dente__label"> 45 </span>
                                            <svg _ngcontent-wak-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 class="mat-tooltip-trigger sd-odontograma-dente__dente"
                                                 viewBox="0 0 20 53"
                                                 data-testid="area45"
                                                 height="53" aria-describedby="cdk-describedby-message-wak-1-49"
                                                 cdk-describedby-host="wak-1">
                                                <path _ngcontent-wak-c443=""
                                                      d="M10.3598 52.1767C13.3004 52.2403 11.9568 46.7298 13.4643 38.0014C14.8203 30.1499 17.1457 21.1893 16.648 21.4185C15.6153 23.0366 12.329 23.7515 7.64428 23.8462C5.85554 23.5577 3.23335 21.8775 2.44495 20.3995C4.30617 26.1341 6.50276 52.6167 10.3601 52.1767H10.3598Z"
                                                      class="ng-star-inserted"></path>
                                                <path _ngcontent-wak-c443=""
                                                      d="M1.5576 5.19133C2.69734 3.51621 8.72476 0.414612 10.5758 0.840217C12.304 1.29014 17.3819 3.75724 18.3718 5.17603C18.8663 6.91753 18.6645 16.056 17.6405 17.6831C16.0641 20.1876 12.4672 21.3861 7.78213 21.4808C5.99339 21.1922 2.51694 18.2227 1.72847 16.7447C0.905549 14.6925 0.417737 6.86651 1.55754 5.19166L1.5576 5.19133Z"
                                                      class="ng-star-inserted"></path><!----></svg><!---->
                                            <svg _ngcontent-wak-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 viewBox="0 0 27 27"
                                                 width="27"
                                                 height="27" class="sd-odontograma-dente__faces">
                                                <path _ngcontent-wak-c443=""
                                                      d="M18.2439 18.2354L24.0947 24.0999C20.7001 27.4945 13.9521 24.7899 13.4002 24.7899C12.8228 24.7899 6.08666 27.4945 2.70581 24.0999C4.85848 21.9473 6.16935 20.6433 8.57728 18.2354H18.2368H18.2439Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area45Vestibular"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.58244 18.2344C6.27799 20.5112 5.03609 21.7531 2.71097 24.0989C-0.683593 20.7182 2.02103 13.9564 2.02103 13.4045C2.02103 12.7836 -0.683593 6.09093 2.71097 2.71008L8.57557 8.58155V18.2411L8.58244 18.2344Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area45Distal"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.5815 8.57556C6.27705 6.278 5.05583 5.0361 2.73071 2.71098C6.12528 -0.683584 12.8733 2.02103 13.4251 2.02103C14.0026 2.02101 20.7387 -0.683584 24.1196 2.71098C21.9669 4.86365 20.656 6.16762 18.2481 8.57556H8.58854H8.5815Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area45Palatina"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M18.2446 8.57504C20.5491 6.27059 21.7841 5.05632 24.1092 2.72424C27.5038 6.11881 24.7991 12.8668 24.7991 13.4187C24.7992 13.9962 27.5038 20.7323 24.1092 24.1131L18.2446 18.2416V8.58207V8.57504Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area45Mesial"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.58374 8.57568V18.2353H18.2433V8.57568H8.58374Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area45Oclusal"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!----></svg>
                                        </div>
                                    </sd-odontograma-dente>
                                    <sd-odontograma-dente _ngcontent-wak-c445="" _nghost-wak-c443=""
                                                          class="ng-star-inserted"
                                                          style="margin-right: 8px;">
                                        <div _ngcontent-wak-c443=""
                                             class="sd-odontograma-dente sd-odontograma-dente--reversed"><span
                                                    _ngcontent-wak-c443=""
                                                    class="sd-odontograma-dente__label"> 44 </span>
                                            <svg _ngcontent-wak-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 class="mat-tooltip-trigger sd-odontograma-dente__dente"
                                                 viewBox="0 0 20 54"
                                                 data-testid="area44"
                                                 height="54" aria-describedby="cdk-describedby-message-wak-1-50"
                                                 cdk-describedby-host="wak-1">
                                                <path _ngcontent-wak-c443=""
                                                      d="M11.072 52.4429C13.6067 52.4688 13.202 44.278 14.587 37.0751C16.0866 29.2772 18.4929 22.7096 17.5478 21.7238C16.0457 23.1005 14.9887 24.0831 13.094 23.9258C9.67423 23.6373 4.33351 23.4076 3.00184 21.6074C1.99885 24.0833 4.87273 35.7655 6.80531 43.1672C8.68508 50.3668 8.74451 52.5167 11.0723 52.4425L11.072 52.4429Z"
                                                      class="ng-star-inserted"></path>
                                                <path _ngcontent-wak-c443=""
                                                      d="M1.92397 5.59619C2.59776 3.92107 8.39197 0.416522 10.2433 0.842192C11.6008 1.1119 18.3525 3.39688 18.9104 5.06233C19.8439 7.8487 18.5405 16.5027 18.1169 17.6688C17.4691 19.5291 14.5481 21.7205 12.6534 21.5632C9.23364 21.2747 3.58213 20.8838 2.6387 18.2777C1.73807 15.339 1.25031 7.27125 1.92403 5.59573L1.92397 5.59619Z"
                                                      class="ng-star-inserted"></path><!----></svg><!---->
                                            <svg _ngcontent-wak-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 viewBox="0 0 27 27"
                                                 width="27"
                                                 height="27" class="sd-odontograma-dente__faces">
                                                <path _ngcontent-wak-c443=""
                                                      d="M18.2439 18.2354L24.0947 24.0999C20.7001 27.4945 13.9521 24.7899 13.4002 24.7899C12.8228 24.7899 6.08666 27.4945 2.70581 24.0999C4.85848 21.9473 6.16935 20.6433 8.57728 18.2354H18.2368H18.2439Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area44Vestibular"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.58244 18.2344C6.27799 20.5112 5.03609 21.7531 2.71097 24.0989C-0.683593 20.7182 2.02103 13.9564 2.02103 13.4045C2.02103 12.7836 -0.683593 6.09093 2.71097 2.71008L8.57557 8.58155V18.2411L8.58244 18.2344Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area44Distal"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.5815 8.57556C6.27705 6.278 5.05583 5.0361 2.73071 2.71098C6.12528 -0.683584 12.8733 2.02103 13.4251 2.02103C14.0026 2.02101 20.7387 -0.683584 24.1196 2.71098C21.9669 4.86365 20.656 6.16762 18.2481 8.57556H8.58854H8.5815Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area44Palatina"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M18.2446 8.57504C20.5491 6.27059 21.7841 5.05632 24.1092 2.72424C27.5038 6.11881 24.7991 12.8668 24.7991 13.4187C24.7992 13.9962 27.5038 20.7323 24.1092 24.1131L18.2446 18.2416V8.58207V8.57504Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area44Mesial"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.58374 8.57568V18.2353H18.2433V8.57568H8.58374Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area44Oclusal"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!----></svg>
                                        </div>
                                    </sd-odontograma-dente>
                                    <sd-odontograma-dente _ngcontent-wak-c445="" _nghost-wak-c443=""
                                                          class="ng-star-inserted"
                                                          style="margin-right: 8px;">
                                        <div _ngcontent-wak-c443=""
                                             class="sd-odontograma-dente sd-odontograma-dente--reversed"><span
                                                    _ngcontent-wak-c443=""
                                                    class="sd-odontograma-dente__label"> 43 </span>
                                            <svg _ngcontent-wak-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 class="mat-tooltip-trigger sd-odontograma-dente__dente"
                                                 viewBox="0 0 20 60"
                                                 data-testid="area43"
                                                 height="60" aria-describedby="cdk-describedby-message-wak-1-51"
                                                 cdk-describedby-host="wak-1">
                                                <path _ngcontent-wak-c443=""
                                                      d="M11.554 58.7489C14.5048 58.7681 12.5595 51.3479 14.2495 44.4351C16.5533 35.0114 18.0081 26.7617 17.6415 23.5975C15.8117 26.0698 11.8055 27.3486 10.2365 27.0084C6.81672 26.7199 3.26282 23.0249 2.47441 21.5471C1.22033 22.7046 3.39599 31.8129 5.48128 40.9272C7.52748 49.8706 7.66567 58.8358 11.5545 58.7491L11.554 58.7489Z"
                                                      class="ng-star-inserted"></path>
                                                <path _ngcontent-wak-c443=""
                                                      d="M1.03665 7.13838C1.71044 5.46326 10.0675 1.23346 11.9186 1.65906C13.6468 2.10898 17.5599 5.86548 18.8605 8.49298C19.5936 16.2836 18.4613 24.2517 10.3676 24.5558C6.94788 24.2674 2.46174 18.9608 1.67334 17.4827C0.772703 14.544 0.362611 8.81298 1.03633 7.13812L1.03665 7.13838Z"
                                                      class="ng-star-inserted"></path><!----></svg><!---->
                                            <svg _ngcontent-wak-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 viewBox="0 0 27 27"
                                                 width="27"
                                                 height="27" class="sd-odontograma-dente__faces">
                                                <path _ngcontent-wak-c443=""
                                                      d="M18.2439 18.2354L24.0947 24.0999C20.7001 27.4945 13.9521 24.7899 13.4002 24.7899C12.8228 24.7899 6.08666 27.4945 2.70581 24.0999C4.85848 21.9473 6.16935 20.6433 8.57728 18.2354H18.2368H18.2439Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area43Vestibular"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.58244 18.2344C6.27799 20.5112 5.03609 21.7531 2.71097 24.0989C-0.683593 20.7182 2.02103 13.9564 2.02103 13.4045C2.02103 12.7836 -0.683593 6.09093 2.71097 2.71008L8.57557 8.58155V18.2411L8.58244 18.2344Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area43Distal"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.5815 8.57556C6.27705 6.278 5.05583 5.0361 2.73071 2.71098C6.12528 -0.683584 12.8733 2.02103 13.4251 2.02103C14.0026 2.02101 20.7387 -0.683584 24.1196 2.71098C21.9669 4.86365 20.656 6.16762 18.2481 8.57556H8.58854H8.5815Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area43Palatina"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M18.2446 8.57504C20.5491 6.27059 21.7841 5.05632 24.1092 2.72424C27.5038 6.11881 24.7991 12.8668 24.7991 13.4187C24.7992 13.9962 27.5038 20.7323 24.1092 24.1131L18.2446 18.2416V8.58207V8.57504Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area43Mesial"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.58374 8.57568V18.2353H18.2433V8.57568H8.58374Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area43Oclusal"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!----></svg>
                                        </div>
                                    </sd-odontograma-dente>
                                    <sd-odontograma-dente _ngcontent-wak-c445="" _nghost-wak-c443=""
                                                          class="ng-star-inserted"
                                                          style="margin-right: 8px;">
                                        <div _ngcontent-wak-c443=""
                                             class="sd-odontograma-dente sd-odontograma-dente--reversed"><span
                                                    _ngcontent-wak-c443=""
                                                    class="sd-odontograma-dente__label"> 42 </span>
                                            <svg _ngcontent-wak-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 class="mat-tooltip-trigger sd-odontograma-dente__dente"
                                                 viewBox="0 0 16 51"
                                                 data-testid="area42"
                                                 height="51" aria-describedby="cdk-describedby-message-wak-1-52"
                                                 cdk-describedby-host="wak-1">
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.46387 50.0769C6.7062 49.8051 5.45694 44.2248 3.9927 37.7017C2.41749 30.6842 0.715543 22.575 1.47367 18.8099C2.07795 20.385 4.52074 22.2305 7.51752 22.2107C10.5144 22.1908 14.1871 19.5859 14.5217 17.6817C14.8565 15.7775 12.8976 29.7581 11.4803 36.4794C9.97985 43.5949 10.3749 50.6004 8.46361 50.0776L8.46387 50.0769Z"
                                                      class="ng-star-inserted"></path>
                                                <path _ngcontent-wak-c443=""
                                                      d="M13.5659 2.08323C12.434 0.677493 2.2871 0.115544 1.29464 1.59973C0.301988 3.08391 0.845704 13.7245 1.44992 15.2994C2.05421 16.8744 4.49699 19.687 7.49378 19.6672C10.4906 19.6473 13.9209 16.8103 14.498 13.5264C15.0752 10.2426 14.6978 3.48857 13.5659 2.08336L13.5659 2.08323Z"
                                                      class="ng-star-inserted"></path><!----></svg><!---->
                                            <svg _ngcontent-wak-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 viewBox="0 0 27 27"
                                                 width="27"
                                                 height="27" class="sd-odontograma-dente__faces">
                                                <path _ngcontent-wak-c443=""
                                                      d="M18.2439 18.2354L24.0947 24.0999C20.7001 27.4945 13.9521 24.7899 13.4002 24.7899C12.8228 24.7899 6.08666 27.4945 2.70581 24.0999C4.85848 21.9473 6.16935 20.6433 8.57728 18.2354H18.2368H18.2439Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area42Vestibular"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.58244 18.2344C6.27799 20.5112 5.03609 21.7531 2.71097 24.0989C-0.683593 20.7182 2.02103 13.9564 2.02103 13.4045C2.02103 12.7836 -0.683593 6.09093 2.71097 2.71008L8.57557 8.58155V18.2411L8.58244 18.2344Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area42Distal"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.5815 8.57556C6.27705 6.278 5.05583 5.0361 2.73071 2.71098C6.12528 -0.683584 12.8733 2.02103 13.4251 2.02103C14.0026 2.02101 20.7387 -0.683584 24.1196 2.71098C21.9669 4.86365 20.656 6.16762 18.2481 8.57556H8.58854H8.5815Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area42Palatina"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M18.2446 8.57504C20.5491 6.27059 21.7841 5.05632 24.1092 2.72424C27.5038 6.11881 24.7991 12.8668 24.7991 13.4187C24.7992 13.9962 27.5038 20.7323 24.1092 24.1131L18.2446 18.2416V8.58207V8.57504Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area42Mesial"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.58374 8.57568V18.2353H18.2433V8.57568H8.58374Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area42Oclusal"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!----></svg>
                                        </div>
                                    </sd-odontograma-dente>
                                    <sd-odontograma-dente _ngcontent-wak-c445="" _nghost-wak-c443=""
                                                          class="ng-star-inserted">
                                        <div _ngcontent-wak-c443=""
                                             class="sd-odontograma-dente sd-odontograma-dente--reversed"><span
                                                    _ngcontent-wak-c443=""
                                                    class="sd-odontograma-dente__label"> 41 </span>
                                            <svg _ngcontent-wak-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 class="mat-tooltip-trigger sd-odontograma-dente__dente"
                                                 viewBox="0 0 17 52"
                                                 data-testid="area41"
                                                 height="52" aria-describedby="cdk-describedby-message-wak-1-53"
                                                 cdk-describedby-host="wak-1">
                                                <path _ngcontent-wak-c443=""
                                                      d="M7.87858 50.2746C5.02192 49.986 1.06056 17.593 1.66505 19.1685C2.26934 20.7436 5.95481 23.0727 7.7089 23.0528C9.46306 23.0329 12.5827 21.3908 13.9367 18.1071C13.2991 23.0699 11.6364 49.8889 7.87858 50.2745V50.2746Z"
                                                      class="ng-star-inserted"></path>
                                                <path _ngcontent-wak-c443=""
                                                      d="M14.5143 1.94358C13.3825 0.537838 2.3034 0.136954 1.31095 1.6212C0.318355 3.10538 0.862085 13.746 1.4663 15.3208C2.07059 16.896 5.91136 20.3533 7.66546 20.3334C9.41962 20.3135 13.1606 16.8318 14.5146 13.5479C15.8686 10.264 15.6465 3.34899 14.5146 1.94378L14.5143 1.94358Z"
                                                      class="ng-star-inserted"></path><!----></svg><!---->
                                            <svg _ngcontent-wak-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 viewBox="0 0 27 27"
                                                 width="27"
                                                 height="27" class="sd-odontograma-dente__faces">
                                                <path _ngcontent-wak-c443=""
                                                      d="M18.2439 18.2354L24.0947 24.0999C20.7001 27.4945 13.9521 24.7899 13.4002 24.7899C12.8228 24.7899 6.08666 27.4945 2.70581 24.0999C4.85848 21.9473 6.16935 20.6433 8.57728 18.2354H18.2368H18.2439Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area41Vestibular"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.58244 18.2344C6.27799 20.5112 5.03609 21.7531 2.71097 24.0989C-0.683593 20.7182 2.02103 13.9564 2.02103 13.4045C2.02103 12.7836 -0.683593 6.09093 2.71097 2.71008L8.57557 8.58155V18.2411L8.58244 18.2344Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area41Distal"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.5815 8.57556C6.27705 6.278 5.05583 5.0361 2.73071 2.71098C6.12528 -0.683584 12.8733 2.02103 13.4251 2.02103C14.0026 2.02101 20.7387 -0.683584 24.1196 2.71098C21.9669 4.86365 20.656 6.16762 18.2481 8.57556H8.58854H8.5815Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area41Palatina"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M18.2446 8.57504C20.5491 6.27059 21.7841 5.05632 24.1092 2.72424C27.5038 6.11881 24.7991 12.8668 24.7991 13.4187C24.7992 13.9962 27.5038 20.7323 24.1092 24.1131L18.2446 18.2416V8.58207V8.57504Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area41Mesial"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.58374 8.57568V18.2353H18.2433V8.57568H8.58374Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area41Oclusal"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!----></svg>
                                        </div>
                                    </sd-odontograma-dente><!----></div>
                            </div>
                            <div class="col-1 d-flex align-items-center justify-content-center">
                                <h5 class="fs-6">M</h5>
                            </div>
                        </div>
                        <div class="col-12 d-flex align-items-center justify-content-center">
                            <h5 class="fs-6">P</h5>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 d-flex flex-column">
                        <div class="col-12 d-flex align-items-center justify-content-center">
                            <h5 class="fs-6">V</h5>
                        </div>
                        <div class="col-12 d-flex align-items-center justify-content-center">
                            <div class="col-1 d-flex align-items-center justify-content-center">
                                <h5 class="fs-6">M</h5>
                            </div>
                            <div class="d-flex align-items-center justify-content-center">
                                <div class="diagram-cell "
                                     style="flex-direction: row; box-sizing: border-box; display: flex;">
                                    <sd-odontograma-dente _ngcontent-wak-c445="" _nghost-wak-c443=""
                                                          class="ng-star-inserted"
                                                          style="margin-right: 8px;">
                                        <div _ngcontent-wak-c443=""
                                             class="sd-odontograma-dente sd-odontograma-dente--reversed"><span
                                                    _ngcontent-wak-c443=""
                                                    class="sd-odontograma-dente__label"> 31 </span>
                                            <svg _ngcontent-wak-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 class="mat-tooltip-trigger sd-odontograma-dente__dente"
                                                 viewBox="0 0 17 52"
                                                 data-testid="area31"
                                                 height="52" aria-describedby="cdk-describedby-message-wak-1-54"
                                                 cdk-describedby-host="wak-1">
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.54492 50.3411C11.4016 50.0525 15.3629 17.6595 14.7585 19.235C14.1542 20.8101 10.4687 23.1392 8.71458 23.1194C6.96042 23.0995 3.84081 21.4573 2.48682 18.1736C3.12436 23.1364 4.7871 49.9554 8.54492 50.341V50.3411Z"
                                                      class="ng-star-inserted"></path>
                                                <path _ngcontent-wak-c443=""
                                                      d="M1.90064 2.01118C3.03249 0.605443 14.1116 0.204616 15.104 1.6888C16.0966 3.17298 15.5529 13.8136 14.9487 15.3884C14.3444 16.9636 10.5036 20.4209 8.74951 20.401C6.99536 20.3811 3.25435 16.8994 1.90036 13.6154C0.54636 10.3317 0.768503 3.41659 1.90036 2.01138L1.90064 2.01118Z"
                                                      class="ng-star-inserted"></path><!----></svg><!---->
                                            <svg _ngcontent-wak-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 viewBox="0 0 27 27"
                                                 width="27"
                                                 height="27" class="sd-odontograma-dente__faces">
                                                <path _ngcontent-wak-c443=""
                                                      d="M18.2439 18.2354L24.0947 24.0999C20.7001 27.4945 13.9521 24.7899 13.4002 24.7899C12.8228 24.7899 6.08666 27.4945 2.70581 24.0999C4.85848 21.9473 6.16935 20.6433 8.57728 18.2354H18.2368H18.2439Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area31Vestibular"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.58244 18.2344C6.27799 20.5112 5.03609 21.7531 2.71097 24.0989C-0.683593 20.7182 2.02103 13.9564 2.02103 13.4045C2.02103 12.7836 -0.683593 6.09093 2.71097 2.71008L8.57557 8.58155V18.2411L8.58244 18.2344Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area31Mesial"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.5815 8.57556C6.27705 6.278 5.05583 5.0361 2.73071 2.71098C6.12528 -0.683584 12.8733 2.02103 13.4251 2.02103C14.0026 2.02101 20.7387 -0.683584 24.1196 2.71098C21.9669 4.86365 20.656 6.16762 18.2481 8.57556H8.58854H8.5815Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area31Palatina"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M18.2446 8.57504C20.5491 6.27059 21.7841 5.05632 24.1092 2.72424C27.5038 6.11881 24.7991 12.8668 24.7991 13.4187C24.7992 13.9962 27.5038 20.7323 24.1092 24.1131L18.2446 18.2416V8.58207V8.57504Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area31Distal"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.58374 8.57568V18.2353H18.2433V8.57568H8.58374Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area31Oclusal"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!----></svg>
                                        </div>
                                    </sd-odontograma-dente>
                                    <sd-odontograma-dente _ngcontent-wak-c445="" _nghost-wak-c443=""
                                                          class="ng-star-inserted"
                                                          style="margin-right: 8px;">
                                        <div _ngcontent-wak-c443=""
                                             class="sd-odontograma-dente sd-odontograma-dente--reversed"><span
                                                    _ngcontent-wak-c443=""
                                                    class="sd-odontograma-dente__label"> 32 </span>
                                            <svg _ngcontent-wak-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 class="mat-tooltip-trigger sd-odontograma-dente__dente"
                                                 viewBox="0 0 17 51"
                                                 data-testid="area32"
                                                 height="51" aria-describedby="cdk-describedby-message-wak-1-55"
                                                 cdk-describedby-host="wak-1">
                                                <path _ngcontent-wak-c443=""
                                                      d="M7.95137 50.1428C9.70904 49.8711 10.9583 44.2907 12.4225 37.7676C13.9978 30.7502 15.6997 22.6409 14.9416 18.8758C14.3373 20.4509 11.8945 22.2964 8.89772 22.2765C5.90087 22.2566 2.22812 19.6517 1.89354 17.7476C1.55877 15.8434 3.51765 29.824 4.93498 36.5453C6.4354 43.6608 6.04039 50.6663 7.95163 50.1436L7.95137 50.1428Z"
                                                      class="ng-star-inserted"></path>
                                                <path _ngcontent-wak-c443=""
                                                      d="M2.85205 2.15036C3.98391 0.744684 14.1308 0.182659 15.1233 1.66684C16.1159 3.15102 15.5722 13.7917 14.968 15.3665C14.3637 16.9416 11.9209 19.7542 8.92413 19.7344C5.92735 19.7145 2.49699 16.8774 1.91994 13.5936C1.34268 10.3098 1.72012 3.5557 2.85197 2.15049L2.85205 2.15036Z"
                                                      class="ng-star-inserted"></path><!----></svg><!---->
                                            <svg _ngcontent-wak-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 viewBox="0 0 27 27"
                                                 width="27"
                                                 height="27" class="sd-odontograma-dente__faces">
                                                <path _ngcontent-wak-c443=""
                                                      d="M18.2439 18.2354L24.0947 24.0999C20.7001 27.4945 13.9521 24.7899 13.4002 24.7899C12.8228 24.7899 6.08666 27.4945 2.70581 24.0999C4.85848 21.9473 6.16935 20.6433 8.57728 18.2354H18.2368H18.2439Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area32Vestibular"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.58244 18.2344C6.27799 20.5112 5.03609 21.7531 2.71097 24.0989C-0.683593 20.7182 2.02103 13.9564 2.02103 13.4045C2.02103 12.7836 -0.683593 6.09093 2.71097 2.71008L8.57557 8.58155V18.2411L8.58244 18.2344Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area32Mesial"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.5815 8.57556C6.27705 6.278 5.05583 5.0361 2.73071 2.71098C6.12528 -0.683584 12.8733 2.02103 13.4251 2.02103C14.0026 2.02101 20.7387 -0.683584 24.1196 2.71098C21.9669 4.86365 20.656 6.16762 18.2481 8.57556H8.58854H8.5815Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area32Palatina"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M18.2446 8.57504C20.5491 6.27059 21.7841 5.05632 24.1092 2.72424C27.5038 6.11881 24.7991 12.8668 24.7991 13.4187C24.7992 13.9962 27.5038 20.7323 24.1092 24.1131L18.2446 18.2416V8.58207V8.57504Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area32Distal"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.58374 8.57568V18.2353H18.2433V8.57568H8.58374Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area32Oclusal"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!----></svg>
                                        </div>
                                    </sd-odontograma-dente>
                                    <sd-odontograma-dente _ngcontent-wak-c445="" _nghost-wak-c443=""
                                                          class="ng-star-inserted"
                                                          style="margin-right: 8px;">
                                        <div _ngcontent-wak-c443=""
                                             class="sd-odontograma-dente sd-odontograma-dente--reversed"><span
                                                    _ngcontent-wak-c443=""
                                                    class="sd-odontograma-dente__label"> 33 </span>
                                            <svg _ngcontent-wak-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 class="mat-tooltip-trigger sd-odontograma-dente__dente"
                                                 viewBox="0 0 21 59"
                                                 data-testid="area33"
                                                 height="59" aria-describedby="cdk-describedby-message-wak-1-56"
                                                 cdk-describedby-host="wak-1">
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.86407 57.815C5.91326 57.8342 7.85864 50.4139 6.16861 43.5012C3.86476 34.0775 2.41001 25.8277 2.77658 22.6635C4.60647 25.1358 8.61261 26.4147 10.1816 26.0744C13.6014 25.7859 17.1553 22.091 17.9437 20.6132C19.1978 21.7707 17.0221 30.8789 14.9368 39.9933C12.8906 48.9366 12.7524 57.9019 8.86363 57.8151L8.86407 57.815Z"
                                                      class="ng-star-inserted"></path>
                                                <path _ngcontent-wak-c443=""
                                                      d="M19.379 6.20455C18.7052 4.52943 10.3482 0.299618 8.49709 0.725223C6.7689 1.17514 2.8558 4.93164 1.55521 7.55914C0.822061 15.3504 1.95442 23.3179 10.0481 23.622C13.4678 23.3335 17.9539 18.0269 18.7423 16.5489C19.643 13.6102 20.0531 7.87914 19.3794 6.20428L19.379 6.20455Z"
                                                      class="ng-star-inserted"></path><!----></svg><!---->
                                            <svg _ngcontent-wak-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 viewBox="0 0 27 27"
                                                 width="27"
                                                 height="27" class="sd-odontograma-dente__faces">
                                                <path _ngcontent-wak-c443=""
                                                      d="M18.2439 18.2354L24.0947 24.0999C20.7001 27.4945 13.9521 24.7899 13.4002 24.7899C12.8228 24.7899 6.08666 27.4945 2.70581 24.0999C4.85848 21.9473 6.16935 20.6433 8.57728 18.2354H18.2368H18.2439Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area33Vestibular"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.58244 18.2344C6.27799 20.5112 5.03609 21.7531 2.71097 24.0989C-0.683593 20.7182 2.02103 13.9564 2.02103 13.4045C2.02103 12.7836 -0.683593 6.09093 2.71097 2.71008L8.57557 8.58155V18.2411L8.58244 18.2344Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area33Mesial"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.5815 8.57556C6.27705 6.278 5.05583 5.0361 2.73071 2.71098C6.12528 -0.683584 12.8733 2.02103 13.4251 2.02103C14.0026 2.02101 20.7387 -0.683584 24.1196 2.71098C21.9669 4.86365 20.656 6.16762 18.2481 8.57556H8.58854H8.5815Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area33Palatina"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M18.2446 8.57504C20.5491 6.27059 21.7841 5.05632 24.1092 2.72424C27.5038 6.11881 24.7991 12.8668 24.7991 13.4187C24.7992 13.9962 27.5038 20.7323 24.1092 24.1131L18.2446 18.2416V8.58207V8.57504Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area33Distal"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.58374 8.57568V18.2353H18.2433V8.57568H8.58374Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area33Oclusal"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!----></svg>
                                        </div>
                                    </sd-odontograma-dente>
                                    <sd-odontograma-dente _ngcontent-wak-c445="" _nghost-wak-c443=""
                                                          class="ng-star-inserted"
                                                          style="margin-right: 8px;">
                                        <div _ngcontent-wak-c443=""
                                             class="sd-odontograma-dente sd-odontograma-dente--reversed"><span
                                                    _ngcontent-wak-c443=""
                                                    class="sd-odontograma-dente__label"> 34 </span>
                                            <svg _ngcontent-wak-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 class="mat-tooltip-trigger sd-odontograma-dente__dente"
                                                 viewBox="0 0 20 54"
                                                 data-testid="area34"
                                                 height="54" aria-describedby="cdk-describedby-message-wak-1-57"
                                                 cdk-describedby-host="wak-1">
                                                <path _ngcontent-wak-c443=""
                                                      d="M9.34247 52.5088C6.80779 52.5347 7.2125 44.3439 5.82743 37.141C4.32788 29.3431 1.92153 22.7755 2.86662 21.7897C4.36876 23.1664 5.42577 24.1491 7.32045 23.9918C10.7403 23.7033 16.081 23.4736 17.4126 21.6733C18.4156 24.1492 15.5417 35.8314 13.6092 43.2331C11.7294 50.4334 11.67 52.5826 9.34218 52.5084L9.34247 52.5088Z"
                                                      class="ng-star-inserted"></path>
                                                <path _ngcontent-wak-c443=""
                                                      d="M18.4912 5.66217C17.8174 3.98698 12.0232 0.48244 10.1719 0.90811C8.81431 1.17789 2.06259 3.4628 1.50475 5.12825C0.571254 7.91462 1.87463 16.5687 2.29825 17.7347C2.94606 19.595 5.86707 21.7864 7.76175 21.6292C11.1815 21.3406 16.833 20.9497 17.7764 18.3437C18.6771 15.4049 19.1648 7.33722 18.4911 5.66171L18.4912 5.66217Z"
                                                      class="ng-star-inserted"></path><!----></svg><!---->
                                            <svg _ngcontent-wak-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 viewBox="0 0 27 27"
                                                 width="27"
                                                 height="27" class="sd-odontograma-dente__faces">
                                                <path _ngcontent-wak-c443=""
                                                      d="M18.2439 18.2354L24.0947 24.0999C20.7001 27.4945 13.9521 24.7899 13.4002 24.7899C12.8228 24.7899 6.08666 27.4945 2.70581 24.0999C4.85848 21.9473 6.16935 20.6433 8.57728 18.2354H18.2368H18.2439Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area34Vestibular"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.58244 18.2344C6.27799 20.5112 5.03609 21.7531 2.71097 24.0989C-0.683593 20.7182 2.02103 13.9564 2.02103 13.4045C2.02103 12.7836 -0.683593 6.09093 2.71097 2.71008L8.57557 8.58155V18.2411L8.58244 18.2344Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area34Mesial"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.5815 8.57556C6.27705 6.278 5.05583 5.0361 2.73071 2.71098C6.12528 -0.683584 12.8733 2.02103 13.4251 2.02103C14.0026 2.02101 20.7387 -0.683584 24.1196 2.71098C21.9669 4.86365 20.656 6.16762 18.2481 8.57556H8.58854H8.5815Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area34Palatina"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M18.2446 8.57504C20.5491 6.27059 21.7841 5.05632 24.1092 2.72424C27.5038 6.11881 24.7991 12.8668 24.7991 13.4187C24.7992 13.9962 27.5038 20.7323 24.1092 24.1131L18.2446 18.2416V8.58207V8.57504Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area34Distal"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.58374 8.57568V18.2353H18.2433V8.57568H8.58374Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area34Oclusal"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!----></svg>
                                        </div>
                                    </sd-odontograma-dente>
                                    <sd-odontograma-dente _ngcontent-wak-c445="" _nghost-wak-c443=""
                                                          class="ng-star-inserted"
                                                          style="margin-right: 8px;">
                                        <div _ngcontent-wak-c443=""
                                             class="sd-odontograma-dente sd-odontograma-dente--reversed"><span
                                                    _ngcontent-wak-c443=""
                                                    class="sd-odontograma-dente__label"> 35 </span>
                                            <svg _ngcontent-wak-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 class="mat-tooltip-trigger sd-odontograma-dente__dente"
                                                 viewBox="0 0 20 53"
                                                 data-testid="area35"
                                                 height="53" aria-describedby="cdk-describedby-message-wak-1-58"
                                                 cdk-describedby-host="wak-1">
                                                <path _ngcontent-wak-c443=""
                                                      d="M9.05998 52.2435C6.11938 52.3071 7.46297 46.7966 5.95546 38.0682C4.59941 30.2166 2.27405 21.2554 2.77181 21.4846C3.80448 23.1027 7.0907 23.8177 11.7755 23.9123C13.5642 23.6238 16.1864 21.9436 16.9748 20.4657C15.1136 26.2002 12.917 52.6828 9.05966 52.2429L9.05998 52.2435Z"
                                                      class="ng-star-inserted"></path>
                                                <path _ngcontent-wak-c443=""
                                                      d="M17.8566 5.25748C16.7169 3.58236 10.6895 0.480775 8.83839 0.906379C7.11027 1.3563 2.03228 3.82339 1.04248 5.24225C0.547903 6.98369 0.749721 16.1222 1.77378 17.7493C3.35012 20.2539 6.94709 21.4523 11.6321 21.547C13.4209 21.2585 16.8973 18.2889 17.6858 16.811C18.5087 14.7587 18.9965 6.93274 17.8567 5.25789L17.8566 5.25748Z"
                                                      class="ng-star-inserted"></path><!----></svg><!---->
                                            <svg _ngcontent-wak-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 viewBox="0 0 27 27"
                                                 width="27"
                                                 height="27" class="sd-odontograma-dente__faces">
                                                <path _ngcontent-wak-c443=""
                                                      d="M18.2439 18.2354L24.0947 24.0999C20.7001 27.4945 13.9521 24.7899 13.4002 24.7899C12.8228 24.7899 6.08666 27.4945 2.70581 24.0999C4.85848 21.9473 6.16935 20.6433 8.57728 18.2354H18.2368H18.2439Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area35Vestibular"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.58244 18.2344C6.27799 20.5112 5.03609 21.7531 2.71097 24.0989C-0.683593 20.7182 2.02103 13.9564 2.02103 13.4045C2.02103 12.7836 -0.683593 6.09093 2.71097 2.71008L8.57557 8.58155V18.2411L8.58244 18.2344Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area35Mesial"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.5815 8.57556C6.27705 6.278 5.05583 5.0361 2.73071 2.71098C6.12528 -0.683584 12.8733 2.02103 13.4251 2.02103C14.0026 2.02101 20.7387 -0.683584 24.1196 2.71098C21.9669 4.86365 20.656 6.16762 18.2481 8.57556H8.58854H8.5815Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area35Palatina"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M18.2446 8.57504C20.5491 6.27059 21.7841 5.05632 24.1092 2.72424C27.5038 6.11881 24.7991 12.8668 24.7991 13.4187C24.7992 13.9962 27.5038 20.7323 24.1092 24.1131L18.2446 18.2416V8.58207V8.57504Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area35Distal"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.58374 8.57568V18.2353H18.2433V8.57568H8.58374Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area35Oclusal"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!----></svg>
                                        </div>
                                    </sd-odontograma-dente>
                                    <sd-odontograma-dente _ngcontent-wak-c445="" _nghost-wak-c443=""
                                                          class="ng-star-inserted"
                                                          style="margin-right: 8px;">
                                        <div _ngcontent-wak-c443=""
                                             class="sd-odontograma-dente sd-odontograma-dente--reversed"><span
                                                    _ngcontent-wak-c443=""
                                                    class="sd-odontograma-dente__label"> 36 </span>
                                            <svg _ngcontent-wak-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 class="mat-tooltip-trigger sd-odontograma-dente__dente"
                                                 viewBox="0 0 24 52"
                                                 data-testid="area36"
                                                 height="52" aria-describedby="cdk-describedby-message-wak-1-59"
                                                 cdk-describedby-host="wak-1">
                                                <path _ngcontent-wak-c443=""
                                                      d="M12.9215 30.5918C7.8358 30.4587 12.4802 49.3001 8.91422 49.0755C6.29871 48.9107 4.46868 21.7538 4.8923 22.9198C6.39443 24.6996 9.78146 24.1511 11.6759 23.9938C15.0956 23.3023 19.5817 24.6843 21.0691 22.0782C22.1251 20.9929 20.8265 50.3176 17.6673 50.8178C13.0616 51.5244 18.3229 30.5287 12.9211 30.591L12.9215 30.5918Z"
                                                      class="ng-star-inserted"></path>
                                                <path _ngcontent-wak-c443=""
                                                      d="M21.6656 2.71972C18.8947 -0.00297791 15.1976 1.08588 13.3463 1.51155C11.9887 1.78126 3.4926 0.250634 2.03837 3.63645C1.20929 5.56691 1.94225 14.5932 2.36587 15.7593C3.79036 20.3595 7.09971 21.9869 9.53833 21.6684C12.9581 20.9769 20.3182 22.5201 21.8056 18.6246C22.3956 15.8471 24.4367 5.44242 21.6659 2.71946L21.6656 2.71972Z"
                                                      class="ng-star-inserted"></path><!----></svg><!---->
                                            <svg _ngcontent-wak-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 viewBox="0 0 27 27"
                                                 width="27"
                                                 height="27" class="sd-odontograma-dente__faces">
                                                <path _ngcontent-wak-c443=""
                                                      d="M18.2439 18.2354L24.0947 24.0999C20.7001 27.4945 13.9521 24.7899 13.4002 24.7899C12.8228 24.7899 6.08666 27.4945 2.70581 24.0999C4.85848 21.9473 6.16935 20.6433 8.57728 18.2354H18.2368H18.2439Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area36Vestibular"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.58244 18.2344C6.27799 20.5112 5.03609 21.7531 2.71097 24.0989C-0.683593 20.7182 2.02103 13.9564 2.02103 13.4045C2.02103 12.7836 -0.683593 6.09093 2.71097 2.71008L8.57557 8.58155V18.2411L8.58244 18.2344Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area36Mesial"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.5815 8.57556C6.27705 6.278 5.05583 5.0361 2.73071 2.71098C6.12528 -0.683584 12.8733 2.02103 13.4251 2.02103C14.0026 2.02101 20.7387 -0.683584 24.1196 2.71098C21.9669 4.86365 20.656 6.16762 18.2481 8.57556H8.58854H8.5815Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area36Palatina"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M18.2446 8.57504C20.5491 6.27059 21.7841 5.05632 24.1092 2.72424C27.5038 6.11881 24.7991 12.8668 24.7991 13.4187C24.7992 13.9962 27.5038 20.7323 24.1092 24.1131L18.2446 18.2416V8.58207V8.57504Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area36Distal"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.58374 8.57568V18.2353H18.2433V8.57568H8.58374Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area36Oclusal"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!----></svg>
                                        </div>
                                    </sd-odontograma-dente>
                                    <sd-odontograma-dente _ngcontent-wak-c445="" _nghost-wak-c443=""
                                                          class="ng-star-inserted"
                                                          style="margin-right: 8px;">
                                        <div _ngcontent-wak-c443=""
                                             class="sd-odontograma-dente sd-odontograma-dente--reversed"><span
                                                    _ngcontent-wak-c443=""
                                                    class="sd-odontograma-dente__label"> 37 </span>
                                            <svg _ngcontent-wak-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 class="mat-tooltip-trigger sd-odontograma-dente__dente"
                                                 viewBox="0 0 24 52"
                                                 data-testid="area37"
                                                 height="52" aria-describedby="cdk-describedby-message-wak-1-60"
                                                 cdk-describedby-host="wak-1">
                                                <path _ngcontent-wak-c443=""
                                                      d="M20.5997 37.9137C20.1922 42.6328 19.1171 51.6497 17.0544 50.9057C13.1191 49.4873 18.6221 30.4172 12.8244 30.9837C8.5931 31.9786 12.3802 46.8094 8.50644 48.6618C5.91214 49.9023 4.972 32.8673 4.50446 29.5573C4.12808 26.8935 4.28677 20.0276 5.10584 21.458C5.57709 22.1352 7.23897 22.8334 8.16159 22.6125C12.0227 22.1871 13.9177 23.0534 17.0838 22.2231C19.2345 21.6589 19.5164 21.8429 20.4288 20.3747C22.1838 17.5165 21.0073 33.1938 20.5998 37.9129L20.5997 37.9137Z"
                                                      class="ng-star-inserted"></path>
                                                <path _ngcontent-wak-c443=""
                                                      d="M22.3694 2.69336C20.2532 0.482191 18.2249 1.88786 16.1056 1.34141C12.7917 0.486959 9.90645 1.16088 8.84635 1.40435C7.48878 1.67407 3.81976 0.226193 2.27609 2.80393C0.768386 5.32145 2.38957 7.64902 2.7788 10.9377C3.11954 13.8168 2.63879 15.3493 3.45786 16.7802C4.26097 18.3181 6.09465 20.1872 8.06705 20.03C11.9281 19.6046 13.8231 20.4708 16.9892 19.6405C19.14 19.0764 20.7422 17.0846 21.6547 15.6162C22.0893 11.1463 24.4855 4.90393 22.3693 2.6931L22.3694 2.69336Z"
                                                      class="ng-star-inserted"></path><!----></svg><!---->
                                            <svg _ngcontent-wak-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 viewBox="0 0 27 27"
                                                 width="27"
                                                 height="27" class="sd-odontograma-dente__faces">
                                                <path _ngcontent-wak-c443=""
                                                      d="M18.2439 18.2354L24.0947 24.0999C20.7001 27.4945 13.9521 24.7899 13.4002 24.7899C12.8228 24.7899 6.08666 27.4945 2.70581 24.0999C4.85848 21.9473 6.16935 20.6433 8.57728 18.2354H18.2368H18.2439Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area37Vestibular"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.58244 18.2344C6.27799 20.5112 5.03609 21.7531 2.71097 24.0989C-0.683593 20.7182 2.02103 13.9564 2.02103 13.4045C2.02103 12.7836 -0.683593 6.09093 2.71097 2.71008L8.57557 8.58155V18.2411L8.58244 18.2344Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area37Mesial"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.5815 8.57556C6.27705 6.278 5.05583 5.0361 2.73071 2.71098C6.12528 -0.683584 12.8733 2.02103 13.4251 2.02103C14.0026 2.02101 20.7387 -0.683584 24.1196 2.71098C21.9669 4.86365 20.656 6.16762 18.2481 8.57556H8.58854H8.5815Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area37Palatina"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M18.2446 8.57504C20.5491 6.27059 21.7841 5.05632 24.1092 2.72424C27.5038 6.11881 24.7991 12.8668 24.7991 13.4187C24.7992 13.9962 27.5038 20.7323 24.1092 24.1131L18.2446 18.2416V8.58207V8.57504Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area37Distal"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.58374 8.57568V18.2353H18.2433V8.57568H8.58374Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area37Oclusal"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!----></svg>
                                        </div>
                                    </sd-odontograma-dente>
                                    <sd-odontograma-dente _ngcontent-wak-c445="" _nghost-wak-c443=""
                                                          class="ng-star-inserted">
                                        <div _ngcontent-wak-c443=""
                                             class="sd-odontograma-dente sd-odontograma-dente--reversed"><span
                                                    _ngcontent-wak-c443=""
                                                    class="sd-odontograma-dente__label"> 38 </span>
                                            <svg _ngcontent-wak-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 class="mat-tooltip-trigger sd-odontograma-dente__dente"
                                                 viewBox="0 0 23 51"
                                                 data-testid="area38"
                                                 height="51" aria-describedby="cdk-describedby-message-wak-1-61"
                                                 cdk-describedby-host="wak-1">
                                                <path _ngcontent-wak-c443=""
                                                      d="M15.8921 49.3166C12.5782 48.4621 17.0715 29.3926 11.8174 29.0719C7.19779 29.4223 10.8699 44.9983 7.73251 46.589C6.77112 47.0627 5.83466 40.7081 4.93442 33.9574C3.97217 26.7412 3.68356 21.9167 4.33191 20.9978C6.30006 22.294 6.81334 22.0678 8.78573 21.9105C12.6468 21.4851 15.5514 22.2709 18.7176 21.4405C20.6788 20.8428 20.334 27.0459 19.5305 33.8078C18.6995 40.8014 18.8264 48.1448 15.8922 49.3168L15.8921 49.3166Z"
                                                      class="ng-star-inserted"></path>
                                                <path _ngcontent-wak-c443=""
                                                      d="M20.7398 3.36362C18.6236 1.15239 17.6827 2.31631 15.5635 1.76993C12.2495 0.915406 8.66526 1.58932 7.60523 1.83287C6.24765 2.10258 3.69324 1.33956 2.35528 4.03834C1.54667 5.6694 1.45917 8.64161 1.8484 11.9303C2.18913 14.8094 3.33941 16.342 4.15849 17.7727C4.96166 19.3108 6.79524 19.8904 8.76763 19.7331C12.6287 19.3078 15.5333 20.0935 18.6995 19.2631C20.6883 19.285 21.2285 15.9987 21.5078 12.1901C21.7864 8.39084 22.74 5.60196 20.7398 3.36263V3.36362Z"
                                                      class="ng-star-inserted"></path><!----></svg><!---->
                                            <svg _ngcontent-wak-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 viewBox="0 0 27 27"
                                                 width="27"
                                                 height="27" class="sd-odontograma-dente__faces">
                                                <path _ngcontent-wak-c443=""
                                                      d="M18.2439 18.2354L24.0947 24.0999C20.7001 27.4945 13.9521 24.7899 13.4002 24.7899C12.8228 24.7899 6.08666 27.4945 2.70581 24.0999C4.85848 21.9473 6.16935 20.6433 8.57728 18.2354H18.2368H18.2439Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area38Vestibular"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.58244 18.2344C6.27799 20.5112 5.03609 21.7531 2.71097 24.0989C-0.683593 20.7182 2.02103 13.9564 2.02103 13.4045C2.02103 12.7836 -0.683593 6.09093 2.71097 2.71008L8.57557 8.58155V18.2411L8.58244 18.2344Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area38Mesial"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.5815 8.57556C6.27705 6.278 5.05583 5.0361 2.73071 2.71098C6.12528 -0.683584 12.8733 2.02103 13.4251 2.02103C14.0026 2.02101 20.7387 -0.683584 24.1196 2.71098C21.9669 4.86365 20.656 6.16762 18.2481 8.57556H8.58854H8.5815Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area38Palatina"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M18.2446 8.57504C20.5491 6.27059 21.7841 5.05632 24.1092 2.72424C27.5038 6.11881 24.7991 12.8668 24.7991 13.4187C24.7992 13.9962 27.5038 20.7323 24.1092 24.1131L18.2446 18.2416V8.58207V8.57504Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area38Distal"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!---->
                                                <path _ngcontent-wak-c443=""
                                                      d="M8.58374 8.57568V18.2353H18.2433V8.57568H8.58374Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area38Oclusal"
                                                      aria-describedby="cdk-describedby-message-wak-1-30"
                                                      cdk-describedby-host="wak-1"></path><!----></svg>
                                        </div>
                                    </sd-odontograma-dente><!----></div>
                            </div>
                            <div class="col-1 d-flex align-items-center justify-content-center">
                                <h5 class="fs-6">D</h5>
                            </div>
                        </div>
                        <div class="col-12 d-flex align-items-center justify-content-center">
                            <h5 class="fs-6">P</h5>
                        </div>
                    </div>

                </div>
            </div>

            <div id="dento_deciduos" class="dento-diagram_complete dis_none">
                <div class="top-diagram diagram-row d-flex flex-column flex-md-row">
                    <div class="col-12 col-md-6 d-flex flex-column mb-5 mb-md-2">

                        <div class="col-12 d-flex align-items-center justify-content-center">
                            <h5 class="fs-6">P</h5>
                        </div>
                        <div class="col-12 d-flex align-items-center justify-content-center">
                            <div class="col-1 d-flex align-items-center justify-content-center">
                                <h5 class="fs-6">D</h5>
                            </div>
                            <div class="d-flex align-items-center justify-content-center">
                                <div class="diagram-cell"
                                     style="flex-direction: row; box-sizing: border-box; display: flex;">
                                    <sd-odontograma-dente _ngcontent-fqc-c445="" _nghost-fqc-c443=""
                                                          class="ng-star-inserted"
                                                          style="margin-right: 8px;">
                                        <div _ngcontent-fqc-c443="" class="sd-odontograma-dente"><span
                                                    _ngcontent-fqc-c443=""
                                                    class="sd-odontograma-dente__label"> 55 </span>
                                            <svg _ngcontent-fqc-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 class="mat-tooltip-trigger sd-odontograma-dente__dente"
                                                 viewBox="0 0 24 51"
                                                 data-testid="area55" height="51"
                                                 aria-describedby="cdk-describedby-message-fqc-1-44"
                                                 cdk-describedby-host="fqc-1">
                                                <path _ngcontent-fqc-c443=""
                                                      d="M5.99721 4.28551C9.59895 6.6525 7.22182 21.5661 12.2582 23.4198C18.3358 24.2593 13.0601 3.66804 17.6402 2.69016C21.9374 6.93043 22.5646 30.8414 21.1377 28.9585C18.9583 27.0164 15.8679 25.1876 13.4664 25.2555C11.0647 25.3234 5.62938 27.1689 4.01283 27.6427C1.98538 24.1074 3.68217 4.6485 5.99755 4.28544L5.99721 4.28551Z"
                                                      class="ng-star-inserted"></path>
                                                <path _ngcontent-fqc-c443=""
                                                      d="M12.5273 20.6034C13.5055 20.0431 13.8536 16.1539 13.5959 11.8674C13.3517 7.80517 12.5748 3.38575 10.8795 1.10336C9.44382 0.215782 9.7142 5.19457 10.0732 10.278C10.4224 15.2212 11.0392 19.9091 12.5273 20.6034Z"
                                                      class="ng-star-inserted"></path>
                                                <path _ngcontent-fqc-c443=""
                                                      d="M1.97877 48.4021C3.6034 51.4529 13.7478 49.1576 15.5989 48.732C21.6765 49.5715 22.6614 48.9245 22.7382 46.5787C23.0812 41.7016 23.269 34.2716 21.8422 32.3888C19.6627 30.4466 17.0118 28.162 14.2808 27.888C11.5496 27.6139 6.22454 29.3455 4.60732 29.8192C2.99024 30.2931 0.913296 35.159 1.10006 38.2591C1.28676 41.359 0.354129 45.3514 1.97877 48.4023V48.4021Z"
                                                      class="ng-star-inserted"></path><!----></svg><!---->
                                            <svg _ngcontent-fqc-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 viewBox="0 0 27 27"
                                                 width="27" height="27" class="sd-odontograma-dente__faces">
                                                <path _ngcontent-fqc-c443=""
                                                      d="M18.2439 18.2354L24.0947 24.0999C20.7001 27.4945 13.9521 24.7899 13.4002 24.7899C12.8228 24.7899 6.08666 27.4945 2.70581 24.0999C4.85848 21.9473 6.16935 20.6433 8.57728 18.2354H18.2368H18.2439Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area55Vestibular"
                                                      aria-describedby="cdk-describedby-message-fqc-1-12"
                                                      cdk-describedby-host="fqc-1"></path><!---->
                                                <path _ngcontent-fqc-c443=""
                                                      d="M8.58244 18.2344C6.27799 20.5112 5.03609 21.7531 2.71097 24.0989C-0.683593 20.7182 2.02103 13.9564 2.02103 13.4045C2.02103 12.7836 -0.683593 6.09093 2.71097 2.71008L8.57557 8.58155V18.2411L8.58244 18.2344Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area55Distal"
                                                      aria-describedby="cdk-describedby-message-fqc-1-12"
                                                      cdk-describedby-host="fqc-1"></path><!---->
                                                <path _ngcontent-fqc-c443=""
                                                      d="M8.5815 8.57556C6.27705 6.278 5.05583 5.0361 2.73071 2.71098C6.12528 -0.683584 12.8733 2.02103 13.4251 2.02103C14.0026 2.02101 20.7387 -0.683584 24.1196 2.71098C21.9669 4.86365 20.656 6.16762 18.2481 8.57556H8.58854H8.5815Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area55Palatina"
                                                      aria-describedby="cdk-describedby-message-fqc-1-12"
                                                      cdk-describedby-host="fqc-1"></path><!---->
                                                <path _ngcontent-fqc-c443=""
                                                      d="M18.2446 8.57504C20.5491 6.27059 21.7841 5.05632 24.1092 2.72424C27.5038 6.11881 24.7991 12.8668 24.7991 13.4187C24.7992 13.9962 27.5038 20.7323 24.1092 24.1131L18.2446 18.2416V8.58207V8.57504Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area55Mesial"
                                                      aria-describedby="cdk-describedby-message-fqc-1-12"
                                                      cdk-describedby-host="fqc-1"></path><!---->
                                                <path _ngcontent-fqc-c443=""
                                                      d="M8.58374 8.57568V18.2353H18.2433V8.57568H8.58374Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area55Oclusal"
                                                      aria-describedby="cdk-describedby-message-fqc-1-12"
                                                      cdk-describedby-host="fqc-1"></path><!----></svg>
                                        </div>
                                    </sd-odontograma-dente>
                                    <sd-odontograma-dente _ngcontent-fqc-c445="" _nghost-fqc-c443=""
                                                          class="ng-star-inserted"
                                                          style="margin-right: 8px;">
                                        <div _ngcontent-fqc-c443="" class="sd-odontograma-dente"><span
                                                    _ngcontent-fqc-c443=""
                                                    class="sd-odontograma-dente__label"> 54 </span>
                                            <svg _ngcontent-fqc-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 class="mat-tooltip-trigger sd-odontograma-dente__dente"
                                                 viewBox="0 0 24 51"
                                                 data-testid="area54" height="51"
                                                 aria-describedby="cdk-describedby-message-fqc-1-45"
                                                 cdk-describedby-host="fqc-1">
                                                <path _ngcontent-fqc-c443=""
                                                      d="M5.99721 4.28551C9.59895 6.6525 7.22182 21.5661 12.2582 23.4198C18.3358 24.2593 13.0601 3.66804 17.6402 2.69016C21.9374 6.93043 22.5646 30.8414 21.1377 28.9585C18.9583 27.0164 15.8679 25.1876 13.4664 25.2555C11.0647 25.3234 5.62938 27.1689 4.01283 27.6427C1.98538 24.1074 3.68217 4.6485 5.99755 4.28544L5.99721 4.28551Z"
                                                      class="ng-star-inserted"></path>
                                                <path _ngcontent-fqc-c443=""
                                                      d="M12.5273 20.6034C13.5055 20.0431 13.8536 16.1539 13.5959 11.8674C13.3517 7.80517 12.5748 3.38575 10.8795 1.10336C9.44382 0.215782 9.7142 5.19457 10.0732 10.278C10.4224 15.2212 11.0392 19.9091 12.5273 20.6034Z"
                                                      class="ng-star-inserted"></path>
                                                <path _ngcontent-fqc-c443=""
                                                      d="M1.97877 48.4021C3.6034 51.4529 13.7478 49.1576 15.5989 48.732C21.6765 49.5715 22.6614 48.9245 22.7382 46.5787C23.0812 41.7016 23.269 34.2716 21.8422 32.3888C19.6627 30.4466 17.0118 28.162 14.2808 27.888C11.5496 27.6139 6.22454 29.3455 4.60732 29.8192C2.99024 30.2931 0.913296 35.159 1.10006 38.2591C1.28676 41.359 0.354129 45.3514 1.97877 48.4023V48.4021Z"
                                                      class="ng-star-inserted"></path><!----></svg><!---->
                                            <svg _ngcontent-fqc-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 viewBox="0 0 27 27"
                                                 width="27" height="27" class="sd-odontograma-dente__faces">
                                                <path _ngcontent-fqc-c443=""
                                                      d="M18.2439 18.2354L24.0947 24.0999C20.7001 27.4945 13.9521 24.7899 13.4002 24.7899C12.8228 24.7899 6.08666 27.4945 2.70581 24.0999C4.85848 21.9473 6.16935 20.6433 8.57728 18.2354H18.2368H18.2439Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area54Vestibular"
                                                      aria-describedby="cdk-describedby-message-fqc-1-12"
                                                      cdk-describedby-host="fqc-1"></path><!---->
                                                <path _ngcontent-fqc-c443=""
                                                      d="M8.58244 18.2344C6.27799 20.5112 5.03609 21.7531 2.71097 24.0989C-0.683593 20.7182 2.02103 13.9564 2.02103 13.4045C2.02103 12.7836 -0.683593 6.09093 2.71097 2.71008L8.57557 8.58155V18.2411L8.58244 18.2344Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area54Distal"
                                                      aria-describedby="cdk-describedby-message-fqc-1-12"
                                                      cdk-describedby-host="fqc-1"></path><!---->
                                                <path _ngcontent-fqc-c443=""
                                                      d="M8.5815 8.57556C6.27705 6.278 5.05583 5.0361 2.73071 2.71098C6.12528 -0.683584 12.8733 2.02103 13.4251 2.02103C14.0026 2.02101 20.7387 -0.683584 24.1196 2.71098C21.9669 4.86365 20.656 6.16762 18.2481 8.57556H8.58854H8.5815Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area54Palatina"
                                                      aria-describedby="cdk-describedby-message-fqc-1-12"
                                                      cdk-describedby-host="fqc-1"></path><!---->
                                                <path _ngcontent-fqc-c443=""
                                                      d="M18.2446 8.57504C20.5491 6.27059 21.7841 5.05632 24.1092 2.72424C27.5038 6.11881 24.7991 12.8668 24.7991 13.4187C24.7992 13.9962 27.5038 20.7323 24.1092 24.1131L18.2446 18.2416V8.58207V8.57504Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area54Mesial"
                                                      aria-describedby="cdk-describedby-message-fqc-1-12"
                                                      cdk-describedby-host="fqc-1"></path><!---->
                                                <path _ngcontent-fqc-c443=""
                                                      d="M8.58374 8.57568V18.2353H18.2433V8.57568H8.58374Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area54Oclusal"
                                                      aria-describedby="cdk-describedby-message-fqc-1-12"
                                                      cdk-describedby-host="fqc-1"></path><!----></svg>
                                        </div>
                                    </sd-odontograma-dente>
                                    <sd-odontograma-dente _ngcontent-fqc-c445="" _nghost-fqc-c443=""
                                                          class="ng-star-inserted"
                                                          style="margin-right: 8px;">
                                        <div _ngcontent-fqc-c443="" class="sd-odontograma-dente"><span
                                                    _ngcontent-fqc-c443=""
                                                    class="sd-odontograma-dente__label"> 53 </span>
                                            <svg _ngcontent-fqc-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 class="mat-tooltip-trigger sd-odontograma-dente__dente"
                                                 viewBox="0 0 21 62"
                                                 data-testid="area53" height="62"
                                                 aria-describedby="cdk-describedby-message-fqc-1-46"
                                                 cdk-describedby-host="fqc-1">
                                                <path _ngcontent-fqc-c443=""
                                                      d="M10.3319 1.62256C15.6124 1.20132 15.0854 26.2611 17.0221 36.6673C17.2321 37.7957 15.8765 34.6453 10.771 34.3429C10.771 34.3429 5.89982 34.3187 3.73364 37.1859C4.09697 26.1509 8.24469 3.17597 10.3318 1.62236L10.3319 1.62256Z"
                                                      class="ng-star-inserted"></path>
                                                <path _ngcontent-fqc-c443=""
                                                      d="M9.69877 61.1169C12.9205 60.3608 19.3974 55.1552 19.8036 52.9235C20.5939 50.9265 19.1229 43.2328 17.5894 40.8994C15.0804 36.9059 10.3573 36.9684 10.3573 36.9684C10.3573 36.9684 6.14533 37.0583 3.97901 39.9254C1.81277 42.7925 0.504684 50.0514 1.35046 52.3537C2.27673 55.7244 4.87157 59.3698 9.69824 61.1168L9.69877 61.1169Z"
                                                      class="ng-star-inserted"></path><!----></svg><!---->
                                            <svg _ngcontent-fqc-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 viewBox="0 0 27 27"
                                                 width="27" height="27" class="sd-odontograma-dente__faces">
                                                <path _ngcontent-fqc-c443=""
                                                      d="M18.2439 18.2354L24.0947 24.0999C20.7001 27.4945 13.9521 24.7899 13.4002 24.7899C12.8228 24.7899 6.08666 27.4945 2.70581 24.0999C4.85848 21.9473 6.16935 20.6433 8.57728 18.2354H18.2368H18.2439Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area53Vestibular"
                                                      aria-describedby="cdk-describedby-message-fqc-1-12"
                                                      cdk-describedby-host="fqc-1"></path><!---->
                                                <path _ngcontent-fqc-c443=""
                                                      d="M8.58244 18.2344C6.27799 20.5112 5.03609 21.7531 2.71097 24.0989C-0.683593 20.7182 2.02103 13.9564 2.02103 13.4045C2.02103 12.7836 -0.683593 6.09093 2.71097 2.71008L8.57557 8.58155V18.2411L8.58244 18.2344Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area53Distal"
                                                      aria-describedby="cdk-describedby-message-fqc-1-12"
                                                      cdk-describedby-host="fqc-1"></path><!---->
                                                <path _ngcontent-fqc-c443=""
                                                      d="M8.5815 8.57556C6.27705 6.278 5.05583 5.0361 2.73071 2.71098C6.12528 -0.683584 12.8733 2.02103 13.4251 2.02103C14.0026 2.02101 20.7387 -0.683584 24.1196 2.71098C21.9669 4.86365 20.656 6.16762 18.2481 8.57556H8.58854H8.5815Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area53Palatina"
                                                      aria-describedby="cdk-describedby-message-fqc-1-12"
                                                      cdk-describedby-host="fqc-1"></path><!---->
                                                <path _ngcontent-fqc-c443=""
                                                      d="M18.2446 8.57504C20.5491 6.27059 21.7841 5.05632 24.1092 2.72424C27.5038 6.11881 24.7991 12.8668 24.7991 13.4187C24.7992 13.9962 27.5038 20.7323 24.1092 24.1131L18.2446 18.2416V8.58207V8.57504Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area53Mesial"
                                                      aria-describedby="cdk-describedby-message-fqc-1-12"
                                                      cdk-describedby-host="fqc-1"></path><!---->
                                                <path _ngcontent-fqc-c443=""
                                                      d="M8.58374 8.57568V18.2353H18.2433V8.57568H8.58374Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area53Oclusal"
                                                      aria-describedby="cdk-describedby-message-fqc-1-12"
                                                      cdk-describedby-host="fqc-1"></path><!----></svg>
                                        </div>
                                    </sd-odontograma-dente>
                                    <sd-odontograma-dente _ngcontent-fqc-c445="" _nghost-fqc-c443=""
                                                          class="ng-star-inserted"
                                                          style="margin-right: 8px;">
                                        <div _ngcontent-fqc-c443="" class="sd-odontograma-dente"><span
                                                    _ngcontent-fqc-c443=""
                                                    class="sd-odontograma-dente__label"> 52 </span>
                                            <svg _ngcontent-fqc-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 class="mat-tooltip-trigger sd-odontograma-dente__dente"
                                                 viewBox="0 0 20 55"
                                                 data-testid="area52" height="55"
                                                 aria-describedby="cdk-describedby-message-fqc-1-47"
                                                 cdk-describedby-host="fqc-1">
                                                <path _ngcontent-fqc-c443=""
                                                      d="M10.9267 1.18149C15.7018 0.206127 11.4953 17.4769 16.9503 31.5647C9.73614 28.6585 7.05558 29.7241 4.32864 31.8444C3.84467 25.4202 7.63403 4.22259 10.9268 1.18162L10.9267 1.18149Z"
                                                      class="ng-star-inserted"></path>
                                                <path _ngcontent-fqc-c443=""
                                                      d="M4.08972 52.6326C8.51981 52.9595 12.2454 53.3598 16.3914 53.5565C21.439 52.3262 18.4818 38.714 17.6921 34.9224C12.0846 30.3848 5.26914 32.9691 3.42269 35.658C2.05995 40.6304 -0.411521 51.4578 4.08946 52.6331L4.08972 52.6326Z"
                                                      class="ng-star-inserted"></path><!----></svg><!---->
                                            <svg _ngcontent-fqc-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 viewBox="0 0 27 27"
                                                 width="27" height="27" class="sd-odontograma-dente__faces">
                                                <path _ngcontent-fqc-c443=""
                                                      d="M18.2439 18.2354L24.0947 24.0999C20.7001 27.4945 13.9521 24.7899 13.4002 24.7899C12.8228 24.7899 6.08666 27.4945 2.70581 24.0999C4.85848 21.9473 6.16935 20.6433 8.57728 18.2354H18.2368H18.2439Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area52Vestibular"
                                                      aria-describedby="cdk-describedby-message-fqc-1-12"
                                                      cdk-describedby-host="fqc-1"></path><!---->
                                                <path _ngcontent-fqc-c443=""
                                                      d="M8.58244 18.2344C6.27799 20.5112 5.03609 21.7531 2.71097 24.0989C-0.683593 20.7182 2.02103 13.9564 2.02103 13.4045C2.02103 12.7836 -0.683593 6.09093 2.71097 2.71008L8.57557 8.58155V18.2411L8.58244 18.2344Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area52Distal"
                                                      aria-describedby="cdk-describedby-message-fqc-1-12"
                                                      cdk-describedby-host="fqc-1"></path><!---->
                                                <path _ngcontent-fqc-c443=""
                                                      d="M8.5815 8.57556C6.27705 6.278 5.05583 5.0361 2.73071 2.71098C6.12528 -0.683584 12.8733 2.02103 13.4251 2.02103C14.0026 2.02101 20.7387 -0.683584 24.1196 2.71098C21.9669 4.86365 20.656 6.16762 18.2481 8.57556H8.58854H8.5815Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area52Palatina"
                                                      aria-describedby="cdk-describedby-message-fqc-1-12"
                                                      cdk-describedby-host="fqc-1"></path><!---->
                                                <path _ngcontent-fqc-c443=""
                                                      d="M18.2446 8.57504C20.5491 6.27059 21.7841 5.05632 24.1092 2.72424C27.5038 6.11881 24.7991 12.8668 24.7991 13.4187C24.7992 13.9962 27.5038 20.7323 24.1092 24.1131L18.2446 18.2416V8.58207V8.57504Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area52Mesial"
                                                      aria-describedby="cdk-describedby-message-fqc-1-12"
                                                      cdk-describedby-host="fqc-1"></path><!---->
                                                <path _ngcontent-fqc-c443=""
                                                      d="M8.58374 8.57568V18.2353H18.2433V8.57568H8.58374Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area52Oclusal"
                                                      aria-describedby="cdk-describedby-message-fqc-1-12"
                                                      cdk-describedby-host="fqc-1"></path><!----></svg>
                                        </div>
                                    </sd-odontograma-dente>
                                    <sd-odontograma-dente _ngcontent-fqc-c445="" _nghost-fqc-c443=""
                                                          class="ng-star-inserted">
                                        <div _ngcontent-fqc-c443="" class="sd-odontograma-dente"><span
                                                    _ngcontent-fqc-c443=""
                                                    class="sd-odontograma-dente__label"> 51 </span>
                                            <svg _ngcontent-fqc-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 class="mat-tooltip-trigger sd-odontograma-dente__dente"
                                                 viewBox="0 0 23 56"
                                                 data-testid="area51" height="56"
                                                 aria-describedby="cdk-describedby-message-fqc-1-48"
                                                 cdk-describedby-host="fqc-1">
                                                <path _ngcontent-fqc-c443=""
                                                      d="M11.9942 0.817178C16.4798 0.743181 13.5942 15.1899 17.7982 28.8074C13.8613 26.6374 11.9941 27.7256 11.9941 27.7256C11.9941 27.7256 6.57379 27.2457 3.30908 32.2782C6.62971 21.4857 8.29117 1.51528 11.9941 0.817643L11.9942 0.817178Z"
                                                      class="ng-star-inserted"></path>
                                                <path _ngcontent-fqc-c443=""
                                                      d="M2.40441 53.3221C3.69951 55.803 10.6588 54.8753 12.5099 54.4497C18.5874 55.2892 21.8792 54.7561 21.6262 48.4215L21.736 41.3557C21.736 41.3557 22.1406 33.6665 18.2038 31.4967C14.2669 29.3267 12.3996 30.415 12.3996 30.415C12.3996 30.415 6.97939 29.935 3.71461 34.9675C0.449968 39.9999 0.679677 44.0679 0.866442 47.1678C1.05321 50.2678 1.10906 50.8411 2.40423 53.322L2.40441 53.3221Z"
                                                      class="ng-star-inserted"></path><!----></svg><!---->
                                            <svg _ngcontent-fqc-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 viewBox="0 0 27 27"
                                                 width="27" height="27" class="sd-odontograma-dente__faces">
                                                <path _ngcontent-fqc-c443=""
                                                      d="M18.2439 18.2354L24.0947 24.0999C20.7001 27.4945 13.9521 24.7899 13.4002 24.7899C12.8228 24.7899 6.08666 27.4945 2.70581 24.0999C4.85848 21.9473 6.16935 20.6433 8.57728 18.2354H18.2368H18.2439Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area51Vestibular"
                                                      aria-describedby="cdk-describedby-message-fqc-1-12"
                                                      cdk-describedby-host="fqc-1"></path><!---->
                                                <path _ngcontent-fqc-c443=""
                                                      d="M8.58244 18.2344C6.27799 20.5112 5.03609 21.7531 2.71097 24.0989C-0.683593 20.7182 2.02103 13.9564 2.02103 13.4045C2.02103 12.7836 -0.683593 6.09093 2.71097 2.71008L8.57557 8.58155V18.2411L8.58244 18.2344Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area51Distal"
                                                      aria-describedby="cdk-describedby-message-fqc-1-12"
                                                      cdk-describedby-host="fqc-1"></path><!---->
                                                <path _ngcontent-fqc-c443=""
                                                      d="M8.5815 8.57556C6.27705 6.278 5.05583 5.0361 2.73071 2.71098C6.12528 -0.683584 12.8733 2.02103 13.4251 2.02103C14.0026 2.02101 20.7387 -0.683584 24.1196 2.71098C21.9669 4.86365 20.656 6.16762 18.2481 8.57556H8.58854H8.5815Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area51Palatina"
                                                      aria-describedby="cdk-describedby-message-fqc-1-12"
                                                      cdk-describedby-host="fqc-1"></path><!---->
                                                <path _ngcontent-fqc-c443=""
                                                      d="M18.2446 8.57504C20.5491 6.27059 21.7841 5.05632 24.1092 2.72424C27.5038 6.11881 24.7991 12.8668 24.7991 13.4187C24.7992 13.9962 27.5038 20.7323 24.1092 24.1131L18.2446 18.2416V8.58207V8.57504Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area51Mesial"
                                                      aria-describedby="cdk-describedby-message-fqc-1-12"
                                                      cdk-describedby-host="fqc-1"></path><!---->
                                                <path _ngcontent-fqc-c443=""
                                                      d="M8.58374 8.57568V18.2353H18.2433V8.57568H8.58374Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area51Oclusal"
                                                      aria-describedby="cdk-describedby-message-fqc-1-12"
                                                      cdk-describedby-host="fqc-1"></path><!----></svg>
                                        </div>
                                    </sd-odontograma-dente>
                                </div>
                            </div>
                            <div class="col-1 d-flex align-items-center justify-content-center">
                                <h5 class="fs-6">M</h5>
                            </div>
                        </div>
                        <div class="col-12 d-flex align-items-center justify-content-center">
                            <h5 class="fs-6">V</h5>
                        </div>

                    </div>
                    <div class="col-12 col-md-6 d-flex flex-column">
                        <div class="col-12 d-flex align-items-center justify-content-center">
                            <h5 class="fs-6">P</h5>
                        </div>
                        <div class="col-12 d-flex align-items-center justify-content-center">
                            <div class="col-1 d-flex align-items-center justify-content-center">
                                <h5 class="fs-6">M</h5>
                            </div>
                            <div class="d-flex align-items-center justify-content-center">
                                <div class="diagram-cell"
                                     style="flex-direction: row; box-sizing: border-box; display: flex;">
                                    <sd-odontograma-dente _ngcontent-fqc-c445="" _nghost-fqc-c443=""
                                                          class="ng-star-inserted"
                                                          style="margin-right: 8px;">
                                        <div _ngcontent-fqc-c443="" class="sd-odontograma-dente"><span
                                                    _ngcontent-fqc-c443=""
                                                    class="sd-odontograma-dente__label"> 61 </span>
                                            <svg _ngcontent-fqc-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 class="mat-tooltip-trigger sd-odontograma-dente__dente"
                                                 viewBox="0 0 23 56"
                                                 data-testid="area61" height="56"
                                                 aria-describedby="cdk-describedby-message-fqc-1-49"
                                                 cdk-describedby-host="fqc-1">
                                                <path _ngcontent-fqc-c443=""
                                                      d="M10.4197 0.883218C5.93415 0.809214 8.81969 15.256 4.61572 28.8734C8.55256 26.7034 10.4198 27.7917 10.4198 27.7917C10.4198 27.7917 15.8401 27.3117 19.1048 32.3442C15.7842 21.5517 14.1227 1.58132 10.4198 0.88368L10.4197 0.883218Z"
                                                      class="ng-star-inserted"></path>
                                                <path _ngcontent-fqc-c443=""
                                                      d="M20.0247 53.3892C18.7297 55.8701 11.7704 54.9425 9.91931 54.5168C3.8418 55.3563 0.549922 54.8233 0.803005 48.4887L0.693158 41.4229C0.693158 41.4229 0.288564 33.7336 4.2254 31.5639C8.16224 29.3938 10.0296 30.4821 10.0296 30.4821C10.0296 30.4821 15.4498 30.0021 18.7145 35.0346C21.9792 40.0671 21.7495 44.135 21.5627 47.235C21.376 50.3349 21.3201 50.9082 20.025 53.3891L20.0247 53.3892Z"
                                                      class="ng-star-inserted"></path><!----></svg><!---->
                                            <svg _ngcontent-fqc-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 viewBox="0 0 27 27"
                                                 width="27" height="27" class="sd-odontograma-dente__faces">
                                                <path _ngcontent-fqc-c443=""
                                                      d="M18.2439 18.2354L24.0947 24.0999C20.7001 27.4945 13.9521 24.7899 13.4002 24.7899C12.8228 24.7899 6.08666 27.4945 2.70581 24.0999C4.85848 21.9473 6.16935 20.6433 8.57728 18.2354H18.2368H18.2439Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area61Vestibular"
                                                      aria-describedby="cdk-describedby-message-fqc-1-12"
                                                      cdk-describedby-host="fqc-1"></path><!---->
                                                <path _ngcontent-fqc-c443=""
                                                      d="M8.58244 18.2344C6.27799 20.5112 5.03609 21.7531 2.71097 24.0989C-0.683593 20.7182 2.02103 13.9564 2.02103 13.4045C2.02103 12.7836 -0.683593 6.09093 2.71097 2.71008L8.57557 8.58155V18.2411L8.58244 18.2344Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area61Mesial"
                                                      aria-describedby="cdk-describedby-message-fqc-1-12"
                                                      cdk-describedby-host="fqc-1"></path><!---->
                                                <path _ngcontent-fqc-c443=""
                                                      d="M8.5815 8.57556C6.27705 6.278 5.05583 5.0361 2.73071 2.71098C6.12528 -0.683584 12.8733 2.02103 13.4251 2.02103C14.0026 2.02101 20.7387 -0.683584 24.1196 2.71098C21.9669 4.86365 20.656 6.16762 18.2481 8.57556H8.58854H8.5815Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area61Palatina"
                                                      aria-describedby="cdk-describedby-message-fqc-1-12"
                                                      cdk-describedby-host="fqc-1"></path><!---->
                                                <path _ngcontent-fqc-c443=""
                                                      d="M18.2446 8.57504C20.5491 6.27059 21.7841 5.05632 24.1092 2.72424C27.5038 6.11881 24.7991 12.8668 24.7991 13.4187C24.7992 13.9962 27.5038 20.7323 24.1092 24.1131L18.2446 18.2416V8.58207V8.57504Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area61Distal"
                                                      aria-describedby="cdk-describedby-message-fqc-1-12"
                                                      cdk-describedby-host="fqc-1"></path><!---->
                                                <path _ngcontent-fqc-c443=""
                                                      d="M8.58374 8.57568V18.2353H18.2433V8.57568H8.58374Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area61Oclusal"
                                                      aria-describedby="cdk-describedby-message-fqc-1-12"
                                                      cdk-describedby-host="fqc-1"></path><!----></svg>
                                        </div>
                                    </sd-odontograma-dente>
                                    <sd-odontograma-dente _ngcontent-fqc-c445="" _nghost-fqc-c443=""
                                                          class="ng-star-inserted"
                                                          style="margin-right: 8px;">
                                        <div _ngcontent-fqc-c443="" class="sd-odontograma-dente"><span
                                                    _ngcontent-fqc-c443=""
                                                    class="sd-odontograma-dente__label"> 62 </span>
                                            <svg _ngcontent-fqc-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 class="mat-tooltip-trigger sd-odontograma-dente__dente"
                                                 viewBox="0 0 20 55"
                                                 data-testid="area62" height="55"
                                                 aria-describedby="cdk-describedby-message-fqc-1-50"
                                                 cdk-describedby-host="fqc-1">
                                                <path _ngcontent-fqc-c443=""
                                                      d="M9.48946 1.24741C4.7144 0.272044 8.92089 17.5428 3.46582 31.6307C10.68 28.7244 13.3606 29.79 16.0875 31.9104C16.5715 25.4861 12.7821 4.28852 9.4894 1.24754L9.48946 1.24741Z"
                                                      class="ng-star-inserted"></path>
                                                <path _ngcontent-fqc-c443=""
                                                      d="M16.33 52.699C11.8999 53.0258 8.17431 53.426 4.02824 53.6227C-1.01931 52.3924 1.93786 38.7802 2.72758 34.9886C8.3351 30.4511 15.1505 33.0354 16.997 35.7242C18.3597 40.6966 20.8312 51.524 16.3302 52.6994L16.33 52.699Z"
                                                      class="ng-star-inserted"></path><!----></svg><!---->
                                            <svg _ngcontent-fqc-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 viewBox="0 0 27 27"
                                                 width="27" height="27" class="sd-odontograma-dente__faces">
                                                <path _ngcontent-fqc-c443=""
                                                      d="M18.2439 18.2354L24.0947 24.0999C20.7001 27.4945 13.9521 24.7899 13.4002 24.7899C12.8228 24.7899 6.08666 27.4945 2.70581 24.0999C4.85848 21.9473 6.16935 20.6433 8.57728 18.2354H18.2368H18.2439Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area62Vestibular"
                                                      aria-describedby="cdk-describedby-message-fqc-1-12"
                                                      cdk-describedby-host="fqc-1"></path><!---->
                                                <path _ngcontent-fqc-c443=""
                                                      d="M8.58244 18.2344C6.27799 20.5112 5.03609 21.7531 2.71097 24.0989C-0.683593 20.7182 2.02103 13.9564 2.02103 13.4045C2.02103 12.7836 -0.683593 6.09093 2.71097 2.71008L8.57557 8.58155V18.2411L8.58244 18.2344Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area62Mesial"
                                                      aria-describedby="cdk-describedby-message-fqc-1-12"
                                                      cdk-describedby-host="fqc-1"></path><!---->
                                                <path _ngcontent-fqc-c443=""
                                                      d="M8.5815 8.57556C6.27705 6.278 5.05583 5.0361 2.73071 2.71098C6.12528 -0.683584 12.8733 2.02103 13.4251 2.02103C14.0026 2.02101 20.7387 -0.683584 24.1196 2.71098C21.9669 4.86365 20.656 6.16762 18.2481 8.57556H8.58854H8.5815Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area62Palatina"
                                                      aria-describedby="cdk-describedby-message-fqc-1-12"
                                                      cdk-describedby-host="fqc-1"></path><!---->
                                                <path _ngcontent-fqc-c443=""
                                                      d="M18.2446 8.57504C20.5491 6.27059 21.7841 5.05632 24.1092 2.72424C27.5038 6.11881 24.7991 12.8668 24.7991 13.4187C24.7992 13.9962 27.5038 20.7323 24.1092 24.1131L18.2446 18.2416V8.58207V8.57504Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area62Distal"
                                                      aria-describedby="cdk-describedby-message-fqc-1-12"
                                                      cdk-describedby-host="fqc-1"></path><!---->
                                                <path _ngcontent-fqc-c443=""
                                                      d="M8.58374 8.57568V18.2353H18.2433V8.57568H8.58374Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area62Oclusal"
                                                      aria-describedby="cdk-describedby-message-fqc-1-12"
                                                      cdk-describedby-host="fqc-1"></path><!----></svg>
                                        </div>
                                    </sd-odontograma-dente>
                                    <sd-odontograma-dente _ngcontent-fqc-c445="" _nghost-fqc-c443=""
                                                          class="ng-star-inserted"
                                                          style="margin-right: 8px;">
                                        <div _ngcontent-fqc-c443="" class="sd-odontograma-dente"><span
                                                    _ngcontent-fqc-c443=""
                                                    class="sd-odontograma-dente__label"> 63 </span>
                                            <svg _ngcontent-fqc-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 class="mat-tooltip-trigger sd-odontograma-dente__dente"
                                                 viewBox="0 0 22 62"
                                                 data-testid="area63" height="62"
                                                 aria-describedby="cdk-describedby-message-fqc-1-51"
                                                 cdk-describedby-host="fqc-1">
                                                <path _ngcontent-fqc-c443=""
                                                      d="M11.0857 1.68847C5.80518 1.26724 6.33213 26.327 4.39551 36.7332C4.18549 37.8617 5.54108 34.7112 10.6466 34.4088C10.6466 34.4088 15.5177 34.3843 17.6839 37.2519C17.3206 26.2169 13.1729 3.24196 11.0858 1.68834L11.0857 1.68847Z"
                                                      class="ng-star-inserted"></path>
                                                <path _ngcontent-fqc-c443=""
                                                      d="M11.7313 61.1831C8.50955 60.4271 2.03259 55.2214 1.62647 52.9897C0.836145 50.9927 2.30717 43.2989 3.84064 40.9655C6.34962 36.9721 11.0727 37.0346 11.0727 37.0346C11.0727 37.0346 15.2847 37.1245 17.451 39.9916C19.6173 42.8587 20.9254 50.1176 20.0796 52.4198C19.1533 55.7905 16.5585 59.4359 11.7318 61.183L11.7313 61.1831Z"
                                                      class="ng-star-inserted"></path><!----></svg><!---->
                                            <svg _ngcontent-fqc-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 viewBox="0 0 27 27"
                                                 width="27" height="27" class="sd-odontograma-dente__faces">
                                                <path _ngcontent-fqc-c443=""
                                                      d="M18.2439 18.2354L24.0947 24.0999C20.7001 27.4945 13.9521 24.7899 13.4002 24.7899C12.8228 24.7899 6.08666 27.4945 2.70581 24.0999C4.85848 21.9473 6.16935 20.6433 8.57728 18.2354H18.2368H18.2439Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area63Vestibular"
                                                      aria-describedby="cdk-describedby-message-fqc-1-12"
                                                      cdk-describedby-host="fqc-1"></path><!---->
                                                <path _ngcontent-fqc-c443=""
                                                      d="M8.58244 18.2344C6.27799 20.5112 5.03609 21.7531 2.71097 24.0989C-0.683593 20.7182 2.02103 13.9564 2.02103 13.4045C2.02103 12.7836 -0.683593 6.09093 2.71097 2.71008L8.57557 8.58155V18.2411L8.58244 18.2344Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area63Mesial"
                                                      aria-describedby="cdk-describedby-message-fqc-1-12"
                                                      cdk-describedby-host="fqc-1"></path><!---->
                                                <path _ngcontent-fqc-c443=""
                                                      d="M8.5815 8.57556C6.27705 6.278 5.05583 5.0361 2.73071 2.71098C6.12528 -0.683584 12.8733 2.02103 13.4251 2.02103C14.0026 2.02101 20.7387 -0.683584 24.1196 2.71098C21.9669 4.86365 20.656 6.16762 18.2481 8.57556H8.58854H8.5815Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area63Palatina"
                                                      aria-describedby="cdk-describedby-message-fqc-1-12"
                                                      cdk-describedby-host="fqc-1"></path><!---->
                                                <path _ngcontent-fqc-c443=""
                                                      d="M18.2446 8.57504C20.5491 6.27059 21.7841 5.05632 24.1092 2.72424C27.5038 6.11881 24.7991 12.8668 24.7991 13.4187C24.7992 13.9962 27.5038 20.7323 24.1092 24.1131L18.2446 18.2416V8.58207V8.57504Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area63Distal"
                                                      aria-describedby="cdk-describedby-message-fqc-1-12"
                                                      cdk-describedby-host="fqc-1"></path><!---->
                                                <path _ngcontent-fqc-c443=""
                                                      d="M8.58374 8.57568V18.2353H18.2433V8.57568H8.58374Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area63Oclusal"
                                                      aria-describedby="cdk-describedby-message-fqc-1-12"
                                                      cdk-describedby-host="fqc-1"></path><!----></svg>
                                        </div>
                                    </sd-odontograma-dente>
                                    <sd-odontograma-dente _ngcontent-fqc-c445="" _nghost-fqc-c443=""
                                                          class="ng-star-inserted"
                                                          style="margin-right: 8px;">
                                        <div _ngcontent-fqc-c443="" class="sd-odontograma-dente"><span
                                                    _ngcontent-fqc-c443=""
                                                    class="sd-odontograma-dente__label"> 64 </span>
                                            <svg _ngcontent-fqc-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 class="mat-tooltip-trigger sd-odontograma-dente__dente"
                                                 viewBox="0 0 24 51"
                                                 data-testid="area64" height="51"
                                                 aria-describedby="cdk-describedby-message-fqc-1-52"
                                                 cdk-describedby-host="fqc-1">
                                                <path _ngcontent-fqc-c443=""
                                                      d="M17.9849 4.28554C14.3831 6.65253 16.7602 21.5661 11.7239 23.4198C5.64631 24.2593 10.922 3.66807 6.34191 2.69019C2.04472 6.93046 1.4175 30.8414 2.84438 28.9585C5.02381 27.0164 8.11413 25.1877 10.5157 25.2556C12.9173 25.3234 18.3527 27.1689 19.9693 27.6427C21.9967 24.1075 20.2999 4.64854 17.9845 4.28547L17.9849 4.28554Z"
                                                      class="ng-star-inserted"></path>
                                                <path _ngcontent-fqc-c443=""
                                                      d="M11.4563 20.6034C10.478 20.0431 10.1299 16.1539 10.3877 11.8674C10.6318 7.80517 11.4087 3.38575 13.104 1.10336C14.5397 0.215782 14.2693 5.19457 13.9103 10.278C13.5612 15.2212 12.9443 19.9091 11.4563 20.6034Z"
                                                      class="ng-star-inserted"></path>
                                                <path _ngcontent-fqc-c443=""
                                                      d="M22.0033 48.4022C20.3787 51.453 10.2343 49.1577 8.38322 48.7321C2.30564 49.5716 1.32073 48.9246 1.24388 46.5788C0.900958 41.7018 0.713092 34.2718 2.13997 32.3889C4.3194 30.4468 6.97032 28.1621 9.70131 27.8881C12.4325 27.6141 17.7576 29.3456 19.3748 29.8194C20.9919 30.2932 23.0688 35.1591 22.882 38.2592C22.6953 41.3592 23.628 45.3515 22.0033 48.4024V48.4022Z"
                                                      class="ng-star-inserted"></path><!----></svg><!---->
                                            <svg _ngcontent-fqc-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 viewBox="0 0 27 27"
                                                 width="27" height="27" class="sd-odontograma-dente__faces">
                                                <path _ngcontent-fqc-c443=""
                                                      d="M18.2439 18.2354L24.0947 24.0999C20.7001 27.4945 13.9521 24.7899 13.4002 24.7899C12.8228 24.7899 6.08666 27.4945 2.70581 24.0999C4.85848 21.9473 6.16935 20.6433 8.57728 18.2354H18.2368H18.2439Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area64Vestibular"
                                                      aria-describedby="cdk-describedby-message-fqc-1-12"
                                                      cdk-describedby-host="fqc-1"></path><!---->
                                                <path _ngcontent-fqc-c443=""
                                                      d="M8.58244 18.2344C6.27799 20.5112 5.03609 21.7531 2.71097 24.0989C-0.683593 20.7182 2.02103 13.9564 2.02103 13.4045C2.02103 12.7836 -0.683593 6.09093 2.71097 2.71008L8.57557 8.58155V18.2411L8.58244 18.2344Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area64Mesial"
                                                      aria-describedby="cdk-describedby-message-fqc-1-12"
                                                      cdk-describedby-host="fqc-1"></path><!---->
                                                <path _ngcontent-fqc-c443=""
                                                      d="M8.5815 8.57556C6.27705 6.278 5.05583 5.0361 2.73071 2.71098C6.12528 -0.683584 12.8733 2.02103 13.4251 2.02103C14.0026 2.02101 20.7387 -0.683584 24.1196 2.71098C21.9669 4.86365 20.656 6.16762 18.2481 8.57556H8.58854H8.5815Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area64Palatina"
                                                      aria-describedby="cdk-describedby-message-fqc-1-12"
                                                      cdk-describedby-host="fqc-1"></path><!---->
                                                <path _ngcontent-fqc-c443=""
                                                      d="M18.2446 8.57504C20.5491 6.27059 21.7841 5.05632 24.1092 2.72424C27.5038 6.11881 24.7991 12.8668 24.7991 13.4187C24.7992 13.9962 27.5038 20.7323 24.1092 24.1131L18.2446 18.2416V8.58207V8.57504Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area64Distal"
                                                      aria-describedby="cdk-describedby-message-fqc-1-12"
                                                      cdk-describedby-host="fqc-1"></path><!---->
                                                <path _ngcontent-fqc-c443=""
                                                      d="M8.58374 8.57568V18.2353H18.2433V8.57568H8.58374Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area64Oclusal"
                                                      aria-describedby="cdk-describedby-message-fqc-1-12"
                                                      cdk-describedby-host="fqc-1"></path><!----></svg>
                                        </div>
                                    </sd-odontograma-dente>
                                    <sd-odontograma-dente _ngcontent-fqc-c445="" _nghost-fqc-c443=""
                                                          class="ng-star-inserted">
                                        <div _ngcontent-fqc-c443="" class="sd-odontograma-dente"><span
                                                    _ngcontent-fqc-c443=""
                                                    class="sd-odontograma-dente__label"> 65 </span>
                                            <svg _ngcontent-fqc-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 class="mat-tooltip-trigger sd-odontograma-dente__dente"
                                                 viewBox="0 0 24 51"
                                                 data-testid="area65" height="51"
                                                 aria-describedby="cdk-describedby-message-fqc-1-53"
                                                 cdk-describedby-host="fqc-1">
                                                <path _ngcontent-fqc-c443=""
                                                      d="M17.9849 4.28554C14.3831 6.65253 16.7602 21.5661 11.7239 23.4198C5.64631 24.2593 10.922 3.66807 6.34191 2.69019C2.04472 6.93046 1.4175 30.8414 2.84438 28.9585C5.02381 27.0164 8.11413 25.1877 10.5157 25.2556C12.9173 25.3234 18.3527 27.1689 19.9693 27.6427C21.9967 24.1075 20.2999 4.64854 17.9845 4.28547L17.9849 4.28554Z"
                                                      class="ng-star-inserted"></path>
                                                <path _ngcontent-fqc-c443=""
                                                      d="M11.4563 20.6034C10.478 20.0431 10.1299 16.1539 10.3877 11.8674C10.6318 7.80517 11.4087 3.38575 13.104 1.10336C14.5397 0.215782 14.2693 5.19457 13.9103 10.278C13.5612 15.2212 12.9443 19.9091 11.4563 20.6034Z"
                                                      class="ng-star-inserted"></path>
                                                <path _ngcontent-fqc-c443=""
                                                      d="M22.0033 48.4022C20.3787 51.453 10.2343 49.1577 8.38322 48.7321C2.30564 49.5716 1.32073 48.9246 1.24388 46.5788C0.900958 41.7018 0.713092 34.2718 2.13997 32.3889C4.3194 30.4468 6.97032 28.1621 9.70131 27.8881C12.4325 27.6141 17.7576 29.3456 19.3748 29.8194C20.9919 30.2932 23.0688 35.1591 22.882 38.2592C22.6953 41.3592 23.628 45.3515 22.0033 48.4024V48.4022Z"
                                                      class="ng-star-inserted"></path><!----></svg><!---->
                                            <svg _ngcontent-fqc-c443="" xmlns="http://www.w3.org/2000/svg"
                                                 viewBox="0 0 27 27"
                                                 width="27" height="27" class="sd-odontograma-dente__faces">
                                                <path _ngcontent-fqc-c443=""
                                                      d="M18.2439 18.2354L24.0947 24.0999C20.7001 27.4945 13.9521 24.7899 13.4002 24.7899C12.8228 24.7899 6.08666 27.4945 2.70581 24.0999C4.85848 21.9473 6.16935 20.6433 8.57728 18.2354H18.2368H18.2439Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area65Vestibular"
                                                      aria-describedby="cdk-describedby-message-fqc-1-12"
                                                      cdk-describedby-host="fqc-1"></path><!---->
                                                <path _ngcontent-fqc-c443=""
                                                      d="M8.58244 18.2344C6.27799 20.5112 5.03609 21.7531 2.71097 24.0989C-0.683593 20.7182 2.02103 13.9564 2.02103 13.4045C2.02103 12.7836 -0.683593 6.09093 2.71097 2.71008L8.57557 8.58155V18.2411L8.58244 18.2344Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area65Mesial"
                                                      aria-describedby="cdk-describedby-message-fqc-1-12"
                                                      cdk-describedby-host="fqc-1"></path><!---->
                                                <path _ngcontent-fqc-c443=""
                                                      d="M8.5815 8.57556C6.27705 6.278 5.05583 5.0361 2.73071 2.71098C6.12528 -0.683584 12.8733 2.02103 13.4251 2.02103C14.0026 2.02101 20.7387 -0.683584 24.1196 2.71098C21.9669 4.86365 20.656 6.16762 18.2481 8.57556H8.58854H8.5815Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area65Palatina"
                                                      aria-describedby="cdk-describedby-message-fqc-1-12"
                                                      cdk-describedby-host="fqc-1"></path><!---->
                                                <path _ngcontent-fqc-c443=""
                                                      d="M18.2446 8.57504C20.5491 6.27059 21.7841 5.05632 24.1092 2.72424C27.5038 6.11881 24.7991 12.8668 24.7991 13.4187C24.7992 13.9962 27.5038 20.7323 24.1092 24.1131L18.2446 18.2416V8.58207V8.57504Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area65Distal"
                                                      aria-describedby="cdk-describedby-message-fqc-1-12"
                                                      cdk-describedby-host="fqc-1"></path><!---->
                                                <path _ngcontent-fqc-c443=""
                                                      d="M8.58374 8.57568V18.2353H18.2433V8.57568H8.58374Z"
                                                      class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                      data-testid="area65Oclusal"
                                                      aria-describedby="cdk-describedby-message-fqc-1-12"
                                                      cdk-describedby-host="fqc-1"></path><!----></svg>
                                        </div>
                                    </sd-odontograma-dente><!----></div>
                            </div>
                            <div class="col-1 d-flex align-items-center justify-content-center">
                                <h5 class="fs-6">D</h5>
                            </div>
                        </div>
                        <div class="col-12 d-flex align-items-center justify-content-center">
                            <h5 class="fs-6">V</h5>
                        </div>
                    </div>
                </div>
                <div class="top-diagram diagram-row d-flex flex-column flex-md-row">
                    <div class="bop-diagram diagram-row d-flex flex-column flex-md-row py-3">

                        <div class="col-12 col-md-6 d-flex flex-column">
                            <div class="col-12 d-flex align-items-center justify-content-center">
                                <h5 class="fs-6">V</h5>
                            </div>
                            <div class="col-12 d-flex align-items-center justify-content-center">
                                <div class="col-1 d-flex align-items-center justify-content-center">
                                    <h5 class="fs-6">D</h5>
                                </div>
                                <div class="d-flex align-items-center justify-content-center">
                                    <div class="diagram-cell"
                                         style="flex-direction: row; box-sizing: border-box; display: flex;">
                                        <sd-odontograma-dente _ngcontent-fqc-c445="" _nghost-fqc-c443=""
                                                              class="ng-star-inserted"
                                                              style="margin-right: 8px;">
                                            <div _ngcontent-fqc-c443=""
                                                 class="sd-odontograma-dente sd-odontograma-dente--reversed"><span
                                                        _ngcontent-fqc-c443=""
                                                        class="sd-odontograma-dente__label"> 85 </span>
                                                <svg _ngcontent-fqc-c443="" xmlns="http://www.w3.org/2000/svg"
                                                     class="mat-tooltip-trigger sd-odontograma-dente__dente"
                                                     viewBox="0 0 24 52"
                                                     data-testid="area85" height="52"
                                                     aria-describedby="cdk-describedby-message-fqc-1-54"
                                                     cdk-describedby-host="fqc-1">
                                                    <path _ngcontent-fqc-c443=""
                                                          d="M3.63273 37.9909C4.04025 42.7101 5.11532 51.727 7.17808 50.983C11.1133 49.5645 5.61036 30.4945 11.4081 31.0609C15.6393 32.0559 11.8522 46.8866 15.726 48.739C18.3203 49.9795 19.2604 32.9445 19.728 29.6352C20.1043 26.9714 19.9457 20.1055 19.1266 21.5359C18.6553 22.2131 16.9935 22.9112 16.0708 22.6904C12.2097 22.265 10.3147 23.1313 7.14867 22.301C4.99792 21.7368 4.71602 21.9208 3.8036 20.4526C2.04864 17.5943 3.22515 33.2717 3.63266 37.9908L3.63273 37.9909Z"
                                                          class="ng-star-inserted"></path>
                                                    <path _ngcontent-fqc-c443=""
                                                          d="M1.86096 2.77196C3.97719 0.560731 6.00543 1.96648 8.12471 1.42003C11.4386 0.565576 14.3239 1.23948 15.384 1.48296C16.7415 1.75267 20.4106 0.304733 21.9543 2.88254C23.462 5.40006 21.8408 7.72763 21.4515 11.0163C21.1108 13.8954 21.5915 15.4279 20.7725 16.8588C19.9693 18.3967 18.1357 20.2659 16.1633 20.1086C12.3022 19.6832 10.4072 20.5494 7.2411 19.7191C5.09036 19.155 3.48811 17.1632 2.57569 15.6948C2.14107 11.2249 -0.255138 4.98254 1.86102 2.7717L1.86096 2.77196Z"
                                                          class="ng-star-inserted"></path><!----></svg><!---->
                                                <svg _ngcontent-fqc-c443="" xmlns="http://www.w3.org/2000/svg"
                                                     viewBox="0 0 27 27"
                                                     width="27" height="27" class="sd-odontograma-dente__faces">
                                                    <path _ngcontent-fqc-c443=""
                                                          d="M18.2439 18.2354L24.0947 24.0999C20.7001 27.4945 13.9521 24.7899 13.4002 24.7899C12.8228 24.7899 6.08666 27.4945 2.70581 24.0999C4.85848 21.9473 6.16935 20.6433 8.57728 18.2354H18.2368H18.2439Z"
                                                          class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                          data-testid="area85Vestibular"
                                                          aria-describedby="cdk-describedby-message-fqc-1-12"
                                                          cdk-describedby-host="fqc-1"></path><!---->
                                                    <path _ngcontent-fqc-c443=""
                                                          d="M8.58244 18.2344C6.27799 20.5112 5.03609 21.7531 2.71097 24.0989C-0.683593 20.7182 2.02103 13.9564 2.02103 13.4045C2.02103 12.7836 -0.683593 6.09093 2.71097 2.71008L8.57557 8.58155V18.2411L8.58244 18.2344Z"
                                                          class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                          data-testid="area85Distal"
                                                          aria-describedby="cdk-describedby-message-fqc-1-12"
                                                          cdk-describedby-host="fqc-1"></path><!---->
                                                    <path _ngcontent-fqc-c443=""
                                                          d="M8.5815 8.57556C6.27705 6.278 5.05583 5.0361 2.73071 2.71098C6.12528 -0.683584 12.8733 2.02103 13.4251 2.02103C14.0026 2.02101 20.7387 -0.683584 24.1196 2.71098C21.9669 4.86365 20.656 6.16762 18.2481 8.57556H8.58854H8.5815Z"
                                                          class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                          data-testid="area85Palatina"
                                                          aria-describedby="cdk-describedby-message-fqc-1-12"
                                                          cdk-describedby-host="fqc-1"></path><!---->
                                                    <path _ngcontent-fqc-c443=""
                                                          d="M18.2446 8.57504C20.5491 6.27059 21.7841 5.05632 24.1092 2.72424C27.5038 6.11881 24.7991 12.8668 24.7991 13.4187C24.7992 13.9962 27.5038 20.7323 24.1092 24.1131L18.2446 18.2416V8.58207V8.57504Z"
                                                          class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                          data-testid="area85Mesial"
                                                          aria-describedby="cdk-describedby-message-fqc-1-12"
                                                          cdk-describedby-host="fqc-1"></path><!---->
                                                    <path _ngcontent-fqc-c443=""
                                                          d="M8.58374 8.57568V18.2353H18.2433V8.57568H8.58374Z"
                                                          class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                          data-testid="area85Oclusal"
                                                          aria-describedby="cdk-describedby-message-fqc-1-12"
                                                          cdk-describedby-host="fqc-1"></path><!----></svg>
                                            </div>
                                        </sd-odontograma-dente>
                                        <sd-odontograma-dente _ngcontent-fqc-c445="" _nghost-fqc-c443=""
                                                              class="ng-star-inserted"
                                                              style="margin-right: 8px;">
                                            <div _ngcontent-fqc-c443=""
                                                 class="sd-odontograma-dente sd-odontograma-dente--reversed"><span
                                                        _ngcontent-fqc-c443=""
                                                        class="sd-odontograma-dente__label"> 84 </span>
                                                <svg _ngcontent-fqc-c443="" xmlns="http://www.w3.org/2000/svg"
                                                     class="mat-tooltip-trigger sd-odontograma-dente__dente"
                                                     viewBox="0 0 24 52"
                                                     data-testid="area84" height="52"
                                                     aria-describedby="cdk-describedby-message-fqc-1-55"
                                                     cdk-describedby-host="fqc-1">
                                                    <path _ngcontent-fqc-c443=""
                                                          d="M3.63273 37.9909C4.04025 42.7101 5.11532 51.727 7.17808 50.983C11.1133 49.5645 5.61036 30.4945 11.4081 31.0609C15.6393 32.0559 11.8522 46.8866 15.726 48.739C18.3203 49.9795 19.2604 32.9445 19.728 29.6352C20.1043 26.9714 19.9457 20.1055 19.1266 21.5359C18.6553 22.2131 16.9935 22.9112 16.0708 22.6904C12.2097 22.265 10.3147 23.1313 7.14867 22.301C4.99792 21.7368 4.71602 21.9208 3.8036 20.4526C2.04864 17.5943 3.22515 33.2717 3.63266 37.9908L3.63273 37.9909Z"
                                                          class="ng-star-inserted"></path>
                                                    <path _ngcontent-fqc-c443=""
                                                          d="M1.86096 2.77196C3.97719 0.560731 6.00543 1.96648 8.12471 1.42003C11.4386 0.565576 14.3239 1.23948 15.384 1.48296C16.7415 1.75267 20.4106 0.304733 21.9543 2.88254C23.462 5.40006 21.8408 7.72763 21.4515 11.0163C21.1108 13.8954 21.5915 15.4279 20.7725 16.8588C19.9693 18.3967 18.1357 20.2659 16.1633 20.1086C12.3022 19.6832 10.4072 20.5494 7.2411 19.7191C5.09036 19.155 3.48811 17.1632 2.57569 15.6948C2.14107 11.2249 -0.255138 4.98254 1.86102 2.7717L1.86096 2.77196Z"
                                                          class="ng-star-inserted"></path><!----></svg><!---->
                                                <svg _ngcontent-fqc-c443="" xmlns="http://www.w3.org/2000/svg"
                                                     viewBox="0 0 27 27"
                                                     width="27" height="27" class="sd-odontograma-dente__faces">
                                                    <path _ngcontent-fqc-c443=""
                                                          d="M18.2439 18.2354L24.0947 24.0999C20.7001 27.4945 13.9521 24.7899 13.4002 24.7899C12.8228 24.7899 6.08666 27.4945 2.70581 24.0999C4.85848 21.9473 6.16935 20.6433 8.57728 18.2354H18.2368H18.2439Z"
                                                          class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                          data-testid="area84Vestibular"
                                                          aria-describedby="cdk-describedby-message-fqc-1-12"
                                                          cdk-describedby-host="fqc-1"></path><!---->
                                                    <path _ngcontent-fqc-c443=""
                                                          d="M8.58244 18.2344C6.27799 20.5112 5.03609 21.7531 2.71097 24.0989C-0.683593 20.7182 2.02103 13.9564 2.02103 13.4045C2.02103 12.7836 -0.683593 6.09093 2.71097 2.71008L8.57557 8.58155V18.2411L8.58244 18.2344Z"
                                                          class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                          data-testid="area84Distal"
                                                          aria-describedby="cdk-describedby-message-fqc-1-12"
                                                          cdk-describedby-host="fqc-1"></path><!---->
                                                    <path _ngcontent-fqc-c443=""
                                                          d="M8.5815 8.57556C6.27705 6.278 5.05583 5.0361 2.73071 2.71098C6.12528 -0.683584 12.8733 2.02103 13.4251 2.02103C14.0026 2.02101 20.7387 -0.683584 24.1196 2.71098C21.9669 4.86365 20.656 6.16762 18.2481 8.57556H8.58854H8.5815Z"
                                                          class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                          data-testid="area84Palatina"
                                                          aria-describedby="cdk-describedby-message-fqc-1-12"
                                                          cdk-describedby-host="fqc-1"></path><!---->
                                                    <path _ngcontent-fqc-c443=""
                                                          d="M18.2446 8.57504C20.5491 6.27059 21.7841 5.05632 24.1092 2.72424C27.5038 6.11881 24.7991 12.8668 24.7991 13.4187C24.7992 13.9962 27.5038 20.7323 24.1092 24.1131L18.2446 18.2416V8.58207V8.57504Z"
                                                          class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                          data-testid="area84Mesial"
                                                          aria-describedby="cdk-describedby-message-fqc-1-12"
                                                          cdk-describedby-host="fqc-1"></path><!---->
                                                    <path _ngcontent-fqc-c443=""
                                                          d="M8.58374 8.57568V18.2353H18.2433V8.57568H8.58374Z"
                                                          class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                          data-testid="area84Oclusal"
                                                          aria-describedby="cdk-describedby-message-fqc-1-12"
                                                          cdk-describedby-host="fqc-1"></path><!----></svg>
                                            </div>
                                        </sd-odontograma-dente>
                                        <sd-odontograma-dente _ngcontent-fqc-c445="" _nghost-fqc-c443=""
                                                              class="ng-star-inserted"
                                                              style="margin-right: 8px;">
                                            <div _ngcontent-fqc-c443=""
                                                 class="sd-odontograma-dente sd-odontograma-dente--reversed"><span
                                                        _ngcontent-fqc-c443=""
                                                        class="sd-odontograma-dente__label"> 83 </span>
                                                <svg _ngcontent-fqc-c443="" xmlns="http://www.w3.org/2000/svg"
                                                     class="mat-tooltip-trigger sd-odontograma-dente__dente"
                                                     viewBox="0 0 20 60"
                                                     data-testid="area83" height="60"
                                                     aria-describedby="cdk-describedby-message-fqc-1-56"
                                                     cdk-describedby-host="fqc-1">
                                                    <path _ngcontent-fqc-c443=""
                                                          d="M11.554 58.7489C14.5048 58.7681 12.5595 51.3479 14.2495 44.4351C16.5533 35.0114 18.0081 26.7617 17.6415 23.5975C15.8117 26.0698 11.8055 27.3486 10.2365 27.0084C6.81672 26.7199 3.26282 23.0249 2.47441 21.5471C1.22033 22.7046 3.39599 31.8129 5.48128 40.9272C7.52748 49.8706 7.66567 58.8358 11.5545 58.7491L11.554 58.7489Z"
                                                          class="ng-star-inserted"></path>
                                                    <path _ngcontent-fqc-c443=""
                                                          d="M1.03665 7.13838C1.71044 5.46326 10.0675 1.23346 11.9186 1.65906C13.6468 2.10898 17.5599 5.86548 18.8605 8.49298C19.5936 16.2836 18.4613 24.2517 10.3676 24.5558C6.94788 24.2674 2.46174 18.9608 1.67334 17.4827C0.772703 14.544 0.362611 8.81298 1.03633 7.13812L1.03665 7.13838Z"
                                                          class="ng-star-inserted"></path><!----></svg><!---->
                                                <svg _ngcontent-fqc-c443="" xmlns="http://www.w3.org/2000/svg"
                                                     viewBox="0 0 27 27"
                                                     width="27" height="27" class="sd-odontograma-dente__faces">
                                                    <path _ngcontent-fqc-c443=""
                                                          d="M18.2439 18.2354L24.0947 24.0999C20.7001 27.4945 13.9521 24.7899 13.4002 24.7899C12.8228 24.7899 6.08666 27.4945 2.70581 24.0999C4.85848 21.9473 6.16935 20.6433 8.57728 18.2354H18.2368H18.2439Z"
                                                          class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                          data-testid="area83Vestibular"
                                                          aria-describedby="cdk-describedby-message-fqc-1-12"
                                                          cdk-describedby-host="fqc-1"></path><!---->
                                                    <path _ngcontent-fqc-c443=""
                                                          d="M8.58244 18.2344C6.27799 20.5112 5.03609 21.7531 2.71097 24.0989C-0.683593 20.7182 2.02103 13.9564 2.02103 13.4045C2.02103 12.7836 -0.683593 6.09093 2.71097 2.71008L8.57557 8.58155V18.2411L8.58244 18.2344Z"
                                                          class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                          data-testid="area83Distal"
                                                          aria-describedby="cdk-describedby-message-fqc-1-12"
                                                          cdk-describedby-host="fqc-1"></path><!---->
                                                    <path _ngcontent-fqc-c443=""
                                                          d="M8.5815 8.57556C6.27705 6.278 5.05583 5.0361 2.73071 2.71098C6.12528 -0.683584 12.8733 2.02103 13.4251 2.02103C14.0026 2.02101 20.7387 -0.683584 24.1196 2.71098C21.9669 4.86365 20.656 6.16762 18.2481 8.57556H8.58854H8.5815Z"
                                                          class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                          data-testid="area83Palatina"
                                                          aria-describedby="cdk-describedby-message-fqc-1-12"
                                                          cdk-describedby-host="fqc-1"></path><!---->
                                                    <path _ngcontent-fqc-c443=""
                                                          d="M18.2446 8.57504C20.5491 6.27059 21.7841 5.05632 24.1092 2.72424C27.5038 6.11881 24.7991 12.8668 24.7991 13.4187C24.7992 13.9962 27.5038 20.7323 24.1092 24.1131L18.2446 18.2416V8.58207V8.57504Z"
                                                          class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                          data-testid="area83Mesial"
                                                          aria-describedby="cdk-describedby-message-fqc-1-12"
                                                          cdk-describedby-host="fqc-1"></path><!---->
                                                    <path _ngcontent-fqc-c443=""
                                                          d="M8.58374 8.57568V18.2353H18.2433V8.57568H8.58374Z"
                                                          class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                          data-testid="area83Oclusal"
                                                          aria-describedby="cdk-describedby-message-fqc-1-12"
                                                          cdk-describedby-host="fqc-1"></path><!----></svg>
                                            </div>
                                        </sd-odontograma-dente>
                                        <sd-odontograma-dente _ngcontent-fqc-c445="" _nghost-fqc-c443=""
                                                              class="ng-star-inserted"
                                                              style="margin-right: 8px;">
                                            <div _ngcontent-fqc-c443=""
                                                 class="sd-odontograma-dente sd-odontograma-dente--reversed"><span
                                                        _ngcontent-fqc-c443=""
                                                        class="sd-odontograma-dente__label"> 82 </span>
                                                <svg _ngcontent-fqc-c443="" xmlns="http://www.w3.org/2000/svg"
                                                     class="mat-tooltip-trigger sd-odontograma-dente__dente"
                                                     viewBox="0 0 16 51"
                                                     data-testid="area82" height="51"
                                                     aria-describedby="cdk-describedby-message-fqc-1-57"
                                                     cdk-describedby-host="fqc-1">
                                                    <path _ngcontent-fqc-c443=""
                                                          d="M8.46387 50.0769C6.7062 49.8051 5.45694 44.2248 3.9927 37.7017C2.41749 30.6842 0.715543 22.575 1.47367 18.8099C2.07795 20.385 4.52074 22.2305 7.51752 22.2107C10.5144 22.1908 14.1871 19.5859 14.5217 17.6817C14.8565 15.7775 12.8976 29.7581 11.4803 36.4794C9.97985 43.5949 10.3749 50.6004 8.46361 50.0776L8.46387 50.0769Z"
                                                          class="ng-star-inserted"></path>
                                                    <path _ngcontent-fqc-c443=""
                                                          d="M13.566 2.08323C12.4341 0.677493 2.28722 0.115544 1.29477 1.59973C0.30211 3.08391 0.845826 13.7245 1.45005 15.2994C2.05433 16.8744 4.49711 19.687 7.4939 19.6672C10.4907 19.6473 13.921 16.8103 14.4981 13.5264C15.0754 10.2426 14.6979 3.48857 13.5661 2.08336L13.566 2.08323Z"
                                                          class="ng-star-inserted"></path><!----></svg><!---->
                                                <svg _ngcontent-fqc-c443="" xmlns="http://www.w3.org/2000/svg"
                                                     viewBox="0 0 27 27"
                                                     width="27" height="27" class="sd-odontograma-dente__faces">
                                                    <path _ngcontent-fqc-c443=""
                                                          d="M18.2439 18.2354L24.0947 24.0999C20.7001 27.4945 13.9521 24.7899 13.4002 24.7899C12.8228 24.7899 6.08666 27.4945 2.70581 24.0999C4.85848 21.9473 6.16935 20.6433 8.57728 18.2354H18.2368H18.2439Z"
                                                          class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                          data-testid="area82Vestibular"
                                                          aria-describedby="cdk-describedby-message-fqc-1-12"
                                                          cdk-describedby-host="fqc-1"></path><!---->
                                                    <path _ngcontent-fqc-c443=""
                                                          d="M8.58244 18.2344C6.27799 20.5112 5.03609 21.7531 2.71097 24.0989C-0.683593 20.7182 2.02103 13.9564 2.02103 13.4045C2.02103 12.7836 -0.683593 6.09093 2.71097 2.71008L8.57557 8.58155V18.2411L8.58244 18.2344Z"
                                                          class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                          data-testid="area82Distal"
                                                          aria-describedby="cdk-describedby-message-fqc-1-12"
                                                          cdk-describedby-host="fqc-1"></path><!---->
                                                    <path _ngcontent-fqc-c443=""
                                                          d="M8.5815 8.57556C6.27705 6.278 5.05583 5.0361 2.73071 2.71098C6.12528 -0.683584 12.8733 2.02103 13.4251 2.02103C14.0026 2.02101 20.7387 -0.683584 24.1196 2.71098C21.9669 4.86365 20.656 6.16762 18.2481 8.57556H8.58854H8.5815Z"
                                                          class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                          data-testid="area82Palatina"
                                                          aria-describedby="cdk-describedby-message-fqc-1-12"
                                                          cdk-describedby-host="fqc-1"></path><!---->
                                                    <path _ngcontent-fqc-c443=""
                                                          d="M18.2446 8.57504C20.5491 6.27059 21.7841 5.05632 24.1092 2.72424C27.5038 6.11881 24.7991 12.8668 24.7991 13.4187C24.7992 13.9962 27.5038 20.7323 24.1092 24.1131L18.2446 18.2416V8.58207V8.57504Z"
                                                          class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                          data-testid="area82Mesial"
                                                          aria-describedby="cdk-describedby-message-fqc-1-12"
                                                          cdk-describedby-host="fqc-1"></path><!---->
                                                    <path _ngcontent-fqc-c443=""
                                                          d="M8.58374 8.57568V18.2353H18.2433V8.57568H8.58374Z"
                                                          class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                          data-testid="area82Oclusal"
                                                          aria-describedby="cdk-describedby-message-fqc-1-12"
                                                          cdk-describedby-host="fqc-1"></path><!----></svg>
                                            </div>
                                        </sd-odontograma-dente>
                                        <sd-odontograma-dente _ngcontent-fqc-c445="" _nghost-fqc-c443=""
                                                              class="ng-star-inserted">
                                            <div _ngcontent-fqc-c443=""
                                                 class="sd-odontograma-dente sd-odontograma-dente--reversed"><span
                                                        _ngcontent-fqc-c443=""
                                                        class="sd-odontograma-dente__label"> 81 </span>
                                                <svg _ngcontent-fqc-c443="" xmlns="http://www.w3.org/2000/svg"
                                                     class="mat-tooltip-trigger sd-odontograma-dente__dente"
                                                     viewBox="0 0 17 52"
                                                     data-testid="area81" height="52"
                                                     aria-describedby="cdk-describedby-message-fqc-1-58"
                                                     cdk-describedby-host="fqc-1">
                                                    <path _ngcontent-fqc-c443=""
                                                          d="M7.87833 50.2746C5.02167 49.986 1.06032 17.593 1.66481 19.1685C2.26909 20.7436 5.95457 23.0727 7.70866 23.0528C9.46282 23.0329 12.5824 21.3908 13.9364 18.1071C13.2989 23.0699 11.6362 49.8889 7.87833 50.2745V50.2746Z"
                                                          class="ng-star-inserted"></path>
                                                    <path _ngcontent-fqc-c443=""
                                                          d="M14.5142 1.94358C13.3824 0.537838 2.30328 0.136954 1.31082 1.6212C0.318233 3.10538 0.861963 13.746 1.46618 15.3208C2.07047 16.896 5.91124 20.3533 7.66534 20.3334C9.41949 20.3135 13.1605 16.8318 14.5145 13.5479C15.8685 10.264 15.6463 3.34899 14.5145 1.94378L14.5142 1.94358Z"
                                                          class="ng-star-inserted"></path><!----></svg><!---->
                                                <svg _ngcontent-fqc-c443="" xmlns="http://www.w3.org/2000/svg"
                                                     viewBox="0 0 27 27"
                                                     width="27" height="27" class="sd-odontograma-dente__faces">
                                                    <path _ngcontent-fqc-c443=""
                                                          d="M18.2439 18.2354L24.0947 24.0999C20.7001 27.4945 13.9521 24.7899 13.4002 24.7899C12.8228 24.7899 6.08666 27.4945 2.70581 24.0999C4.85848 21.9473 6.16935 20.6433 8.57728 18.2354H18.2368H18.2439Z"
                                                          class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                          data-testid="area81Vestibular"
                                                          aria-describedby="cdk-describedby-message-fqc-1-12"
                                                          cdk-describedby-host="fqc-1"></path><!---->
                                                    <path _ngcontent-fqc-c443=""
                                                          d="M8.58244 18.2344C6.27799 20.5112 5.03609 21.7531 2.71097 24.0989C-0.683593 20.7182 2.02103 13.9564 2.02103 13.4045C2.02103 12.7836 -0.683593 6.09093 2.71097 2.71008L8.57557 8.58155V18.2411L8.58244 18.2344Z"
                                                          class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                          data-testid="area81Distal"
                                                          aria-describedby="cdk-describedby-message-fqc-1-12"
                                                          cdk-describedby-host="fqc-1"></path><!---->
                                                    <path _ngcontent-fqc-c443=""
                                                          d="M8.5815 8.57556C6.27705 6.278 5.05583 5.0361 2.73071 2.71098C6.12528 -0.683584 12.8733 2.02103 13.4251 2.02103C14.0026 2.02101 20.7387 -0.683584 24.1196 2.71098C21.9669 4.86365 20.656 6.16762 18.2481 8.57556H8.58854H8.5815Z"
                                                          class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                          data-testid="area81Palatina"
                                                          aria-describedby="cdk-describedby-message-fqc-1-12"
                                                          cdk-describedby-host="fqc-1"></path><!---->
                                                    <path _ngcontent-fqc-c443=""
                                                          d="M18.2446 8.57504C20.5491 6.27059 21.7841 5.05632 24.1092 2.72424C27.5038 6.11881 24.7991 12.8668 24.7991 13.4187C24.7992 13.9962 27.5038 20.7323 24.1092 24.1131L18.2446 18.2416V8.58207V8.57504Z"
                                                          class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                          data-testid="area81Mesial"
                                                          aria-describedby="cdk-describedby-message-fqc-1-12"
                                                          cdk-describedby-host="fqc-1"></path><!---->
                                                    <path _ngcontent-fqc-c443=""
                                                          d="M8.58374 8.57568V18.2353H18.2433V8.57568H8.58374Z"
                                                          class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                          data-testid="area81Oclusal"
                                                          aria-describedby="cdk-describedby-message-fqc-1-12"
                                                          cdk-describedby-host="fqc-1"></path><!----></svg>
                                            </div>
                                        </sd-odontograma-dente><!----></div>
                                </div>
                                <div class="col-1 d-flex align-items-center justify-content-center">
                                    <h5 class="fs-6">M</h5>
                                </div>
                            </div>
                            <div class="col-12 d-flex align-items-center justify-content-center">
                                <h5 class="fs-6">P</h5>
                            </div>

                        </div>
                        <div class="col-12 col-md-6 d-flex flex-column">
                            <div class="col-12 d-flex align-items-center justify-content-center">
                                <h5 class="fs-6">V</h5>
                            </div>
                            <div class="col-12 d-flex align-items-center justify-content-center">
                                <div class="col-1 d-flex align-items-center justify-content-center">
                                    <h5 class="fs-6">M</h5>
                                </div>
                                <div class="d-flex align-items-center justify-content-center">
                                    <div class="diagram-cell"
                                         style="flex-direction: row; box-sizing: border-box; display: flex;">
                                        <sd-odontograma-dente _ngcontent-fqc-c445="" _nghost-fqc-c443=""
                                                              class="ng-star-inserted"
                                                              style="margin-right: 8px;">
                                            <div _ngcontent-fqc-c443=""
                                                 class="sd-odontograma-dente sd-odontograma-dente--reversed"><span
                                                        _ngcontent-fqc-c443=""
                                                        class="sd-odontograma-dente__label"> 71 </span>
                                                <svg _ngcontent-fqc-c443="" xmlns="http://www.w3.org/2000/svg"
                                                     class="mat-tooltip-trigger sd-odontograma-dente__dente"
                                                     viewBox="0 0 17 51"
                                                     data-testid="area71" height="51"
                                                     aria-describedby="cdk-describedby-message-fqc-1-59"
                                                     cdk-describedby-host="fqc-1">
                                                    <path _ngcontent-fqc-c443=""
                                                          d="M8.54492 50.3411C11.4016 50.0525 15.3629 17.6595 14.7585 19.235C14.1542 20.8101 10.4687 23.1392 8.71458 23.1194C6.96042 23.0995 3.84081 21.4573 2.48682 18.1736C3.12436 23.1364 4.7871 49.9554 8.54492 50.341V50.3411Z"
                                                          class="ng-star-inserted"></path>
                                                    <path _ngcontent-fqc-c443=""
                                                          d="M1.90064 2.01118C3.03249 0.605443 14.1116 0.204616 15.104 1.6888C16.0966 3.17298 15.5529 13.8136 14.9487 15.3884C14.3444 16.9636 10.5036 20.4209 8.74951 20.401C6.99536 20.3811 3.25435 16.8994 1.90036 13.6154C0.54636 10.3317 0.768503 3.41659 1.90036 2.01138L1.90064 2.01118Z"
                                                          class="ng-star-inserted"></path><!----></svg><!---->
                                                <svg _ngcontent-fqc-c443="" xmlns="http://www.w3.org/2000/svg"
                                                     viewBox="0 0 27 27"
                                                     width="27" height="27" class="sd-odontograma-dente__faces">
                                                    <path _ngcontent-fqc-c443=""
                                                          d="M18.2439 18.2354L24.0947 24.0999C20.7001 27.4945 13.9521 24.7899 13.4002 24.7899C12.8228 24.7899 6.08666 27.4945 2.70581 24.0999C4.85848 21.9473 6.16935 20.6433 8.57728 18.2354H18.2368H18.2439Z"
                                                          class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                          data-testid="area71Vestibular"
                                                          aria-describedby="cdk-describedby-message-fqc-1-12"
                                                          cdk-describedby-host="fqc-1"></path><!---->
                                                    <path _ngcontent-fqc-c443=""
                                                          d="M8.58244 18.2344C6.27799 20.5112 5.03609 21.7531 2.71097 24.0989C-0.683593 20.7182 2.02103 13.9564 2.02103 13.4045C2.02103 12.7836 -0.683593 6.09093 2.71097 2.71008L8.57557 8.58155V18.2411L8.58244 18.2344Z"
                                                          class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                          data-testid="area71Mesial"
                                                          aria-describedby="cdk-describedby-message-fqc-1-12"
                                                          cdk-describedby-host="fqc-1"></path><!---->
                                                    <path _ngcontent-fqc-c443=""
                                                          d="M8.5815 8.57556C6.27705 6.278 5.05583 5.0361 2.73071 2.71098C6.12528 -0.683584 12.8733 2.02103 13.4251 2.02103C14.0026 2.02101 20.7387 -0.683584 24.1196 2.71098C21.9669 4.86365 20.656 6.16762 18.2481 8.57556H8.58854H8.5815Z"
                                                          class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                          data-testid="area71Palatina"
                                                          aria-describedby="cdk-describedby-message-fqc-1-12"
                                                          cdk-describedby-host="fqc-1"></path><!---->
                                                    <path _ngcontent-fqc-c443=""
                                                          d="M18.2446 8.57504C20.5491 6.27059 21.7841 5.05632 24.1092 2.72424C27.5038 6.11881 24.7991 12.8668 24.7991 13.4187C24.7992 13.9962 27.5038 20.7323 24.1092 24.1131L18.2446 18.2416V8.58207V8.57504Z"
                                                          class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                          data-testid="area71Distal"
                                                          aria-describedby="cdk-describedby-message-fqc-1-12"
                                                          cdk-describedby-host="fqc-1"></path><!---->
                                                    <path _ngcontent-fqc-c443=""
                                                          d="M8.58374 8.57568V18.2353H18.2433V8.57568H8.58374Z"
                                                          class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                          data-testid="area71Oclusal"
                                                          aria-describedby="cdk-describedby-message-fqc-1-12"
                                                          cdk-describedby-host="fqc-1"></path><!----></svg>
                                            </div>
                                        </sd-odontograma-dente>
                                        <sd-odontograma-dente _ngcontent-fqc-c445="" _nghost-fqc-c443=""
                                                              class="ng-star-inserted"
                                                              style="margin-right: 8px;">
                                            <div _ngcontent-fqc-c443=""
                                                 class="sd-odontograma-dente sd-odontograma-dente--reversed"><span
                                                        _ngcontent-fqc-c443=""
                                                        class="sd-odontograma-dente__label"> 72 </span>
                                                <svg _ngcontent-fqc-c443="" xmlns="http://www.w3.org/2000/svg"
                                                     class="mat-tooltip-trigger sd-odontograma-dente__dente"
                                                     viewBox="0 0 17 51"
                                                     data-testid="area72" height="51"
                                                     aria-describedby="cdk-describedby-message-fqc-1-60"
                                                     cdk-describedby-host="fqc-1">
                                                    <path _ngcontent-fqc-c443=""
                                                          d="M7.95137 50.1428C9.70904 49.8711 10.9583 44.2907 12.4225 37.7676C13.9978 30.7502 15.6997 22.6409 14.9416 18.8758C14.3373 20.4509 11.8945 22.2964 8.89772 22.2765C5.90087 22.2566 2.22812 19.6517 1.89354 17.7476C1.55877 15.8434 3.51765 29.824 4.93498 36.5453C6.4354 43.6608 6.04039 50.6663 7.95163 50.1436L7.95137 50.1428Z"
                                                          class="ng-star-inserted"></path>
                                                    <path _ngcontent-fqc-c443=""
                                                          d="M2.85205 2.15036C3.98391 0.744684 14.1308 0.182659 15.1233 1.66684C16.1159 3.15102 15.5722 13.7917 14.968 15.3665C14.3637 16.9416 11.9209 19.7542 8.92413 19.7344C5.92735 19.7145 2.49699 16.8774 1.91994 13.5936C1.34268 10.3098 1.72012 3.5557 2.85197 2.15049L2.85205 2.15036Z"
                                                          class="ng-star-inserted"></path><!----></svg><!---->
                                                <svg _ngcontent-fqc-c443="" xmlns="http://www.w3.org/2000/svg"
                                                     viewBox="0 0 27 27"
                                                     width="27" height="27" class="sd-odontograma-dente__faces">
                                                    <path _ngcontent-fqc-c443=""
                                                          d="M18.2439 18.2354L24.0947 24.0999C20.7001 27.4945 13.9521 24.7899 13.4002 24.7899C12.8228 24.7899 6.08666 27.4945 2.70581 24.0999C4.85848 21.9473 6.16935 20.6433 8.57728 18.2354H18.2368H18.2439Z"
                                                          class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                          data-testid="area72Vestibular"
                                                          aria-describedby="cdk-describedby-message-fqc-1-12"
                                                          cdk-describedby-host="fqc-1"></path><!---->
                                                    <path _ngcontent-fqc-c443=""
                                                          d="M8.58244 18.2344C6.27799 20.5112 5.03609 21.7531 2.71097 24.0989C-0.683593 20.7182 2.02103 13.9564 2.02103 13.4045C2.02103 12.7836 -0.683593 6.09093 2.71097 2.71008L8.57557 8.58155V18.2411L8.58244 18.2344Z"
                                                          class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                          data-testid="area72Mesial"
                                                          aria-describedby="cdk-describedby-message-fqc-1-12"
                                                          cdk-describedby-host="fqc-1"></path><!---->
                                                    <path _ngcontent-fqc-c443=""
                                                          d="M8.5815 8.57556C6.27705 6.278 5.05583 5.0361 2.73071 2.71098C6.12528 -0.683584 12.8733 2.02103 13.4251 2.02103C14.0026 2.02101 20.7387 -0.683584 24.1196 2.71098C21.9669 4.86365 20.656 6.16762 18.2481 8.57556H8.58854H8.5815Z"
                                                          class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                          data-testid="area72Palatina"
                                                          aria-describedby="cdk-describedby-message-fqc-1-12"
                                                          cdk-describedby-host="fqc-1"></path><!---->
                                                    <path _ngcontent-fqc-c443=""
                                                          d="M18.2446 8.57504C20.5491 6.27059 21.7841 5.05632 24.1092 2.72424C27.5038 6.11881 24.7991 12.8668 24.7991 13.4187C24.7992 13.9962 27.5038 20.7323 24.1092 24.1131L18.2446 18.2416V8.58207V8.57504Z"
                                                          class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                          data-testid="area72Distal"
                                                          aria-describedby="cdk-describedby-message-fqc-1-12"
                                                          cdk-describedby-host="fqc-1"></path><!---->
                                                    <path _ngcontent-fqc-c443=""
                                                          d="M8.58374 8.57568V18.2353H18.2433V8.57568H8.58374Z"
                                                          class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                          data-testid="area72Oclusal"
                                                          aria-describedby="cdk-describedby-message-fqc-1-12"
                                                          cdk-describedby-host="fqc-1"></path><!----></svg>
                                            </div>
                                        </sd-odontograma-dente>
                                        <sd-odontograma-dente _ngcontent-fqc-c445="" _nghost-fqc-c443=""
                                                              class="ng-star-inserted"
                                                              style="margin-right: 8px;">
                                            <div _ngcontent-fqc-c443=""
                                                 class="sd-odontograma-dente sd-odontograma-dente--reversed"><span
                                                        _ngcontent-fqc-c443=""
                                                        class="sd-odontograma-dente__label"> 73 </span>
                                                <svg _ngcontent-fqc-c443="" xmlns="http://www.w3.org/2000/svg"
                                                     class="mat-tooltip-trigger sd-odontograma-dente__dente"
                                                     viewBox="0 0 21 59"
                                                     data-testid="area73" height="59"
                                                     aria-describedby="cdk-describedby-message-fqc-1-61"
                                                     cdk-describedby-host="fqc-1">
                                                    <path _ngcontent-fqc-c443=""
                                                          d="M8.86407 57.815C5.91326 57.8342 7.85864 50.4139 6.16861 43.5012C3.86476 34.0775 2.41001 25.8277 2.77658 22.6635C4.60647 25.1358 8.61261 26.4147 10.1816 26.0744C13.6014 25.7859 17.1553 22.091 17.9437 20.6132C19.1978 21.7707 17.0221 30.8789 14.9368 39.9933C12.8906 48.9366 12.7524 57.9019 8.86363 57.8151L8.86407 57.815Z"
                                                          class="ng-star-inserted"></path>
                                                    <path _ngcontent-fqc-c443=""
                                                          d="M19.379 6.20455C18.7052 4.52943 10.3482 0.299618 8.49709 0.725223C6.7689 1.17514 2.8558 4.93164 1.55521 7.55914C0.822061 15.3504 1.95442 23.3179 10.0481 23.622C13.4678 23.3335 17.9539 18.0269 18.7423 16.5489C19.643 13.6102 20.0531 7.87914 19.3794 6.20428L19.379 6.20455Z"
                                                          class="ng-star-inserted"></path><!----></svg><!---->
                                                <svg _ngcontent-fqc-c443="" xmlns="http://www.w3.org/2000/svg"
                                                     viewBox="0 0 27 27"
                                                     width="27" height="27" class="sd-odontograma-dente__faces">
                                                    <path _ngcontent-fqc-c443=""
                                                          d="M18.2439 18.2354L24.0947 24.0999C20.7001 27.4945 13.9521 24.7899 13.4002 24.7899C12.8228 24.7899 6.08666 27.4945 2.70581 24.0999C4.85848 21.9473 6.16935 20.6433 8.57728 18.2354H18.2368H18.2439Z"
                                                          class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                          data-testid="area73Vestibular"
                                                          aria-describedby="cdk-describedby-message-fqc-1-12"
                                                          cdk-describedby-host="fqc-1"></path><!---->
                                                    <path _ngcontent-fqc-c443=""
                                                          d="M8.58244 18.2344C6.27799 20.5112 5.03609 21.7531 2.71097 24.0989C-0.683593 20.7182 2.02103 13.9564 2.02103 13.4045C2.02103 12.7836 -0.683593 6.09093 2.71097 2.71008L8.57557 8.58155V18.2411L8.58244 18.2344Z"
                                                          class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                          data-testid="area73Mesial"
                                                          aria-describedby="cdk-describedby-message-fqc-1-12"
                                                          cdk-describedby-host="fqc-1"></path><!---->
                                                    <path _ngcontent-fqc-c443=""
                                                          d="M8.5815 8.57556C6.27705 6.278 5.05583 5.0361 2.73071 2.71098C6.12528 -0.683584 12.8733 2.02103 13.4251 2.02103C14.0026 2.02101 20.7387 -0.683584 24.1196 2.71098C21.9669 4.86365 20.656 6.16762 18.2481 8.57556H8.58854H8.5815Z"
                                                          class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                          data-testid="area73Palatina"
                                                          aria-describedby="cdk-describedby-message-fqc-1-12"
                                                          cdk-describedby-host="fqc-1"></path><!---->
                                                    <path _ngcontent-fqc-c443=""
                                                          d="M18.2446 8.57504C20.5491 6.27059 21.7841 5.05632 24.1092 2.72424C27.5038 6.11881 24.7991 12.8668 24.7991 13.4187C24.7992 13.9962 27.5038 20.7323 24.1092 24.1131L18.2446 18.2416V8.58207V8.57504Z"
                                                          class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                          data-testid="area73Distal"
                                                          aria-describedby="cdk-describedby-message-fqc-1-12"
                                                          cdk-describedby-host="fqc-1"></path><!---->
                                                    <path _ngcontent-fqc-c443=""
                                                          d="M8.58374 8.57568V18.2353H18.2433V8.57568H8.58374Z"
                                                          class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                          data-testid="area73Oclusal"
                                                          aria-describedby="cdk-describedby-message-fqc-1-12"
                                                          cdk-describedby-host="fqc-1"></path><!----></svg>
                                            </div>
                                        </sd-odontograma-dente>
                                        <sd-odontograma-dente _ngcontent-fqc-c445="" _nghost-fqc-c443=""
                                                              class="ng-star-inserted"
                                                              style="margin-right: 8px;">
                                            <div _ngcontent-fqc-c443=""
                                                 class="sd-odontograma-dente sd-odontograma-dente--reversed"><span
                                                        _ngcontent-fqc-c443=""
                                                        class="sd-odontograma-dente__label"> 74 </span>
                                                <svg _ngcontent-fqc-c443="" xmlns="http://www.w3.org/2000/svg"
                                                     class="mat-tooltip-trigger sd-odontograma-dente__dente"
                                                     viewBox="0 0 24 52"
                                                     data-testid="area74" height="52"
                                                     aria-describedby="cdk-describedby-message-fqc-1-62"
                                                     cdk-describedby-host="fqc-1">
                                                    <path _ngcontent-fqc-c443=""
                                                          d="M3.63273 37.9909C4.04025 42.7101 5.11532 51.727 7.17808 50.983C11.1133 49.5645 5.61036 30.4945 11.4081 31.0609C15.6393 32.0559 11.8522 46.8866 15.726 48.739C18.3203 49.9795 19.2604 32.9445 19.728 29.6352C20.1043 26.9714 19.9457 20.1055 19.1266 21.5359C18.6553 22.2131 16.9935 22.9112 16.0708 22.6904C12.2097 22.265 10.3147 23.1313 7.14867 22.301C4.99792 21.7368 4.71602 21.9208 3.8036 20.4526C2.04864 17.5943 3.22515 33.2717 3.63266 37.9908L3.63273 37.9909Z"
                                                          class="ng-star-inserted"></path>
                                                    <path _ngcontent-fqc-c443=""
                                                          d="M1.86096 2.77196C3.97719 0.560731 6.00543 1.96648 8.12471 1.42003C11.4386 0.565576 14.3239 1.23948 15.384 1.48296C16.7415 1.75267 20.4106 0.304733 21.9543 2.88254C23.462 5.40006 21.8408 7.72763 21.4515 11.0163C21.1108 13.8954 21.5915 15.4279 20.7725 16.8588C19.9693 18.3967 18.1357 20.2659 16.1633 20.1086C12.3022 19.6832 10.4072 20.5494 7.2411 19.7191C5.09036 19.155 3.48811 17.1632 2.57569 15.6948C2.14107 11.2249 -0.255138 4.98254 1.86102 2.7717L1.86096 2.77196Z"
                                                          class="ng-star-inserted"></path><!----></svg><!---->
                                                <svg _ngcontent-fqc-c443="" xmlns="http://www.w3.org/2000/svg"
                                                     viewBox="0 0 27 27"
                                                     width="27" height="27" class="sd-odontograma-dente__faces">
                                                    <path _ngcontent-fqc-c443=""
                                                          d="M18.2439 18.2354L24.0947 24.0999C20.7001 27.4945 13.9521 24.7899 13.4002 24.7899C12.8228 24.7899 6.08666 27.4945 2.70581 24.0999C4.85848 21.9473 6.16935 20.6433 8.57728 18.2354H18.2368H18.2439Z"
                                                          class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                          data-testid="area74Vestibular"
                                                          aria-describedby="cdk-describedby-message-fqc-1-12"
                                                          cdk-describedby-host="fqc-1"></path><!---->
                                                    <path _ngcontent-fqc-c443=""
                                                          d="M8.58244 18.2344C6.27799 20.5112 5.03609 21.7531 2.71097 24.0989C-0.683593 20.7182 2.02103 13.9564 2.02103 13.4045C2.02103 12.7836 -0.683593 6.09093 2.71097 2.71008L8.57557 8.58155V18.2411L8.58244 18.2344Z"
                                                          class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                          data-testid="area74Mesial"
                                                          aria-describedby="cdk-describedby-message-fqc-1-12"
                                                          cdk-describedby-host="fqc-1"></path><!---->
                                                    <path _ngcontent-fqc-c443=""
                                                          d="M8.5815 8.57556C6.27705 6.278 5.05583 5.0361 2.73071 2.71098C6.12528 -0.683584 12.8733 2.02103 13.4251 2.02103C14.0026 2.02101 20.7387 -0.683584 24.1196 2.71098C21.9669 4.86365 20.656 6.16762 18.2481 8.57556H8.58854H8.5815Z"
                                                          class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                          data-testid="area74Palatina"
                                                          aria-describedby="cdk-describedby-message-fqc-1-12"
                                                          cdk-describedby-host="fqc-1"></path><!---->
                                                    <path _ngcontent-fqc-c443=""
                                                          d="M18.2446 8.57504C20.5491 6.27059 21.7841 5.05632 24.1092 2.72424C27.5038 6.11881 24.7991 12.8668 24.7991 13.4187C24.7992 13.9962 27.5038 20.7323 24.1092 24.1131L18.2446 18.2416V8.58207V8.57504Z"
                                                          class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                          data-testid="area74Distal"
                                                          aria-describedby="cdk-describedby-message-fqc-1-12"
                                                          cdk-describedby-host="fqc-1"></path><!---->
                                                    <path _ngcontent-fqc-c443=""
                                                          d="M8.58374 8.57568V18.2353H18.2433V8.57568H8.58374Z"
                                                          class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                          data-testid="area74Oclusal"
                                                          aria-describedby="cdk-describedby-message-fqc-1-12"
                                                          cdk-describedby-host="fqc-1"></path><!----></svg>
                                            </div>
                                        </sd-odontograma-dente>
                                        <sd-odontograma-dente _ngcontent-fqc-c445="" _nghost-fqc-c443=""
                                                              class="ng-star-inserted">
                                            <div _ngcontent-fqc-c443=""
                                                 class="sd-odontograma-dente sd-odontograma-dente--reversed"><span
                                                        _ngcontent-fqc-c443=""
                                                        class="sd-odontograma-dente__label"> 75 </span>
                                                <svg _ngcontent-fqc-c443="" xmlns="http://www.w3.org/2000/svg"
                                                     class="mat-tooltip-trigger sd-odontograma-dente__dente"
                                                     viewBox="0 0 24 52"
                                                     data-testid="area75" height="52"
                                                     aria-describedby="cdk-describedby-message-fqc-1-63"
                                                     cdk-describedby-host="fqc-1">
                                                    <path _ngcontent-fqc-c443=""
                                                          d="M3.63273 37.9909C4.04025 42.7101 5.11532 51.727 7.17808 50.983C11.1133 49.5645 5.61036 30.4945 11.4081 31.0609C15.6393 32.0559 11.8522 46.8866 15.726 48.739C18.3203 49.9795 19.2604 32.9445 19.728 29.6352C20.1043 26.9714 19.9457 20.1055 19.1266 21.5359C18.6553 22.2131 16.9935 22.9112 16.0708 22.6904C12.2097 22.265 10.3147 23.1313 7.14867 22.301C4.99792 21.7368 4.71602 21.9208 3.8036 20.4526C2.04864 17.5943 3.22515 33.2717 3.63266 37.9908L3.63273 37.9909Z"
                                                          class="ng-star-inserted"></path>
                                                    <path _ngcontent-fqc-c443=""
                                                          d="M1.86096 2.77196C3.97719 0.560731 6.00543 1.96648 8.12471 1.42003C11.4386 0.565576 14.3239 1.23948 15.384 1.48296C16.7415 1.75267 20.4106 0.304733 21.9543 2.88254C23.462 5.40006 21.8408 7.72763 21.4515 11.0163C21.1108 13.8954 21.5915 15.4279 20.7725 16.8588C19.9693 18.3967 18.1357 20.2659 16.1633 20.1086C12.3022 19.6832 10.4072 20.5494 7.2411 19.7191C5.09036 19.155 3.48811 17.1632 2.57569 15.6948C2.14107 11.2249 -0.255138 4.98254 1.86102 2.7717L1.86096 2.77196Z"
                                                          class="ng-star-inserted"></path><!----></svg><!---->
                                                <svg _ngcontent-fqc-c443="" xmlns="http://www.w3.org/2000/svg"
                                                     viewBox="0 0 27 27"
                                                     width="27" height="27" class="sd-odontograma-dente__faces">
                                                    <path _ngcontent-fqc-c443=""
                                                          d="M18.2439 18.2354L24.0947 24.0999C20.7001 27.4945 13.9521 24.7899 13.4002 24.7899C12.8228 24.7899 6.08666 27.4945 2.70581 24.0999C4.85848 21.9473 6.16935 20.6433 8.57728 18.2354H18.2368H18.2439Z"
                                                          class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                          data-testid="area75Vestibular"
                                                          aria-describedby="cdk-describedby-message-fqc-1-12"
                                                          cdk-describedby-host="fqc-1"></path><!---->
                                                    <path _ngcontent-fqc-c443=""
                                                          d="M8.58244 18.2344C6.27799 20.5112 5.03609 21.7531 2.71097 24.0989C-0.683593 20.7182 2.02103 13.9564 2.02103 13.4045C2.02103 12.7836 -0.683593 6.09093 2.71097 2.71008L8.57557 8.58155V18.2411L8.58244 18.2344Z"
                                                          class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                          data-testid="area75Mesial"
                                                          aria-describedby="cdk-describedby-message-fqc-1-12"
                                                          cdk-describedby-host="fqc-1"></path><!---->
                                                    <path _ngcontent-fqc-c443=""
                                                          d="M8.5815 8.57556C6.27705 6.278 5.05583 5.0361 2.73071 2.71098C6.12528 -0.683584 12.8733 2.02103 13.4251 2.02103C14.0026 2.02101 20.7387 -0.683584 24.1196 2.71098C21.9669 4.86365 20.656 6.16762 18.2481 8.57556H8.58854H8.5815Z"
                                                          class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                          data-testid="area75Palatina"
                                                          aria-describedby="cdk-describedby-message-fqc-1-12"
                                                          cdk-describedby-host="fqc-1"></path><!---->
                                                    <path _ngcontent-fqc-c443=""
                                                          d="M18.2446 8.57504C20.5491 6.27059 21.7841 5.05632 24.1092 2.72424C27.5038 6.11881 24.7991 12.8668 24.7991 13.4187C24.7992 13.9962 27.5038 20.7323 24.1092 24.1131L18.2446 18.2416V8.58207V8.57504Z"
                                                          class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                          data-testid="area75Distal"
                                                          aria-describedby="cdk-describedby-message-fqc-1-12"
                                                          cdk-describedby-host="fqc-1"></path><!---->
                                                    <path _ngcontent-fqc-c443=""
                                                          d="M8.58374 8.57568V18.2353H18.2433V8.57568H8.58374Z"
                                                          class="mat-tooltip-trigger sd-odontograma-dente__face sd-odontograma-dente__face--disabled"
                                                          data-testid="area75Oclusal"
                                                          aria-describedby="cdk-describedby-message-fqc-1-12"
                                                          cdk-describedby-host="fqc-1"></path><!----></svg>
                                            </div>
                                        </sd-odontograma-dente><!----></div>
                                </div>
                                <div class="col-1 d-flex align-items-center justify-content-center">
                                    <h5 class="fs-6">D</h5>
                                </div>
                            </div>
                            <div class="col-12 d-flex align-items-center justify-content-center">
                                <h5 class="fs-6">P</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="w-100 d-flex align-items-center justify-content-center flex-column flex-lg-row">
                <div class="col-12 col-lg-6 px-3">
                    <table id="table_items_odonto" class="display w-100"></table>
                </div>
                <div class="col-12 col-lg-6 px-3">
                    <label for="inputOdontoObservacion" class="n-color">Observaciones</label>
                    <div class="input-group mb-3">
                <span class="input-group-text">
                    <i class="fa-solid fa-chevron-right n-color"></i>
                </span>
                        <textarea class="form-control h-auto" name="inputOdontoObservacion" id="inputOdontoObservacion"
                                  rows="3"></textarea>
                    </div>
                </div>
            </div>

            <div class="w-100 d-flex align-items-center justify-content-end my-4 px-3 flex-column flex-md-row">
                <button id="btn_guardar_item_odonto" type="button" class="btn btn-secondary btn-sm col-12 col-md-auto">
                    Guardar cambios odontograma
                </button>
            </div>

    </fieldset>
</div>
