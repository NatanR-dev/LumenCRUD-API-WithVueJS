<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $notes = [
            [
                'id' => null,
                'title' => "LoremIpsum0",
                'content' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ultrices fringilla massa nec dignissim. Duis magna enim, dapibus non vehicula pulvinar, euismod vel sem. Maecenas sit amet varius ex. Nullam rhoncus, erat maximus porttitor ullamcorper, risus augue imperdiet dui, quis laoreet felis lectus vitae leo. Praesent massa neque, sollicitudin hendrerit orci quis, mollis mattis est. Mauris id libero enim. Vestibulum in nunc tellus. Morbi sem ante, suscipit quis orci quis, blandit tincidunt leo. Phasellus egestas maximus elit, vitae convallis erat volutpat sed. Nulla at justo nulla. Praesent vehicula semper urna id dictum. Fusce vitae felis tempus, lacinia ex ac, dictum dui. Suspendisse orci neque, dictum vitae arcu ut, faucibus vestibulum quam. Nullam rutrum libero sed auctor varius. Ut eu est tincidunt, maximus odio eget, interdum metus."
            ],
            [
                'id' => null,
                'title' => "LoremIpsum1",
                'content' => "Etiam pharetra venenatis lectus at volutpat. Fusce volutpat nibh nec aliquam ultricies. Proin pellentesque massa vitae neque venenatis, ac ornare libero sagittis. Sed eleifend odio sed risus laoreet tincidunt. Praesent nisi urna, luctus in dictum vitae, ultricies vitae leo. Mauris tincidunt, augue ac cursus molestie, elit ipsum laoreet erat, mollis aliquet metus nibh eu nibh. Aliquam vel vulputate ante. Sed porttitor velit libero, et imperdiet felis venenatis tempus. Mauris ligula mi, ultrices eu venenatis sit amet, viverra sit amet massa. Sed bibendum feugiat nisl cursus venenatis. Pellentesque faucibus porttitor volutpat. Aenean tincidunt bibendum placerat. Donec in nulla vitae nunc facilisis vestibulum. Aenean placerat dictum pharetra."
            ],
            [
                'id' => null,
                'title' => "LoremIpsum2",
                'content' => "Morbi scelerisque varius rhoncus. Nunc pulvinar, odio ac consequat tempus, lorem neque iaculis velit, ut molestie enim libero nec massa. Mauris malesuada porttitor metus, non iaculis ipsum posuere lobortis. Praesent eget elementum felis, nec accumsan orci. Pellentesque ut efficitur libero. In vel mattis neque. Proin mattis ex massa, ut cursus nisl vestibulum lobortis. Maecenas id sem interdum, ullamcorper tortor ut, condimentum orci. Duis malesuada eu mauris nec dignissim. Suspendisse elementum, mauris eget tempor maximus, dui diam iaculis quam, in egestas urna leo a nunc. Nulla accumsan eget elit et molestie. Donec at venenatis ligula. Vestibulum eget fermentum mauris, eget eleifend metus. Donec at purus varius, volutpat nisi et, fringilla libero. Vivamus tempus sodales nisi ac tincidunt. Vivamus eleifend nisl eu nisi bibendum sagittis."
            ]
        ];

        DB::table('notes')->insert($notes);
    }
}
