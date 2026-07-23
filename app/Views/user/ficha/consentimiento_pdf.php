<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Consentimiento Informado</title>
    <style>
        body { font-family: 'Helvetica', sans-serif; font-size: 11pt; color: #333; line-height: 1.5; padding: 20px; }
        .watermark { position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); opacity: 0.1; z-index: -1000; width: 450px; }
        .logo-container { position: absolute; top: 0px; right: 20px; }
        .logo { max-height: 60px; }
        .header { text-align: left; margin-bottom: 30px; border-bottom: 2px solid #eee; padding-bottom: 15px; width: 70%; }
        .title { text-transform: uppercase; font-size: 14pt; font-weight: bold; margin: 0; }
        .body-text { text-align: justify; }
        .section-item { margin-bottom: 12px; }
        .signatures { margin-top: 50px; width: 100%; }
        .signature-box { width: 45%; text-align: center; vertical-align: top; display: inline-block; }
        .signature-img { max-height: 100px; display: block; margin: 0 auto 5px auto; }
        .line { border-top: 1px solid #999; width: 80%; margin: 0 auto 5px auto; }
        .date-box { margin-top: 20px; text-align: right; font-style: italic; }
        .patient-info { background: #f9f9f9; padding: 10px; border-radius: 5px; margin-bottom: 20px; }
        .footer { position: fixed; bottom: 0; width: 100%; text-align: center; font-size: 8pt; color: #999; }
    </style>
</head>
<body>
    <?php if($clinic_logo): ?>
    <img src="<?= $clinic_logo ?>" class="watermark">
    <div class="logo-container">
        <img src="<?= $clinic_logo ?>" class="logo">
    </div>
    <?php endif; ?>

    <div class="header">
        <h1 class="title">Consentimiento Informado para Odontología</h1>
    </div>

    <div class="patient-info">
        <strong>Nombre Paciente:</strong> <?= $paciente_nombre ?><br>
        <strong>Nº Presupuesto:</strong> <?= $presupuesto_nro ?><br>
        <strong>Tratamiento:</strong> <?= $detalle ?>
    </div>

    <div class="body-text">
        <div class="section-item"><strong>1.-</strong> He consultado con el profesional cirujano dentista quien me ha explicado y he sido informado(a) que se realizará un tratamiento dental conforme a una evaluación clínica o plan de tratamiento, según presupuesto Nº <?= $presupuesto_nro ?> que se me ha entregado, relativo a <?= $detalle ?>.</div>
        
        <div class="section-item"><strong>2.-</strong> Habiendo sido sometido a un cuidadoso examen clínico y habiéndoseme realizado los exámenes complementarios correspondientes para establecer un adecuado diagnóstico de la patología que presento, se me ha explicado las alternativas de tratamiento posibles y las consecuencias en caso de no realizarlo. Informadamente he aceptado que se realicen las acciones establecidas en mi plan de tratamiento.</div>
        
        <div class="section-item"><strong>3.-</strong> Se me ha explicado que actualmente estamos enfrentando una emergencia sanitaria global, y se me ha entregado un instructivo donde se me informa de todos los protocolos, recomendaciones y medidas de seguridad que se aplicarán en la atención, los cuales declaró conocer. Además, se me informó de los protocolos de higiene que debo seguir para mi atención.</div>
        
        <div class="section-item"><strong>4.-</strong> De igual forma declaro que he dado información veraz sobre mi condición de salud ante el triage (consultas precisas sobre mi estado de salud) telefónico y presencial que se me ha realizado. He completado la encuesta y también realizado los análisis clínicos que se me hubiesen solicitado, siendo veraz en la declaración de la información que se me consulta. Las fotografías, placas radiológicas o películas que se me tomen serán para uso exclusivo de mi patología y no serán reveladas a terceros ajenos al tratamiento sin mi consentimiento.</div>
        
        <div class="section-item"><strong>5.-</strong> He entendido y se me ha explicado que no hay forma de predecir la capacidad de recuperación de los tejidos de cada paciente en particular, por lo que es imposible prever garantías respecto del resultado final. En caso de existir modificaciones al tratamiento propuesto originalmente, éstas serán explicadas oportunamente y se realizaran solo bajo mi consentimiento, ya que se han tomado en cuenta mis deseos al planificar la rehabilitación de mis dientes, pudiendo sufrir ésta, modificaciones de acuerdo al desarrollo del tratamiento.</div>
        
        <div class="section-item"><strong>6.-</strong> Se me han explicado en forma clara y precisa las principales molestias que puede ocasionar el tratamiento, así como sus principales riesgos. Se me advirtió que si soy fumador debo dejar de fumar antes de cualquier cirugía bucal y no hacerlo hasta 30 días después. De no hacerlo corro el riesgo de interferir con el proceso de cicatrización. También debo reducir el consumo de alcohol durante el periodo de cicatrización. Se me explicó, además, que, si presento algunas patologías basales tales como, diabetes, cardiopatía, hipertensión, anemia, obesidad, u otras, son factores que pueden aumentar mis riesgos en este tipo de tratamientos.</div>
        
        <div class="section-item"><strong>7.-</strong> Entiendo plenamente que durante y luego de los procedimientos clínicos o quirúrgicos pueden ocurrir complicaciones que requieran a juicio del profesional tratamientos adicionales o alternativos para el éxito del tratamiento. Así también entiendo que ante la pandemia que se vive, pueden existir contagios, pero no obstante aquello, otorgo mi consentimiento para que el odontólogo tratante realice el procedimiento convenido librando desde ya su responsabilidad y/o de la clínica por un posible contagio.</div>
        
        <div class="section-item"><strong>8.-</strong> Declaro haber leído cuidadosamente este documento y comprendido a cabalidad el tratamiento descrito por el Cirujano Dentista, existiendo por parte del profesional tratante la máxima disposición, incluso para aclarar dudas o ampliar la información aquí descrita, por lo que me comprometo a seguir las indicaciones que me fueron otorgadas, respetar las medidas de higiene y protocolos que señala el instructivo, y asistir a todos los controles prescritos por el Cirujano Dentista tratante que tendrán el carácter de necesarios y obligatorios, a fin de conseguir un buen resultado en este tratamiento. Además, he sido informado(a) de los costos involucrados en mi tratamiento y de las condiciones de pago del mismo y estoy de acuerdo.</div>
        
        <div class="section-item"><strong>9.-</strong> He sido informado(a) que el <strong>Dr(a). <?= $nombre_doctor ?></strong>, pertenece al Colegio de Cirujano Dentistas de Chile A.G. y se rige por su Código de Ética (Rol: <?= $rut_doctor ?? 'N/A' ?>).</div>
        
        <div class="section-item"><strong>10.-</strong> Doy mi consentimiento para lo enunciado precedentemente.</div>
    </div>

    <div class="signatures">
        <div class="signature-box" style="float: left;">
            <img src="<?= $firma_paciente ?>" class="signature-img">
            <div class="line"></div>
            <strong>Firma Paciente / Representante</strong>
        </div>
        <div class="signature-box" style="float: right;">
            <?php if($firma_doctor): ?>
            <img src="<?= $firma_doctor ?>" class="signature-img">
            <?php else: ?>
            <div style="height: 100px;"></div>
            <?php endif; ?>
            <div class="line"></div>
            <strong>Firma Cirujano Dentista</strong>
        </div>
        <div style="clear: both;"></div>
    </div>

    <div class="date-box">
        Fecha de firma: <?= $fecha ?>
    </div>

</body>
</html>
