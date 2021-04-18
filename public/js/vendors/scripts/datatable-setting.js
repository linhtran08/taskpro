
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
		responsive: {
			details: {
				type: 'column',
				target: 'tr'
			}
		},
		order: [],
		columnDefs: [{
			targets: "datatable-nosort",
			orderable: false,
		},
		{
			targets: 2,
			createdCell: function (td, cellData, rowData, row, col) {
				if(cellData == 'open') {
					$(td).html("<span class='d-block h-15 w-10 p-2 rounded-circle bg-blue-400' data-toggle='tooltip' data-placement='right' title='"+cellData+"'></span>");
				}
				if(cellData == 'in processing') {
					$(td).html("<span class='d-block h-15 w-10 p-2 rounded-circle bg-blue-600' data-toggle='tooltip' data-placement='right' title='"+cellData+"'></span>");
				}
				if(cellData == 'pending') {
					$(td).html("<span class='d-block h-15 w-10 p-2 rounded-circle bg-yellow-500' data-toggle='tooltip' data-placement='right' title='"+cellData+"'></span>");
				}
				if(cellData == 'canceled') {
					$(td).html("<span class='d-block h-15 w-10 p-2 rounded-circle bg-red-400' data-toggle='tooltip' data-placement='right' title='"+cellData+"'></span>");
				}
				if(cellData == 'finished') {
					$(td).html("<span class='d-block h-15 w-10 p-2 rounded-circle bg-green-500' data-toggle='tooltip' data-placement='right' title='"+cellData+"'></span>");
				}

			}
		},
		{
			targets: 4,
			createdCell: function (td, cellData, rowData, row, col) {
				if(cellData == 'register') {
					$(td).html("<div class='progress mx-2' data-toggle='tooltip' data-placement='left' title='"+cellData+"'>" +
						"<div class='progress-bar progress-bar-striped progress-bar-animated  bg-blue-400 w-15' role='progressbar' " +
						" aria-valuenow='0' aria-valuemin='0' aria-valuemax='100'>" +
						"</div>" +
						"</div>");
				}
				if(cellData == 'confirmation') {
					$(td).html("<div class='progress mx-2' data-toggle='tooltip' data-placement='left' title='"+cellData+"'>" +
						"<div class='progress-bar progress-bar-striped progress-bar-animated  bg-blue-700 w-30' role='progressbar' " +
						" aria-valuenow='0' aria-valuemin='0' aria-valuemax='100'>" +
						"</div>" +
						"</div>");				}
				if(cellData == 'implementation') {
					$(td).html("<div class='progress mx-2' data-toggle='tooltip' data-placement='left' title='"+cellData+"'>" +
						"<div class='progress-bar progress-bar-striped progress-bar-animated  bg-yellow-500 w-45' role='progressbar' " +
						" aria-valuenow='0' aria-valuemin='0' aria-valuemax='100'>" +
						"</div>" +
						"</div>");				}
				if(cellData == 'test') {
					$(td).html("<div class='progress mx-2' data-toggle='tooltip' data-placement='left' title='"+cellData+"'>" +
						"<div class='progress-bar progress-bar-striped progress-bar-animated  bg-orange w-60' role='progressbar' " +
						" aria-valuenow='0' aria-valuemin='0' aria-valuemax='100'>" +
						"</div>" +
						"</div>");				}
				if(cellData == 'deploy production') {
					$(td).html("<div class='progress mx-2' data-toggle='tooltip' data-placement='left' title='"+cellData+"'>" +
						"<div class='progress-bar progress-bar-striped progress-bar-animated bg-purple-500 w-75' role='progressbar' " +
						" aria-valuenow='0' aria-valuemin='0' aria-valuemax='100'>" +
						"</div>" +
						"</div>");				}
				if(cellData == 'finish') {
					$(td).html("<div class='progress mx-2' data-toggle='tooltip' data-placement='left' title='"+cellData+"'>" +
						"<div class='progress-bar progress-bar-striped progress-bar-animated  bg-green-400 w-100' role='progressbar' " +
						" aria-valuenow='0' aria-valuemin='0' aria-valuemax='100'>" +
						"</div>" +
						"</div>");				}

			}
		}
		],
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
				var select = $('<select class="sl sl'+column.index()+' custom-select small"><option value="">Show All</option></select>')
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

	$('#reset-filter').click(function (){
		$('#min,#max').val('');
		table.search( '' )
			.columns().search( '' )
			.draw();
	});
});
