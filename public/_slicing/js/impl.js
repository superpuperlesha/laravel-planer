//===START ALL COMPONENTS===
$('[data-toggle="tooltip"]').tooltip();


function dragit(secector, sorttype){
    var dragSrcEl = null;
    var sorttype = sorttype;

    function handleDragStart(e) {
        dragSrcEl = this;
        e.dataTransfer.effectAllowed = 'move';
        e.dataTransfer.setData('text/html', this.innerHTML);
    }

    function handleDragOver(e) {
        if (e.preventDefault) {
            e.preventDefault();
        }
        e.dataTransfer.dropEffect = 'move';
        return false;
    }

    function handleDragEnter(e) {
        this.classList.add('over');
    }

    function handleDragLeave(e) {
        this.classList.remove('over');
    }

    function handleDrop(e) {
        if (e.stopPropagation) {
            e.stopPropagation();
        }
        if (dragSrcEl != this) {
            dragSrcEl.innerHTML = this.innerHTML;
            this.innerHTML = e.dataTransfer.getData('text/html');
        }
        if(sorttype='sortusers'){
            sortusers();
        }
        return false;
    }

    function handleDragEnd(e) {
        items.forEach(function (item) {
            item.classList.remove('over');
        });
    }

    let items = document.querySelectorAll(secector);
    items.forEach(function(item) {
        item.addEventListener('dragstart', handleDragStart, false);
        item.addEventListener('dragenter', handleDragEnter, false);
        item.addEventListener('dragover',  handleDragOver,  false);
        item.addEventListener('dragleave', handleDragLeave, false);
        item.addEventListener('drop',      handleDrop,      false);
        item.addEventListener('dragend',   handleDragEnd,   false);
    });
};


    $(document).on('click', '.tt_freecell', function(){
        let userid = $(this).attr('data-cell-user');
        let dc_date = new Date();
        dc_date = new Date((parseInt($(this).attr('data-cell-date')) * 1000) + (dc_date.getTimezoneOffset()*60*1000) );
        dc_date = dc_date.getDate()+'.'+(dc_date.getMonth()+1)+'.'+dc_date.getFullYear();
        dc_date = dc_date+'-'+dc_date;

        $('.tt_keys_set').click();
        $('#tt_user_action_userid').val(userid);
        $('#tt_user_action_fromto').val(dc_date);
    });

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

	//===click on user===
	$(document).on('click', '.tt_user_action', function(){
		$("#tt_user_action_userid").val($(this).attr('data-userid')).change();
		$('#tt_user_action_modal').modal();
	});

	//===click on key opener form===
	$(document).on('click', '.tt_keys_set', function(){
		$('#tt_user_action_modal').modal();
	});
