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

    'accepted' => 'El :attribute tiene que ser aceptado.',
    'active_url' => 'El :attribute no es una URL valida.',
    'after' => 'El :attribute tiene que ser una fecha despues de :date.',
    'after_or_equal' => 'El :attribute tiene que ser una fecha despues o igual a :date.',
    'alpha' => 'El :attribute solo puede contener letras.',
    'alpha_dash' => 'El :attribute solo puede contener letras, numeros o guiones.',
    'alpha_num' => 'El :attribute solo ùede contener letras o numeros.',
    'array' => 'El :attribute tiene que ser un vector.',
    'before' => 'El :attribute tiene que ser una fechas antes del :date.',
    'before_or_equal' => 'El :attribute tiene que ser una fecha antes o igual a :date.',
    'between' => [
        'numeric' => 'El :attribute tiene que estar entre :min y :max.',
        'file' => 'El :attribute tiene que pesar entre :min y :max kilobytes.',
        'string' => 'El :attribute tiene que contener entre :min y :max caracteres.',
        'array' => 'El :attribute tiene que tener entre :min y :max items.',
    ],
    'boolean' => 'El :attribute tiene que ser verdadero o falso.',
    'confirmed' => 'El :attribute y su confirmacion no son iguales.',
    'date' => 'El :attribute no es una fecha valida.',
    'date_equals' => 'El :attribute tiene que ser una fecha igual a :date.',
    'date_format' => 'El :attribute no concuerda con el formato :format.',
    'different' => 'El :attribute y el :other tienen que ser diferentes.',
    'digits' => 'El :attribute tiene que tener :digits digitos.',
    'digits_between' => 'El :attribute tiene que tener entre :min y :max digitos.',
    'dimensions' => 'El :attribute tiene unas dimensiones de imagen invalidas.',
    'distinct' => 'El :attribute tiene un valor duplicado.',
    'email' => 'El :attribute tiene que ser una direccion de correo valida.',
    'exists' => 'El campo :attribute es invalido.',
    'file' => 'El :attribute tiene que ser un archivo.',
    'filled' => 'El :attribute tiene que tener un valor.',
    'gt' => [
        'numeric' => 'El :attribute tiene que ser mayor que :value.',
        'file' => 'El :attribute tiene que ser mayor que :value kilobytes.',
        'string' => 'El :attribute tiene que ser mayor que :value caracteres.',
        'array' => 'El :attribute tiene que ser mayor que :value items.',
    ],
    'gte' => [
        'numeric' => 'El :attribute tiene que ser mayor o igual que :value.',
        'file' => 'El :attribute tiene que ser mayor o igual que :value kilobytes.',
        'string' => 'El :attribute mtiene que ser mayor o igual que :value caracteres.',
        'array' => 'El :attribute tiene que ser mayor o igual que :value items o mas.',
    ],
    'image' => 'El :attribute tiene que ser una imagen.',
    'in' => 'El campo :attribute es invalido.',
    'in_array' => 'El :attribute no existe en :other.',
    'integer' => 'El :attribute tiene que ser un entero.',
    'ip' => 'El :attribute tiene que ser una direccion IP valida.',
    'ipv4' => 'El :attribute tiene que ser una direccion IPv4 valida.',
    'ipv6' => 'El :attribute tiene que ser una direccion IPv6 valida.',
    'json' => 'El :attribute tiene que ser un JSON valido.',
    'lt' => [
        'numeric' => 'El :attribute tiene que ser menor de :value.',
        'file' => 'El :attribute tiene que ser menor de :value kilobytes.',
        'string' => 'El :attribute tiene que ser menor de :value caracteres.',
        'array' => 'El :attribute tiene que ser menor de :value items.',
    ],
    'lte' => [
        'numeric' => 'El :attribute tiene que ser menor o igual a :value.',
        'file' => 'El :attribute tiene que ser menor o igual a :value kilobytes.',
        'string' => 'El :attribute tiene que ser menor o igual a :value caracteres.',
        'array' => 'El :attribute tiene que ser menor o igual a :value items.',
    ],
    'max' => [
        'numeric' => 'El :attribute no puede ser mayor de :max.',
        'file' => 'El :attribute no puede ser mayor de :max kilobytes.',
        'string' => 'El :attribute no puede ser mayor de :max caracteres.',
        'array' => 'El :attribute no puede ser mayor de :max items.',
    ],
    'mimes' => 'El :attribute tiene que ser un archivo de tipo: :values.',
    'mimetypes' => 'El :attribute tiene que ser un archivo de tipo: :values.',
    'min' => [
        'numeric' => 'El :attribute tiene que tener por lo menos :min.',
        'file' => 'El :attribute tiene que tener por lo menos :min kilobytes.',
        'string' => 'El :attribute tiene que tener por lo menos :min caracteres.',
        'array' => 'El :attribute tiene que tener por lo menos :min items.',
    ],
    'not_in' => 'El campo :attribute es invalido.',
    'not_regex' => 'El formato de :attribute es invalido.',
    'numeric' => 'El :attribute tiene que se run numuero.',
    'present' => 'El :attribute tiene que estar presente.',
    'regex' => 'El formato de :attribute fes invalido.',
    'required' => 'El :attribute es obligatorio.',
    'required_if' => 'El :attribute es obligatorio cuando :other es :value.',
    'required_unless' => 'El :attribute es obligatorio a menos que :other este entre :values.',
    'required_with' => 'El :attribute es obligatorio cuando :values este presente.',
    'required_with_all' => 'El :attribute es obligatorio cuando :values estan presentes.',
    'required_without' => 'El :attribute es obligatorio cuando :values no estan presentes.',
    'required_without_all' => 'El :attribute es obligatorio cuando ninguno de :values estan presentes.',
    'same' => 'El :attribute y el :other tienen que coincidir.',
    'size' => [
        'numeric' => 'El :attribute tiene que ser :size.',
        'file' => 'El :attribute tiene que ser de :size kilobytes.',
        'string' => 'El :attribute tiene que ser de :size characters.',
        'array' => 'El :attribute tiene que contener :size items.',
    ],
    'starts_with' => 'El :attribute tiene que empezar con uno de los siguientes: :values',
    'string' => 'El :attribute tiene que ser una cadena de texto.',
    'timezone' => 'El :attribute tiene que ser una zona horaria valida.',
    'unique' => 'El :attribute ya existe.',
    'uploaded' => 'Hubo un fallo al cargar :attribute.',
    'url' => 'El :attribute tiene formato invalido.',
    'uuid' => 'El :attribute tiene que ser una UUID valida.',

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

    'attributes' => [],

];
