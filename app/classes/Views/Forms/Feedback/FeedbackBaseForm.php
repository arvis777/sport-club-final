<?php


namespace App\Views\Forms\Feedback;


use Core\Views\Form;

class FeedbackBaseForm extends Form
{
    public function __construct() {
        parent::__construct([
            'fields' => [
                'comment' => [
                    'label' => 'Comment',
                    'type' => 'textarea',
                    'validators' => [
                        'validate_field_not_empty'
                    ],
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Enter your comments here',
                        ],
                    ],
                ],
            ],
            // No buttons since they will be defined in Extends
        ]);
    }
}