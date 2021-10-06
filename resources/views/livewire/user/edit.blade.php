<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Edit User</div>
            </div>
            <div class="card-body">
                <form wire:submit.prevent="update" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Masukan Username" wire:model="username" value="{{ old('username',$username) }}">
                                @error('username')
                                    <small id="username" class="form-text text-muted text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Masukan Email" wire:model="email" value="{{ old('email',$email) }}">
                                @error('email')
                                    <small id="email" class="form-text text-muted text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Masukan Password" wire:model="password">
                                @error('password')
                                    <small id="password" class="form-text text-muted text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cpassword">Ulangi Password</label>
                                <input type="password" class="form-control @error('cpassword') is-invalid @enderror" id="cpassword" placeholder="Ulangi Password" wire:model="cpassword">
                                @error('cpassword')
                                    <small id="cpassword" class="form-text text-muted text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-check">
                                <label>Role</label><br>
                                <label class="form-radio-label">
                                    <input class="form-radio-input" type="radio" name="role" value="admin" wire:model="role" @if ($role == "admin") checked @endif>
                                    <span class="form-radio-sign">Admin</span>
                                </label>
                                <label class="form-radio-label ml-3">
                                    <input class="form-radio-input" type="radio" name="role" value="staff" wire:model="role" @if ($role == "staff") checked @endif>
                                    <span class="form-radio-sign">Staff</span>
                                </label>
                                @error('role')
                                    <small id="role" class="form-text text-muted text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <button class="btn btn-warning" type="submit">Ubah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>