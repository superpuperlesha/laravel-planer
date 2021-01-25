<h6 class="w-100">First name</h6>
<input id="tt_admin_adituser_fname"     name="tt_admin_adituser_fname" type="text"  value="{{ $user->usr_first_name }}" class="tt_keys_input w-100">
<h6 class="w-100">Last name</h6>
<input id="tt_admin_adituser_lname"     name="tt_admin_adituser_lname" type="text"  value="{{ $user->usr_last_name }}"  class="tt_keys_input w-100">
<h6 class="w-100">E-Mail</h6>
<input id="tt_admin_adituser_email"     name="tt_admin_adituser_email" type="email" value="{{ $user->usr_email }}"      class="tt_keys_input w-100">
<h6 class="w-100">Position</h6>
<select id="tt_admin_adituser_position" name="tt_admin_adituser_position" class="tt_keys_input w-100">
    @foreach ($positions as $position)
        <option value="{{ $position->pos_id }}" <?php echo($user->usr_pos_id == $position->pos_id ?'selected' :'') ?>>{{ $position->pos_name }}</option>
    @endforeach
</select>
<input type="hidden" name="tt_admin_adituser_id" id="tt_admin_adituser_id" value="{{ $user->usr_id }}">
