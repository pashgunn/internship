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

    'accepted' => 'Поле :attribute должно быть accepted.',
    'accepted_if' => 'Поле :attribute должно быть accepted when :other is :value.',
    'active_url' => 'Поле :attribute is not валидным URL.',
    'after' => 'Поле :attribute должно быть a date after :date.',
    'after_or_equal' => 'Поле :attribute должно быть a date after or equal to :date.',
    'alpha' => 'Поле :attribute must only contain letters.',
    'alpha_dash' => 'Поле :attribute must only contain letters, numbers, dashes and underscores.',
    'alpha_num' => 'Поле :attribute must only contain letters and numbers.',
    'array' => 'Поле :attribute должно быть an array.',
    'ascii' => 'Поле :attribute must only contain single-byte alphanumeric characters and symbols.',
    'before' => 'Поле :attribute должно быть a date before :date.',
    'before_or_equal' => 'Поле :attribute должно быть a date before or equal to :date.',
    'between' => [
        'array' => 'Поле :attribute must have between :min and :max items.',
        'file' => 'Поле :attribute должно быть between :min and :max kilobytes.',
        'numeric' => 'Поле :attribute должно быть between :min and :max.',
        'string' => 'Поле :attribute должно быть between :min and :max characters.',
    ],
    'boolean' => 'Поле :attribute должно быть true or false.',
    'confirmed' => 'Поле :attribute confirmation does not match.',
    'current_password' => 'The password is incorrect.',
    'date' => 'Поле :attribute is not валидным date.',
    'date_equals' => 'Поле :attribute должно быть a date equal to :date.',
    'date_format' => 'Поле :attribute does not match the format :format.',
    'decimal' => 'Поле :attribute must have :decimal decimal places.',
    'declined' => 'Поле :attribute должно быть declined.',
    'declined_if' => 'Поле :attribute должно быть declined when :other is :value.',
    'different' => 'Поле :attribute and :other должно быть different.',
    'digits' => 'Поле :attribute должно быть :digits digits.',
    'digits_between' => 'Поле :attribute должно быть between :min and :max digits.',
    'dimensions' => 'Поле :attribute has invalid image dimensions.',
    'distinct' => 'Поле :attribute has a duplicate value.',
    'doesnt_end_with' => 'Поле :attribute may not end with one of the following: :values.',
    'doesnt_start_with' => 'Поле :attribute may not start with one of the following: :values.',
    'email' => 'Поле :attribute должно быть валидным email address.',
    'ends_with' => 'Поле :attribute must end with one of the following: :values.',
    'enum' => 'The selected :attribute is invalid.',
    'exists' => 'The selected :attribute is invalid.',
    'file' => 'Поле :attribute должно быть a file.',
    'filled' => 'Поле :attribute must have a value.',
    'gt' => [
        'array' => 'Поле :attribute must have more than :value items.',
        'file' => 'Поле :attribute должно быть greater than :value kilobytes.',
        'numeric' => 'Поле :attribute должно быть greater than :value.',
        'string' => 'Поле :attribute должно быть greater than :value characters.',
    ],
    'gte' => [
        'array' => 'Поле :attribute must have :value items or more.',
        'file' => 'Поле :attribute должно быть greater than or equal to :value kilobytes.',
        'numeric' => 'Поле :attribute должно быть greater than or equal to :value.',
        'string' => 'Поле :attribute должно быть greater than or equal to :value characters.',
    ],
    'image' => 'Поле :attribute должно быть an image.',
    'in' => 'The selected :attribute is invalid.',
    'in_array' => 'Поле :attribute does not exist in :other.',
    'integer' => 'Поле :attribute должно быть an integer.',
    'ip' => 'Поле :attribute должно быть валидным IP address.',
    'ipv4' => 'Поле :attribute должно быть валидным IPv4 address.',
    'ipv6' => 'Поле :attribute должно быть валидным IPv6 address.',
    'json' => 'Поле :attribute должно быть валидным JSON string.',
    'lowercase' => 'Поле :attribute должно быть lowercase.',
    'lt' => [
        'array' => 'Поле :attribute must have less than :value items.',
        'file' => 'Поле :attribute должно быть less than :value kilobytes.',
        'numeric' => 'Поле :attribute должно быть less than :value.',
        'string' => 'Поле :attribute должно быть less than :value characters.',
    ],
    'lte' => [
        'array' => 'Поле :attribute must not have more than :value items.',
        'file' => 'Поле :attribute должно быть less than or equal to :value kilobytes.',
        'numeric' => 'Поле :attribute должно быть less than or equal to :value.',
        'string' => 'Поле :attribute должно быть less than or equal to :value characters.',
    ],
    'mac_address' => 'Поле :attribute должно быть валидным MAC address.',
    'max' => [
        'array' => 'Поле :attribute must not have more than :max items.',
        'file' => 'Поле :attribute must not be greater than :max kilobytes.',
        'numeric' => 'Поле :attribute must not be greater than :max.',
        'string' => 'Поле :attribute must not be greater than :max characters.',
    ],
    'max_digits' => 'Поле :attribute must not have more than :max digits.',
    'mimes' => 'Поле :attribute должно быть a file of type: :values.',
    'mimetypes' => 'Поле :attribute должно быть a file of type: :values.',
    'min' => [
        'array' => 'Поле :attribute must have не менее :min items.',
        'file' => 'Поле :attribute должно быть не менее :min kilobytes.',
        'numeric' => 'Поле :attribute должно быть не менее :min.',
        'string' => 'Поле :attribute должно содержать не менее :min символов.',
    ],
    'min_digits' => 'Поле :attribute must have не менее :min digits.',
    'missing' => 'Поле :attribute должно быть missing.',
    'missing_if' => 'Поле :attribute должно быть missing when :other is :value.',
    'missing_unless' => 'Поле :attribute должно быть missing unless :other is :value.',
    'missing_with' => 'Поле :attribute должно быть missing when :values is present.',
    'missing_with_all' => 'Поле :attribute должно быть missing when :values are present.',
    'multiple_of' => 'Поле :attribute должно быть a multiple of :value.',
    'not_in' => 'The selected :attribute is invalid.',
    'not_regex' => 'Поле :attribute format is invalid.',
    'numeric' => 'Поле :attribute должно быть a number.',
    'password' => [
        'letters' => 'Поле :attribute must contain не менее one letter.',
        'mixed' => 'Поле :attribute must contain не менее one uppercase and one lowercase letter.',
        'numbers' => 'Поле :attribute must contain не менее one number.',
        'symbols' => 'Поле :attribute must contain не менее one symbol.',
        'uncompromised' => 'The given :attribute has appeared in a data leak. Please choose a different :attribute.',
    ],
    'present' => 'Поле :attribute должно быть present.',
    'prohibited' => 'Поле :attribute is prohibited.',
    'prohibited_if' => 'Поле :attribute is prohibited when :other is :value.',
    'prohibited_unless' => 'Поле :attribute is prohibited unless :other is in :values.',
    'prohibits' => 'Поле :attribute prohibits :other from being present.',
    'regex' => 'Поле :attribute format is invalid.',
    'required' => 'Поле :attribute является обязательным.',
    'required_array_keys' => 'Поле :attribute must contain entries for: :values.',
    'required_if' => 'Поле :attribute is required when :other is :value.',
    'required_if_accepted' => 'Поле :attribute is required when :other is accepted.',
    'required_unless' => 'Поле :attribute is required unless :other is in :values.',
    'required_with' => 'Поле :attribute is required when :values is present.',
    'required_with_all' => 'Поле :attribute is required when :values are present.',
    'required_without' => 'Поле :attribute is required when :values is not present.',
    'required_without_all' => 'Поле :attribute is required when none of :values are present.',
    'same' => 'Поле :attribute and :other must match.',
    'size' => [
        'array' => 'Поле :attribute must contain :size items.',
        'file' => 'Поле :attribute должно быть :size kilobytes.',
        'numeric' => 'Поле :attribute должно быть :size.',
        'string' => 'Поле :attribute должно быть :size characters.',
    ],
    'starts_with' => 'Поле :attribute must start with one of the following: :values.',
    'string' => 'Поле :attribute должно быть a string.',
    'timezone' => 'Поле :attribute должно быть валидным timezone.',
    'unique' => 'Значение поля :attribute уже использовано.',
    'uploaded' => 'Поле :attribute failed to upload.',
    'uppercase' => 'Поле :attribute должно быть в верхнем регистре.',
    'url' => 'Поле :attribute должно быть валидным URL.',
    'ulid' => 'Поле :attribute должно быть валидным ULID.',
    'uuid' => 'Поле :attribute должно быть валидным UUID.',

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
