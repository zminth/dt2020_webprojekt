

function createMenu() {
	"use strict";

	//variablen
	var output;
	var hostAdress = window.location.origin+"/webprojekt/";

    // Anlegend es Menüs
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