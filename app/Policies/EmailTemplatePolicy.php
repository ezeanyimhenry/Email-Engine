<?php
namespace App\Policies;

use App\Models\User;
use App\Models\EmailTemplate;
use Illuminate\Auth\Access\HandlesAuthorization;

class EmailTemplatePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return true; // Users can view their own templates
    }

    public function view(User $user, EmailTemplate $emailTemplate)
    {
        return $user->id === $emailTemplate->user_id;
    }

    public function create(User $user)
    {
        return true; // Users can create templates
    }

    public function update(User $user, EmailTemplate $emailTemplate)
    {
        return $user->id === $emailTemplate->user_id;
    }

    public function delete(User $user, EmailTemplate $emailTemplate)
    {
        return $user->id === $emailTemplate->user_id;
    }
}
