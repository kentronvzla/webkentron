<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>{{ $message->getSubject() }}</title>
    </head>
    <body yahoo bgcolor="#f6f8f1" style="margin: 0;padding: 0;min-width: 100%!important;">
        <table width="100%" bgcolor="#F6F8F1" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td>
                    <!--[if (gte mso 9)|(IE)]>
                      <table width="600" align="center" cellpadding="0" cellspacing="0" border="0">
                        <tr>
                          <td>
                    <![endif]-->     
                    <table bgcolor="#ffffff" class="content" align="center" cellpadding="0" cellspacing="0" border="0" style="width: 100%;max-width: 600px;">
                        <tr>
                            <td bgcolor="#0094d8" class="header" style="padding: 40px 30px 20px 30px;">
                                <table width="70" align="left" border="0" cellpadding="0" cellspacing="0">  
                                    <tr>
                                        <td height="70" style="padding: 0 20px 20px 0;">
                                            {{-- Html::image('assets/img/logo.jpg', 'Kentron', ['class' => 'fix', 'style' => 'width:70px; height:70px; border:0']) --}}
                                            <img class="fix" src="{{ $message->embed('assets/img/logo.jpg') }}" width="70px" height="70px" border="0" alt="Kentron" style="height: auto;">
                                        </td>
                                    </tr>
                                </table>
                                <!--[if (gte mso 9)|(IE)]>
                                  <table width="425" align="left" cellpadding="0" cellspacing="0" border="0">
                                    <tr>
                                      <td>
                                <![endif]-->
                                <table class="col425" align="left" border="0" cellpadding="0" cellspacing="0" style="width: 100%; max-width: 425px;">  
                                    <tr>
                                        <td height="70">
                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td class="subhead" style="padding: 0 0 0 3px;font-size: 20px;color: #ffffff;font-family: sans-serif;font-weight: bolder;">
                                                        Kentron Sistemas de Información
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="h1" style="padding: 5px 0 0 0;color: #ffffff;font-family: sans-serif;font-weight: bold;font-size: 28px;line-height: 38px;">
                                                        Gente que aporta soluciones
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                                <!--[if (gte mso 9)|(IE)]>
                                      </td>
                                    </tr>
                                </table>
                                <![endif]-->
                            </td>
                        </tr>
                        <tr>
                            <td class="innerpadding borderbottom" style="padding: 30px 30px 30px 30px;border-bottom: 1px solid #f2eeed;">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td class="h2" style="color: #153643;font-family: sans-serif;text-align: justify;padding: 0 0 15px 0;font-size: 24px;line-height: 28px;font-weight: bold;">
                                            ¿Quiénes somos?
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bodycopy" style="color: #153643;font-family: sans-serif;text-align: justify;font-size: 16px;line-height: 22px;">
                                            Somos una empresa venezolana de tecnología de información,
                                            fundada en el año 1994. Ofrecemos servicios de consultoría,
                                            desarrollo de aplicaciones e implantación de nuestros productos KERUX® y KOMAT®.
                                            Nos esforzamos continuamente en prestar un excelente nivel de servicio y brindar
                                            soluciones que representen un valor agregado a las operaciones de nuestros clientes.
                                            Somos un equipo de profesionales con experiencia en la formulación,
                                            ejecución e implantación de proyectos informáticos en los sectores gobierno,
                                            petrolero, financiero, metalúrgico y empresas de servicio.
                                            Somos Gente que aporta soluciones®
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td class="innerpadding borderbottom" style="padding: 30px 30px 30px 30px;border-bottom: 1px solid #f2eeed;">
                                <table width="115" align="left" border="0" cellpadding="0" cellspacing="0">  
                                    <tr>
                                        <td height="115" style="padding: 0 20px 20px 0;">
                                            {{-- Html::image('assets/img/article1.png', 'Kentron', ['class' => 'fix', 'style' => 'width:115px; height:115px; border:0']) --}}
                                            <img class="fix" src="{{ $message->embed('assets/img/article1.png') }}" width="115px" height="115px" border="0" alt="" style="height: auto;">
                                        </td>
                                    </tr>
                                </table>
                                <!--[if (gte mso 9)|(IE)]>
                                  <table width="380" align="left" cellpadding="0" cellspacing="0" border="0">
                                    <tr>
                                      <td>
                                <![endif]-->
                                <table class="col380" align="left" border="0" cellpadding="0" cellspacing="0" style="width: 100%; max-width: 380px;">  
                                    <tr>
                                        <td>
                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td class="bodycopy" style="color: #153643;font-family: sans-serif;text-align: justify;font-size: 16px;line-height: 22px;">
                                                        @yield('contenido')
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                                <!--[if (gte mso 9)|(IE)]>
                                      </td>
                                    </tr>
                                </table>
                                <![endif]-->
                            </td>
                        </tr>
                        <tr>
                            <td class="innerpadding borderbottom" style="padding: 30px 30px 30px 30px;border-bottom: 1px solid #f2eeed;">
                                {{-- Html::image('assets/img/logoknt.png', 'Kentron', ['class' => 'fix', 'style' => 'width: 100%; border:0']) --}}
                                <img class="fix" src="{{ $message->embed('assets/img/logoknt.png') }}" width="100%" alt="Kentron" border="0" style="height: auto;">
                            </td>
                        </tr>
                        <tr>
                            <td class="innerpadding bodycopy" style="padding: 30px 30px 30px 30px;color: #153643;font-family: sans-serif;text-align: justify;font-size: 16px;line-height: 22px;">
                                Dirección: Av. Las Acacias, Torre La Previsora, piso 19,
                                of. Sur-Oeste, Sabana Grande, Caracas 1050, Venezuela. 
                                Teléfonos: +58 212 781-7008 / 781-6146 / 782-5520 
                                Correo: info@kentron.com.ve
                            </td>
                        </tr>
                        <tr>
                            <td class="footer" bgcolor="#0094d8" style="padding: 20px 30px 15px 30px;">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td align="center" class="footercopy" style="font-family: sans-serif;font-size: 14px;color: #ffffff;">
                                            COPYRIGHT &copy; 2012 KENTRON / Sistemas de Información / Todos los derechos reservados / RIF: J-30197886-2 <br>
                                            <a href="www.kentron.com.ve" class="unsubscribe" target="_blank" style="color: #ffffff;text-decoration: underline;"><font color="#ffffff">KENTRON</font></a> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center" style="padding: 20px 0 0 0;">
                                            <table border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="37" style="text-align: center; padding: 0 10px 0 10px;">
                                                        <a class="soc-btn in" href="https://www.linkedin.com/company/kentron" target="_blank">
                                                            {{-- Html::image('assets/img/image4.png', 'linkedin', ['style' => 'width: 37px; height:37px; border:0']) --}}
                                                            <img src="{{ $message->embed('assets/img/image4.png') }}" width="37px" height="37px" alt="Linkedin" border="0" style="height: auto;">
                                                        </a>
                                                    </td>
                                                    <td width="37" style="text-align: center; padding: 0 10px 0 10px;">
                                                        <a class="soc-btn gp" href="https://plus.google.com/u/0/113097492202606059402/posts" target="_blank">
                                                            {{-- Html::image('assets/img/image5.png', 'google+', ['style' => 'width: 37px; height:37px; border:0']) --}}       
                                                            <img src="{{ $message->embed('assets/img/image5.png') }}" width="37px" height="37px" alt="Google+" border="0" style="height: auto;">
                                                        </a>
                                                    </td>
                                                    <td width="37" style="text-align: center; padding: 0 10px 0 10px;">
                                                        <a class="soc-btn fb" href="https://es-la.facebook.com/KentronSistemas" target="_blank">
                                                            {{-- Html::image('assets/img/image6.png', 'facebook', ['style' => 'width: 37px; height:37px; border:0']) --}}
                                                            <img src="{{ $message->embed('assets/img/image6.png') }}" width="37px" height="37px" alt="Facebook" border="0" style="height: auto;">
                                                        </a>
                                                    </td>
                                                    <td width="37" style="text-align: center; padding: 0 10px 0 10px;">
                                                        <a class="soc-btn tw" href="https://twitter.com/kentron" target="_blank">
                                                            {{-- Html::image('assets/img/image7.png', 'twitter', ['style' => 'width: 37px; height:37px; border:0']) --}}
                                                            <img src="{{ $message->embed('assets/img/image7.png') }}" width="37px" height="37px" alt="Twitter" border="0" style="height: auto;">
                                                        </a>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                    <!--[if (gte mso 9)|(IE)]>
                          </td>
                        </tr>
                    </table>
                    <![endif]-->
                </td>
            </tr>
        </table>
    </body>
</html>