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
?>