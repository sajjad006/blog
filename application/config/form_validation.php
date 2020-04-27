<?php

$config= array(
		'addArticle' => array(
			array(
				'field' => 'title',
                'label' => 'Article Title',
                'rules' => 'required|trim'
			),
			array(
				'field' => 'body',
                'label' => 'Article Body',
                'rules' => 'required|trim'
			)
		)
);