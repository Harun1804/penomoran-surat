<?php

namespace App\Http\Livewire;

use App\Models\User as ModelUser;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class User extends Component
{
    public $username,$email,$password,$cpassword,$role,$selectedID;
    public $form = false;
    public $editMode = false;

    protected $listeners = ["destroy"];

    protected $rules = [
        'username' => 'required|min:6|unique:users,username',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6|same:cpassword',
        'cpassword' => 'required|min:6|same:password',
        'role' => 'required|in:admin,staff',
    ];

    public function render()
    {
        $users = ModelUser::orderBy('created_at','desc')->get();
        return view('livewire.user.index',compact('users'));
    }

    public function resetInput()
    {
        $this->username = null;
        $this->email = null;
        $this->password = null;
        $this->cpassword = null;
        $this->role = null;
    }

    public function create()
    {
        $this->form = true;
    }

    public function store()
    {
        $this->validate();

        ModelUser::create([
            'username' => $this->username,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'role' => $this->role,
        ]);

        $this->form = false;
        $this->resetInput();
        session()->flash('success','User Telah Dibuat');
    }

    public function edit($id)
    {
        $user = ModelUser::findOrFail($id);
        $this->username = $user->username;
        $this->email = $user->email;
        $this->role = $user->role;
        $this->selectedID = $user->id;
        $this->form = true;
        $this->editMode = true;
    }

    public function update()
    {
        $user = ModelUser::findOrFail($this->selectedID);
        if ($this->password != null) {
            $user->update([
                'username' => $this->username,
                'email' => $this->email,
                'password' => Hash::make($this->password),
                'role' => $this->role,
            ]);
        } else {
            $user->update([
                'username' => $this->username,
                'email' => $this->email,
                'role' => $this->role,
            ]);
        }
        
        $this->editMode = false;
        $this->form = false;
        $this->resetInput();
        session()->flash('success','User Telah Diperbaharui');
    }

    public function deleteConfirm($id)
    {
        $this->dispatchBrowserEvent('swal:confirm',[
            'type' => 'warning',
            'title'=> 'Apakah Kamu Yakin?',
            'text'=> '',
            'id'=>$id
        ]);
    }

    public function destroy($id)
    {
        ModelUser::destroy($id);
        session()->flash('success','User Telah Dihapus');
    }
}
