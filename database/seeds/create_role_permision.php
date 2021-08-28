<?php

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class create_role_permision extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = Role::create([
            'name' => 'user',
            'display_name' => 'user', // optional
            'description' => 'User is the normal person', // optional
        ]);

        $admin = Role::create([
            'name' => 'admin',
            'display_name' => 'User Administrator', // optional
            'description' => 'User is allowed to manage and edit other users', // optional
        ]);
        $createPost = Permission::create([
            'name' => 'create-post',
            'display_name' => 'Create Posts', // optional
            'description' => 'create new blog posts', // optional
            ]);

            $editUser = Permission::create([
            'name' => 'edit-user',
            'display_name' => 'Edit Users', // optional
            'description' => 'edit existing users', // optional
            ]);
            $admin->attachPermission($createPost); // parameter can be a Permission object, array or id
    }
}
