<!-- Modal Consentimiento Informado -->
<div class="modal fade" id="modalConsentimiento" tabindex="-1" aria-labelledby="modalConsentimientoLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-header bg-secondary text-white border-0">
                <h5 class="modal-title d-flex align-items-center fs-6" id="modalConsentimientoLabel">
                    <i class="fas fa-file-medical-alt me-2"></i> Nuevo Consentimiento Informado
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-2 p-md-4 bg-light consent-modal-body">
                <div class="p-3 p-md-4 bg-white border rounded shadow-sm overflow-auto consent-paper" style="max-height: 70vh;">
                    <h5 class="text-center mb-4 fw-bold text-uppercase">Consentimiento Informado para Odontología</h5>
                    
                    <div class="consentimiento-cuerpo text-justify" style="line-height: 1.6; font-size: 0.95rem;">
                        <div class="mb-3">
                            <strong>Nombre paciente:</strong> <span class="text-muted border-bottom d-inline-block pb-1 w-75" id="lblNombrePacienteConsen">Cargando...</span>
                        </div>

                        <p><strong>1.-</strong> He consultado con el profesional cirujano dentista quien me ha explicado y he sido informado(a) que se realizará un tratamiento dental conforme a una evaluación clínica o plan de tratamiento, según presupuesto 
                        <strong>Nº</strong> <input type="text" id="consenNroPresupuesto" class="form-control d-inline-block mx-1 text-center" style="width: 100px; border-top:0; border-left:0; border-right:0; border-radius:0; padding:0;" placeholder="0000"> 
                        que se me ha entregado, relativo a <input type="text" id="consenDetalle" class="form-control d-inline-block w-50" style="border-top:0; border-left:0; border-right:0; border-radius:0; padding:0 5px;" placeholder="Detalle del tratamiento">.</p>

                        <p><strong>2.-</strong> Habiendo sido sometido a un cuidadoso examen clínico y habiéndoseme realizado los exámenes complementarios correspondientes para establecer un adecuado diagnóstico de la patología que presento, se me ha explicado las alternativas de tratamiento posibles y las consecuencias en caso de no realizarlo. Informadamente he aceptado que se realicen las acciones establecidas en mi plan de tratamiento.</p>

                        <p><strong>3.-</strong> Se me ha explicado que actualmente estamos enfrentando una emergencia sanitaria global, y se me ha entregado un instructivo donde se me informa de todos los protocolos, recomendaciones y medidas de seguridad que se aplicarán en la atención, los cuales declaró conocer. Además, se me informó de los protocolos de higiene que debo seguir para mi atención.</p>

                        <p><strong>4.-</strong> De igual forma declaro que he dado información veraz sobre mi condición de salud ante el triage (consultas precisas sobre mi estado de salud) telefónico y presencial que se me ha realizado. He completado la encuesta y también realizado los análisis clínicos que se me hubiesen solicitado, siendo veraz en la declaración de la información que se me consulta. Las fotografías, placas radiológicas o películas que se me tomen serán para uso exclusivo de mi patología y no serán reveladas a terceros ajenos al tratamiento sin mi consentimiento.</p>

                        <p><strong>5.-</strong> He entendido y se me ha explicado que no hay forma de predecir la capacidad de recuperación de los tejidos de cada paciente en particular, por lo que es imposible prever garantías respecto del resultado final. En caso de existir modificaciones al tratamiento propuesto originalmente, éstas serán explicadas oportunamente y se realizaran solo bajo mi consentimiento, ya que se han tomado en cuenta mis deseos al planificar la rehabilitación de mis dientes, pudiendo sufrir ésta, modificaciones de acuerdo al desarrollo del tratamiento.</p>

                        <p><strong>6.-</strong> Se me han explicado en forma clara y precisa las principales molestias que puede ocasionar el tratamiento, así como sus principales riesgos. Se me advirtió que si soy fumador debo dejar de fumar antes de cualquier cirugía bucal y no hacerlo hasta 30 días después. De no hacerlo corro el riesgo de interferir con el proceso de cicatrización. También debo reducir el consumo de alcohol durante el periodo de cicatrización. Se me explicó, además, que, si presento algunas patologías basales tales como, diabetes, cardiopatía, hipertensión, anemia, obesidad, u otras, son factores que pueden aumentar mis riesgos en este tipo de tratamientos.</p>

                        <p><strong>7.-</strong> Entiendo plenamente que durante y luego de los procedimientos clínicos o quirúrgicos pueden ocurrir complicaciones que requieran a juicio del profesional tratamientos adicionales o alternativos para el éxito del tratamiento. Así también entiendo que ante la pandemia que se vive, pueden existir contagios, pero no obstante aquello, otorgo mi consentimiento para que el odontólogo tratante realice el procedimiento convenido librando desde ya su responsabilidad y/o de la clínica por un posible contagio.</p>

                        <p><strong>8.-</strong> Declaro haber leído cuidadosamente este documento y comprendido a cabalidad el tratamiento descrito por el Cirujano Dentista, existiendo por parte del profesional tratante la máxima disposición, incluso para aclarar dudas o ampliar la información aquí descrita, por lo que me comprometo a seguir las indicaciones que me fueron otorgadas, respetar las medidas de higiene y protocolos que señala el instructivo, y asistir a todos los controles prescritos por el Cirujano Dentista tratante que tendrán el carácter de necesarios y obligatorios, a fin de conseguir un buen resultado en este tratamiento. Además, he sido informado(a) de los costos involucrados en mi tratamiento y de las condiciones de pago del mismo y estoy de acuerdo.</p>

                        <p><strong>9.-</strong> He sido informado(a) que el <strong>Dr(a).</strong> <input type="text" id="consenNombreDoctor" class="form-control d-inline-block w-50" style="border-top:0; border-left:0; border-right:0; border-radius:0; padding:0 5px;" placeholder="Nombre del profesional">, pertenece al Colegio de Cirujano Dentistas de Chile A.G. y se rige por su Código de Ética.</p>

                        <p><strong>10.-</strong> Doy mi consentimiento para lo enunciado precedentemente.</p>
                    </div>

                    <div class="row mt-5">
                        <div class="col-md-6 text-center border-md-end">
                            <label class="mb-2 d-block text-muted fw-bold text-uppercase small">Firma Paciente / Representante</label>
                            <div class="signature-container border rounded bg-light mb-2 mx-auto" style="height: 180px; width: 90%; position: relative; cursor: crosshair; overflow: hidden;">
                                <canvas id="signature-pad" class="signature-pad w-100 h-100"></canvas>
                            </div>
                            <button type="button" class="btn btn-xs btn-link text-decoration-none" id="clearSignature">
                                <i class="fas fa-eraser"></i> Limpiar Firma
                            </button>
                        </div>
                        <div class="col-md-6 text-center d-flex flex-column justify-content-center align-items-center mt-4 mt-md-0">
                            <div class="mb-4 text-center">
                                <p class="mb-1 text-muted small text-uppercase fw-bold">Fecha</p>
                                <h5 id="lblFechaActualConsen" class="n-color"><?php echo date('d/m/Y'); ?></h5>
                            </div>
                            <div style="width: 80%; border-top: 1px solid #dee2e6; padding-top: 10px;" class="text-center">
                                <img id="imgFirmaDoctorConsen" src="" alt="Firma Doctor" style="max-height: 80px; display: none;" class="mb-2">
                                <p class="small text-muted text-uppercase">Firma Cirujano Dentista</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0 d-flex flex-column flex-md-row">
                <button type="button" class="btn btn-outline-secondary rounded-pill px-4 w-100 w-md-auto mb-2 mb-md-0" data-bs-dismiss="modal">
                    <i class="fas fa-times-circle me-2"></i> Cerrar
                </button>
                <button type="button" class="btn btn-secondary rounded-pill px-4 w-100 w-md-auto" id="btnGuardarConsentimiento">
                    <i class="fas fa-check-circle me-2"></i> Confirmar y Guardar
                </button>
            </div>
        </div>
    </div>
</div>
