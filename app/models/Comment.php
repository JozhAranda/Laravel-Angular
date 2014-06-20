<?php

class Comment extends Eloquent {

	protected $fillable = array('author', 'text', 'indent');	

	protected $softDelete = true;
    
    protected $table = 'comments';
}
