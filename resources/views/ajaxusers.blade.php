<div class="container">
	<div class="row-md-12 position-relative">
        <a href="#uID" class="fa fa-user-plus tt_keys bg-secondary tt_keys_admaduser"  data-toggle="tooltip"  data-placement="bottom" title="Add user!"></a>
		<table class="table table-hover text-nowrap table-bordered">
			<tr>
				<th scope="col" class="text-left bg-secondary text-white"><i class="fa fa-list-ol" aria-hidden="true" title="Order"></i></th>
				<th scope="col" class="text-left bg-secondary text-white">Full Name</th>
				<th scope="col" class="text-left bg-secondary text-white">E-Mail</th>
				<th scope="col" class="text-left bg-secondary text-white text-danger"></th>
			</tr>
			@forelse ($users as $user)
				<tr class="wm_sortable">
					<td class="text-left text-info cursor-pointer">
						<i class="fa fa-list-ol" aria-hidden="true" data-usr_order="{{ $user->usr_order }}"></i>
					</td>
					<td class="text-left text-info">
                        {{ $user->usr_first_name }}&nbsp;{{ $user->usr_last_name }}&nbsp;<sub class="text-warning">({{ $user->pos_name }})</sub>
					</td>
                    <td class="text-left text-info">
                        {{ $user->usr_email }}
                    </td>
                    <td class="text-center">
                        <a href="#" class="fa fa-pencil-square-o ttadm_editusr cursor-pointer text-danger" aria-hidden="true" data-userid="{{ $user->usr_id }}" data-toggle="tooltip" data-placement="bottom" title="Edit user!"></a>
                    </td>
                    <td class="text-center">
                        <a href="#" class="fa fa-times ttadm_delusr cursor-pointer text-danger" aria-hidden="true" data-userid="{{ $user->usr_id }}" data-toggle="tooltip" data-placement="bottom" title="Delete user!"></a>
                    </td>
				</tr>
			@empty
				<tr><td colspan="4">No Users</td></tr>
			@endforelse
		</table>
	</div>
</div>
