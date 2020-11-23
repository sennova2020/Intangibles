<?php

    function readIntangible($project)
    {
        $resultado = null;
        $model =  new intangible();
        $modelClass = new claseIntangible();
        $intangibles = $model -> readUnfinished($project);

        if ($intangibles == false) {
            $resultado .= '
            <tr>
                <td style="padding:10px 10px;border:1px solid rgb(200,200,200);">Sin intangibles</td>                     
                <td align="center">Sin intangibles</td>
                <td class="text-center">Sin intangibles</td>
                <td class="text-center">Sin intangibles</td>
                <td class="text-center">Sin intangibles</td> 
            </tr>
            ';
        } else {
            foreach ($intangibles as $intangible) {
                $nameClass = $modelClass -> readDenomination($intangible['pregunta2']);
                $resultado .= '
                <tr>
                    <td style="padding:10px 10px;border:1px solid rgb(200,200,200);">'.$intangible['cod_intangible'].'</td>                     
                    <td align="center">'.$intangible['pregunta3'].'</td>
                    <td class="text-center">'.$intangible['pregunta1'].'</td>';

                    foreach ($nameClass as $key ) {
                        $resultado .= '
                            <td class="text-center">'.$key['denominacion'].'</td>
                        ';
                    }
                    
                    $resultado .= '<td class="text-center"><button id="'.$intangible['cod_intangible'].'" class="btn" onclick="finish(this)">Terminar</button></td> 
                </tr>
                ';
            }
        }
        
        return $resultado;
    }

    function readIntangibleNotSave($project)
    {
        $resultado = null;
        $model =  new intangible();
        $modelClass = new claseIntangible();
        $intangibles = $model -> readNotSave($project);

        if ($intangibles == false) {
            $resultado .= '
            <tr>
                <td style="padding:10px 10px;border:1px solid rgb(200,200,200);">Sin intangibles</td>                     
                <td align="center">Sin intangibles</td>
                <td class="text-center">Sin intangibles</td>
                <td class="text-center">Sin intangibles</td>
                <td class="text-center">Sin intangibles</td> 
            </tr>
            ';
        } else {
            foreach ($intangibles as $intangible) {
                $nameClass = $modelClass -> readDenomination($intangible['pregunta2']);
                $resultado .= '
                <tr>
                    <td style="padding:10px 10px;border:1px solid rgb(200,200,200);">'.$intangible['cod_intangible'].'</td>                     
                    <td align="center">'.$intangible['pregunta3'].'</td>
                    <td class="text-center">'.$intangible['pregunta1'].'</td>';

                    foreach ($nameClass as $key ) {
                        $resultado .= '
                            <td class="text-center">'.$key['denominacion'].'</td>
                        ';
                    }
                    
                    $resultado .= '<td class="text-center"><button id="'.$intangible['cod_intangible'].'" class="btn" onclick="seeSave(this)">Ver y Guardar</button></td> 
                </tr>
                ';
            }
        }
        
        return $resultado;
    }

    function readInformationIntagible($codIntangible)
    {
        $resultado = null;
        $model =  new intangible();
        $intangibles = $model -> readInformationIn($codIntangible);

        if (isset($intangibles)) {
            
            foreach ($intangibles as $intangible) {
                
                $resultado .= '
                
                <div class="row">
                    <li class="col-12 col-sm-12 col-md-6 col-lg-6 li_formulario">
                        <p class="etiquetas">Fecha de cierre del proyecto técnicamente en la vigencia 2020</p>
                        <br />
                        <input id="dateFinish" name="dateFinish" type="date" value="'.utf8_encode($intangible['fecha_cierre']).'" class="w-100 form-control" style="font-size:20px;color:black" step="any">
                    </li>

                    <li class="col-12 col-sm-12 col-md-6 col-lg-6 li_formulario">
                        <p class="etiquetas">Fecha de cierre del proyecto presupuestalmente en la vigencia 2020</p>
                        <br />
                        <input id="dateBudgetClosing" name="dateBudgetClosing" type="date" value="'.utf8_encode($intangible['fecha_vigencia']).'" class="w-100 form-control" style="font-size:20px;color:black" step="any">
                    </li>
                </div>
                <br>
                <div class="row">
                    <li class="col-12 col-sm-12 col-md-6 col-lg-6 li_formulario">
                        <p class="etiquetas">Tipo de intangible</p>
                        <br />
                        <select name="typeIntangible" id="typeIntangible" required class="form-control">
                            '.utf8_encode(isType($intangible['pregunta1'])).'
                        </select>
                    </li>

                    <li class="col-12 col-sm-12 col-md-6 col-lg-6 li_formulario">
                        <p class="etiquetas">Clase de intangibles</p>
                        <br />
                        <select name="classIntangible" id="classIntangible" required class="form-control">
                            <option value="'.utf8_encode($intangible['pregunta2']).'" selected></option>
                        </select>
                    </li>
                </div>


                <li class="li_formulario">
                    <p class="etiquetas">
                        Nombre del Intangible. <span id="nameIntangibleNote" onclick="descriptionModal(this)" >Nota* </span>
                    </p>

                    <br/>
                    
                    <input type="text" value="'.utf8_encode($intangible['pregunta3']).'" class="form-control" required placeholder="Digite el nombre del intangible" name="nameIntangible" id="nameIntangible"> 
                </li>
                <br>
                <hr>
                <br>
                <li class="li_formulario">
                    <p class="etiquetas">
                        ¿El intangible es un recurso controlado? <span id="resourceControlNote" onclick="descriptionModal(this)" >Nota* </span>
                    </p>
                    <br/>
                    <select name="resourceControl" id="resourceControl" required class="form-control">
                        '.isYesNo($intangible['pregunta4']).'
                    </select>
                </li>

                <li class="li_formulario">
                    <p class="etiquetas">
                        Observación. <span id="observationResourceNote" onclick="descriptionModal(this)" >Nota* </span> 
                    </p>
                    <br>
                    <textarea name="observationResource" class="form-control" id="observationResource" required cols="30" rows="8" class="w-100 form-control" placeholder="Digite sus observaciones"  maxlength="1000">'.utf8_encode($intangible['pregunta5']).'</textarea>
                </li>
            <li class="li_formulario">
                <p class="etiquetas">
                    ¿Del intangible se espera obtener un potencial de servicios? <span id="potencialNote" onclick="descriptionModal(this)" >Nota* </span>
                </p>
                <br/>
                <select name="potencial" id="potencial" required class="form-control">
                    '.isYesNo($intangible['pregunta6']).'
                </select>
            </li>

            <li class="li_formulario">
                <p class="etiquetas">
                    Observación. 
                </p>
                <br>
                <textarea name="observationPotencial" id="observationPotencial" required cols="30" rows="8" class="w-100 form-control" placeholder="Digite sus observaciones"  maxlength="1000">'.utf8_encode($intangible['pregunta7']).'</textarea>
            </li>

            <li class="li_formulario">
                <p class="etiquetas">
                    ¿El intangible se puede medir fiablemente? <span id="reliablyNote" onclick="descriptionModal(this)" >Nota* </span>
                </p>
                <br/>
                <select name="reliably" id="reliably" required class="form-control">
                    '.isYesNo($intangible['pregunta8']).'
                </select>
            </li>

            <li class="li_formulario">
                <p class="etiquetas">
                    Observación. 
                </p>
                <br>
                <textarea name="observationReliably" id="observationReliably" required cols="30" rows="8" class="w-100 form-control" placeholder="Digite sus observaciones"  maxlength="1000">'.utf8_encode($intangible['pregunta9']).'</textarea>
            </li>

            <li class="li_formulario">
                <p class="etiquetas">
                    ¿El intangible se puede identificar? <span id="identificationNote" onclick="descriptionModal(this)" >Nota* </span>
                </p>
                <br/>
                <select name="identification" id="identification" required class="form-control">
                    '.isYesNo($intangible['pregunta10']).'
                </select>
            </li>

            <li class="li_formulario">
                <p class="etiquetas">
                    Observación. 
                </p>
                <br>
                <textarea name="observationIdentification" id="observationIdentification" required cols="30" rows="8" class="w-100 form-control" placeholder="Digite sus observaciones"  maxlength="1000">'.utf8_encode($intangible['pregunta11']).'</textarea>
            </li>
            <li class="li_formulario">
                <p class="etiquetas">
                    ¿El intangible NO es considerado monetario? <span id="isMonetaryNote" onclick="descriptionModal(this)" >Nota* </span>
                </p>
                <br/>
                <select name="isMonetary" id="isMonetary" required class="form-control">
                    '.isYesNo($intangible['pregunta12']).'
                </select>
            </li>

            <li class="li_formulario">
                <p class="etiquetas">
                    Observación. 
                </p>
                <br>
                <textarea name="observationMonetary" id="observationMonetary" required cols="30" rows="8" class="w-100 form-control" placeholder="Digite sus observaciones"  maxlength="1000">'.utf8_encode($intangible['pregunta13']).'</textarea>
            </li>

            <li class="li_formulario">
                <p class="etiquetas">
                    ¿El intangible es sin apariencia física?  <span id="physicalAppearanceNote" onclick="descriptionModal(this)" >Nota* </span>
                </p>
                <br/>
                <select name="physicalAppearance" id="physicalAppearance" required class="form-control">
                    '.isYesNo($intangible['pregunta14']).'
                </select>
            </li>

            <li class="li_formulario">
                <p class="etiquetas">
                    Observación. <span id="observationAppearanceNote" onclick="descriptionModal(this)" >Nota* </span> 
                </p>
                <br>
                <textarea name="observationAppearance" id="observationAppearance" required cols="30" rows="8" class="w-100 form-control" placeholder="Digite sus observaciones"  maxlength="1000">'.utf8_encode($intangible['pregunta15']).'</textarea>
            </li>

            <li class="li_formulario">
                <p class="etiquetas">
                    ¿El intangible se va a utilizar por más de un año?  <span id="durationNote" onclick="descriptionModal(this)" >Nota* </span>
                </p>
                <br/>
                <select name="duration" id="duration" required class="form-control">
                    '.isYesNo($intangible['pregunta16']).'
                </select>
            </li>

            <li class="li_formulario">
                <p class="etiquetas">
                    Observación. 
                </p>
                <br>
                <textarea name="observationDuration" id="observationDuration" required cols="30" rows="8" class="w-100 form-control" placeholder="Digite sus observaciones"  maxlength="1000">'.utf8_encode($intangible['pregunta17']).'</textarea>
            </li>

            <li class="li_formulario">
                <p class="etiquetas">
                    ¿No se espera vender en el curso de las actividades de la entidad? <span id="buyActivityNote" onclick="descriptionModal(this)" >Nota* </span>
                </p>
                <br/>
                <select name="buyActivity" id="buyActivity" required class="form-control">
                    '.isYesNo($intangible['pregunta18']).'
                </select>
            </li>

            <li class="li_formulario">
                <p class="etiquetas">
                    Observación. 
                </p>
                <br>
                <textarea name="observationBuyActivity" id="observationBuyActivity" required cols="30" rows="8" class="w-100 form-control" placeholder="Digite sus observaciones"  maxlength="1000">'.utf8_encode($intangible['pregunta19']).'</textarea>
            </li>

                ';

            }

        } else {
            $resultado = "<h3>Ha ocurrido un error</h3>";
        }
         return $resultado;
    }

    function isYesNo($value)
    {
        $resultado = null;

        if ($value === 'si') {
            $resultado .= '
                    <option value="si" selected>Si</option>
                    <option value="no" >No</option>
                ';
        }else{

            if ($value === 'no') {
                $resultado .= '
                    <option value="si" >Si</option>
                    <option value="no" selected>No</option>
                ';
            }

        }

        return $resultado;
    }

    function isType($type)
    {
        $resultado = null;

        if ($type === 'Adquirido') {
            $resultado .= '
                <option value="Adquirido" selected>Adquirido</option>
                <option value="Desarrollado">Desarrollado</option>
            ';
        }else{

            if ($type === 'Desarrollado') {
                $resultado .= '
                    <option value="Adquirido">Adquirido</option>
                    <option value="Desarrollado" selected>Desarrollado</option>
                ';
            }

        }

        return $resultado;
    }

    function projectInformation($project)
    {

        $resultado = null;

        $model = new proyectoEvaluarIntangible();
        $results = $model -> readProjectCenter($project);

        foreach($results as $result)
        {
            $resultado .= '
            
                <div class="titulo">'.utf8_encode($result['proyecto_titulo']).'</div>
                <div class="formulario1 formulario_c" style="color:white">
                    <h2 class="titulo_formulario">Nuevo intangible</h2>
                    <p><strong>Centro:</strong>
                        '.utf8_encode($result['centro_nombre']).'
                    </p>
                    <br />
                    <p><strong>Código del proyecto:</strong>
                        '.utf8_encode($result['proyecto_consecutivo']).'
                    </p>
                    <br />
                    <p><strong>T&iacute;itulo del proyecto:</strong>
                    '.utf8_encode($result['proyecto_titulo']).'
                    </p>
                </div>

            ';
        }

        return $resultado;

    }

    function readIntangibleFinished($project)
    {
        $resultado = null;
        $model =  new intangible();
        $modelClass = new claseIntangible();
        $intangibles = $model -> readFinished($project);

        if ($intangibles == false) {
            $resultado .= '
            <tr>
                <td style="padding:10px 10px;border:1px solid rgb(200,200,200);">Sin intangibles</td>                     
                <td align="center">Sin intangibles</td>
                <td class="text-center">Sin intangibles</td>
                <td class="text-center">Sin intangibles</td>
                <td class="text-center">Sin intangibles</td> 
            </tr>
            ';
        } else {
            foreach ($intangibles as $intangible) {
                $nameClass = $modelClass -> readDenomination($intangible['pregunta2']);
                $resultado .= '
                <tr>
                    <td style="padding:10px 10px;border:1px solid rgb(200,200,200);">'.$intangible['cod_intangible'].'</td>                     
                    <td align="center">'.$intangible['pregunta3'].'</td>
                    <td class="text-center">'.$intangible['pregunta1'].'</td>';

                    foreach ($nameClass as $key ) {
                        $resultado .= '
                            <td class="text-center">'.$key['denominacion'].'</td>
                        ';
                    }
                    
                    $resultado .= '<td class="text-center"><button id="'.$intangible['cod_intangible'].'" class="btn" onclick="verInfoIntangible(this)">Ver Detalles</button></td> 
                </tr>
                ';
            }
        }
        
        return $resultado;
    }

    function readIntangibleInfo($codIntangible)
    {
        $resultado = null;
        $model =  new intangible();
        $modelClass = new claseIntangible();
        $modelCenter = new proyectoEvaluarIntangible();
        $centers = $modelCenter->readNameCenter($_SESSION['centro']);
        
        $intangibles = $model -> readFinishedDetails($codIntangible);

        foreach($intangibles as $intangible)
        {
            $resultado .= '
                <div class="titulo">C&oacute;digo del intangible: '.$intangible['cod_intangible'].'</div>
                <div class="formulario1 formulario_c" style="color:white">
                    <h2 class="titulo_formulario">Nombre del Intangible: '.$intangible['pregunta3'].'</h2>
                    <table class="table table-striped" style="color:white">
                        <tr><td><strong>Codigo Centro:</strong></td><td>'.$_SESSION['centro'].'</td></tr>';

                        foreach($centers as $center){
                            $resultado .= '<tr><td><strong>Nombre Centro:</strong></td><td>'.utf8_encode($center['centro_nombre']).'</td></tr>';
                        }

                        $resultado .= '
                        <tr><td><strong>Tipo Intangible:</strong></td><td>'.$intangible['pregunta1'].'</td></tr>';
                        $nameClass = $modelClass -> readDenomination($intangible['pregunta2']);
                        foreach ($nameClass as $class)
                        {
                            $resultado .= '
                            <tr><td><strong>Clase intangible:</strong></td><td>'.utf8_encode($class['denominacion']).'</td></tr>
                            ';
                        }

                       $resultado .= '
                        <tr><td><strong>Fecha de cierre del proyecto técnicamente en la vigencia 2020:</strong></td><td>'.$intangible['fecha_cierre'].'</td></tr>
                        <tr><td><strong>Fecha de cierre del proyecto presupuestalmente en la vigencia 2020:</strong></td><td>'.$intangible['fecha_vigencia'].'</td></tr>
                        <tr><td><strong>Nombre Intangible:</strong></td><td>'.utf8_encode( $intangible['pregunta3']).'</td></tr>
                        <tr><td><strong>El Intangible es un Recurso Contralado?:</strong></td><td>'.ucwords($intangible['pregunta4']).'</td></tr>
                        <tr><td><strong>Observaciones:</strong></td><td></td></tr>
                        <tr><td><div disabled class="bg-light text-dark p-3 border overflow-auto w-100" style="height:200px;" >'.utf8_encode( $intangible['pregunta5']).'</div></td><td></td></tr>
                        <tr><td><strong>¿Del intangible se espera obtener un potencial de servicios?:</strong></td><td>'.ucwords($intangible['pregunta6']).'</td></tr>
                        <tr><td><strong>Observaciones:</strong></td><td></td></tr>
                        <tr><td><div disabled class="bg-light text-dark p-3 border overflow-auto w-100" style="height:200px;" >'.utf8_encode( $intangible['pregunta7']).'</div></td><td></td></tr>
                        <tr><td><strong>¿El intangible se puede medir fiablemente?:</strong></td><td>'. ucwords( $intangible['pregunta8']).'</td></tr>
                        <tr><td><strong>Observaciones:</strong></td><td></td></tr>
                        <tr><td><div disabled class="bg-light text-dark p-3 border overflow-auto w-100" style="height:200px;" >'.utf8_encode( $intangible['pregunta9']).'</div></td><td></td></tr>
                        <tr><td><strong>¿El intangible se puede identificar? :</strong></td><td>'. ucwords( $intangible['pregunta10']).'</td></tr>
                        <tr><td><strong>Observaciones:</strong></td><td></td></tr>
                        <tr><td><div disabled class="bg-light text-dark p-3 border overflow-auto w-100" style="height:200px;" >'.utf8_encode( $intangible['pregunta11']).'</div></td><td></td></tr>
                        <tr><td><strong>¿El intangible NO es considerado monetario? El intangibles es monetario cuando es un CDT, un bono o títulos valores y es no monetario en caso contrario:</strong></td><td>'. ucwords( $intangible['pregunta12']).'</td></tr>
                        <tr><td><strong>Observaciones:</strong></td><td></td></tr>
                        <tr><td><div disabled class="bg-light text-dark p-3 border overflow-auto w-100" style="height:200px;" >'.utf8_encode( $intangible['pregunta13']).'</div></td><td></td></tr>
                        <tr><td><strong>¿El intangible es sin apariencia física?:</strong></td><td>'. ucwords( $intangible['pregunta14']).'</td></tr>
                        <tr><td><strong>Observaciones:</strong></td><td></td></tr>
                        <tr><td><div disabled class="bg-light text-dark p-3 border overflow-auto w-100" style="height:200px;" >'.utf8_encode( $intangible['pregunta15']).'</div></td><td></td></tr>
                        <tr><td><strong>¿El intangible se va a utilizar por más de un año?:</strong></td><td>'. ucwords( $intangible['pregunta16']).'</td></tr>
                        <tr><td><strong>Observaciones:</strong></td><td></td></tr>
                        <tr><td><div disabled class="bg-light text-dark p-3 border overflow-auto w-100" style="height:200px;" >'.utf8_encode( $intangible['pregunta17']).'</div></td><td></td></tr>
                        <tr><td><strong>¿No se espera vender en el curso de las actividades de la entidad?:</strong></td><td>'. ucwords( $intangible['pregunta18']).'</td></tr>
                        <tr><td><strong>Observaciones:</strong></td><td></td></tr>
                        <tr><td><div disabled class="bg-light text-dark p-3 border overflow-auto w-100" style="height:200px;" >'.utf8_encode( $intangible['pregunta19']).'</div></td><td></td></tr>
                        <tr><td><strong>Vida &uacute;til:</strong></td><td>'.ucwords($intangible['pregunta20']).'</td></tr>
                        <tr><td><strong>Porcentaje de contrapartida del SENA:</strong></td><td>'.$intangible['pregunta21'].'%</td></tr>
                        <tr><td><strong>Vida útil en meses:</strong></td><td>'.$intangible['pregunta23'].'</td></tr>
                        <tr><td><strong>Vida útil transcurrida en meses:</strong></td><td>'.$intangible['pregunta24'].'</td></tr>
                        <tr><td><strong>Vida útil remanente en meses:</strong></td><td>'.$intangible['pregunta25'].'</td></tr>
                        
                        
                    </table>
                </div>
            ';
        }

        return $resultado;
    }

    function readFactura($codIntangible)
    {
        $resultado = null;
        
        $modelFactura = new factura();
        $infoFactura = $modelFactura -> readCodeIntangible($codIntangible);

        if(isset($infoFactura))
        {
            $resultado .= '
            
                <div class="formulario1 formulario_c" style="color:white;width:100%!important">
                <h2 class="text-white">Información del documento contable</h2>
                <table class="table table-striped bg-white h6">
                    <thead>
                        <tr>
                            <th scope="col">Tipo de documento contable</th>
                            <th scope="col">Número de documento contable</th>
                            <th scope="col">El documento contable está a nombre del SENA</th>
                            <th scope="col">Fecha del documento contable, contrato o documento</th>
                            <th scope="col">Valor total del documento contable</th>
                            <th scope="col">Tiene IVA?</th>
                            <th scope="col">IVA</th>
                            <th scope="col">Concepto relacionado con el activo adquirido</th>
                            <th scope="col">Valor de concepto</th>
                            <th scope="col">Es necesario este concepto para poner en funcionamiento el intangible?</th>
                            <th scope="col">La documento contable que esta registrando corresponde a la fase de?</th>
                        </tr>
                    </thead>
                    <tbody class="" style="color:gray;">
            
            ';
            foreach($infoFactura as $key)
            {
                $resultado .='
                
                        <tr>
                        <th scope="">'.utf8_encode($key['tipo_documento_contable']).'</th>
                        <th scope="">'.$key['numero_factura'].'</th>
                        <th scope="">'.$key['factura_a_nombre_sena'].'</th>
                        <th scope="">'.$key['fecha_factura'].'</th>
                        <th scope="">'.$key['valor_total'].'</th>
                        <th scope="">'.ucwords($key['tiene_iva']).'</th>
                        <th scope="">'.$key['iva'].'</th>
                        <th scope="">'.utf8_encode($key['concepto']).'</th>
                        <th scope="">'.$key['valor_concepto'].'</th>
                        <th scope="">'.$key['es_necesario'].'</th>
                        <th scope="">'.$key['fecha'].'</th>
                    </tr>
                
                ';
            }

            $resultado .= '
            
                      
                    </tbody>
                    </table>
                </div>
            
            ';

        }else{
            $resultado ='';
        }

        return $resultado;
    }
?>