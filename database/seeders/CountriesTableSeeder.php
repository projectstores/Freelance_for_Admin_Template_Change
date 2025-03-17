<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        
        \DB::table('countries')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'United States',
                'code' => 'US',
                'is_active' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Canada',
                'code' => 'CA',
                'is_active' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Afghanistan',
                'code' => 'AF',
                'is_active' => 1,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Albania',
                'code' => 'AL',
                'is_active' => 1,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Algeria',
                'code' => 'DZ',
                'is_active' => 0,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'American Samoa',
                'code' => 'AS',
                'is_active' => 1,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Andorra',
                'code' => 'AD',
                'is_active' => 1,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Angola',
                'code' => 'AO',
                'is_active' => 1,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Anguilla',
                'code' => 'AI',
                'is_active' => 1,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Antarctica',
                'code' => 'AQ',
                'is_active' => 1,
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Antigua and/or Barbuda',
                'code' => 'AG',
                'is_active' => 1,
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Argentina',
                'code' => 'AR',
                'is_active' => 1,
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Armenia',
                'code' => 'AM',
                'is_active' => 1,
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Aruba',
                'code' => 'AW',
                'is_active' => 1,
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Australia',
                'code' => 'AU',
                'is_active' => 1,
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'Austria',
                'code' => 'AT',
                'is_active' => 1,
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'Azerbaijan',
                'code' => 'AZ',
                'is_active' => 1,
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'Bahamas',
                'code' => 'BS',
                'is_active' => 1,
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'Bahrain',
                'code' => 'BH',
                'is_active' => 1,
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'Bangladesh',
                'code' => 'BD',
                'is_active' => 1,
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'Barbados',
                'code' => 'BB',
                'is_active' => 1,
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'Belarus',
                'code' => 'BY',
                'is_active' => 1,
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'Belgium',
                'code' => 'BE',
                'is_active' => 1,
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'Belize',
                'code' => 'BZ',
                'is_active' => 1,
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'Benin',
                'code' => 'BJ',
                'is_active' => 1,
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'Bermuda',
                'code' => 'BM',
                'is_active' => 1,
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'Bhutan',
                'code' => 'BT',
                'is_active' => 1,
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'Bolivia',
                'code' => 'BO',
                'is_active' => 1,
            ),
            28 => 
            array (
                'id' => 29,
                'name' => 'Bosnia and Herzegovina',
                'code' => 'BA',
                'is_active' => 1,
            ),
            29 => 
            array (
                'id' => 30,
                'name' => 'Botswana',
                'code' => 'BW',
                'is_active' => 1,
            ),
            30 => 
            array (
                'id' => 31,
                'name' => 'Bouvet Island',
                'code' => 'BV',
                'is_active' => 1,
            ),
            31 => 
            array (
                'id' => 32,
                'name' => 'Brazil',
                'code' => 'BR',
                'is_active' => 1,
            ),
            32 => 
            array (
                'id' => 33,
                'name' => 'British lndian Ocean Territory',
                'code' => 'IO',
                'is_active' => 1,
            ),
            33 => 
            array (
                'id' => 34,
                'name' => 'Brunei Darussalam',
                'code' => 'BN',
                'is_active' => 1,
            ),
            34 => 
            array (
                'id' => 35,
                'name' => 'Bulgaria',
                'code' => 'BG',
                'is_active' => 1,
            ),
            35 => 
            array (
                'id' => 36,
                'name' => 'Burkina Faso',
                'code' => 'BF',
                'is_active' => 1,
            ),
            36 => 
            array (
                'id' => 37,
                'name' => 'Burundi',
                'code' => 'BI',
                'is_active' => 1,
            ),
            37 => 
            array (
                'id' => 38,
                'name' => 'Cambodia',
                'code' => 'KH',
                'is_active' => 1,
            ),
            38 => 
            array (
                'id' => 39,
                'name' => 'Cameroon',
                'code' => 'CM',
                'is_active' => 1,
            ),
            39 => 
            array (
                'id' => 40,
                'name' => 'Cape Verde',
                'code' => 'CV',
                'is_active' => 1,
            ),
            40 => 
            array (
                'id' => 41,
                'name' => 'Cayman Islands',
                'code' => 'KY',
                'is_active' => 1,
            ),
            41 => 
            array (
                'id' => 42,
                'name' => 'Central African Republic',
                'code' => 'CF',
                'is_active' => 1,
            ),
            42 => 
            array (
                'id' => 43,
                'name' => 'Chad',
                'code' => 'TD',
                'is_active' => 1,
            ),
            43 => 
            array (
                'id' => 44,
                'name' => 'Chile',
                'code' => 'CL',
                'is_active' => 1,
            ),
            44 => 
            array (
                'id' => 45,
                'name' => 'China',
                'code' => 'CN',
                'is_active' => 1,
            ),
            45 => 
            array (
                'id' => 46,
                'name' => 'Christmas Island',
                'code' => 'CX',
                'is_active' => 1,
            ),
            46 => 
            array (
                'id' => 47,
            'name' => 'Cocos (Keeling) Islands',
                'code' => 'CC',
                'is_active' => 1,
            ),
            47 => 
            array (
                'id' => 48,
                'name' => 'Colombia',
                'code' => 'CO',
                'is_active' => 1,
            ),
            48 => 
            array (
                'id' => 49,
                'name' => 'Comoros',
                'code' => 'KM',
                'is_active' => 1,
            ),
            49 => 
            array (
                'id' => 50,
                'name' => 'Congo',
                'code' => 'CG',
                'is_active' => 1,
            ),
            50 => 
            array (
                'id' => 51,
                'name' => 'Cook Islands',
                'code' => 'CK',
                'is_active' => 1,
            ),
            51 => 
            array (
                'id' => 52,
                'name' => 'Costa Rica',
                'code' => 'CR',
                'is_active' => 1,
            ),
            52 => 
            array (
                'id' => 53,
            'name' => 'Croatia (Hrvatska)',
                'code' => 'HR',
                'is_active' => 1,
            ),
            53 => 
            array (
                'id' => 54,
                'name' => 'Cuba',
                'code' => 'CU',
                'is_active' => 1,
            ),
            54 => 
            array (
                'id' => 55,
                'name' => 'Cyprus',
                'code' => 'CY',
                'is_active' => 1,
            ),
            55 => 
            array (
                'id' => 56,
                'name' => 'Czech Republic',
                'code' => 'CZ',
                'is_active' => 1,
            ),
            56 => 
            array (
                'id' => 57,
                'name' => 'Democratic Republic of Congo',
                'code' => 'CD',
                'is_active' => 1,
            ),
            57 => 
            array (
                'id' => 58,
                'name' => 'Denmark',
                'code' => 'DK',
                'is_active' => 1,
            ),
            58 => 
            array (
                'id' => 59,
                'name' => 'Djibouti',
                'code' => 'DJ',
                'is_active' => 1,
            ),
            59 => 
            array (
                'id' => 60,
                'name' => 'Dominica',
                'code' => 'DM',
                'is_active' => 1,
            ),
            60 => 
            array (
                'id' => 61,
                'name' => 'Dominican Republic',
                'code' => 'DO',
                'is_active' => 1,
            ),
            61 => 
            array (
                'id' => 62,
                'name' => 'East Timor',
                'code' => 'TP',
                'is_active' => 1,
            ),
            62 => 
            array (
                'id' => 63,
                'name' => 'Ecudaor',
                'code' => 'EC',
                'is_active' => 1,
            ),
            63 => 
            array (
                'id' => 64,
                'name' => 'Egypt',
                'code' => 'EG',
                'is_active' => 1,
            ),
            64 => 
            array (
                'id' => 65,
                'name' => 'El Salvador',
                'code' => 'SV',
                'is_active' => 1,
            ),
            65 => 
            array (
                'id' => 66,
                'name' => 'Equatorial Guinea',
                'code' => 'GQ',
                'is_active' => 1,
            ),
            66 => 
            array (
                'id' => 67,
                'name' => 'Eritrea',
                'code' => 'ER',
                'is_active' => 1,
            ),
            67 => 
            array (
                'id' => 68,
                'name' => 'Estonia',
                'code' => 'EE',
                'is_active' => 1,
            ),
            68 => 
            array (
                'id' => 69,
                'name' => 'Ethiopia',
                'code' => 'ET',
                'is_active' => 1,
            ),
            69 => 
            array (
                'id' => 70,
            'name' => 'Falkland Islands (Malvinas)',
                'code' => 'FK',
                'is_active' => 1,
            ),
            70 => 
            array (
                'id' => 71,
                'name' => 'Faroe Islands',
                'code' => 'FO',
                'is_active' => 1,
            ),
            71 => 
            array (
                'id' => 72,
                'name' => 'Fiji',
                'code' => 'FJ',
                'is_active' => 1,
            ),
            72 => 
            array (
                'id' => 73,
                'name' => 'Finland',
                'code' => 'FI',
                'is_active' => 1,
            ),
            73 => 
            array (
                'id' => 74,
                'name' => 'France',
                'code' => 'FR',
                'is_active' => 1,
            ),
            74 => 
            array (
                'id' => 75,
                'name' => 'France, Metropolitan',
                'code' => 'FX',
                'is_active' => 1,
            ),
            75 => 
            array (
                'id' => 76,
                'name' => 'French Guiana',
                'code' => 'GF',
                'is_active' => 1,
            ),
            76 => 
            array (
                'id' => 77,
                'name' => 'French Polynesia',
                'code' => 'PF',
                'is_active' => 1,
            ),
            77 => 
            array (
                'id' => 78,
                'name' => 'French Southern Territories',
                'code' => 'TF',
                'is_active' => 1,
            ),
            78 => 
            array (
                'id' => 79,
                'name' => 'Gabon',
                'code' => 'GA',
                'is_active' => 1,
            ),
            79 => 
            array (
                'id' => 80,
                'name' => 'Gambia',
                'code' => 'GM',
                'is_active' => 1,
            ),
            80 => 
            array (
                'id' => 81,
                'name' => 'Georgia',
                'code' => 'GE',
                'is_active' => 1,
            ),
            81 => 
            array (
                'id' => 82,
                'name' => 'Germany',
                'code' => 'DE',
                'is_active' => 1,
            ),
            82 => 
            array (
                'id' => 83,
                'name' => 'Ghana',
                'code' => 'GH',
                'is_active' => 1,
            ),
            83 => 
            array (
                'id' => 84,
                'name' => 'Gibraltar',
                'code' => 'GI',
                'is_active' => 1,
            ),
            84 => 
            array (
                'id' => 85,
                'name' => 'Greece',
                'code' => 'GR',
                'is_active' => 1,
            ),
            85 => 
            array (
                'id' => 86,
                'name' => 'Greenland',
                'code' => 'GL',
                'is_active' => 1,
            ),
            86 => 
            array (
                'id' => 87,
                'name' => 'Grenada',
                'code' => 'GD',
                'is_active' => 1,
            ),
            87 => 
            array (
                'id' => 88,
                'name' => 'Guadeloupe',
                'code' => 'GP',
                'is_active' => 1,
            ),
            88 => 
            array (
                'id' => 89,
                'name' => 'Guam',
                'code' => 'GU',
                'is_active' => 1,
            ),
            89 => 
            array (
                'id' => 90,
                'name' => 'Guatemala',
                'code' => 'GT',
                'is_active' => 1,
            ),
            90 => 
            array (
                'id' => 91,
                'name' => 'Guinea',
                'code' => 'GN',
                'is_active' => 1,
            ),
            91 => 
            array (
                'id' => 92,
                'name' => 'Guinea-Bissau',
                'code' => 'GW',
                'is_active' => 1,
            ),
            92 => 
            array (
                'id' => 93,
                'name' => 'Guyana',
                'code' => 'GY',
                'is_active' => 1,
            ),
            93 => 
            array (
                'id' => 94,
                'name' => 'Haiti',
                'code' => 'HT',
                'is_active' => 1,
            ),
            94 => 
            array (
                'id' => 95,
                'name' => 'Heard and Mc Donald Islands',
                'code' => 'HM',
                'is_active' => 1,
            ),
            95 => 
            array (
                'id' => 96,
                'name' => 'Honduras',
                'code' => 'HN',
                'is_active' => 1,
            ),
            96 => 
            array (
                'id' => 97,
                'name' => 'Hong Kong',
                'code' => 'HK',
                'is_active' => 1,
            ),
            97 => 
            array (
                'id' => 98,
                'name' => 'Hungary',
                'code' => 'HU',
                'is_active' => 1,
            ),
            98 => 
            array (
                'id' => 99,
                'name' => 'Iceland',
                'code' => 'IS',
                'is_active' => 1,
            ),
            99 => 
            array (
                'id' => 100,
                'name' => 'India',
                'code' => 'IN',
                'is_active' => 1,
            ),
            100 => 
            array (
                'id' => 101,
                'name' => 'Indonesia',
                'code' => 'ID',
                'is_active' => 1,
            ),
            101 => 
            array (
                'id' => 102,
            'name' => 'Iran (Islamic Republic of)',
                'code' => 'IR',
                'is_active' => 1,
            ),
            102 => 
            array (
                'id' => 103,
                'name' => 'Iraq',
                'code' => 'IQ',
                'is_active' => 1,
            ),
            103 => 
            array (
                'id' => 104,
                'name' => 'Ireland',
                'code' => 'IE',
                'is_active' => 1,
            ),
            104 => 
            array (
                'id' => 105,
                'name' => 'Israel',
                'code' => 'IL',
                'is_active' => 1,
            ),
            105 => 
            array (
                'id' => 106,
                'name' => 'Italy',
                'code' => 'IT',
                'is_active' => 1,
            ),
            106 => 
            array (
                'id' => 107,
                'name' => 'Ivory Coast',
                'code' => 'CI',
                'is_active' => 1,
            ),
            107 => 
            array (
                'id' => 108,
                'name' => 'Jamaica',
                'code' => 'JM',
                'is_active' => 1,
            ),
            108 => 
            array (
                'id' => 109,
                'name' => 'Japan',
                'code' => 'JP',
                'is_active' => 1,
            ),
            109 => 
            array (
                'id' => 110,
                'name' => 'Jordan',
                'code' => 'JO',
                'is_active' => 1,
            ),
            110 => 
            array (
                'id' => 111,
                'name' => 'Kazakhstan',
                'code' => 'KZ',
                'is_active' => 1,
            ),
            111 => 
            array (
                'id' => 112,
                'name' => 'Kenya',
                'code' => 'KE',
                'is_active' => 1,
            ),
            112 => 
            array (
                'id' => 113,
                'name' => 'Kiribati',
                'code' => 'KI',
                'is_active' => 1,
            ),
            113 => 
            array (
                'id' => 114,
                'name' => 'Korea, Democratic People\'s Republic of',
                'code' => 'KP',
                'is_active' => 1,
            ),
            114 => 
            array (
                'id' => 115,
                'name' => 'Korea, Republic of',
                'code' => 'KR',
                'is_active' => 1,
            ),
            115 => 
            array (
                'id' => 116,
                'name' => 'Kuwait',
                'code' => 'KW',
                'is_active' => 1,
            ),
            116 => 
            array (
                'id' => 117,
                'name' => 'Kyrgyzstan',
                'code' => 'KG',
                'is_active' => 1,
            ),
            117 => 
            array (
                'id' => 118,
                'name' => 'Lao People\'s Democratic Republic',
                'code' => 'LA',
                'is_active' => 1,
            ),
            118 => 
            array (
                'id' => 119,
                'name' => 'Latvia',
                'code' => 'LV',
                'is_active' => 1,
            ),
            119 => 
            array (
                'id' => 120,
                'name' => 'Lebanon',
                'code' => 'LB',
                'is_active' => 1,
            ),
            120 => 
            array (
                'id' => 121,
                'name' => 'Lesotho',
                'code' => 'LS',
                'is_active' => 1,
            ),
            121 => 
            array (
                'id' => 122,
                'name' => 'Liberia',
                'code' => 'LR',
                'is_active' => 1,
            ),
            122 => 
            array (
                'id' => 123,
                'name' => 'Libyan Arab Jamahiriya',
                'code' => 'LY',
                'is_active' => 1,
            ),
            123 => 
            array (
                'id' => 124,
                'name' => 'Liechtenstein',
                'code' => 'LI',
                'is_active' => 1,
            ),
            124 => 
            array (
                'id' => 125,
                'name' => 'Lithuania',
                'code' => 'LT',
                'is_active' => 1,
            ),
            125 => 
            array (
                'id' => 126,
                'name' => 'Luxembourg',
                'code' => 'LU',
                'is_active' => 1,
            ),
            126 => 
            array (
                'id' => 127,
                'name' => 'Macau',
                'code' => 'MO',
                'is_active' => 1,
            ),
            127 => 
            array (
                'id' => 128,
                'name' => 'Macedonia',
                'code' => 'MK',
                'is_active' => 1,
            ),
            128 => 
            array (
                'id' => 129,
                'name' => 'Madagascar',
                'code' => 'MG',
                'is_active' => 1,
            ),
            129 => 
            array (
                'id' => 130,
                'name' => 'Malawi',
                'code' => 'MW',
                'is_active' => 1,
            ),
            130 => 
            array (
                'id' => 131,
                'name' => 'Malaysia',
                'code' => 'MY',
                'is_active' => 1,
            ),
            131 => 
            array (
                'id' => 132,
                'name' => 'Maldives',
                'code' => 'MV',
                'is_active' => 1,
            ),
            132 => 
            array (
                'id' => 133,
                'name' => 'Mali',
                'code' => 'ML',
                'is_active' => 1,
            ),
            133 => 
            array (
                'id' => 134,
                'name' => 'Malta',
                'code' => 'MT',
                'is_active' => 1,
            ),
            134 => 
            array (
                'id' => 135,
                'name' => 'Marshall Islands',
                'code' => 'MH',
                'is_active' => 1,
            ),
            135 => 
            array (
                'id' => 136,
                'name' => 'Martinique',
                'code' => 'MQ',
                'is_active' => 1,
            ),
            136 => 
            array (
                'id' => 137,
                'name' => 'Mauritania',
                'code' => 'MR',
                'is_active' => 1,
            ),
            137 => 
            array (
                'id' => 138,
                'name' => 'Mauritius',
                'code' => 'MU',
                'is_active' => 1,
            ),
            138 => 
            array (
                'id' => 139,
                'name' => 'Mayotte',
                'code' => 'TY',
                'is_active' => 1,
            ),
            139 => 
            array (
                'id' => 140,
                'name' => 'Mexico',
                'code' => 'MX',
                'is_active' => 1,
            ),
            140 => 
            array (
                'id' => 141,
                'name' => 'Micronesia, Federated States of',
                'code' => 'FM',
                'is_active' => 1,
            ),
            141 => 
            array (
                'id' => 142,
                'name' => 'Moldova, Republic of',
                'code' => 'MD',
                'is_active' => 1,
            ),
            142 => 
            array (
                'id' => 143,
                'name' => 'Monaco',
                'code' => 'MC',
                'is_active' => 1,
            ),
            143 => 
            array (
                'id' => 144,
                'name' => 'Mongolia',
                'code' => 'MN',
                'is_active' => 1,
            ),
            144 => 
            array (
                'id' => 145,
                'name' => 'Montserrat',
                'code' => 'MS',
                'is_active' => 1,
            ),
            145 => 
            array (
                'id' => 146,
                'name' => 'Morocco',
                'code' => 'MA',
                'is_active' => 1,
            ),
            146 => 
            array (
                'id' => 147,
                'name' => 'Mozambique',
                'code' => 'MZ',
                'is_active' => 1,
            ),
            147 => 
            array (
                'id' => 148,
                'name' => 'Myanmar',
                'code' => 'MM',
                'is_active' => 1,
            ),
            148 => 
            array (
                'id' => 149,
                'name' => 'Namibia',
                'code' => 'NA',
                'is_active' => 1,
            ),
            149 => 
            array (
                'id' => 150,
                'name' => 'Nauru',
                'code' => 'NR',
                'is_active' => 1,
            ),
            150 => 
            array (
                'id' => 151,
                'name' => 'Nepal',
                'code' => 'NP',
                'is_active' => 1,
            ),
            151 => 
            array (
                'id' => 152,
                'name' => 'Netherlands',
                'code' => 'NL',
                'is_active' => 1,
            ),
            152 => 
            array (
                'id' => 153,
                'name' => 'Netherlands Antilles',
                'code' => 'AN',
                'is_active' => 1,
            ),
            153 => 
            array (
                'id' => 154,
                'name' => 'New Caledonia',
                'code' => 'NC',
                'is_active' => 1,
            ),
            154 => 
            array (
                'id' => 155,
                'name' => 'New Zealand',
                'code' => 'NZ',
                'is_active' => 1,
            ),
            155 => 
            array (
                'id' => 156,
                'name' => 'Nicaragua',
                'code' => 'NI',
                'is_active' => 1,
            ),
            156 => 
            array (
                'id' => 157,
                'name' => 'Niger',
                'code' => 'NE',
                'is_active' => 1,
            ),
            157 => 
            array (
                'id' => 158,
                'name' => 'Nigeria',
                'code' => 'NG',
                'is_active' => 1,
            ),
            158 => 
            array (
                'id' => 159,
                'name' => 'Niue',
                'code' => 'NU',
                'is_active' => 1,
            ),
            159 => 
            array (
                'id' => 160,
                'name' => 'Norfork Island',
                'code' => 'NF',
                'is_active' => 1,
            ),
            160 => 
            array (
                'id' => 161,
                'name' => 'Northern Mariana Islands',
                'code' => 'MP',
                'is_active' => 1,
            ),
            161 => 
            array (
                'id' => 162,
                'name' => 'Norway',
                'code' => 'NO',
                'is_active' => 1,
            ),
            162 => 
            array (
                'id' => 163,
                'name' => 'Oman',
                'code' => 'OM',
                'is_active' => 1,
            ),
            163 => 
            array (
                'id' => 164,
                'name' => 'Pakistan',
                'code' => 'PK',
                'is_active' => 1,
            ),
            164 => 
            array (
                'id' => 165,
                'name' => 'Palau',
                'code' => 'PW',
                'is_active' => 1,
            ),
            165 => 
            array (
                'id' => 166,
                'name' => 'Panama',
                'code' => 'PA',
                'is_active' => 1,
            ),
            166 => 
            array (
                'id' => 167,
                'name' => 'Papua New Guinea',
                'code' => 'PG',
                'is_active' => 1,
            ),
            167 => 
            array (
                'id' => 168,
                'name' => 'Paraguay',
                'code' => 'PY',
                'is_active' => 1,
            ),
            168 => 
            array (
                'id' => 169,
                'name' => 'Peru',
                'code' => 'PE',
                'is_active' => 1,
            ),
            169 => 
            array (
                'id' => 170,
                'name' => 'Philippines',
                'code' => 'PH',
                'is_active' => 1,
            ),
            170 => 
            array (
                'id' => 171,
                'name' => 'Pitcairn',
                'code' => 'PN',
                'is_active' => 1,
            ),
            171 => 
            array (
                'id' => 172,
                'name' => 'Poland',
                'code' => 'PL',
                'is_active' => 1,
            ),
            172 => 
            array (
                'id' => 173,
                'name' => 'Portugal',
                'code' => 'PT',
                'is_active' => 1,
            ),
            173 => 
            array (
                'id' => 174,
                'name' => 'Puerto Rico',
                'code' => 'PR',
                'is_active' => 1,
            ),
            174 => 
            array (
                'id' => 175,
                'name' => 'Qatar',
                'code' => 'QA',
                'is_active' => 1,
            ),
            175 => 
            array (
                'id' => 176,
                'name' => 'Republic of South Sudan',
                'code' => 'SS',
                'is_active' => 1,
            ),
            176 => 
            array (
                'id' => 177,
                'name' => 'Reunion',
                'code' => 'RE',
                'is_active' => 1,
            ),
            177 => 
            array (
                'id' => 178,
                'name' => 'Romania',
                'code' => 'RO',
                'is_active' => 1,
            ),
            178 => 
            array (
                'id' => 179,
                'name' => 'Russian Federation',
                'code' => 'RU',
                'is_active' => 1,
            ),
            179 => 
            array (
                'id' => 180,
                'name' => 'Rwanda',
                'code' => 'RW',
                'is_active' => 1,
            ),
            180 => 
            array (
                'id' => 181,
                'name' => 'Saint Kitts and Nevis',
                'code' => 'KN',
                'is_active' => 1,
            ),
            181 => 
            array (
                'id' => 182,
                'name' => 'Saint Lucia',
                'code' => 'LC',
                'is_active' => 1,
            ),
            182 => 
            array (
                'id' => 183,
                'name' => 'Saint Vincent and the Grenadines',
                'code' => 'VC',
                'is_active' => 1,
            ),
            183 => 
            array (
                'id' => 184,
                'name' => 'Samoa',
                'code' => 'WS',
                'is_active' => 1,
            ),
            184 => 
            array (
                'id' => 185,
                'name' => 'San Marino',
                'code' => 'SM',
                'is_active' => 1,
            ),
            185 => 
            array (
                'id' => 186,
                'name' => 'Sao Tome and Principe',
                'code' => 'ST',
                'is_active' => 1,
            ),
            186 => 
            array (
                'id' => 187,
                'name' => 'Saudi Arabia',
                'code' => 'SA',
                'is_active' => 1,
            ),
            187 => 
            array (
                'id' => 188,
                'name' => 'Senegal',
                'code' => 'SN',
                'is_active' => 1,
            ),
            188 => 
            array (
                'id' => 189,
                'name' => 'Serbia',
                'code' => 'RS',
                'is_active' => 1,
            ),
            189 => 
            array (
                'id' => 190,
                'name' => 'Seychelles',
                'code' => 'SC',
                'is_active' => 1,
            ),
            190 => 
            array (
                'id' => 191,
                'name' => 'Sierra Leone',
                'code' => 'SL',
                'is_active' => 1,
            ),
            191 => 
            array (
                'id' => 192,
                'name' => 'Singapore',
                'code' => 'SG',
                'is_active' => 1,
            ),
            192 => 
            array (
                'id' => 193,
                'name' => 'Slovakia',
                'code' => 'SK',
                'is_active' => 1,
            ),
            193 => 
            array (
                'id' => 194,
                'name' => 'Slovenia',
                'code' => 'SI',
                'is_active' => 1,
            ),
            194 => 
            array (
                'id' => 195,
                'name' => 'Solomon Islands',
                'code' => 'SB',
                'is_active' => 1,
            ),
            195 => 
            array (
                'id' => 196,
                'name' => 'Somalia',
                'code' => 'SO',
                'is_active' => 1,
            ),
            196 => 
            array (
                'id' => 197,
                'name' => 'South Africa',
                'code' => 'ZA',
                'is_active' => 1,
            ),
            197 => 
            array (
                'id' => 198,
                'name' => 'South Georgia South Sandwich Islands',
                'code' => 'GS',
                'is_active' => 1,
            ),
            198 => 
            array (
                'id' => 199,
                'name' => 'Spain',
                'code' => 'ES',
                'is_active' => 1,
            ),
            199 => 
            array (
                'id' => 200,
                'name' => 'Sri Lanka',
                'code' => 'LK',
                'is_active' => 1,
            ),
            200 => 
            array (
                'id' => 201,
                'name' => 'St. Helena',
                'code' => 'SH',
                'is_active' => 1,
            ),
            201 => 
            array (
                'id' => 202,
                'name' => 'St. Pierre and Miquelon',
                'code' => 'PM',
                'is_active' => 1,
            ),
            202 => 
            array (
                'id' => 203,
                'name' => 'Sudan',
                'code' => 'SD',
                'is_active' => 1,
            ),
            203 => 
            array (
                'id' => 204,
                'name' => 'Suriname',
                'code' => 'SR',
                'is_active' => 1,
            ),
            204 => 
            array (
                'id' => 205,
                'name' => 'Svalbarn and Jan Mayen Islands',
                'code' => 'SJ',
                'is_active' => 1,
            ),
            205 => 
            array (
                'id' => 206,
                'name' => 'Swaziland',
                'code' => 'SZ',
                'is_active' => 1,
            ),
            206 => 
            array (
                'id' => 207,
                'name' => 'Sweden',
                'code' => 'SE',
                'is_active' => 1,
            ),
            207 => 
            array (
                'id' => 208,
                'name' => 'Switzerland',
                'code' => 'CH',
                'is_active' => 1,
            ),
            208 => 
            array (
                'id' => 209,
                'name' => 'Syrian Arab Republic',
                'code' => 'SY',
                'is_active' => 1,
            ),
            209 => 
            array (
                'id' => 210,
                'name' => 'Taiwan',
                'code' => 'TW',
                'is_active' => 1,
            ),
            210 => 
            array (
                'id' => 211,
                'name' => 'Tajikistan',
                'code' => 'TJ',
                'is_active' => 1,
            ),
            211 => 
            array (
                'id' => 212,
                'name' => 'Tanzania, United Republic of',
                'code' => 'TZ',
                'is_active' => 1,
            ),
            212 => 
            array (
                'id' => 213,
                'name' => 'Thailand',
                'code' => 'TH',
                'is_active' => 1,
            ),
            213 => 
            array (
                'id' => 214,
                'name' => 'Togo',
                'code' => 'TG',
                'is_active' => 1,
            ),
            214 => 
            array (
                'id' => 215,
                'name' => 'Tokelau',
                'code' => 'TK',
                'is_active' => 1,
            ),
            215 => 
            array (
                'id' => 216,
                'name' => 'Tonga',
                'code' => 'TO',
                'is_active' => 1,
            ),
            216 => 
            array (
                'id' => 217,
                'name' => 'Trinidad and Tobago',
                'code' => 'TT',
                'is_active' => 1,
            ),
            217 => 
            array (
                'id' => 218,
                'name' => 'Tunisia',
                'code' => 'TN',
                'is_active' => 1,
            ),
            218 => 
            array (
                'id' => 219,
                'name' => 'Turkey',
                'code' => 'TR',
                'is_active' => 1,
            ),
            219 => 
            array (
                'id' => 220,
                'name' => 'Turkmenistan',
                'code' => 'TM',
                'is_active' => 1,
            ),
            220 => 
            array (
                'id' => 221,
                'name' => 'Turks and Caicos Islands',
                'code' => 'TC',
                'is_active' => 1,
            ),
            221 => 
            array (
                'id' => 222,
                'name' => 'Tuvalu',
                'code' => 'TV',
                'is_active' => 1,
            ),
            222 => 
            array (
                'id' => 223,
                'name' => 'Uganda',
                'code' => 'UG',
                'is_active' => 1,
            ),
            223 => 
            array (
                'id' => 224,
                'name' => 'Ukraine',
                'code' => 'UA',
                'is_active' => 1,
            ),
            224 => 
            array (
                'id' => 225,
                'name' => 'United Arab Emirates',
                'code' => 'AE',
                'is_active' => 1,
            ),
            225 => 
            array (
                'id' => 226,
                'name' => 'United Kingdom',
                'code' => 'GB',
                'is_active' => 1,
            ),
            226 => 
            array (
                'id' => 227,
                'name' => 'United States minor outlying islands',
                'code' => 'UM',
                'is_active' => 1,
            ),
            227 => 
            array (
                'id' => 228,
                'name' => 'Uruguay',
                'code' => 'UY',
                'is_active' => 1,
            ),
            228 => 
            array (
                'id' => 229,
                'name' => 'Uzbekistan',
                'code' => 'UZ',
                'is_active' => 1,
            ),
            229 => 
            array (
                'id' => 230,
                'name' => 'Vanuatu',
                'code' => 'VU',
                'is_active' => 1,
            ),
            230 => 
            array (
                'id' => 231,
                'name' => 'Vatican City State',
                'code' => 'VA',
                'is_active' => 1,
            ),
            231 => 
            array (
                'id' => 232,
                'name' => 'Venezuela',
                'code' => 'VE',
                'is_active' => 1,
            ),
            232 => 
            array (
                'id' => 233,
                'name' => 'Vietnam',
                'code' => 'VN',
                'is_active' => 1,
            ),
            233 => 
            array (
                'id' => 234,
            'name' => 'Virgin Islands (British)',
                'code' => 'VG',
                'is_active' => 1,
            ),
            234 => 
            array (
                'id' => 235,
            'name' => 'Virgin Islands (U.S.)',
                'code' => 'VI',
                'is_active' => 1,
            ),
            235 => 
            array (
                'id' => 236,
                'name' => 'Wallis and Futuna Islands',
                'code' => 'WF',
                'is_active' => 1,
            ),
            236 => 
            array (
                'id' => 237,
                'name' => 'Western Sahara',
                'code' => 'EH',
                'is_active' => 1,
            ),
            237 => 
            array (
                'id' => 238,
                'name' => 'Yemen',
                'code' => 'YE',
                'is_active' => 1,
            ),
            239 => 
            array (
                'id' => 240,
                'name' => 'Zaire',
                'code' => 'ZR',
                'is_active' => 1,
            ),
            240 => 
            array (
                'id' => 241,
                'name' => 'Zambia',
                'code' => 'ZM',
                'is_active' => 1,
            ),
            241 => 
            array (
                'id' => 242,
                'name' => 'Zimbabwe',
                'code' => 'ZW',
                'is_active' => 1,
            ),
            242 => 
            array (
                'id'        => 243,
                'name'      => 'Kosova',
                'code'      => 'KS',
                'is_active' => 1,
            ),
            243 => 
            array (
                'id'        => 244,
                'name'      => 'Palestine',
                'code'      => 'PS',
                'is_active' => 1,
            )
        ));
        
        
    }
}