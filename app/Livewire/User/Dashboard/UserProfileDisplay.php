<?php

namespace App\Livewire\User\Dashboard;

use App\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class UserProfileDisplay extends Component
{
    public User | null $user;

    public function render()
    {
        $this->user = Auth::user();

        return view('livewire.user.dashboard.user-profile-display');
    }
}
