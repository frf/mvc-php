$(function() {
    $( "#dt_validade" ).datepicker({
        firstDay: 1,
        dateFormat: 'dd/mm/yy',
        dayNames: [
            'DOMINGO','SEGUNDA','TERÇA','QUARTA','QUINTA','SEXTA','SÁBADO','DOMINGO'
        ],
        dayNamesMin: [
            'D','S','T','Q','Q','S','S','D'
        ],
        dayNamesShort: [
            'Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'
        ],
        monthNames: [
            'JANEIRO','FEVEREIRO','MARÇO','ABRIL','MAIO','JUNHO','JULHO','AGOSTO','SETEMBRO',
            'OUTUBRO','NOVEMBRO','DEZEMBRO'
        ],
        monthNamesShort: [
            'JAN','FEV','MAR','ABR','MAI','JUN','JUL','AGO','SET',
            'OUT','NOV','DEZ'
        ],
        nextText: 'Próximo',
        prevText: 'Anterior',
    });
});