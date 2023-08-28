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

    'accepted'                           => 'يجب قبول :attribute',
    'accepted_if'                        => 'يجب قبول حقل :attribute عندما :other هو :value',
    'active_url'                         => 'attribute: ليست عنوان URL صالحًا',
    'after'                              => 'يجب أن يكون :attribute تاريخاً بعد :date',
    'after_or_equal'                     => 'يجب أن يكون :attribute تاريخاً بعد :date أو مساوى له',
    'alpha'                              => 'لا يجوز أن تحتوي :attribute إلا على أحرف',
    'alpha_dash'                         => 'لا يجوز أن تحتوي :attribute إلا على أحرف وأرقام وشرطات',
    'alpha_num'                          => 'لا يجوز أن تحتوي :attribute إلا على أحرف وأرقام',
    'array'                              => 'يجب أن تكون :attribute مصفوفة',
    'ascii'                              => 'يجب أن يحتوي حقل :attribute على أحرف أبجدية رقمية ورموز أحادية البايت فقط',
    'before'                             => 'يجب أن يكون :attribute تاريخاً قبل :date',
    'before_or_equal'                    => 'يجب أن يكون :attribute تاريخاً قبل :date أو مساوى له',
    'between'                            => [
        'array'   => 'يجب أن تحتوي :attribute على ما بين :min و :max عنصر',
        'file'    => 'يجب أن تكون :attribute بين :min و :max كيلوبايت',
        'numeric' => 'يجب أن تكون :attribute بين :min و :max',
        'string'  => 'يجب أن تكون :attribute بين :min و :max أحرف',
    ],
    'boolean'                            => 'يجب أن يكون :attribute صواب أو خطأ',
    'confirmed'                          => 'تأكيد :attribute غير مطابق',
    'current_password'                   => 'كلمة المرور غير صحيحة.',
    'date'                               => ':attribute ليست تاريخًا صالحًا',
    'date_equals'                        => 'يجب أن يكون حقل :attribute تاريخًا مساويًا :date',//
    'date_format'                        => ':attribute غير متطابق مع التنسيق :format',
    'decimal'                            => 'يجب أن يحتوي حقل السمة :attribute منازل عشرية',
    'declined'                           => 'يجب رفض حقل السمة :attribute',
    'declined_if'                        => 'يجب رفض حقل :attribute :other الآخر :value القيمة',
    'different'                          => 'يجب أن تكون :attribute و :other مختلفين',
    'digits'                             => 'يجب أن يكون حقل :attribute :digits أرقام',
    'digits_between'                     => 'يجب أن تكون :attribute بين: min و: max digits',
    'dimensions'                         => ':attribute لها أبعاد غير صالحة',
    'distinct'                           => 'يحتوي حقل :attribute على قيمة مكررة',
    'doesnt_end_with'                    => 'يجب ألا ينتهي حقل :attribute following: مما يلي :values.', //
    'doesnt_start_with'                  => 'يجب ألا يبدأ حقل :attribute بأحد القيم following: :values', //
    'email'                              => 'يجب أن يكون :attribute عنوان بريد إلكتروني صالح',
    'ends_with'                          => 'يجب أن ينتهي حقل :attribute بأحد القيم following: :values',
    'enum'                               => ':attribute المحددة غير صالحة',
    'exists'                             => ':attribute المحددة غير صالحة',
    'file'                               => 'يجب أن تكون :attribute ملفًا',
    'filled'                             => 'يجب أن يحتوي حقل :attribute على قيمة',
    'gt'                                 => [
        'array'   => 'يجب أن يحتوي حقل :attribute على أكثر من عناصر :value',
        'file'    => 'يجب أن يكون حقل :attribute أكبر من :value كيلوبايت',
        'string'  => 'يجب أن يكون حقل :attribute أكبر من أحرف :value',
        'numeric' => 'يجب أن يكون :attribute أكبر من :value',
    ],
    'gte'                                => [
        'array'   => 'يجب أن يحتوي حقل :attribute على أكثر من عناصر :value',
        'file'    => 'يجب أن يكون حقل :attribute أكبر من :value كيلوبايت',
        'string'  => 'يجب أن يكون حقل :attribute أكبر من أحرف :value',
        'numeric' => 'يجب أن يكون :attribute أكبر من أو يساوى :value',
    ],
    'image'                              => 'يجب أن تكون :attribute صورة',
    'in'                                 => ':attribute المحددة غير صالحة',
    'in_array'                           => 'حقل :attribute غير موجود فى قيم :other',
    'integer'                            => 'يجب أن تكون :attribute عدد صحيح',
    'ip'                                 => 'يجب أن تكون :attribute عنوان IP صالحًا',
    'ipv4'                               => 'يجب أن تكون :attribute عنوان IPv4 صالحًا',
    'ipv6'                               => 'يجب أن تكون :attribute عنوان IPv6 صالحًا',
    'json'                               => 'يجب أن تكون :attribute سلسلة JSON صالحة',
    'lowercase'                          => 'يجب أن يكون حقل :attribute صغيرًا',
    'lt'                                 => [
        'array'   => 'يجب أن يحتوي حقل :attribute على أقل من عناصر :value',
        'file'    => 'يجب أن يكون حقل :attribute أقل من :value كيلوبايت',
        'numeric' => 'يجب أن يكون :attribute أقل من :value',
        'string'  => 'يجب أن يكون حقل :attribute أقل من أحرف :value',
    ],
    'lte'                                => [
        'array'   => 'يجب ألا يحتوي حقل :attribute على أكثر من عناصر :value',
        'file'    => 'يجب أن يكون حقل :attribute أقل من أو يساوي :value كيلوبايت',
        'numeric' => 'يجب أن يكون :attribute أقل من أو يساوى :value',
        'string'  => 'يجب أن يكون حقل :attribute أقل من أو يساوي: أحرف :value',
    ],
    'mac_address'                        => 'يجب أن يكون حقل :attribute عنوان MAC صالحًا',
    'max'                                => [
        'numeric' => 'لا يجوز أن تكون :attribute أكبر من:max',
        'file'    => 'لا يجوز أن تكون :attribute أكبر من :max كيلوبايت',
        'string'  => 'لا يجوز أن تكون :attribute أكبر من :max أحرف',
        'array'   => 'لا يجوز أن تحتوي :attribute على أكثر من :max عنصر',
    ],
    'max_digits'                         => 'يجب ألا يحتوي حقل :attribute على :max من الحد الأقصى من الأرقام',
    'mimes'                              => 'يجب أن يكون :attribute ملف من النوع :values',
    'mimetypes'                          => 'يجب أن تكون :attribute ملف من النوع :values',
    'min'                                => [
        'numeric' => 'يجب أن تكون :attribute على الأقل:min',
        'file'    => 'يجب أن تكون :attribute على الأقل :min كيلوبايت',
        'string'  => 'يجب أن تكون :attribute على الأقل :min أحرف',
        'array'   => 'يجب أن تحتوى :attribute على :min عنصر على الأقل',
    ],
    'min_digits'                        => 'يجب أن يحتوي حقل :attribute على :min على الحد الأدنى من الأرقام',
    'missing'                           => 'يجب أن يكون حقل :attribute مفقودًا',
    'missing_if'                        => 'يجب أن يكون حقل :attribute مفقودًا :other الآخر هو :value',
    'missing_unless'                    => 'يجب أن يكون حقل :attribute مفقودًا ما لم :other آخر هو :value',
    'missing_with'                      => 'يجب أن يكون حقل :attribute مفقودًا عندما :values موجودة',
    'missing_with_all'                  => 'يجب أن يكون حقل :attribute مفقودًا عندما تكون :values موجودة',
    'multiple_of'                       => 'يجب أن يكون حقل :attribute من مضاعفات :value',
    'not_in'                            => ':attribute المحددة غير صالحة',
    'not_regex'                         => 'تنسيق حقل :attribute غير صالح',
    'numeric'                           => 'يجب أن تكون :attribute رقم',
    'password' => [
        'letters'       => 'يجب أن يحتوي حقل :attribute على حرف واحد على الأقل',
        'mixed'         => 'يجب أن يحتوي حقل :attribute على حرف كبير واحد وحرف صغير واحد على الأقل',
        'numbers'       => 'يجب أن يحتوي حقل :attribute على رقم واحد على الأقل',
        'symbols'       => 'يجب أن يحتوي حقل :attribute على رمز واحد على الأقل',
        'uncompromised' => 'ظهرت :attribute المعطاة في تسرب بيانات. الرجاء اختيار :attribute مختلفة',
    ],
    'present'                           => 'يجب أن يكون حقل :attribute موجود',
    'prohibited'                        => 'حقل :attribute محظور',
    'prohibited_if'                     => 'يُحظر حقل :attribute عندما :other هو :value',
    'prohibited_unless'                 => 'يُحظر حقل :attribute إلا إذا كان :other في :values',
    'prohibits'                         => 'يحظر حقل :attribute وجود :other',
    'regex'                             => 'تنسيق :attribute غير صالح',
    'required'                          => 'حقل :attribute مطلوب',
    'required_array_keys'               => 'يجب أن يحتوي حقل :attribute على إدخالات for: :values',
    'required_if'                       => ':attribute مطلوب عندما يكون :other يساوى :value',
    'required_if_accepted'              => 'يكون حقل :attribute مطلوبًا عند قبول :other',
    'required_unless'                   => ':attribute مطلوب ما لم يكن :other يساوى :values',
    'required_with'                     => ':attribute مطلوب عندما تكون :values موجودة',
    'required_with_all'                 => ':attribute مطلوب عندما تكون :values موجودة',
    'required_without'                  => ':attribute مطلوب عندما تكون :values غير موجودة',
    'required_without_all'              => ':attribute مطلوب عندما لا تكون أى من :values موجودة',
    'same'                              => 'يجب أن يتطابق :attribute و :other',
    'size'                              => [
        'numeric' => 'يجب أن تكون :size الحجم',
        'file'    => 'يجب أن تكون :size الحجم كيلوبايت',
        'string'  => 'يجب أن يكون عدد الأحرف يساوى :size',
        'array'   => 'يجب أن تحتوي :size على حجم العناصر',
    ],
    'starts_with'                       => 'يجب أن يبدأ حقل :attribute بأحد following: :values',
    'string'                            => 'يجب أن تكون :attribute نصوص',
    'timezone'                          => 'يجب أن تكون :attribute منطقة صالحة',
    'unique'                            => 'قيمة :attribute موجودة مسبقا',
    'uploaded'                          => 'فشل تحميل :attribute',
    'uppercase'                         => 'يجب أن يكون حقل :attribute كبيرًا',
    'url'                               => 'تنسيق :attribute غير صالح',
    'ulid'                              => 'يجب أن يكون حقل :attribute ULID صالحًا',
    'uuid'                              => 'يجب أن يكون حقل :attribute UUID صالحًا',
    'url_not_reachable'                 => 'لا يمكن الوصول لمسار :attribute',

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
            'rule-name' => 'رسالة مخصصة',
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
        'name'                                  => 'الاسم',
        'title'                                 => 'العنوان',
        'location'                              => 'المكان',
        'image'                                 => 'الصورة',
        'image_web'                             => 'صورة الموقع',
        'image_mobile'                          => 'صورة الموبايل',
        'name.ar'                               => 'الاسم العربي',
        'name.en'                               => 'الاسم الانجليزي',
        'value.ar'                              => 'القيمة العربي',
        'value.en'                              => 'القيمة الانجليزي',
        'description.ar'                        => 'الوصف العربي',
        'description.en'                        => 'الوصف الانجليزي',
        'content.ar'                            => 'المحتوى العربي',
        'content.en'                            => 'المحتوى الانجليزي',
        'order'                                 => 'الترتيب',
        'active'                                => 'الحالة',
        'slug'                                  => 'الاسم المختصر',
        'meta_title'                            => 'عنوان الأرشفة',
        'meta_description'                      => 'ميتا الوصف',
        'cover_image'                           => 'صورة الغلاف',
        'featured_image'                        => 'الصورة المميزة',
        'bg_image'                              => 'صورة الخلفية',
        'bg_image_mobile'                       => 'صورة الخلفية للموبايل',
        'category_group_id'                     => 'الفئة',
        'file'                                  => 'الملف',
        'attribute_id'                          => 'السمة',
        'company_type'                          => 'نوع الشركة',
        'state_ids'                             => 'المناطق',
        'tracking_url'                          => 'رابط التتبع',
        'min_order_paid'                        => 'الحد الأدنى للطلب',
        'shop_id'                               => 'المتجر',
        'shop_ids'                              => 'المتاجر',
        'customer_id'                           => 'العميل',
        'address_id'                            => 'العنوان',
        'logo'                                  => 'الشعار',
        'email'                                 => 'البريد الإلكتروني',
        'phone'                                 => 'الهاتف',
        'password'                              => 'كلمة السر',
        'current_password'                      => 'كلمة السر الحالية',
        'confirm_password'                      => 'تأكيد كلمة السر',
        'commercial_photo'                      => 'السجل التجاري',
        'tax_certificate_photo'                 => 'الشهادة الضريبية',
        'inventory_id'                          => 'رقم المخزون',
        'amount'                                => 'المبلغ',
        'note'                                  => 'الملحوظة',
        'percentage'                            => 'النسبة المئوية',
        'starting_time'                         => 'وقت البدء',
        'ending_time'                           => 'وقت النهاية',
        'compressed'                            => 'الملف المضغوط',
        'code'                                  => 'الكود',
        'parcels_no'                            => 'عدد الطرود',
        'order_status'                          => 'حالة الطلب',
        'full_address'                          => 'العنوان كاملا',
        'state_id'                              => 'المنطقة',
        'country_id'                            => 'البلد',
        'full_name'                             => 'الاسم',
        'value'                                 => 'القيمة',
        'min_order_amount'                      => 'الحد الأدنى للطلب',
        'max_coupon_price'                      => 'الحد الأقصى',
        'quantity'                              => 'الكمية',
        'quantity_per_customer'                 => 'الكمية لكل عميل',
        'type'                                  => 'النوع',
        'product_id'                            => 'المنتج',
        'category_sub_group_id'                 => 'القسم',
        'category_id'                           => 'المجموعة',
        'banner_id'                             => 'البانر',
        'product_template_ar'                   => 'نموذج المنتج',
        'product_template_en'                   => 'نموذج المنتج',
        'key.knawat_shop_id'                    => 'مستخدم قنوات',
        'key.knawat_shipping_price'             => 'سعر الشحن',
        'key.max_amount_cash_on_delivery'       => 'أكبر قيمة للدفع عند الاستلام',
        'key.cash_on_delivery_fees'             => 'رسوم الدفع عند الاستلام للعميل',
        'key.client_shipping_fees'              => 'رسوم الشحن للعميل',
        'key.default_cod_fees_merchant'         => 'رسوم الدفع عند الاستلام الافتراضية للتاجر',
        'key.default_shipping_fees_merchant'    => 'رسوم الشحن الافتراضية للتاجر',
        'key.contact_email'                     => 'بريد التواصل',
        'verification_code'                     => 'كود التحقق',
        'role_id'                               => 'الدور',
        'sale_price'                            => 'سعر البيع',
        'offer_price'                           => 'سعر العرض',
        'cost_price'                            => 'سعر التكلفة',
        'origin_country'                        => 'بلد المنشأ',
        'category_ids'                          => 'المجموعات',
        'cod_states'                            => 'المدن المسموح بها للدفع عند الاستلام',
        'cash_on_delivery_fees'                 => 'رسوم الدفع عند الاستلام',
        'cod_fees'                              => 'رسوم الدفع عند الاستلام',
        'shipping_fees'                         => 'رسوم الشحن',
        'stock_quantity'                        => 'الكمية',
        'admin_percentage_commission'           => 'عمولة الموقع',
        'doc'                                   => 'المستند',
        'line_1'                                => 'العنوان 1',
        'line_2'                                => 'العنوان 2',
        'email_or_phone'                        => 'البريد الالكتروني',
        'street'                                => 'الشارع',
        'district'                              => 'الحى',
        'coupon_code'                           => 'الكوبون',
        'body'                                  => 'المحتوى',
        'transfer_photo'                        => 'صورة الحوالة',
        'aramex_name'                           => 'اسم أرامكس',
        'saee_name'                             => 'اسم ساعى',
        'fizzpa_id'                             => 'معرف فيزبا',
        'refund_amount'                         => 'إجمالي المبلغ المسترد',
        'customer_name'                         => 'اسم المستخدم',
        'content'                               => 'المحتوى',
        'stars'                                 => 'النجوم',
        'select_all_states'                     => 'اختيار جميع المناطق',
        'payment_method_id'                     => 'وسيلة الدفع',
        'model_number'                          => 'رقم الموديل',
        'sku'                                   => 'رقم SKU',
        'customer_group_id'                     => 'مجموعة العملاء',
        'launch_time'                           => 'وقت الإطلاق',
        'message'                               => 'الرسالة',
        'reason'                                => 'السبب',
        'reason_option'                         => 'السبب',
        'other_reason'                          => 'ذكر السبب',
        'buy_qty'                               => 'الكمية',
        'buy_catalog_type'                      => 'منتج من',
        'buy_catalog_ids'                       => 'العناصر',
        'get_qty'                               => 'الكمية',
        'get_catalog_type'                      => 'منتج من',
        'get_catalog_ids'                       => 'العناصر',
        'discount'                              => 'الخصم',
        'target_ids.*'                          => 'ID',
        'target_types.*'                        => 'الربط',
        'show_more_type'                        => 'النوع',
        'show_more_id'                          => 'ID',
        'from'                                  => 'من',
        'to'                                    => 'إلى',
        'gender'                                => 'الجنس',
        'order_id'                              => 'رقم الطلب',
        'product_image'                         => 'صورة المنتج',
        'size'                                  => 'المقاس',
        'status'                                => 'الحالة',
        'user_id'                               => 'رقم الشخص',
        'payment_id'                               => 'رقم عملية الدفع',
    ],

    'custom_messages' => [
        'after_or_equal_today'         => 'يجب أن يكون :attribute تاريخاً بعد اليوم أو مساوى له',
        'after_or_equal_now'           => 'يجب أن يكون :attribute بعد الآن أو مساوى له',
        'required_if_carrier_internal' => 'حقل :attribute مطلوب عندما يكون نوع الشركة داخلية',
    ],

    'error_msg' => [
        'name_req'         => 'الاسم مطلوب',
        'phone_req'        => 'الرقم مطلوب',
        'state_req'        => 'يجب ان تختار منطقة',
        'street_req'       => 'الشارع مطلوب',
        'district_req'     => 'الحي مطلوب',
        'district_req'     => 'الحي مطلوب',
        'vcode_req'        => 'يجب ان تدخل الرمز',
        'address_district' => 'الشارع مطلوب'
    ],

    'upload_rows'             => 'يمكنك تحميل كحد أقصى: سجلات الصفوف لكل دفعة. ',
    'csv_upload_invalid_data' => 'تحتوي بعض الصفوف على بيانات غير صالحة لا يمكن معالجتها. يرجى التحقق من بياناتك وحاول مرة أخرى. ',

];
