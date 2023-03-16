<?php

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $role = Role::factory([
            'name' => 'admin'
        ])->create();

        User::factory([
            'email' => config('roles.admin'),
            'role_id' => $role
        ])->create();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Role::where('name', 'admin')->delete();
        User::where('role_id', 1)->delete();
    }
};
