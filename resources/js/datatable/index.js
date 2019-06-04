import * as $ from 'jquery';
import 'datatables.net';

export default (function () {
    var d_table = $('#dataTable').DataTable({
        language: {
            // 'url' : 'https://cdn.datatables.net/plug-ins/1.10.16/i18n/French.json'
            // More languages : http://www.datatables.net/plug-ins/i18n/
        },
        aaSorting: []
    });
}());
