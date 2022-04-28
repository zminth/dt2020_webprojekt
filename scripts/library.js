

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

                '<tr>'+
                    '<td><a href="'+hostAdress+'/dashboard/">Dashboard</a></td>'+
                '</tr>'+

                '<tr>'+
                    '<td><a href="'+hostAdress+'/new_request/">Ticketerstellung</a></td>'+
                '</tr>'+

                '<tr>'+
                    '<td><a href="'+hostAdress+'/management/">Admindashboard</a></td>'+
                '</tr>'+
                /* '<tr>'+
                    '<td><a href="'+hostAdress+'">Startseite</a></td>'+
                '</tr>'+ */
            '</tbody>'+
        '</table>'+
    '</nav>';

    return output;
}



function userMenu() {
	"use strict";

	//variablen
	var output;
	var hostAdress = window.location.origin+"/webprojekt/";

    // Anlegend es Menüs
    output =    '<a href="">Einstellungen</a>'+
                '<a href="../logoff/">Abmelden</a>';

    return output;
}