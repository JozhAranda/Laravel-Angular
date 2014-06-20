<?php

class CommentTableSeeder extends Seeder 
{

	public function run()
	{
		DB::table('comments')->delete();

		Comment::create(array(
			'author' => 'Chris Sevilleja',
			'text' => 'Look I am a test comment.',
			'indent' => 1
		));

		Comment::create(array(
			'author' => 'Joshua Aranda',
			'text' => 'Probando una respuesta',
			'indent' => 2
		));

		Comment::create(array(
			'author' => 'Nick Cerminara',
			'text' => 'This is going to be super crazy.',
			'indent' => 1
		));

		Comment::create(array(
			'author' => 'Holly Lloyd',
			'text' => 'I am a master of Laravel and Angular.',
			'indent' => 1
		));

		Comment::create(array(
			'author' => 'Joshua Aranda',
			'text' => 'Probando una respuesta',
			'indent' => 2
		));
	}

}