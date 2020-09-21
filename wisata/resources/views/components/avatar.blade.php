<div class="nav-profile-image">

	@if(Auth::user()->foto != null)
	<img src="{{ url('uploads/profile/' . Auth::user()->foto) }}" alt="profile">
	@else
	<img src="{{ asset('dist/purple/assets/images/default-avatar.png') }}" alt="profile">
	@endif

	<span class="login-status online"></span>
</div>
