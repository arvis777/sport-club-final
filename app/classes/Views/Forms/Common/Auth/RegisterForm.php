<?php

namespace App\Views\Forms\Common\Auth;

use Core\Views\Form;

class RegisterForm extends Form
{
    public function __construct()
    {
        parent::__construct([
            'fields' => [
                'name' => [
                    'label' => 'Name',
                    'type' => 'text',
                    'validators' => [
                        'validate_field_not_empty',
                        'validate_no_special_chars',
                        'validate_number_of_symbols' => [
                            'max' => 40
                        ]
                    ],
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Enter your name',
                        ]
                    ]
                ],
                'surname' => [
                    'label' => 'Surname',
                    'type' => 'text',
                    'validators' => [
                        'validate_field_not_empty',
                        'validate_no_special_chars',
                        'validate_number_of_symbols' => [
                            'max' => 40
                        ]
                    ],
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Enter your surname',
                        ]
                    ]
                ],
                'email' => [
                    'label' => 'Email',
                    'type' => 'text',
                    'validators' => [
                        'validate_field_not_empty',
                        'validate_email',
                        'validate_user_unique'
                    ],
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Enter email',
                        ]
                    ]
                ],
                'password' => [
                    'label' => 'Password',
                    'type' => 'password',
                    'validators' => [
                        'validate_field_not_empty',
                    ],
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Enter password',
                         ]
                    ]
                ],
                'password_repeat' => [
                    'label' => 'Password Repeat',
                    'type' => 'password',
                    'validators' => [
                        'validate_field_not_empty',
                    ],
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Repeat password',
                        ]
                    ]
                ],
                'telephone' => [
                    'label' => 'Telephone number',
                    'type' => 'text',
                    'extra' => [
                        'attr' => [
                            'placeholder' => '370 xxx xxx',
                        ]
                    ]
                ],
                'address' => [
                    'label' => 'Address',
                    'type' => 'text',
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Enter your address',
                        ]
                    ]
                ],
            ],
            'buttons' => [
                'register' => [
                    'title' => 'Register',
                ]
            ],
            'validators' => [
                'validate_fields_match' => [
                    'password',
                    'password_repeat'
                ]
            ]
        ]
    );

    }
}