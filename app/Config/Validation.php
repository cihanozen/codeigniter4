<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------

    public $userRules = [

        'email' => [
            'rules'     => 'required|valid_email|is_not_unique[users.email]',
            'errors'    => [
                'required' => 'Email boş bırakılamaz!',
                'valid_email' => 'Geçerli bir mail adresi yazmadınız!',
                'is_not_unique' => 'Bu mail adresi kayıtlı değil!'
            ]
        ],
        'password' => [
            'rules'     => 'required',
            'errors'    => [
                'required' => 'Şifre boş bırakılamaz!'
            ]
        ]

    ];

}
