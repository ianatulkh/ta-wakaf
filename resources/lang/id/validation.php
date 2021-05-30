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

    'accepted' => 'Isian :attribute harus diterima.',
    'active_url' => 'Isian :attribute bukan URL yang valid.',
    'after' => 'Isian :attribute harus tanggal setelah :date.',
    'after_or_equal' => 'Isian :attribute harus tanggal setelah atau sama dengan :date.',
    'alpha' => 'Isian :attribute hanya boleh berisi huruf.',
    'alpha_dash' => 'Isian :attribute hanya boleh berisi huruf, angka, tanda hubung dan garis bawah.',
    'alpha_num' => 'Isian :attribute hanya boleh berisi huruf dan angka.',
    'array' => 'Isian :attribute harus berupa array.',
    'before' => 'Isian :attribute harus tanggal sebelum :date.',
    'before_or_equal' => 'Isian :attribute harus tanggal sebelum atau sama dengan :date.',
    'between' => [
        'numeric' => 'Isian :attribute harus antara :min dan :max.',
        'file' => 'Isian :attribute harus antara :min dan :max kilobyte.',
        'string' => 'Isian :attribute harus antara :min dan :max karakter.',
        'array' => 'Isian :attribute harus memiliki antara :min dan :max item.',
    ],
    'boolean' => 'Isian :attribute field harus benar atau salah.',
    'confirmed' => 'Isian :attribute konfirmasi tidak cocok.',
    'date' => 'Isian :attribute bukan tanggal yang valid.',
    'date_equals' => 'Isian :attribute harus tanggal yang sama dengan :date.',
    'date_format' => 'Isian :attribute tidak cocok dengan format :format.',
    'different' => 'Isian :attribute dan :other harus berbeda.',
    'digits' => 'Isian :attribute harus :digits digit.',
    'digits_between' => 'Isian :attribute harus antara :min dan :max digit.',
    'dimensions' => 'Isian :attribute memiliki dimensi gambar yang tidak valid.',
    'distinct' => 'Isian :attribute field memiliki nilai duplikat.',
    'email' => 'Isian :attribute harus berupa alamat email yang valid.',
    'ends_with' => 'Isian :attribute harus diakhiri dengan salah satu dari yang berikut: :values.',
    'exists' => 'Pilihan :attribute yang dipilih tidak valid.',
    'file' => 'Isian :attribute harus berupa file.',
    'filled' => 'Bidang :attribute harus memiliki nilai.',
    'gt' => [
        'numeric' => 'Isian :attribute harus lebih besar dari :value.',
        'file' => 'Isian :attribute harus lebih besar dari :value kilobyte.',
        'string' => 'Isian :attribute harus lebih besar dari :value character.',
        'array' => 'Isian :attribute harus memiliki lebih dari :nilai item.',
    ],
    'gte' => [
        'numeric' => 'Isian :attribute harus lebih besar dari atau sama dengan value.',
        'file' => 'Isian :attribute harus lebih besar dari atau sama dengan :value kilobytes.',
        'string' => 'Isian :attribute harus lebih besar dari atau sama dengan :value karakter.',
        'array' => 'Isian :attribute harus memiliki :value item atau lebih.',
    ],
    'image' => 'Isian :attribute harus berupa gambar.',
    'in' => 'Pilihan :attribute yang dipilih tidak valid.',
    'in_array' => 'Bidang :attribute tidak ada di :other.',
    'integer' => 'Isian :attribute harus berupa integer.',
    'ip' => 'Isian :attribute harus berupa alamat IP yang valid.',
    'ipv4' => 'Isian :attribute harus berupa alamat IPv4 yang valid.',
    'ipv6' => 'Isian :attribute harus berupa alamat IPv6 yang valid.',
    'json' => 'Isian :attribute harus berupa string JSON yang valid.',
    'lt' => [
        'numeric' => 'Isian :attribute harus kurang dari :value.',
        'file' => 'Isian :attribute harus kurang dari :value kilobyte.',
        'string' => 'Isian :attribute harus kurang dari :value karakter.',
        'array' => 'Isian :attribute harus memiliki kurang dari :nilai item.',
    ],
    'lte' => [
        'numeric' => 'Isian :attribute harus kurang dari atau sama dengan :value.',
        'file' => 'Isian :attribute harus kurang dari atau sama dengan :value kilobytes.',
        'string' => 'Isian :attribute harus kurang dari atau sama dengan :value karakter.',
        'array' => 'Isian :attribute tidak boleh memiliki lebih dari :nilai item.',
    ],
    'max' => [
        'numeric' => 'Isian :attribute tidak boleh lebih dari :max.',
        'file' => 'Isian :attribute tidak boleh lebih dari :max kilobyte.',
        'string' => 'Isian :attribute tidak boleh lebih dari :max karakter.',
        'array' => 'Isian :attribute tidak boleh lebih dari :max item.',
    ],
    'mimes' => 'Isian :attribute harus berupa file dengan tipe: :values.',
    'mimetypes' => 'Isian :attribute harus berupa file dengan tipe: :values.',
    'min' => [
        'numeric' => 'Isian :attribute harus minimal :min.',
        'file' => 'Isian :attribute harus minimal :min kilobyte.',
        'string' => 'Isian :attribute harus setidaknya :min karakter.',
        'array' => 'Isian :attribute harus memiliki setidaknya :min item.',
    ],
    'multiple_of' => 'Isian :attribute harus kelipatan dari :value.',
    'not_in' => 'Pilihan :attribute yang dipilih tidak valid.',
    'not_regex' => 'Format :attribute tidak valid.',
    'numeric' => 'Isian :attribute harus berupa angka.',
    'password' => 'Kata sandi salah.',
    'present' => 'Isian :attribute field harus ada.',
    'regex' => 'Format :attribute tidak valid.',
    'required' => 'Bidang :attribute harus diisi.',
    'required_if' => 'Isian :attribute field diperlukan jika :other is :value.',
    'required_unless' => 'Isian :attribute field diperlukan kecuali :other is in :values.',
    'required_with' => 'Isian :attribute field diperlukan jika :value ada.',
    'required_with_all' => 'Isian :attribute field diperlukan jika :value ada.',
    'required_without' => 'Bidang :attribute harus diisi bila :value tidak ada.',
    'required_without_all' => 'Isian :attribute field diperlukan jika tidak ada dari :value yang ada.',
    'same' => 'Isian :attribute dan :other harus cocok.',
    'size' => [
        'numeric' => 'Isian :attribute harus berukuran :size.',
        'file' => 'Isian :attribute harus :size kilobyte.',
        'string' => 'Isian :attribute harus :size karakter.',
        'array' => 'Isian :attribute harus berisi :size item.',
    ],
    'starts_with' => 'Isian :attribute harus dimulai dengan salah satu dari yang berikut: :values.',
    'string' => 'Isian :attribute harus berupa string.',
    'timezone' => 'Isian :attribute harus berupa zona yang valid.',
    'unique' => 'Isian :attribute telah digunakan.',
    'uploaded' => 'Isian :attribute gagal diunggah.',
    'url' => 'Format :attribute tidak valid.',
    'uuid' => 'Isian :attribute harus merupakan UUID yang valid.',

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
