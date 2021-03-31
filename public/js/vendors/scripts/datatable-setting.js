
var minDate, maxDate, col;
$.fn.dataTable.ext.search.push(
	function( settings, data, dataIndex ) {
		var date = new Date( data[7] );

		var min = ($('#min').val() == '') ? null : minDate.val();
		var max = ($('#max').val() == '') ? null : maxDate.val();

		if (
			( min === null && max === null ) ||
			( min === null && date <= max ) ||
			( min <= date   && max === null ) ||
			( min <= date   && date <= max )
		) {
			return true;
		}
		return false;
	}
);

$('document').ready(function(){
	// Create date inputs
	col = 2;
	minDate = new DateTime($('#min'), {
		format: 'MMMM Do YYYY'
	});
	maxDate = new DateTime($('#max'), {
		format: 'MMMM Do YYYY'
	});

	var table = $('.data-table').DataTable({
		scrollCollapse: true,
		autoWidth: false,
		responsive: true,
		columnDefs: [{
			targets: "datatable-nosort",
			orderable: false,
		}],
		"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
		"language": {
			"info": "_START_-_END_ of _TOTAL_ entries",
			searchPlaceholder: "Search",
			paginate: {
				next: '<i class="ion-chevron-right"></i>',
				previous: '<i class="ion-chevron-left"></i>'
			}
		},

		initComplete: function () {
			this.api().columns([1,2,3,5,6]).every( function () {
				var column = this;
				var select = $('<select class="sl'+column.index()+' custom-select small"><option value="">Show All</option></select>')
					.appendTo( $(column.footer()).empty() )
					.on( 'change', function () {
						var val = $.fn.dataTable.util.escapeRegex(
							$(this).val()
						);

						column
							.search( val ? '^'+val+'$' : '', true, false )
							.draw();
					} );
				column.data().unique().sort().each( function ( d , j) {
					select.append( '<option value="'+d+'">'+d+'</option>' );
				} );
			} );
		}
	});

	$('#min, #max').on('change', function () {
		table.draw();
	});
});
