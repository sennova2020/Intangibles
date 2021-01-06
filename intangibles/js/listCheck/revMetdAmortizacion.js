function descriptionModal(e) {
        
    var object = e.id;
    var message = null;

    if (object == "differentAssets") {
        message = 'Para esta pregunta, tenga en cuenta los factores que puedan afectar el consumo normal del bien; el patrón  de consumo es lineal cuando durante todos los periodos el bien intangible sufre un desgaste normal uniformemente. ';
    }

    $.alert({
            title: 'Nota',
            content:message
    });
}
