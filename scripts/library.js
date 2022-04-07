

function createMenu(input) {
	"use strict";

	//variablen
	var output;
	var hostAdress = window.location.origin;
    output = '<nav">'+
        '<table>'+
            '<tbody>'+
                '<tr>'+
                    '<td><a href="'+hostAdress+'">Startseite</a></td>'+
                '</tr>'+
                /* '<tr>'+
                    '<td><a href="'+hostAdress+'">Startseite</a></td>'+
                '</tr>'+ */
            '</tbody>'+
        '</table>'+
    '</nav>';

    return output;
}