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
        $role = Role::factory()->create([
            'name' => 'admin'
        ]);

        User::factory()->create([
            'email' => config('roles.admin'),
            'role_id' => $role
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        User::where('email', config('roles.admin'))->delete();
        Role::where('name', 'admin')->delete();
    }
};
