<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Category;
use App\Tag;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category1 = Category::create([
            'name' => 'News'
        ]);

        $category2 = Category::create([
            'name' => 'Marketing'
        ]);

        $category3 = Category::create([
            'name' => 'Partnership'
        ]);

        $author1 = App\User::create([
            'name' => 'John Doe',
            'email' => 'john@doe.com',
            'password' => Hash::make('123456')
        ]);

        $author2 = App\User::create([
            'name' => 'Jane Doe',
            'email' => 'jane@doe.com',
            'password' => Hash::make('123456')
        ]);

        $post1 = Post::create([
            'title' => 'Dummy title',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus vel fugiat aliquid veniam ratione velit!',
            'content' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Beatae consequatur quas quos labore quo voluptate?',
            'category_id' => $category1->id,
            'image' => 'posts/6.jpg',
            'user_id' => $author1->id
        ]);

        $post2 = $author2->posts()->create([
            'title' => 'Lorem, ipsum dolor.',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus vel fugiat aliquid veniam ratione velit!',
            'content' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Beatae consequatur quas quos labore quo voluptate?',
            'category_id' => $category2->id,
            'image' => 'posts/7.jpg'
        ]);

        $post3 = $author1->posts()->create([
            'title' => 'Lorem ipsum dolor sit.',
            'description' => ' Lorem ipsum dolor sit amet consectetur adipisici ng elit. Temporibus vel fugiat aliquid veniam  ratione velit!',
            'content' => 'Lorem ipsum, dolor sit amet consectet ur adipisicing elit. Beatae consequatur quas  q uos labore quo v oluptate?',
            'category_id' => $category3->id,
            'image' => 'posts/8.jpg'
        ]);

        $post4 = $author2->posts()->create([
            'title' => 'Lorem ipsum dolor sit amet.',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus vel fugiat aliquid veniam ratione velit!',
            'content' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Beatae consequatur quas quos labore quo voluptate?',
            'category_id' => $category2->id,
            'image' => 'posts/9.jpg'
        ]);

        $tag1 = Tag::create([
            'name' => 'job'
        ]);

        $tag2 = Tag::create([
            'name' => 'customers'
        ]);

        $tag3 = Tag::create([
            'name' => 'record'
        ]);

        $post1->tags()->attach([$tag1->id, $tag2->id]);
        $post2->tags()->attach([$tag3->id, $tag2->id]);
        $post3->tags()->attach([$tag1->id, $tag3->id]);
    }
}