<form method="POST" action="{{ route('user-profile-information.update') }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">{{ __('Name') }}</label>
        <input type="text" name="name" class="form-control" value="{{ old('name') ?? auth()->user()->name }}" required autofocus autocomplete="name" />
    </div>

    <div class="mb-3">
        <label class="form-label">{{ __('Email') }}</label>
        <input type="email" name="email" class="form-control" value="{{ old('email') ?? auth()->user()->email }}" required autofocus />
    </div>

    <div class="mt-4">
        <button type="submit" class="btn btn-primary ">
            {{ __('Update Profile') }}
        </button>
    </div>
</form>

<hr>
