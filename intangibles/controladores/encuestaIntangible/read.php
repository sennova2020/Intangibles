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
                    if ($intangible['pregunta20'] == '') {
                        $resultado .= '<td class="text-center"><button id="'.$intangible['cod_intangible'].'" class="btn" onclick="finish(this)">Terminar</button></td>';
                    } else {
                        
                        if ($intangible['pregunta27'] == '') {
                            $resultado .= '<td class="text-center"><a href="../listaCheck/checkRemanente.php?id='.$intangible['cod_intangible'].'"><button id="'.$intangible['cod_intangible'].'" class="btn" >Terminar</button></a></td>';
                        } else {
                           
                            if ($intangible['pregunta32'] == '') {
                                $resultado .= '<td class="text-center"><button id="'.$intangible['cod_intangible'].'" class="btn" onclick="finishTwo(this)">Terminar</button></td>';
                            } else {
                                
                                if ($intangible['pregunta34'] == '') {
                                    $resultado .= '<td class="text-center"><button id="'.$intangible['cod_intangible'].'" class="btn" onclick="finishThree(this)">Terminar</button></td>';
                                } else {

                                   if ($intangible['pregunta38'] == '') {
                                    $resultado .= '<td class="text-center"><a href="../listaCheck/revIndDeterioro.php?id='.$intangible['cod_intangible'].'"><button id="'.$intangible['cod_intangible'].'" class="btn" >Terminar</button></a></td>';
                                   }
                                   
                                }
                                
                            }
                            
                        }
                        
                    }
                
                
                $resultado.=    '</tr>
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
   
        
        
        $intangibles = $model -> readFinishedDetails($codIntangible);



        foreach($intangibles as $intangible)
        {
            $centers = $modelCenter->readProjectCenter($intangible['proyecto_consecutivo']);
            $resultado .= '
                <div class="titulo">C&oacute;digo del intangible: '.$intangible['cod_intangible'].'</div>
                <div class="formulario1 formulario_c" style="color:white">
                    <h2 class="titulo_formulario">Nombre del Intangible: '.utf8_encode($intangible['pregunta3']).'</h2>
                    <table class="table table-striped" style="color:white">
                        ';

                        foreach($centers as $center){
                            $resultado .= '<tr><td><strong>Codigo Centro:</strong></td><td>'.$center['codigo_centro'].'</td></tr>
                            <tr><td><strong>Nombre Centro:</strong></td><td>'.utf8_encode($center['centro_nombre']).'</td></tr>';
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
                        <tr><td><strong>Total vida util trancurrida finita:</strong></td><td>'.$intangible['pregunta54'].'</td></tr>
                        <tr><td><strong>Total vida util trancurrida remanente:</strong></td><td>'.$intangible['pregunta55'].'</td></tr>
                        </table>

                        <br><br>
                        <h2 class="titulo_formulario">LISTA DE CHEQUEO REVISION VIDA UTIL REMANENTE</h2>
                        <table class="table table-striped" style="color:white">
                            <tr><td><strong>Surgió una nueva ley, norma, acuerdo, decreto o normativa interna que hace verificar la utilización del bien intangible:</strong></td><td>'.$intangible['pregunta26'].'</td></tr>
                            <tr><td><strong>Justificación:</strong></td><td></td></tr>
                            <tr><td><div disabled class="bg-light text-dark p-3 border overflow-auto w-100" style="height:200px;" >'.utf8_encode( $intangible['pregunta27']).'</div></td><td></td></tr>
                            <tr><td><strong>Se espera reemplazar el activo intangible por uno con mejores condiciones como son capacidad, velocidad, definición, etc:</strong></td><td>'.$intangible['pregunta28'].'</td></tr>
                            <tr><td><strong>Justificación:</strong></td><td></td></tr>
                            <tr><td><div disabled class="bg-light text-dark p-3 border overflow-auto w-100" style="height:200px;" >'.utf8_encode( $intangible['pregunta29']).'</div></td><td></td></tr>
                            <tr><td><strong>AJUSTE DE LA VIDA UTIL: Si alguno de los criterios establecidos en la lista de chequeo se respondió “SI”, determine el nuevo periodo durante el cual se espera que el activo intangible sea utilizable por parte de los usuarios. En observaciones, indique como llego a este dato o indique el documento soporte para esta determinación. (indicar la nueva vida útil del intangible de contrario escribir NO APLICA ):</strong></td><td></td></tr>
                            <tr><td><div disabled class="bg-light text-dark p-3 border overflow-auto w-100" style="height:200px;" >'.utf8_encode( $intangible['pregunta30']).'</div></td><td></td></tr>
                        </table>

                        <br><br>
                        <h2 class="titulo_formulario"> LISTA DE CHEQUEO REVISION VALOR RESIDUAL</h2>
                        <table class="table table-striped" style="color:white">
                            <tr><td><strong>¿El bien intangible se utilizará hasta que éste se consuma completamente o de forma significativa?:</strong></td><td>'.$intangible['pregunta31'].'</td></tr>
                            <tr><td><strong>Justificación:</strong></td><td></td></tr>
                            <tr><td><div disabled class="bg-light text-dark p-3 border overflow-auto w-100" style="height:200px;" >'.utf8_encode( $intangible['pregunta32']).'</div></td><td></td></tr>
                        </table>

                        <br><br>
                        <h2 class="titulo_formulario">LISTA DE CHEQUEO REVISION MÉTODO DE AMORTIZACI&Oacute;N</h2>
                        <table class="table table-striped" style="color:white">
                            <tr><td><strong>¿El activo intangible presenta un patrón de consumo diferente al inicialmente esperado?:</strong></td><td>'.$intangible['pregunta33'].'</td></tr>
                            <tr><td><strong>Si para esta pregunta, la respuesta fue SI, entonces identifique el nuevo método de amortización que se deberá utilizar de acuerdo al patrón de consumo determinado:</strong></td><td></td></tr>
                            <tr><td><div disabled class="bg-light text-dark p-3 border overflow-auto w-100" style="height:200px;" >'.utf8_encode( $intangible['pregunta34']).'</div></td><td></td></tr>
                            <tr><td><strong>Indique como llegó al dato de la amortización y adjunte el documento soporte para esta determinación:</strong></td><td></td></tr>
                            <tr><td><div disabled class="bg-light text-dark p-3 border overflow-auto w-100" style="height:200px;" >'.utf8_encode( $intangible['pregunta35']).'</div></td><td></td></tr>
                            <tr><td><strong>Adjunte documento:</strong></td><td>'. ucwords( $intangible['pregunta36']).'</td></tr>
                        </table>

                        <br><br>
                        <h2 class="titulo_formulario">LISTA DE CHEQUEO REVISION INDICIOS DE DETERIORO</h2>
                        <table class="table table-striped" style="color:white">
                            <tr><td><strong>Durante el periodo, han tenido lugar, o van a tener lugar en un futuro inmediato, cambios significativos con una incidencia desfavorable sobre la entidad a largo plazo, los cuales están relacionados con el entorno legal, tecnológico o de política gubernamental, en los que opera la entidad:</strong></td><td>'.$intangible['pregunta37'].'</td></tr>
                            <tr><td><strong>Justificación:</strong></td><td></td></tr>
                            <tr><td><div disabled class="bg-light text-dark p-3 border overflow-auto w-100" style="height:200px;" >'.utf8_encode( $intangible['pregunta38']).'</div></td><td></td></tr>
                            <tr><td><strong>Durante el periodo, el valor de mercado del activo ha disminuido significativamente más que lo que se esperaría como consecuencia del paso del tiempo o de su uso normal:</strong></td><td>'.$intangible['pregunta39'].'</td></tr>
                            <tr><td><strong>Justificación:</strong></td><td></td></tr>
                            <tr><td><div disabled class="bg-light text-dark p-3 border overflow-auto w-100" style="height:200px;" >'.utf8_encode( $intangible['pregunta40']).'</div></td><td></td></tr>
                            <tr><td><strong>Adjunte documento:</strong></td><td>'. ucwords( $intangible['pregunta41']).'</td></tr>
                            <tr><td><strong>Valor del estudio del mercado (si no se puede estimar el costo del valor del mercado, escribir el costo de reposición):</strong></td><td></td></tr>
                            <tr><td><div disabled class="bg-light text-dark p-3 border overflow-auto w-100" style="height:200px;" >'.utf8_encode( $intangible['pregunta42']).'</div></td><td></td></tr>
                            <tr><td><strong> Justifique su respuesta si es negativa indicando el costo de reposición, que es el valor que se incurriría si se tuviera que reponer el bien que se encuentra evaluando, en las mismas condiciones en las que se encuentra. Para esto realice la siguiente pregunta, si tuviera que adquirir este elemento que se encuentra evaluando, ¿cuál sería su costo o valor en el mercado?, ¿ese valor en el que tuviera que incurrir es muy inferior al valor reflejado como VALOR DEL BIEN?.:</strong></td><td></td></tr>
                            <tr><td><div disabled class="bg-light text-dark p-3 border overflow-auto w-100" style="height:200px;" >'.utf8_encode( $intangible['pregunta43']).'</div></td><td></td></tr>
                            <tr><td><strong>Valor de reposición del activo intangible:</strong></td><td></td></tr>
                            <tr><td><div disabled class="bg-light text-dark p-3 border overflow-auto w-100" style="height:200px;" >'.utf8_encode( $intangible['pregunta44']).'</div></td><td></td></tr>
                            <tr><td><strong>Se dispone de evidencia sobre la obsolescencia o daño del activo:</strong></td><td>'.$intangible['pregunta45'].'</td></tr>
                            <tr><td><strong>Si su respuesta fue afirmativa se debe calcular el valor de dichas rehabilitaciones:</strong></td><td></td></tr>
                            <tr><td><div disabled class="bg-light text-dark p-3 border overflow-auto w-100" style="height:200px;" >'.utf8_encode( $intangible['pregunta46']).'</div></td><td></td></tr>
                            <tr><td><strong> Durante el periodo, han tenido lugar, o se espera que tengan lugar en un futuro inmediato, cambios significativos en el grado de utilización o la manera como se usa o se espera usar el activo, los cuales afectarán desfavorablemente la entidad a largo plazo. Estos cambios incluyen el hecho de que el activo esté ocioso, los planes de discontinuación o restructuración de la operación a la que pertenece el activo, los planes para disponer el activo antes de la fecha prevista y el cambio de la vida útil de un activo de indefinida a finita:</strong></td><td></td></tr>
                            <tr><td><div disabled class="bg-light text-dark p-3 border overflow-auto w-100" style="height:200px;" >'.utf8_encode( $intangible['pregunta47']).'</div></td><td></td></tr>
                            <tr><td><strong>Justificación:</strong></td><td></td></tr>
                            <tr><td><div disabled class="bg-light text-dark p-3 border overflow-auto w-100" style="height:200px;" >'.utf8_encode( $intangible['pregunta48']).'</div></td><td></td></tr>
                            <><td><strong>Se decide detener la construcción del activo antes de su finalización o de su puesta en condiciones de funcionamiento, salvo que exista evidencia objetiva de que se reanudará la construcción en el futuro próximo:</strong></td><td>'.$intangible['pregunta49'].'</td></>
                            <tr><td><strong>Justificación:</strong></td><td></td></tr>
                            <tr><td><div disabled class="bg-light text-dark p-3 border overflow-auto w-100" style="height:200px;" >'.utf8_encode( $intangible['pregunta50']).'</div></td><td></td></tr>
                            <tr><td><strong>Se dispone de información procedente de informes internos que indican que la capacidad del activo para suministrar bienes o servicios ha disminuido o va a ser inferior a la esperada:</strong></td><td>'.$intangible['pregunta51'].'</td></tr>
                            <tr><td><strong>Justificación:</strong></td><td></td></tr>
                            <tr><td><div disabled class="bg-light text-dark p-3 border overflow-auto w-100" style="height:200px;" >'.utf8_encode( $intangible['pregunta52']).'</div></td><td></td></tr>
                        </table>


                        
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