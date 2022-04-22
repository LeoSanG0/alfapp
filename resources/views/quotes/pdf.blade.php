<?php header('Content-Type: application/pdf'); ?>
<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cotización - {{ $quote->code }}</title>
        <style type="text/css">
            @page
            {
                size: portrait;
                header: page-header;
                footer: page-footer;
                margin-top: 35mm;
                margin-bottom: 35mm;
                margin-footer: 2mm;
            }
            body
            {
                font-family: "Arial Narrow", sans-serif;
                font-size: 9pt;
                font-style: normal;
                font-variant: normal;
                font-weight: 500;
                line-height: 15.4px;
            }
            .table-header
            {
                border: 1px solid #D8D8D8;
                border-collapse: collapse;
            }
            .cell-header
            {
                border: 1px solid #D8D8D8;
                border-collapse: collapse;
            }
            .cell-header-2
            {
                border: 1px solid #D8D8D8;
                border-collapse: collapse;
                font-size:10px;
                color:#808080;
                margin-top:50px;
            }
            .cell
            {
                border: 1px solid #747171;
                border-collapse: collapse;
            }
            .table-body
            {
                border: 1px solid #D8D8D8;
                border-collapse: collapse;
            }
            .cell-body
            {
                border: 1px solid #D8D8D8;
                border-collapse: collapse;
            }
            .cell-body-title
            {
                border: 1px solid #D8D8D8;
                border-collapse: collapse;
                background-color: #909497;
                font-weight: 500;
                font-size: 11pt;
                text-align: center;
                padding-top: 0.5em;
                padding-bottom: 0.5em;
            }
            .cell-body-subtitle
            {
                border: 1px solid #D8D8D8;
                border-collapse: collapse;
                background-color: #CACFD2;
                font-weight: 500;
                font-size: 11pt;
                text-align: left;
                padding-top: 0.5em;
                padding-bottom: 0.5em;
            }
            .cell-body-rating
            {
                border: 1px solid #D8D8D8;
                border-collapse: collapse;
                background-color: #CACFD2;
                font-weight: 500;
                font-size: 14pt;
                text-align: center;
                padding-top: 0.5em;
                padding-bottom: 0.5em;
            }
        </style>
    </head>
    <body>
        {{-- Encabezado --}}
        <htmlpageheader name="page-header">
            <table class="table-header" width="100%">
                <tr>
                    <td class="cell-header" align="center" width="20%" rowspan="3">
                        <img src="img/logo.png" style="opacity: 0.5; padding: 5px 5px" width="20%" />
                    </td>
                    <td class="cell-header" align="center" width="60%" colspan="4">
                        <h2 style="font-size:12pt; color:#5e5b5b;">PROPUESTA COMERCIAL DE INSPECCIÓN RETILAP</h2>
                    </td>
                    <td class="cell-header" align="center" width="20%" rowspan="5">
                        <strong>P&Aacute;GINA {PAGENO} DE {nb}</strong>
                    </td>
                </tr>
            </table>
            <div style="font-weight: bold; text-align: center; font-size: 25px; margin-top: 30px; margin-bottom: 30px;">
                {{ $quote->code }}
            </div>
        </htmlpageheader>
        <br>
        {{-- Tabla para datos basicos dle cliente--}}
        <table width="100%" style="margin-top: 20px;">
            <tr>
                <td colspan="2" width="50%">
                    Santiago de Cali, {{ $quote->date }}
                </td>
                <td align="right" width="50%">                    
                </td>
            </tr>
            <tr>
                <td colspan="2" width="50%">
                    Señor(a/es),
                </td>
                <td align="right" width="50%">                    
                </td>
            </tr>
            <tr>
                <td colspan="2" width="50%">
                    {{ $quote->customer->company }}
                </td>
                <td align="right" width="50%">                    
                </td>
            </tr>
            <tr colspan="2">
                <td>
                    <strong>NIT / C.C. No.:</strong> {{ $quote->customer->nit }}
                </td>
            </tr>
        </table><br/><br/>
        {{-- Tabla para datos iniciales --}}
        <table width="100%" style="margin-top: 20px;">
            <tr colspan="2">
                <td>
                    <strong>Cordial saludo:</strong>
                </td>
            </tr>
            <tr>
                <td text-align="justify">
                    Atendiendo su solicitud nos permitimos presentar la propuesta comercial de inspección de acuerdo a las especificaciones
                    del Reglamento Técnico de Iluminación y Alumbrado Público RETILAP (Resolución 180540 del 30 de marzo de 2010 y todas
                    sus actualizaciones aplicables y vigentes a su instalación eléctrica).
                </td>
            </tr>
        </table><br>
        {{-- Objeto --}}
        <table width="100%" style="margin-top: 20px;">
            <tr colspan="2">
                <td>
                    <strong>1. OBJETO</strong>
                </td>
            </tr>
            <tr>
                <td aling="justify">
                    Inspección RETILAP con fines de certificación de las instalaciones de iluminación interior/iluminación exterior/alumbrado 
                    público en el proyecto: <strong>{{ $quote->name_project }}</strong> ubicado en el municipio de 
                    <strong>{{ $quote->city->name }}</strong> 
                    departamento de(l) <strong>{{ $quote->state->name }}</strong>.
                </td>
            </tr>
        </table>
        <table width="100%" style="margin-top: 20px;">
            <tr colspan="2">
                <td>
                    <strong>2. ALCANCE</strong>
                </td>
            </tr>
        </table><br>
        <table class="cell" style="width: 100%;">
            <thead>
                <tr style="background-color: #F2F2F2; text-align: center">
                    <th class="cell" colspan="5">
                        ILUMINACIÓN INTERIOR, EXTERIOR Y/O ALUMBRADO PÚBLICO
                    </th>
                </tr>
                <tr>
                    <th class="cell" align="center" width="100%">Descripción</th>               
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="cell">{{ $quote->fscope }}</td>
                </tr>
                <tr>
                    <td class="cell">{{ $quote->sscope }}</td>
                </tr>
                <tr>
                    <td class="cell">{{ $quote->tscope }}</td>
                </tr>
            </tbody>          
        </table><br>
        <table width="100%" style="margin-top: 20px;">
            <tr>
                <td aling="justify"> 
                    <strong>Nota:</strong> Si el alcance mencionado anteriormente no corresponde con lo solicitado comunicarse con CERTICOL S.A.S. 
                    para realizar el ajuste.
                </td>
            </tr>
        </table><br>

        <pagebreak>
        <br><br>

        <table width="100%" style="margin-top: 20px;">
            <tr colspan="2">
                <td>
                    <strong>3. PROPUESTA ECONOMICA</strong>
                </td>
            </tr>
        </table>
        
        <br>

        <table class="cell-body" width="100%" style="margin-top: 20px;">
            <thead>
                <tr class="cell-body" style="text-align: center;">
                    <th colspan="3" class="cell" align="center" width="100%">PROPUESTA COMERCIAL DE INSPECCIÓN</th>
                </tr>
                <tr class="cell-body" style="text-align: center;">
                    <th class="cell-body" align="center" width="20%">Item</th>               
                    <th class="cell-body" align="center" width="60%">Alcance</th>               
                    <th class="cell-body" align="center" width="20%">Valor</th>               
                </tr>
            </thead>
            <tbody>
                <tr class="cell-body">
                    <td class="cell-body" style="text-align: center; vertical-align: middle;">1</td>
                    <td class="cell-body">{{ $quote->fscope }}</td>
                    <td class="cell-body"  align="right"><span style="float:left!important;">$</span> {{ number_format($quote->funit_value, 2, ',', '.') }}</td>
                </tr>

                @if(!is_null($quote->sscope))
                    <tr class="cell-body">
                        <td class="cell-body" style="text-align: center; vertical-align: middle;">2</td>
                        <td class="cell-body">{{ $quote->sscope }}</td>
                        <td class="cell-body" align="right"> <span style="float:left!important;">$</span> {{ number_format($quote->sunit_value, 2, ',', '.') }}</td>
                    </tr>

                    @if(!is_null($quote->tscope))
                        <tr class="cell-body">
                            <td class="cell-body" style="text-align: center; vertical-align: middle;">3</td>
                            <td class="cell-body">{{ $quote->tscope }}</td>
                            <td class="cell-body" align="right"> <span style="float:left!important;">$</span> {{ number_format($quote->tunit_value, 2, ',', '.') }}</td>
                        </tr>
                    @endif
                @endif
                
                <tr class="cell-body">
                    <td class="cell-body" align="center"></td>
                    <td class="cell-body"><strong>SUBTOTAL</strong></td>
                    <td class="cell-body" align="right">{{ number_format($quote->funit_value + (!is_null($quote->sunit_value) ? $quote->sunit_value : 0) + (!is_null($quote->tunit_value) ? $quote->tunit_value : 0), 2, ',', '.') }}</td>
                </tr>

                <tr class="cell-body">
                    <td class="cell-body" align="center"></td>
                    <td class="cell-body"><strong>IVA (19%)</strong></td>
                    <td class="cell-body" align="right">{{ number_format($quote->iva, 2, ',', '.') }}</td>
                </tr>

                <tr class="cell-body">
                    <td class="cell-body" align="center"></td>
                    <td class="cell-body"><strong>VALOR TOTAL</strong></td>
                    <td class="cell-body" align="right">{{ number_format($quote->funit_value + (!is_null($quote->sunit_value) ? $quote->sunit_value : 0) + (!is_null($quote->tunit_value) ? $quote->tunit_value : 0) + (!is_null($quote->iva) ? $quote->iva : 0) , 2, ',', '.') }}</td>
                </tr>

                <tr class="cell-body">
                    <td class="cell-body" align="center"></td>
                    <td class="cell-body"><strong>VALOR ADICIONAL (costo por visitas adicionales)</strong></td>
                    <td class="cell-body" align="right">{{ number_format($quote->value_add, 2, ',', '.') }}</td>
                </tr>
            </tbody>

        </table><br>

        <table width="100%" style="margin-top: 20px;">
            <tr>
                <td align="justify"> 
                    <strong>Nota:</strong> La presente propuesta no incluye costos de pólizas en caso de ser requeridas.
                </td>
            </tr>
        </table><br>

        <table width="100%" style="margin-top: 20px;">
            <tr colspan="2">
                <td>
                    <strong>4. CONDICIONES COMERCIALES</strong>
                </td>
            </tr>
        </table>

        <table class="cell-body" width="100%" style="margin-top: 20px;">
            <tbody>

                <tr class="cell-body">
                    <td class="cell-body" align="left"> <strong>Forma de pago:</strong> </td>
                    <td class="cell-body"> {{ $quote->payment_method }} </td>
                </tr>

                <tr class="cell-body">
                    <td class="cell-body" align="left"> <strong>Tiempo de ejecución:</strong> </td>
                    <td class="cell-body"> {{ $quote->execution_time }} </td>
                </tr>

                <tr class="cell-body">
                    <td class="cell-body" align="left"> <strong>Tiempo de entrega de dictamen:</strong> </td>
                    <td class="cell-body" align="left"> 4 días hábiles segun resultado de inspección. </td>
                </tr>

                <tr class="cell-body">
                    <td class="cell-body" align="left"> <strong>Validez de la oferta:</strong> </td>
                    <td class="cell-body">{{ $quote->validity }}</td>
                </tr>

            </tbody>
        </table><br>

        <table width="100%" style="margin-top: 20px;">
            <tr>
                <td  align="justify">
                    Cuando el cliente haya contratado a Certiﬁcaciones de Colombia CERTICOL S.A.S. y declare que no puede o no desea continuar
                     con el proceso de inspección y acuerdos aceptados anteriormente, CERTICOL S.A.S. quedará facultado para retener el valor 
                     correspondiente al 30% cancelado por el cliente, el cual corresponde a costos administrativos. El cliente deberá solicitar 
                     por escrito la finalización del proceso de inspección remitiendo por escrito la notificación del acto, incluyendo el motivo 
                     y la devolución de los documentos que fueron entregados para la ejecución del servicio. Si en el desarrollo de la inspección 
                     se presentan modificaciones en el alcance cotizado que sean responsabilidad del cliente o sus representantes, se realizará 
                     una nueva propuesta comercial de inspección que contemple el nuevo alcance. Una vez realizada la visita de inspección o la 
                     revisión documental del proyecto, no se hará devolución de dinero al cliente.
                </td>
            </tr>
        </table><br>
        <pagebreak>
        <br><br>
        
        {{-- -+-+-+-+--+-+-+-+-++-+-+-+ --}}

        <table width="100%" style="margin-top: 20px;">
            <tr colspan="2">
                <td>
                    <strong>5. CONDICIONES DE ACEPTACIÓN Y PAGO</strong>
                </td>
            </tr>
        </table>

        <table width="100%" style="margin-top: 20px;">
            <tr>
                <td  align="justify">
                    Si la presente propuesta comercial de inspección es aceptada, el cliente deberá: </td>
            </tr>
            <tr>
                <td  align="justify">
                    - Realizar transacción a nombre de CERTICOL S.A.S. con NIT No.900.481.877-1, en la(s) siguiente(s) cuenta(s) bancaria(s): </td>
            </tr>
              
        </table><br>

        <table class="cell-body" width="100%" style="margin-top: 20px;">
        
            <thead>
                <tr class="cell-body" style="text-align: center;">
                    <th class="cell-body" align="center" width="50%"> ENTIDAD BANCARIA</th>               
                    <th class="cell-body" align="center" width="50%"> NÚMERO DE CUENTA CORRIENTE </th>                           
                </tr>
            </thead>

            <tbody>

                <tr class="cell-body">
                    <td class="cell-body" style="text-align: center; vertical-align: middle;"> Bancolombia </td>
                    <td class="cell-body" style="text-align: center; vertical-align: middle;"> 261852606-80 </td>
                </tr>

            </tbody>

        </table><br>

        <table width="100%" style="margin-top: 20px;">
            <tr>
                <td  align="justify">
                    Una vez efectuado el pago, el cliente debe entregar los siguientes documentos, en medio físico o enviarlos en digital a los correos electrónicos gerencia@certicolsas.com, comercial@certicolsas.com, como parte del acuerdo de la inspección RETILAP: </td>
            </tr>
        </table><br>
            <table width="100%" style="margin-top: 20px;">
            <tr>
                <td  align="justify">
                    - Aceptación de la propuesta diligenciada en su totalidad con firma. </td>
            </tr>
            <tr>
                <td  align="justify">
                    - Comprobante de pago. </td>
            </tr>
            <tr>
                <td  align="justify">
                    - Registro Único Tributario (RUT). </td>
            </tr>
            <tr>
                <td  align="justify">
                    - Certiﬁcado de existencia y representación legal (No mayor a 30 días). Cédula de ciudadanía del representante legal. </td>
            </tr>
        </table><br>
            <table width="100%" style="margin-top: 20px;">
            <tr>
                <td  align="justify">
                    En ningún caso el cliente podrá condicionar el pago del valor de la presente propuesta comercial de inspección por el resultado de las actividades de inspección u otras condiciones que puedan comprometer la imparcialidad del organismo evaluador de la conformidad. </td>
            </tr>
              
        </table><br>

        <table width="100%" style="margin-top: 20px;">
            <tr>
                <td  align="justify">
                    Cordialmente; </td>
            </tr>
        </table><br>
        <br>
        <br>
        

        <table width="100%" style="margin-top: 20px;">
            <tr>
                <td align="justify"> Diana Alejandra Vitali Gomez </td>
            </tr>
            <br>
            <tr>
                <td align="justify"> Gerente General </td>
            </tr>
            <br>
            <tr>
                <td align="justify"> Certificaciones de Colombia CERTICOL S.A.S. </td>
            </tr>
            <br>
            <tr>
                <td align="justify"> Cel.: 316 521 9794 / 390 9959 </td>
            </tr>
            <br>
            <tr>
                <td align="justify"> gerencia@certicolsas.com - www.certicolsas.com </td>
            </tr>
        </table><br>


	





          
           
                    
        







        {{-- <table class="table-body" width="100%">
            <tr>
                <td class="cell-body-title" colspan="4">
                </td>
            </tr>
            <tr>
                <td class="cell-body" width="30%">
                    <strong>Nombre:</strong>
                </td>
                <td class="cell-body" width="70%" colspan="3">
                </td>
            </tr>
            <tr>
                <td class="cell-body" width="30%">
                    <strong>Cargo:</strong>
                </td>
                <td class="cell-body" width="70%" colspan="3">
                </td>
            </tr>
            <tr>
                <td class="cell-body-subtitle" colspan="4">
                </td>
            </tr>
            <tr>
                <td class="cell-body" width="30%">
                    <strong>Trimestre:</strong>
                </td>
                <td class="cell-body" width="25%">
                </td>
                <td class="cell-body" width="20%">
                    <strong>A&ntilde;o:</strong>
                </td>
                <td class="cell-body" width="25%">
                </td>
            </tr>
        </table> <br/><br/>

        <table class="table-body" width="100%">
            <tr>
                <td class="cell-body-title" width="100%">
                </td>
            </tr>
            <tr>
                <td class="cell-body" width="100%" align="center">
                    <span></span>
                </td>
            </tr>
        </table> <br/><br/>

        <table class="table-body" width="100%">
            <tr>
                <td class="cell-body-title" width="100%" colspan="2">
                </td>
            </tr>
            <tr>
                <td class="cell-body" width="30%">
                    <strong>Objetivos Profesionales</strong>
                </td>
                <td class="cell-body" width="70%">
                </td>
            </tr>
            <tr>
                <td class="cell-body" width="30%">
                    <strong>Prioridades del Negocio</strong>
                </td>
                <td class="cell-body" width="70%">
                </td>
            </tr>
            <tr>
                <td class="cell-body" width="30%">
                    <strong>Prioridades Externas</strong>
                </td>
                <td class="cell-body" width="70%">
                </td>
            </tr>
            <tr>
                <td class="cell-body">
                    <strong>Fortalezas</strong>
                </td>
                <td class="cell-body" style="text-align: justify;">
                </td>
            </tr>
        </table> <br/><br/>

        <table class="table-body" width="100%">
            <tr>
                <td class="cell-body-title" width="100%">
                    ACCIONES DE MEJORA
                </td>
            </tr>
            <tr>
                <td class="cell-body-subtitle" width="100%">
                    <strong>Plan de Desarrollo Individual de las Pruebas</strong>
                </td>
            </tr>
            <tr>
                <td class="cell-body" style="text-align: justify;">
                </td>
            </tr>
            <tr>
                <td class="cell-body-subtitle" width="100%">
                    <strong>Oportunidades de Desarrollo</strong>
                </td>
            </tr>
            <tr>
                <td class="cell-body">
                </td>
            </tr>
            <tr>
                <td class="cell-body-subtitle" width="100%">
                    <strong>Retroalimentación del Jefe Inmediato</strong>
                </td>
            </tr>
            <tr>
                <td class="cell-body" style="text-align: justify;">
                </td>
            </tr>
        </table> <br/><br/>

        <table class="table-body" width="100%">
            <tr>
                <td class="cell-body-title" width="70%">
                    TOTAL EVALUACI&Oacute;N
                </td>
                <td class="cell-body-rating" >
                </td>
            </tr>
        </table> --}}

        {{-- <htmlpagefooter name="page-footer">
            <div style="min-width: 70%; max-height: 100%; margin-left: 0px; margin-right: 0px; bottom: 0px;" >
                Alfapp © {{ date("y")}} Todos los derechos reservados
            </div>
            <div style="min-width: 20%; max-height: 100%; text-align: right;">
                Página {PAGENO} de {nb}
            </div>
        </htmlpagefooter> --}}
    </body>
</html>