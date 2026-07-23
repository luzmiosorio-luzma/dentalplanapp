<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensaje de Contacto</title>
</head>
<body style="margin: 0; padding: 0; background-color: #f4f6f9; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale;">
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="background-color: #f4f6f9; padding: 20px 0;">
        <tr>
            <td align="center">
                <table role="presentation" width="600" cellspacing="0" cellpadding="0" border="0" style="background-color: #ffffff; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); overflow: hidden; border: 1px solid #e1e8ed;">
                    <!-- Header -->
                    <tr>
                        <td style="background: linear-gradient(135deg, #0f766e, #0d9488); padding: 30px 40px; text-align: center;">
                            <h1 style="margin: 0; color: #ffffff; font-size: 24px; font-weight: 600; letter-spacing: 0.5px;">DentalPlan</h1>
                            <p style="margin: 5px 0 0 0; color: #ccfbf1; font-size: 14px;">Nuevo Mensaje de Contacto</p>
                        </td>
                    </tr>
                    <!-- Body -->
                    <tr>
                        <td style="padding: 40px;">
                            <h2 style="margin: 0 0 20px 0; color: #1f2937; font-size: 18px; font-weight: 600;">Detalles del Contacto</h2>
                            <p style="margin: 0 0 25px 0; color: #4b5563; font-size: 15px; line-height: 1.6;">Ha recibido un nuevo mensaje a través del formulario de contacto del sitio web. A continuación se presentan los detalles suministrados:</p>
                            
                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="margin-bottom: 25px; border-collapse: collapse;">
                                <tr style="border-bottom: 1px solid #f3f4f6;">
                                    <td width="30%" style="padding: 12px 0; font-size: 14px; font-weight: 600; color: #374151; vertical-align: top;">Nombre:</td>
                                    <td style="padding: 12px 0; font-size: 14px; color: #4b5563; vertical-align: top;"><?= htmlspecialchars($nombre ?? 'N/A', ENT_QUOTES, 'UTF-8') ?></td>
                                </tr>
                                <tr style="border-bottom: 1px solid #f3f4f6;">
                                    <td style="padding: 12px 0; font-size: 14px; font-weight: 600; color: #374151; vertical-align: top;">Correo:</td>
                                    <td style="padding: 12px 0; font-size: 14px; color: #0d9488; font-weight: 500; vertical-align: top;">
                                        <a href="mailto:<?= urlencode($correo ?? '') ?>" style="color: #0d9488; text-decoration: none;">
                                            <?= htmlspecialchars($correo ?? 'N/A', ENT_QUOTES, 'UTF-8') ?>
                                        </a>
                                    </td>
                                </tr>
                                <tr style="border-bottom: 1px solid #f3f4f6;">
                                    <td style="padding: 12px 0; font-size: 14px; font-weight: 600; color: #374151; vertical-align: top;">Fono:</td>
                                    <td style="padding: 12px 0; font-size: 14px; color: #4b5563; vertical-align: top;"><?= htmlspecialchars($fono ?? 'N/A', ENT_QUOTES, 'UTF-8') ?></td>
                                </tr>
                                <tr style="border-bottom: 1px solid #f3f4f6;">
                                    <td style="padding: 12px 0; font-size: 14px; font-weight: 600; color: #374151; vertical-align: top;">Compañía:</td>
                                    <td style="padding: 12px 0; font-size: 14px; color: #4b5563; vertical-align: top;"><?= htmlspecialchars($company ?? 'N/A', ENT_QUOTES, 'UTF-8') ?></td>
                                </tr>
                            </table>

                            <h3 style="margin: 0 0 10px 0; color: #374151; font-size: 15px; font-weight: 600;">Mensaje:</h3>
                            <div style="background-color: #f8fafc; border-left: 4px solid #0d9488; padding: 15px 20px; border-radius: 0 6px 6px 0; margin-bottom: 10px;">
                                <p style="margin: 0; color: #334155; font-size: 14px; line-height: 1.6; font-style: italic; white-space: pre-line;"><?= htmlspecialchars($mensaje ?? 'N/A', ENT_QUOTES, 'UTF-8') ?></p>
                            </div>
                        </td>
                    </tr>
                    <!-- Footer -->
                    <tr>
                        <td style="background-color: #f8fafc; padding: 25px 40px; text-align: center; border-top: 1px solid #f1f5f9;">
                            <p style="margin: 0 0 5px 0; color: #94a3b8; font-size: 12px;">Este es un correo electrónico automático, por favor no responda directamente.</p>
                            <p style="margin: 0; color: #94a3b8; font-size: 12px;">&copy; <?= date('Y') ?> DentalPlan. Todos los derechos reservados.</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
