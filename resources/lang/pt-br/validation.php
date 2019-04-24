<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => ':attribute precisa ser aceito.',
    'active_url'           => ':attribute infelizmente não é uma URL válida.',
    'after'                => ':attribute precisa ser uma data depois de :date.',
    'after_or_equal'       => ':attribute precisa ser uma data posterior ou igual a :date.',
    'alpha'                => ':attribute deve conter somente letras.',
    'alpha_dash'           => ':attribute deve conter letras, números e traços.',
    'alpha_num'            => ':attribute deve conter somente letras e números.',
    'array'                => ':attribute precisa ser um array.',
    'before'               => ':attribute precisa ser uma data antes de :date.',
    'before_or_equal'      => ':attribute precisa ser uma data anterior ou igual a :date.',
    'between'              => [
        'numeric' => 'Ops, :attribute deve estar entre :min e :max.',
        'file'    => 'Ops, :attribute deve estar entre :min e :max kilobytes.',
        'string'  => 'Ops, :attribute deve estar entre :min e :max caracteres.',
        'array'   => 'Ops, :attribute precisa ter entre :min e :max itens.',
    ],
    'boolean'              => ':attribute precisa ser verdadeiro ou falso.',
    'confirmed'            => 'A confirmação de senha não confere.',
    'date'                 => ':attribute infelizmente não é uma data válida.',
    'date_format'          => ':attribute infelizmente não confere com o formato :format.',
    'different'            => ':attribute e :other devem ser diferentes.',
    'digits'               => ':attribute precisa ter :digits dígitos.',
    'digits_between'       => ':attribute precisa ter entre :min e :max dígitos.',
    'dimensions'           => ':attribute tem dimensões de imagem inválidas.',
    'distinct'             => ':attribute tem um valor duplicado.',
    'email'                => ':attribute precisa ser um endereço de e-mail válido.',
    'exists'               => ':attribute selecionado é inválido.',
    'file'                 => ':attribute precisa ser um arquivo.',
    'filled'               => ':attribute é um campo requerido.',
    'image'                => ':attribute precisa ser uma imagem.',
    'in'                   => ':attribute é inválido.',
    'in_array'             => ':attribute não existe em :other.',
    'integer'              => ':attribute precisa ser um inteiro.',
    'ip'                   => ':attribute precisa ser um endereço IP válido.',
    'json'                 => ':attribute precisa ser um JSON válido.',
    'max'                  => [
        'numeric' => 'Ops, :attribute não precisa ser maior que :max.',
        'file'    => 'Ops, :attribute não precisa ter mais que :max kilobytes.',
        'string'  => 'Ops, :attribute não precisa ter mais que :max caracteres.',
        'array'   => 'Ops, :attribute não precisa ter mais que :max itens.',
    ],
    'mimes'                => ':attribute precisa ser um arquivo do tipo: :values.',
    'mimetypes'            => ':attribute precisa ser um arquivo do tipo: :values.',
    'min'                  => [
        'numeric' => ':attribute precisa ser no mínimo :min.',
        'file'    => ':attribute precisa ter no mínimo :min kilobytes.',
        'string'  => ':attribute precisa ter no mínimo :min caracteres.',
        'array'   => ':attribute precisa ter no mínimo :min itens.',
    ],
    'not_in'               => 'O :attribute selecionado é inválido.',
    'numeric'              => ':attribute precisa ser um número.',
    'present'              => 'O campo :attribute precisa ser presente.',
    'regex'                => 'O formato de :attribute é inválido.',
    'required'             => 'O campo :attribute precisa ser informado.',
    'required_if'          => 'O campo :attribute precisa ser informado quando :other é :value.',
    'required_unless'      => 'O :attribute é necessário a menos que :other esteja em :values.',
    'required_with'        => 'O campo :attribute precisa ser informado quando :values está presente.',
    'required_with_all'    => 'O campo :attribute precisa ser informado quando :values estão presentes.',
    'required_without'     => 'O campo :attribute precisa ser informado quando :values não está presente.',
    'required_without_all' => 'O campo :attribute precisa ser informado quando nenhum destes estão presentes: :values.',
    'same'                 => ':attribute e :other devem ser iguais.',
    'size'                 => [
        'numeric' => 'Ops, :attribute precisa ser :size.',
        'file'    => 'Ops, :attribute precisa ter :size kilobytes.',
        'string'  => 'Ops, :attribute precisa ter :size caracteres.',
        'array'   => 'Ops, :attribute deve conter :size itens.',
    ],
    'string'               => 'Ops, :attribute precisa ser uma string.',
    'timezone'             => 'Ops, :attribute precisa ser uma timezone válida.',
    'unique'               => 'Ops, :attribute já está em uso.',
    'uploaded'             => 'Ops, :attribute falhou ao ser enviado.',
    'url'                  => 'O formato de :attribute é inválido.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
        'bar_code' => 'código de barras',
        'company_name' => 'razão social',
        'trade' => 'nome fantasia',
        'email' => 'e-mail',
        'cnpj' => 'CNPJ',
        'state_registration' => 'inscrição estadual',
        'phone' => 'telefone',
        'zip_code' => 'CEP',
        'address' => 'endereço',
        'address_number' => 'número',
        'district' => 'bairro',
        'city' => 'cidade',
        'state' => 'estado',
        'type' => 'tipo',
        'date transaction' => 'data de transação',
        'due_date' => 'data de vencimento'
    ],

];
