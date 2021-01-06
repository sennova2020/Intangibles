function descriptionModal(e) {
        
    var object = e.id;
    var message = null;

    if (object == "changesNote") {
        message = 'Tenga en cuenta aquellos factores que puedan imposibilitar la utilización del bien. ';
    }else if (object == "assetReduction") {
        message = 'El valor del mercado es el valor por el cual el bien intangible puede ser intercambiado entre partes interesadas y debidamente informadas, en una transacción realizada en condiciones de independencia mutua (valor del intangible en el mercado, si se pusiera en venta); el mercado debe presentar condiciones de ser abierto, activo y ordenado.<br>Si se cuenta con evidencia objetiva de algunas de las siguientes situaciones se debe marcar “SI”.<br> A continuación, se enumeran algunos ejemplos:<br><br>1)Un intangible que ha disminuido su “valor de mercado” como consecuencia de la disminución de la materia prima y/o mano de obra con que se elabora el intangible.<br><br>2)Un intangible que ha disminuido su “valor de mercado” como consecuencia del ingreso al mercado de otras tecnologías que desarrollan las mismas actividades, pero con mejor definición, velocidad, capacidad, etc.<br><br>3)Sale al mercado una nueva versión o un nuevo modelo del intangible que vuelve obsoleto más de lo normal a la versión anterior.<br><br>4)Cualquier otra situación que represente una disminución del "valor de mercado" de este elemento intangible';
    } else if(object == "damagedAsset"){
        message = 'Con esta pregunta se pretende identificar de qué manera la obsolescencia o el daño en un bien intangible puede alterar sifnificativamente la forma como se usa, es decir, que el servicio que presta el bien se ha disminuido en un porcentaje MAYOR AL 80% como consecuencia del daño sufrido y por ende se requiere de la salida de recursos por parte de la entidad para rehabilitar el servicio normal del bien. ';
    }else if(object =='valueRehabilitations'){
        message = 'Un bien intangible que ha recibido ataque cibernético, robo de información, secuestro de información o algún hecho que imposibiliten el normal funcionamiento del activo.<br><br>1)Un intangible que no se puede utilizar debido a que no cuenta con infraestructura para su utilización.<br><br>20GRF-G-010 V 05<br><br>2)Un intangible que presenta pérdida o daño de alguno de sus componentes para su correcto funcionamiento.<br><br>3)Un intangible que presenta alteración en su diseño estructural, que no permite su utilización.<br><br>4)Un intangible que ha sido manipulado incorrectamente y su arreglo requiere un compromiso de desembolso de efectivo por un valor muy superior al valor del activo en el mercado.';
    }else if(object == 'activeEvaluation'){
        message = 'Con esta pregunta se pretende identificar si el activo que se encuentra en evaluación, se dejó de utilizar o se piensa dejar de utilizar, inclusive si se cuenta con un plan para reemplazar el elemento o no utilizarlo hasta la fecha contemplada inicialmente por circunstancias diferentes al daño físico del elemento.<br>A continuación, se enumeran algunos ejemplos de circunstancias: <br><br>1)Si un bien intangible no se está utilizando en el mismo grado que cuando se puso en funcionamiento, o si la vida útil estimada del activo es menor que la que originalmente se estimó; es decir se planteó inicialmente su uso en un determinado tiempo y ahora se prevé su uso en un tiempo menor.<br><br>2)Un bien intangible creado con un fin específico y se encuentra en uso en un tema muy diferente al original. Un ejemplo de esto es un software con fines de formación profesional en un tema específico y el SENA deja de ofrecer dicha formación profesional.<br><br>3)Un intangible que no cuenta con la capacidad, la velocidad, definición que se requiere para su utilización.';
    }else if(object == "constructionActive"){
        message = 'Esta pregunta se tendrá en cuenta para aquellos bienes intangibles generados internamente, por la Entidad, producto de una fase de desarrollo, si no se construye o ya se terminó su construcción, la respuesta es NO.';
    }else if(object == "activeInformation"){
        message = 'Ejemplo, un bien intangible fue construido para atender una población estimada de aprendices sin embargo, su utilización es considerablemente menor debido por ejemplo a la baja demanda de la oferta educativa del Centro de Formación.<br> Para esta pregunta tenga en cuenta informes emitidos por la Entidad, sino cuenta con ellos la respuesta es NO. ';
    }

    $.alert({
            title: 'Nota',
            content:message
    });
}
