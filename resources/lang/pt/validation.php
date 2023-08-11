<?php

return [

/*
|--------------------------------------------------------------------------
| Linhas de Idioma de Validação
|--------------------------------------------------------------------------
|
| As seguintes linhas de idi contêm as mensagens de erro padrão usadas pela
| classe validação. Algumas dessas regras têm várias versões, como
| as regras de tamanho. Sinta-se à vontade para ajustar cada uma dessas mensagens aqui.
|
*/
'accepted'             => 'Você deve aceitar :attribute.',
'active_url'           => ':attribute não é um URL válido.',
'after'                => ':attribute deve ser uma data posterior a :date.',
'after_or_equal'       => ':attribute deve ser uma data igual ou posterior a :date.',
'alpha'                => ':attribute só pode conter letras.',
'alpha_dash'           => ':attribute só pode conter letras, números, traços e sublinhados.',
'alpha_num'            => ':attribute só pode conter letras e números.',
'array'                => ':attribute deve ser uma matriz.',
'before'               => ':attribute deve ser uma data anterior a :date.',
'before_or_equal'      => ':attribute deve ser uma data igual ou anterior a :date.',
'between'              => [
'numeric' => ':attribute deve estar entre :min e :max.',
'file'    => ':attribute deve ter entre :min e :max kilobytes.',
'string'  =>':attribute deve ter entre :min e :max caracteres.',
'array'   => ':attribute deve ter entre :min e :max itens.',
],
'boolean'              => ':attribute deve ser verdadeiro ou falso.',
'confirmed'            => ':attribute não coincide com a confirmação.',
'date'                 => ':attribute não é uma data válida.',
'date_equals'          => ':attribute deve ser uma data igual a :date.',
'date_format'          => ':attribute deve estar formato :format.',
'different'            => ':attribute e :other devem ser diferentes.',
'digits'               => ':attribute deve ter :digits dígitos.',
'digits_between'       => ':attribute deve ter entre :min e :max dígitos.',
'dimensions'           => ':attribute tem dimensões de imagem inválidas.',
'distinct'             => ':attribute tem um valor duplicado.',
'email'                => ':attribute deve ser um endereço de e-mail válido.',
'ends_with'            => ':attribute deve terminar com um dos seguintes valores: :values.',
'exists'               => ':attribute selecionado inválido.',
'file'                 => ':attribute deve ser um arquivo.',
'filled'               => ':attribute deve ter um valor.',
'gt'                   => [
'numeric' => ':attribute deve ser maior que :value.',
'file'    => ':attribute deve ter mais de :value kilobytes.',
'string'  =>':attribute deve ter mais :value caracteres.',
'array'   => ':attribute deve ter mais de :value itens.',
],
'gte'                  => [
'numeric' => ':attribute deve ser maior ou igual a :value.',
'file'    => ':attribute deve ter :value kilobytes ou mais.',
'string'  => ':attribute deve ter :value caracteres ou mais.',
'array'   => ':attribute deve ter :value itens ou mais.',
],
'image'                => ':attribute deve ser uma imagem.',
'in'                   => ':attribute selecionado é inválido.',
'in_array'             =>':attribute não existe em :other.',
'integer'              => ':attribute deve ser um número inteiro.',
'ip'                   => ':attribute deve ser um endereço IP válido.',
'ipv4'                 => ':attribute deve ser um endereço IPv4 válido.',
'ipv6'                 => ':attribute deve ser um endereço IPv6 válido.',
'json'                 => ':attribute deve ser uma string JSON válida.',
'lt'                   => [
    'numeric' => ':attribute deve ser menor que :value.',
    'file'    => ':attribute deve ter menos de :value.',
    'string'  => ':attribute deve ter menos de :value caracteres.',
    'array'   => ':attribute deve ter menos de :value elementos.',
    ],
    'lte'                  => [
    'numeric' => ':attribute deve ser menor ou igual a :value.',
    'file'    => ':attribute deve ter no máximo :value KB.',
    'string'  => ':attribute deve ter no máximo :value caracteres.',
    'array'   => ':attribute deve ter no máximo :value elementos.',
    ],
    'max'                  => [
    'numeric' => ':attribute não pode ser maior que :max.',
    'file' => ':attribute não pode ter mais de :max KB.',
    'string'  => ':attribute não pode ter mais de :max caracteres.',
    'array'   => ':attribute pode ter no máximo :max elementos.',
    ],
    'mimes'                => ':attribute deve ser um arquivo do tipo :values.',
    'mimetypes'            => ':attribute deve ser um arquivo do tipo :values.',
    'min'                  => [
    'numeric' => ':attribute deve ser no mínimo :min.',
    'file'    =>':attribute deve ter pelo menos :min KB.',
    'string'  => ':attribute deve ter pelo menos :min caracteres.',
    'array'   => ':attribute deve ter pelo menos : elementos.',
    ],
    'multiple_of'          => ':attribute deve ser um múltiplo de :value',
    'not_in'               => ':attribute selecion é inválido.',
    'not_regex'            => 'O formato de :attribute é inválido.',
    'numeric'              => ':attribute deve ser um número.',
    'password'             => 'Senha incorreta',
    'present'              => ':attribute deve estar presente.',
    'regex'                => 'O formato :attribute é inválido.',
    'required'             => ':attribute é obrigatório.',
    'required_if'          => ':attribute é obrigatório quando :other é :value.',
    'required_unless'      => ':attribute é obrigatório a menos que :other esteja em :values.',
    'required_with'        => ':attribute é obrigatório quando :values está presente.',
    'required_with_all'    => ':attribute é obrigatório quando :values estão presentes.',
    'required_without'     => ':attribute é obrigatório quando :values não está presente.',
    'required_without_all' => ':attribute é obrigatório quando nenhum dos :values estão presentes.',
    'same'                 => ':attribute e :other devem ser iguais.',
    'size'                 => [
        'numeric' => ':attribute deve ter o tamanho :size.',
        'file'    => ':attribute deve ter :size KB.',
        'string'  => ':attribute deve ter :size caracteres.',
        'array'   => ':attribute deve ter :size elementos.',
    ],
    'starts_with'          => ':attribute deve começar com :values.',
    'string'               => ':attribute deve ser uma string.',
    'timezone'             => ':attribute deve ser um valor de f horário válido.',
    'unique'               => ':attribute já existe.',
    'uploaded'             => 'Falha ao fazer upload de :attribute.',
    'url'                  => 'Formato de endereço :attribute incorreto.',
    'uuid'                 => ':attribute deve ser um UUID válido.',
    'mobile'               => 'Número de telefone :attribute inválido.',
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
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
        'email' => 'Caixa de correio',
        'game_code' => 'Código do jogo',
    ],
];