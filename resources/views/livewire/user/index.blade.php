<div class="row">
    @if (session('success'))
        <div class="col-md-12">
            <div class="alert alert-success">{{ session('success') }}</div>
        </div>
    @endif
    @if ($form)
        <div class="col-md-12">
            @if ($editMode)
                @include('livewire.user.edit')
            @else
                @include('livewire.user.create')
            @endif
        </div>
    @endif
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    Kelola User
                    <div class="float-right">
                        <button class="btn btn-primary" wire:click="create">Tambah User</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-head-bg-info table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Action</th>
                                <th scope="col">Username</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <button class="btn btn-warning" wire:click="edit({{ $user->id }})">Edit</button>
                                        | <button class="btn btn-danger delete" wire:click="deleteConfirm({{ $user->id }})">Delete</button>
                                    </td>
                                    <td>{{ $user->username }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="null-data" colspan="3">Belum Ada Data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
