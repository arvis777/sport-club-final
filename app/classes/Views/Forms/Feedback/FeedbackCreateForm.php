<?php


namespace App\Views\Forms\Feedback;


class FeedbackCreateForm extends FeedbackBaseForm
{
    public function __construct() {
        parent::__construct();

        $this->data['attr']['id'] = 'feedback-create-form';
        $this->data['buttons']['create'] = [
            'title' => 'Add',
        ];
    }
}