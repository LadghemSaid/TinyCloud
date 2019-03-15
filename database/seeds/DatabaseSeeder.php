<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // Les utilisateurs

        DB::table('users')->insert([
            'name' => "utilisateur1",
            'email' => 'utilisateur1@gmail.com',
            'password' => bcrypt('azerty'),
        ]);


        DB::table('users')->insert([
            'name' => "utilisateur2",
            'email' => 'utilisateur2@gmail.com',
            'password' => bcrypt('azerty'),
        ]);


        // Les chansons
        DB::table('chanson')->insert([
            'nom' => "La chanson 1",
            'fichier' => "http://www.hochmuth.com/mp3/Haydn_Cello_Concerto_D-1.mp3",
            "style" => "classique",
            "utilisateur_id" => 1
        ]);

        DB::table('chanson')->insert([
            'nom' => "La chanson 2",
            'fichier' => "https://d1490khl9dq1ow.cloudfront.net/music/mp3preview/rock-and-roll-meets-metal_Gk4CsEEd.mp3",
            "style" => "rock",
            "utilisateur_id" => 1
        ]);
        DB::table('chanson')->insert([
            'nom' => "La chanson 3",
            'fichier' => "http://www.hochmuth.com/mp3/Haydn_Cello_Concerto_D-1.mp3",
            "style" => "classique",
            "utilisateur_id" => 2
        ]);


        // Les suiveurs
        DB::table('suit')->insert([
            'suiveur_id' => 1,
            'suivi_id' => 2,
        ]);

        //Playlist seed
        
        DB::table('roles')->insert([
 
            ['name' => 'role1'],
            ['name' => 'role2'],
 
        ]);
 
 
        DB::table('tags')->insert([
 
            ['name' => 'tag1'],
            ['name' => 'tag2'],
            ['name' => 'tag3'],
 
        ]);
 
        DB::table('role_user')->insert([
 
            ['user_id' => 1, 'role_id' => 1],
            ['user_id' => 1, 'role_id' => 2],
            ['user_id' => 2, 'role_id' => 1],
            ['user_id' => 3, 'role_id' => 2],
 
        ]);
 
        DB::table('role_user_tag')->insert([
 
            ['role_user_id' => 1, 'tag_id' => 1],
            ['role_user_id' => 1, 'tag_id' => 2],
            ['role_user_id' => 2, 'tag_id' => 2],
            ['role_user_id' => 2, 'tag_id' => 3],
            ['role_user_id' => 3, 'tag_id' => 1],
            ['role_user_id' => 3, 'tag_id' => 2],
            ['role_user_id' => 4, 'tag_id' => 1],
            ['role_user_id' => 4, 'tag_id' => 2],
            ['role_user_id' => 4, 'tag_id' => 3],
             
        ]);

    }
}


/*A->B->D
A->B->E
A->C->F
A->C->G
*/