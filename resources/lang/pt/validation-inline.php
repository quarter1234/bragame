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
    'accepted' => 'Deve ser aceito.',
'active_url' => 'Não é um URL válido.',
'after' => 'Deve ser uma data posterior a :date.',
'after_or_equal' => 'Deve ser uma data igual ou posterior a :date.',
'alpha' => 'Deve conter apenas letras.',
'alpha_dash' => 'Deve conter apenas letras, números, traços) e sublinhados (_).',
'alpha_num' => 'Deve conter apenas letras e números.',
'array' => 'Deve ser um array.',
'before' => 'Deve ser uma data anterior a :date.',
'before_or_equal' => 'Deve ser uma data igual ou anterior a :date.',
'between' => [
'numeric' => 'Deve estar entre :min e :max.',
'file' => 'Deve ter entre :min e :max kilobytes.',
'string' => 'Deve ter entre :min e : caracteres.',
'array' => 'Deve ter entre :min e :max itens.',
],
'boolean' => 'Deve ser verdadeiro ou falso.',
'confirmed' => 'A confirmação não coincide.',
'date' => 'Não é uma data válida.',
'date_equals' => 'Deve ser uma data igual a :date.',
'date_format' => 'Deve estar no formato :format.',
'different' => 'Deve ser diferente de :other.',
'digits' => 'Deve ter :digits dígitos.',
'digits_between' => 'Deve ter entre :min e :max díos.',
'dimensions' => 'As dimensões da imagem são inválidas.',
'distinct' => 'O valor já existe.',
'email' => 'Não um endereço de e-mail válido.',
'ends_with' => 'Deve terminar com um dos seguintes valores: :values.',
'exists' => 'Não existe.',
'file' => 'Deve ser um arquivo.',
'filled' => 'Deve ser preenchido.',
'gt' => [
'numeric' => 'Deve ser maior que :value.',
'file' => 'Deve ter mais de :value kilobytes.',
'string' => 'Deve ter mais de :value caracteres.',
'array' => 'Deve ter mais de :value itens.',
],
'gte' => [
'numeric' => 'Deve ser maior igual a :value.',
'file' => 'Deve ter :value kilobytes ou mais.',
'string' => 'Deve ter :value caracteres ou mais.',
'array' => 'Deve ter :value itens ou mais.',
],
'image' => 'Deve ser uma imagem.',
'in' => 'O valor selecionado é inválido.',
'in_array' => 'Deve estar presente em :other.',
'integer' => 'Deve ser um número inteiro.',
'ip' => 'Deve ser um endereço IP válido.',
'ipv4' => 'Deve ser um endereço IPv4 válido.',
'ipv6' => 'Deve ser um endereço IPv6 válido.',
'json' => 'Deve ser uma string JSON válida.',
'lt' => [
'numeric' => 'Deve ser menor que :value.',
'file' => 'Deve ter menos :value kilobytes.',
'string' => 'Deve ter menos de :value caracteres.',
'array' => 'Deve ter menos de :value itens.',
],
'lte' => [
'numeric' => 'Deve ser menor ou igual a :value.',
'file' => 'Deve ter :value kiloby ou menos.',
'string' => 'Deve ter :value caracteres ou menos.',
'array' => 'Deve ter :value itens ou menos.',
],
'max' => [
'numeric' => 'Não pode ser maior que :max.',
'file' => 'Não pode ter mais de :max kilobytes.',
'string' => 'Não pode ter mais de :max caracteres.',
'array' => 'Não pode ter mais de :max itens.',
],
'mimes' => 'Deve ser um arquivo do tipo :values.',
'mimetypes' => 'Deve ser um arquivo do tipo :values.',
'min' => [
'numeric' => 'Deve ser maior ou igual a :min.',
'file' => 'O tamanho não pode ser menor que :min KB.',
'string' => 'Deve ter pelo menos :min caracteres.',
'array' => 'Deve ter pelo menos :min itens.',
],
'multiple' => 'O valor deve ser um múltiplo de :value',
'not_in' => 'Opção inválida.',
'not_regex' => 'Formato inválido.',
'numeric' => 'Deve ser um número.',
'password' => 'Senha incorreta.',
'present' => 'Deve estar presente.',
'regex' => 'Formato incorreto.',
'required' => 'Campo obrigatório.',
'required_if' => 'Campo obrigatório quando :other é :value.',
'required_unless' => 'Campo obrigatório, a menos que :other esteja em :values.',
'required_with' => 'Campo obrigatório quando :values está presente.',
'required_with_all' => 'Campo obrigatório quando :values estão presentes.',
'required_without' => 'Campo obrigatório quando :values não está presente.',
'required_without_all' => 'Campo obrigatório quando nenhum dos :values estão presentes.',
'same' => 'Deve ser igual a :other.',
'size' => [
'numeric' => 'Deve ter o tamanho :size.',
'file' => 'Deve ter o tamanho :size KB.',
'string' => 'Deve ter :size caracteres.',
'array' => 'Deve ter :size itens.',
],
'starts_with' => 'Deve começar com um dos seguintes valores: :values.',
'string' => 'Deve ser uma string.',
'timezone' => 'Deve ser um valor de f horário válido.',
'unique' => 'Já existe.',
'uploaded' => 'Falha no upload.',
'url' => 'Formato incorreto.',
'uuid' => 'Deve ser um UUID válido.',
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
| The following language lines are used to swap our attribute placeholder
| with something more reader friendly such as "E-Mail Address" instead
| of "email". This simply helps us make our message more expressive.
|
*/
'attributes' => [
    'name'                  => 'nome',
    'username'              => 'nome de usuário',
    'email'                 => 'email',
    'first_name'            => 'primeiro nome',
    'last_name'             => 'sobrenome',
    'password'              => 'senha',
    'password_confirmation' => 'confirmação da senha',
    'city'                  => 'cidade',
    'country'               => 'país',
    'address'               => 'endereço',
    'phone'                 => 'telefone',
    'mobile'                => 'celular',
    'age'                   => 'idade',
    'sex'                   => 'sexo',
    'gender'                => 'gênero',
    'day'                   => 'dia',
    'month'                 => 'm',
    'year'                  => 'ano',
    'hour'                  => 'hora',
    'minute'                => 'minuto',
    'second'                => 'segundo',
    'title'                 => 'título',
    'content'               => 'conteúdo',
    'description'           => 'descrição',
    'excerpt'               => 'resumo',
    'date'                  => 'data',
    'time'                  => 'hora',
    'available'             => 'disponível',
    'size'                  => 'tamanho',
    ],
];