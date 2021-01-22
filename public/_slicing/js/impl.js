
$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});


window.addEventListener('popstate', function (event) {
	history.pushState(null, document.title, location.href);
});


//===START ALL COMPONENTS===
$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
});


var Loading = '<center><h3>Loading...</h3><br/><img src="'+WPThemeURL+'/_slicing/img/loading.gif"></center>';

jQuery(document).ready(function($){

	//===set focus for all windows===
	$('.modal').on('shown.bs.modal', function() {
		$('#tt_user_adtask_name').focus();
	})

	//===add task button===
	$(document).on('click', '.tt_keys_addtask', function(){
		$('#tt_user_action_adtask_box').modal();
	});

    //===add user button===
    $(document).on('click', '.tt_keys_admaduser', function(){
        $('#tt_user_action_aduser_box').modal();
    });

	//===LIST USERS ajax button===
	$(document).on('click', '.tt_keys_admusers', function(){
		$('#tt_keys_res').html(Loading);

		$.ajax({
			type: 'POST',
			url:  WPajaxURL+'.admusers',
			data: {},
			success:     function(data, textStatus, XMLHttpRequest) {
				$('#tt_keys_res').html(data);
                $('[data-toggle="tooltip"]').tooltip();
				// var fixHelperModified = function(e, tr) {
					// var $originals = tr.children();
					// var $helper = tr.clone();
					// $helper.children().each(function(index) {
						// $(this).width($originals.eq(index).width())
					// });
					// return $helper;
				// },
				// updateIndex = function(e, ui) {
					// $('td.index', ui.item.parent()).each(function (i) {
						// $(this).html(i+1);
					// });
					// $('input[type=text]', ui.item.parent()).each(function (i) {
						// $(this).val(i + 1);
					// });
				// };

				// $('table .wm_sortable').sortable({
					// helper: fixHelperModified,
					// stop: updateIndex
				// }).disableSelection();

				// $('table .wm_sortable').sortable({
					// distance: 5,
					// delay: 100,
					// opacity: 0.6,
					// cursor: 'move',
					// update: function() {}
				// });

			},
			error: function(MLHttpRequest, textStatus, errorThrown) {
				alert(errorThrown);
			}
		});
	});

	//===add task button===
	$(document).on('click', '#tt_user_adtask_add', function(){
		var taskname  = $('#tt_user_adtask_name').val();
		$('#tt_user_action_adtask_box_content').html(Loading);

		$.ajax({
			type: 'POST',
			url:  WPajaxURL+'.form1',
			data: {taskname: taskname},
			success:     function(data, textStatus, XMLHttpRequest) {
				const obj = JSON.parse(data);
				if(obj.err == 0){
					top.location.reload();
					//window.location = window.location.href++'?eraseCache=true'
				}else{
					$('#tt_user_action_adtask_box_content').html(obj.txt);
				}
			},
			error: function(MLHttpRequest, textStatus, errorThrown) {
				alert(errorThrown);
			}
		});
	});


	$(document).on('click', '#tt_user_action_plantime_close', function(){
		$('.tt_keys_go').click();
		$('#tt_user_action_plantime_close').modal('hide');
	});

	$(document).on('click', '.tt_cell_action_del', function(){
		var userid  = $(this).attr('data-cell-user');
		var dc_date = $(this).attr('data-cell-date');
		var taskid  = $(this).attr('data-cell-taskid');
		$('#tt_user_action_cell_modal_box').html(Loading);

		$.ajax({
			type: 'POST',
			url:  WPajaxURL+'.deltask',
			data: {
					userid:  userid,
					dc_date: dc_date,
					taskid:  taskid,
				  },
			success:     function(data, textStatus, XMLHttpRequest) {
				$('#tt_user_action_cell_modal_box').html(data);
			},
			error: function(MLHttpRequest, textStatus, errorThrown) {
				alert(errorThrown);
			}
		});
	});

	$(document).on('click', '.tt_cell', function(){
		var userid = $(this).attr('data-cell-user');
		var dc_date = $(this).attr('data-cell-date');
		$('#tt_user_action_cell_modal_box').html(Loading);
		$('#tt_user_action_cell_modal').modal();

		$.ajax({
			type: 'POST',
			url:  WPajaxURL+'.cellinfo',
			data: {
					userid:  userid,
					dc_date: dc_date,
				  },
			success:     function(data, textStatus, XMLHttpRequest) {
				$('#tt_user_action_cell_modal_box').html(data);
			},
			error: function(MLHttpRequest, textStatus, errorThrown) {
				alert(errorThrown);
			}
		});
	});

	$(document).on('click', '.tt_keys_go', function(){
		$('#tt_keys_res').html(Loading);
		var fromto = $('.tt_keys_input_daterange').val();

		$.ajax({
			type: 'POST',
			url:  WPajaxURL+'.table',
			data: {fromto:fromto},
			success:     function(data, textStatus, XMLHttpRequest) {
				$('#tt_keys_res').html(data);
				$('#tt_keys_res').tooltip({selector: '[data-toggle="tooltip"]'});
			},
			error: function(MLHttpRequest, textStatus, errorThrown) {
				alert(errorThrown);
			}
		});
	});

	//===click on user===
	$(document).on('click', '.tt_user_action', function(){
		$("#tt_user_action_userid").val($(this).attr('data-userid')).change();
		$('#tt_user_action_modal').modal();
	});


	//===click on key opener form===
	$(document).on('click', '.tt_keys_set', function(){
		$('#tt_user_action_modal').modal();
	});

	//===START PLANNED TIME FOR USER===
	$(document).on('click', '#tt_user_action_plantime_start', function(){
		$('#tt_user_action_modal').modal('hide');
		$('#tt_keys_res').html(Loading);

		var fromto  = $('#tt_user_action_fromto').val();
		var userid  = $('#tt_user_action_userid').val();
		var taskid  = $('#tt_user_action_taskid').val();
		var dayplan = $('#tt_user_action_plantime').val();

		$.ajax({
			type: 'POST',
			url:  WPajaxURL+'.setplan',
			data: {
					stfromto: fromto,
					userid:   userid,
					dayplan:  dayplan,
					taskid:   taskid,
				  },
			success:     function(data, textStatus, XMLHttpRequest) {
				$('#tt_keys_res').html(data);
				$('#tt_keys_res').tooltip({selector: '[data-toggle="tooltip"]'});
			},
			error: function(MLHttpRequest, textStatus, errorThrown) {
				alert(errorThrown);
			}
		});
	});
});
