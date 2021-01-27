<div class="container">
	<div class="row-md-12 position-relative">
        <a href="#uID" class="fa fa-user-plus tt_keys bg-secondary tt_keys_admaduser"  data-toggle="tooltip"  data-placement="bottom" title="Add user!"></a>
		<table class="table table-hover text-nowrap table-bordered">
			<tr>
				<th scope="col" class="text-center bg-secondary"></th>
				<th scope="col" class="text-left bg-secondary text-white">Full Name</th>
				<th scope="col" class="text-left bg-secondary text-white">E-Mail</th>
                <th scope="col" class="text-left bg-secondary"></th>
                <th scope="col" class="text-left bg-secondary"></th>
			</tr>
			<tbody id="admUsersBox">
				@forelse ($users as $user)
					<tr class="wm_sortable">
						<td class="text-left text-center wm_sortable_item" data-usr_order="{{ $user->usr_id }}">
							<i class="fa fa-list-ol" aria-hidden="true"></i>
						</td>
						<td class="text-left text-info">
							{{ $user->usr_first_name }}&nbsp;{{ $user->usr_last_name }}&nbsp;<sub class="text-warning">({{ $user->pos_name }})</sub>
						</td>
						<td class="text-left text-info">
							{{ $user->usr_email }}
						</td>
						<td class="text-center">
							<i class="fa fa-pencil-square-o cursor-pointer text-danger ttadm_editusr" aria-hidden="true" data-userid="{{ $user->usr_id }}" data-toggle="tooltip" data-placement="bottom" title="Edit user!"></i>
						</td>
						<td class="text-center">
							<i class="fa fa-times cursor-pointer text-danger ttadm_delusr" aria-hidden="true" data-userid="{{ $user->usr_id }}" data-toggle="tooltip" data-placement="bottom" title="Delete user!"></i>
						</td>
					</tr>
				@empty
					<tr><td colspan="5">No Users</td></tr>
				@endforelse
			</tbody>
		</table>
	</div>
</div>
