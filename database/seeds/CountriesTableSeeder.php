<?php

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
        

        \DB::table('countries')->delete();
        
        \DB::table('countries')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Afghanistan',
                'code' => 'AF',
                'created_at' => '2019-05-28 08:52:27',
                'updated_at' => '2019-05-28 08:52:27',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Albania',
                'code' => 'AL',
                'created_at' => '2019-05-28 08:52:27',
                'updated_at' => '2019-05-28 08:52:27',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Algeria',
                'code' => 'DZ',
                'created_at' => '2019-05-28 08:52:27',
                'updated_at' => '2019-05-28 08:52:27',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'American Samoa',
                'code' => 'AS',
                'created_at' => '2019-05-28 08:52:27',
                'updated_at' => '2019-05-28 08:52:27',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Andorra',
                'code' => 'AD',
                'created_at' => '2019-05-28 08:52:27',
                'updated_at' => '2019-05-28 08:52:27',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Angola',
                'code' => 'AO',
                'created_at' => '2019-05-28 08:52:27',
                'updated_at' => '2019-05-28 08:52:27',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Anguilla',
                'code' => 'AI',
                'created_at' => '2019-05-28 08:52:27',
                'updated_at' => '2019-05-28 08:52:27',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Antarctica',
                'code' => 'AQ',
                'created_at' => '2019-05-28 08:52:27',
                'updated_at' => '2019-05-28 08:52:27',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Antigua and Barbuda',
                'code' => 'AG',
                'created_at' => '2019-05-28 08:52:27',
                'updated_at' => '2019-05-28 08:52:27',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Argentina',
                'code' => 'AR',
                'created_at' => '2019-05-28 08:52:27',
                'updated_at' => '2019-05-28 08:52:27',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Armenia',
                'code' => 'AM',
                'created_at' => '2019-05-28 08:52:27',
                'updated_at' => '2019-05-28 08:52:27',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Aruba',
                'code' => 'AW',
                'created_at' => '2019-05-28 08:52:27',
                'updated_at' => '2019-05-28 08:52:27',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Australia',
                'code' => 'AU',
                'created_at' => '2019-05-28 08:52:27',
                'updated_at' => '2019-05-28 08:52:27',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Austria',
                'code' => 'AT',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Azerbaijan',
                'code' => 'AZ',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'Bahamas',
                'code' => 'BS',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'Bahrain',
                'code' => 'BH',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'Bangladesh',
                'code' => 'BD',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'Barbados',
                'code' => 'BB',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'Belarus',
                'code' => 'BY',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'Belgium',
                'code' => 'BE',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'Belize',
                'code' => 'BZ',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'Benin',
                'code' => 'BJ',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'Bermuda',
                'code' => 'BM',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'Bhutan',
                'code' => 'BT',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'Bolivia',
                'code' => 'BO',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'Bosnia and Herzegovina',
                'code' => 'BA',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'Botswana',
                'code' => 'BW',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            28 => 
            array (
                'id' => 29,
                'name' => 'Bouvet Island',
                'code' => 'BV',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            29 => 
            array (
                'id' => 30,
                'name' => 'Brazil',
                'code' => 'BR',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            30 => 
            array (
                'id' => 31,
                'name' => 'British Indian Ocean Territory',
                'code' => 'IO',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            31 => 
            array (
                'id' => 32,
                'name' => 'Brunei',
                'code' => 'BN',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            32 => 
            array (
                'id' => 33,
                'name' => 'Bulgaria',
                'code' => 'BG',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            33 => 
            array (
                'id' => 34,
                'name' => 'Burkina Faso',
                'code' => 'BF',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            34 => 
            array (
                'id' => 35,
                'name' => 'Burundi',
                'code' => 'BI',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            35 => 
            array (
                'id' => 36,
                'name' => 'Cambodia',
                'code' => 'KH',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            36 => 
            array (
                'id' => 37,
                'name' => 'Cameroon',
                'code' => 'CM',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            37 => 
            array (
                'id' => 38,
                'name' => 'Canada',
                'code' => 'CA',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            38 => 
            array (
                'id' => 39,
                'name' => 'Cape Verde',
                'code' => 'CV',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            39 => 
            array (
                'id' => 40,
                'name' => 'Cayman Islands',
                'code' => 'KY',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            40 => 
            array (
                'id' => 41,
                'name' => 'Central African Republic',
                'code' => 'CF',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            41 => 
            array (
                'id' => 42,
                'name' => 'Chad',
                'code' => 'TD',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            42 => 
            array (
                'id' => 43,
                'name' => 'Chile',
                'code' => 'CL',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            43 => 
            array (
                'id' => 44,
                'name' => 'China',
                'code' => 'CN',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            44 => 
            array (
                'id' => 45,
                'name' => 'Christmas Island',
                'code' => 'CX',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            45 => 
            array (
                'id' => 46,
            'name' => 'Cocos (Keeling) Islands',
                'code' => 'CC',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            46 => 
            array (
                'id' => 47,
                'name' => 'Colombia',
                'code' => 'CO',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            47 => 
            array (
                'id' => 48,
                'name' => 'Comoros',
                'code' => 'KM',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            48 => 
            array (
                'id' => 49,
                'name' => 'Congo',
                'code' => 'CG',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            49 => 
            array (
                'id' => 50,
                'name' => 'Cook Islands',
                'code' => 'CK',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            50 => 
            array (
                'id' => 51,
                'name' => 'Costa Rica',
                'code' => 'CR',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            51 => 
            array (
                'id' => 52,
                'name' => 'Croatia',
                'code' => 'HR',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            52 => 
            array (
                'id' => 53,
                'name' => 'Cuba',
                'code' => 'CU',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            53 => 
            array (
                'id' => 54,
                'name' => 'Cyprus',
                'code' => 'CY',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            54 => 
            array (
                'id' => 55,
                'name' => 'Czech Republic',
                'code' => 'CZ',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            55 => 
            array (
                'id' => 56,
                'name' => 'Denmark',
                'code' => 'DK',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            56 => 
            array (
                'id' => 57,
                'name' => 'Djibouti',
                'code' => 'DJ',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            57 => 
            array (
                'id' => 58,
                'name' => 'Dominica',
                'code' => 'DM',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            58 => 
            array (
                'id' => 59,
                'name' => 'Dominican Republic',
                'code' => 'DO',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            59 => 
            array (
                'id' => 60,
                'name' => 'East Timor',
                'code' => 'TP',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            60 => 
            array (
                'id' => 61,
                'name' => 'Ecuador',
                'code' => 'EC',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            61 => 
            array (
                'id' => 62,
                'name' => 'Egypt',
                'code' => 'EG',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            62 => 
            array (
                'id' => 63,
                'name' => 'El Salvador',
                'code' => 'SV',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            63 => 
            array (
                'id' => 64,
                'name' => 'Equatorial Guinea',
                'code' => 'GQ',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            64 => 
            array (
                'id' => 65,
                'name' => 'Eritrea',
                'code' => 'ER',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            65 => 
            array (
                'id' => 66,
                'name' => 'Estonia',
                'code' => 'EE',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            66 => 
            array (
                'id' => 67,
                'name' => 'Ethiopia',
                'code' => 'ET',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            67 => 
            array (
                'id' => 68,
                'name' => 'Falkland Islands',
                'code' => 'FK',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            68 => 
            array (
                'id' => 69,
                'name' => 'Faroe Islands',
                'code' => 'FO',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            69 => 
            array (
                'id' => 70,
                'name' => 'Fiji Islands',
                'code' => 'FJ',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            70 => 
            array (
                'id' => 71,
                'name' => 'Finland',
                'code' => 'FI',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            71 => 
            array (
                'id' => 72,
                'name' => 'France',
                'code' => 'FR',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            72 => 
            array (
                'id' => 73,
                'name' => 'French Guiana',
                'code' => 'GF',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            73 => 
            array (
                'id' => 74,
                'name' => 'French Polynesia',
                'code' => 'PF',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            74 => 
            array (
                'id' => 75,
                'name' => 'French Southern territories',
                'code' => 'TF',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            75 => 
            array (
                'id' => 76,
                'name' => 'Gabon',
                'code' => 'GA',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            76 => 
            array (
                'id' => 77,
                'name' => 'Gambia',
                'code' => 'GM',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            77 => 
            array (
                'id' => 78,
                'name' => 'Georgia',
                'code' => 'GE',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            78 => 
            array (
                'id' => 79,
                'name' => 'Germany',
                'code' => 'DE',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            79 => 
            array (
                'id' => 80,
                'name' => 'Ghana',
                'code' => 'GH',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            80 => 
            array (
                'id' => 81,
                'name' => 'Gibraltar',
                'code' => 'GI',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            81 => 
            array (
                'id' => 82,
                'name' => 'Greece',
                'code' => 'GR',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            82 => 
            array (
                'id' => 83,
                'name' => 'Greenland',
                'code' => 'GL',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            83 => 
            array (
                'id' => 84,
                'name' => 'Grenada',
                'code' => 'GD',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            84 => 
            array (
                'id' => 85,
                'name' => 'Guadeloupe',
                'code' => 'GP',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            85 => 
            array (
                'id' => 86,
                'name' => 'Guam',
                'code' => 'GU',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            86 => 
            array (
                'id' => 87,
                'name' => 'Guatemala',
                'code' => 'GT',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            87 => 
            array (
                'id' => 88,
                'name' => 'Guinea',
                'code' => 'GN',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            88 => 
            array (
                'id' => 89,
                'name' => 'Guinea-Bissau',
                'code' => 'GW',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            89 => 
            array (
                'id' => 90,
                'name' => 'Guyana',
                'code' => 'GY',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            90 => 
            array (
                'id' => 91,
                'name' => 'Haiti',
                'code' => 'HT',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            91 => 
            array (
                'id' => 92,
                'name' => 'Heard Island and McDonald Islands',
                'code' => 'HM',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            92 => 
            array (
                'id' => 93,
            'name' => 'Holy See (Vatican City State)',
                'code' => 'VA',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            93 => 
            array (
                'id' => 94,
                'name' => 'Honduras',
                'code' => 'HN',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            94 => 
            array (
                'id' => 95,
                'name' => 'Hong Kong',
                'code' => 'HK',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            95 => 
            array (
                'id' => 96,
                'name' => 'Hungary',
                'code' => 'HU',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            96 => 
            array (
                'id' => 97,
                'name' => 'Iceland',
                'code' => 'IS',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            97 => 
            array (
                'id' => 98,
                'name' => 'India',
                'code' => 'IN',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            98 => 
            array (
                'id' => 99,
                'name' => 'Indonesia',
                'code' => 'ID',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            99 => 
            array (
                'id' => 100,
                'name' => 'Iran',
                'code' => 'IR',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            100 => 
            array (
                'id' => 101,
                'name' => 'Iraq',
                'code' => 'IQ',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            101 => 
            array (
                'id' => 102,
                'name' => 'Ireland',
                'code' => 'IE',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            102 => 
            array (
                'id' => 103,
                'name' => 'Israel',
                'code' => 'IL',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            103 => 
            array (
                'id' => 104,
                'name' => 'Italy',
                'code' => 'IT',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            104 => 
            array (
                'id' => 105,
                'name' => 'Ivory Coast',
                'code' => 'CI',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            105 => 
            array (
                'id' => 106,
                'name' => 'Jamaica',
                'code' => 'JM',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            106 => 
            array (
                'id' => 107,
                'name' => 'Japan',
                'code' => 'JP',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            107 => 
            array (
                'id' => 108,
                'name' => 'Jordan',
                'code' => 'JO',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            108 => 
            array (
                'id' => 109,
                'name' => 'Kazakhstan',
                'code' => 'KZ',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            109 => 
            array (
                'id' => 110,
                'name' => 'Kenya',
                'code' => 'KE',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            110 => 
            array (
                'id' => 111,
                'name' => 'Kiribati',
                'code' => 'KI',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            111 => 
            array (
                'id' => 112,
                'name' => 'Kuwait',
                'code' => 'KW',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            112 => 
            array (
                'id' => 113,
                'name' => 'Kyrgyzstan',
                'code' => 'KG',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            113 => 
            array (
                'id' => 114,
                'name' => 'Laos',
                'code' => 'LA',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            114 => 
            array (
                'id' => 115,
                'name' => 'Latvia',
                'code' => 'LV',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            115 => 
            array (
                'id' => 116,
                'name' => 'Lebanon',
                'code' => 'LB',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            116 => 
            array (
                'id' => 117,
                'name' => 'Lesotho',
                'code' => 'LS',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            117 => 
            array (
                'id' => 118,
                'name' => 'Liberia',
                'code' => 'LR',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            118 => 
            array (
                'id' => 119,
                'name' => 'Libyan Arab Jamahiriya',
                'code' => 'LY',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            119 => 
            array (
                'id' => 120,
                'name' => 'Liechtenstein',
                'code' => 'LI',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            120 => 
            array (
                'id' => 121,
                'name' => 'Lithuania',
                'code' => 'LT',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            121 => 
            array (
                'id' => 122,
                'name' => 'Luxembourg',
                'code' => 'LU',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            122 => 
            array (
                'id' => 123,
                'name' => 'Macao',
                'code' => 'MO',
                'created_at' => '2019-05-28 08:52:28',
                'updated_at' => '2019-05-28 08:52:28',
            ),
            123 => 
            array (
                'id' => 124,
                'name' => 'North Macedonia',
                'code' => 'MK',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            124 => 
            array (
                'id' => 125,
                'name' => 'Madagascar',
                'code' => 'MG',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            125 => 
            array (
                'id' => 126,
                'name' => 'Malawi',
                'code' => 'MW',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            126 => 
            array (
                'id' => 127,
                'name' => 'Malaysia',
                'code' => 'MY',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            127 => 
            array (
                'id' => 128,
                'name' => 'Maldives',
                'code' => 'MV',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            128 => 
            array (
                'id' => 129,
                'name' => 'Mali',
                'code' => 'ML',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            129 => 
            array (
                'id' => 130,
                'name' => 'Malta',
                'code' => 'MT',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            130 => 
            array (
                'id' => 131,
                'name' => 'Marshall Islands',
                'code' => 'MH',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            131 => 
            array (
                'id' => 132,
                'name' => 'Martinique',
                'code' => 'MQ',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            132 => 
            array (
                'id' => 133,
                'name' => 'Mauritania',
                'code' => 'MR',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            133 => 
            array (
                'id' => 134,
                'name' => 'Mauritius',
                'code' => 'MU',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            134 => 
            array (
                'id' => 135,
                'name' => 'Mayotte',
                'code' => 'YT',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            135 => 
            array (
                'id' => 136,
                'name' => 'Mexico',
                'code' => 'MX',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            136 => 
            array (
                'id' => 137,
                'name' => 'Micronesia, Federated States of',
                'code' => 'FM',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            137 => 
            array (
                'id' => 138,
                'name' => 'Moldova',
                'code' => 'MD',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            138 => 
            array (
                'id' => 139,
                'name' => 'Monaco',
                'code' => 'MC',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            139 => 
            array (
                'id' => 140,
                'name' => 'Mongolia',
                'code' => 'MN',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            140 => 
            array (
                'id' => 141,
                'name' => 'Montserrat',
                'code' => 'MS',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            141 => 
            array (
                'id' => 142,
                'name' => 'Morocco',
                'code' => 'MA',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            142 => 
            array (
                'id' => 143,
                'name' => 'Mozambique',
                'code' => 'MZ',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            143 => 
            array (
                'id' => 144,
                'name' => 'Myanmar',
                'code' => 'MM',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            144 => 
            array (
                'id' => 145,
                'name' => 'Namibia',
                'code' => 'NA',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            145 => 
            array (
                'id' => 146,
                'name' => 'Nauru',
                'code' => 'NR',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            146 => 
            array (
                'id' => 147,
                'name' => 'Nepal',
                'code' => 'NP',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            147 => 
            array (
                'id' => 148,
                'name' => 'Netherlands',
                'code' => 'NL',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            148 => 
            array (
                'id' => 149,
                'name' => 'Netherlands Antilles',
                'code' => 'AN',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            149 => 
            array (
                'id' => 150,
                'name' => 'New Caledonia',
                'code' => 'NC',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            150 => 
            array (
                'id' => 151,
                'name' => 'New Zealand',
                'code' => 'NZ',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            151 => 
            array (
                'id' => 152,
                'name' => 'Nicaragua',
                'code' => 'NI',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            152 => 
            array (
                'id' => 153,
                'name' => 'Niger',
                'code' => 'NE',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            153 => 
            array (
                'id' => 154,
                'name' => 'Nigeria',
                'code' => 'NG',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            154 => 
            array (
                'id' => 155,
                'name' => 'Niue',
                'code' => 'NU',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            155 => 
            array (
                'id' => 156,
                'name' => 'Norfolk Island',
                'code' => 'NF',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            156 => 
            array (
                'id' => 157,
                'name' => 'North Korea',
                'code' => 'KP',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            157 => 
            array (
                'id' => 158,
                'name' => 'Northern Ireland',
                'code' => 'GB',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            158 => 
            array (
                'id' => 159,
                'name' => 'Northern Mariana Islands',
                'code' => 'MP',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            159 => 
            array (
                'id' => 160,
                'name' => 'Norway',
                'code' => 'NO',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            160 => 
            array (
                'id' => 161,
                'name' => 'Oman',
                'code' => 'OM',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            161 => 
            array (
                'id' => 162,
                'name' => 'Pakistan',
                'code' => 'PK',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            162 => 
            array (
                'id' => 163,
                'name' => 'Palau',
                'code' => 'PW',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            163 => 
            array (
                'id' => 164,
                'name' => 'Palestine',
                'code' => 'PS',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            164 => 
            array (
                'id' => 165,
                'name' => 'Panama',
                'code' => 'PA',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            165 => 
            array (
                'id' => 166,
                'name' => 'Papua New Guinea',
                'code' => 'PG',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            166 => 
            array (
                'id' => 167,
                'name' => 'Paraguay',
                'code' => 'PY',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            167 => 
            array (
                'id' => 168,
                'name' => 'Peru',
                'code' => 'PE',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            168 => 
            array (
                'id' => 169,
                'name' => 'Philippines',
                'code' => 'PH',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            169 => 
            array (
                'id' => 170,
                'name' => 'Pitcairn',
                'code' => 'PN',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            170 => 
            array (
                'id' => 171,
                'name' => 'Poland',
                'code' => 'PL',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            171 => 
            array (
                'id' => 172,
                'name' => 'Portugal',
                'code' => 'PT',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            172 => 
            array (
                'id' => 173,
                'name' => 'Puerto Rico',
                'code' => 'PR',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            173 => 
            array (
                'id' => 174,
                'name' => 'Qatar',
                'code' => 'QA',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            174 => 
            array (
                'id' => 175,
                'name' => 'Reunion',
                'code' => 'RE',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            175 => 
            array (
                'id' => 176,
                'name' => 'Romania',
                'code' => 'RO',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            176 => 
            array (
                'id' => 177,
                'name' => 'Russian Federation',
                'code' => 'RU',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            177 => 
            array (
                'id' => 178,
                'name' => 'Rwanda',
                'code' => 'RW',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            178 => 
            array (
                'id' => 179,
                'name' => 'Saint Helena',
                'code' => 'SH',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            179 => 
            array (
                'id' => 180,
                'name' => 'Saint Kitts and Nevis',
                'code' => 'KN',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            180 => 
            array (
                'id' => 181,
                'name' => 'Saint Lucia',
                'code' => 'LC',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            181 => 
            array (
                'id' => 182,
                'name' => 'Saint Pierre and Miquelon',
                'code' => 'PM',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            182 => 
            array (
                'id' => 183,
                'name' => 'Saint Vincent and the Grenadines',
                'code' => 'VC',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            183 => 
            array (
                'id' => 184,
                'name' => 'Samoa',
                'code' => 'WS',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            184 => 
            array (
                'id' => 185,
                'name' => 'San Marino',
                'code' => 'SM',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            185 => 
            array (
                'id' => 186,
                'name' => 'Sao Tome and Principe',
                'code' => 'ST',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            186 => 
            array (
                'id' => 187,
                'name' => 'Saudi Arabia',
                'code' => 'SA',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            187 => 
            array (
                'id' => 188,
                'name' => 'Senegal',
                'code' => 'SN',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            188 => 
            array (
                'id' => 189,
                'name' => 'Seychelles',
                'code' => 'SC',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            189 => 
            array (
                'id' => 190,
                'name' => 'Sierra Leone',
                'code' => 'SL',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            190 => 
            array (
                'id' => 191,
                'name' => 'Singapore',
                'code' => 'SG',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            191 => 
            array (
                'id' => 192,
                'name' => 'Slovakia',
                'code' => 'SK',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            192 => 
            array (
                'id' => 193,
                'name' => 'Slovenia',
                'code' => 'SI',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            193 => 
            array (
                'id' => 194,
                'name' => 'Solomon Islands',
                'code' => 'SB',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            194 => 
            array (
                'id' => 195,
                'name' => 'Somalia',
                'code' => 'SO',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            195 => 
            array (
                'id' => 196,
                'name' => 'South Africa',
                'code' => 'ZA',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            196 => 
            array (
                'id' => 197,
                'name' => 'South Georgia and the South Sandwich Islands',
                'code' => 'GS',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            197 => 
            array (
                'id' => 198,
                'name' => 'South Korea',
                'code' => 'KR',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            198 => 
            array (
                'id' => 199,
                'name' => 'South Sudan',
                'code' => 'SS',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            199 => 
            array (
                'id' => 200,
                'name' => 'Spain',
                'code' => 'ES',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            200 => 
            array (
                'id' => 201,
                'name' => 'Sri Lanka',
                'code' => 'LK',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            201 => 
            array (
                'id' => 202,
                'name' => 'Sudan',
                'code' => 'SD',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            202 => 
            array (
                'id' => 203,
                'name' => 'Suriname',
                'code' => 'SR',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            203 => 
            array (
                'id' => 204,
                'name' => 'Svalbard and Jan Mayen',
                'code' => 'SJ',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            204 => 
            array (
                'id' => 205,
                'name' => 'Swaziland',
                'code' => 'SZ',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            205 => 
            array (
                'id' => 206,
                'name' => 'Sweden',
                'code' => 'SE',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            206 => 
            array (
                'id' => 207,
                'name' => 'Switzerland',
                'code' => 'CH',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            207 => 
            array (
                'id' => 208,
                'name' => 'Syria',
                'code' => 'SY',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            208 => 
            array (
                'id' => 209,
                'name' => 'Tajikistan',
                'code' => 'TJ',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            209 => 
            array (
                'id' => 210,
                'name' => 'Tanzania',
                'code' => 'TZ',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            210 => 
            array (
                'id' => 211,
                'name' => 'Thailand',
                'code' => 'TH',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            211 => 
            array (
                'id' => 212,
                'name' => 'The Democratic Republic of Congo',
                'code' => 'CD',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            212 => 
            array (
                'id' => 213,
                'name' => 'Togo',
                'code' => 'TG',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            213 => 
            array (
                'id' => 214,
                'name' => 'Tokelau',
                'code' => 'TK',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            214 => 
            array (
                'id' => 215,
                'name' => 'Tonga',
                'code' => 'TO',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            215 => 
            array (
                'id' => 216,
                'name' => 'Trinidad and Tobago',
                'code' => 'TT',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            216 => 
            array (
                'id' => 217,
                'name' => 'Tunisia',
                'code' => 'TN',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            217 => 
            array (
                'id' => 218,
                'name' => 'Turkey',
                'code' => 'TR',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            218 => 
            array (
                'id' => 219,
                'name' => 'Turkmenistan',
                'code' => 'TM',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            219 => 
            array (
                'id' => 220,
                'name' => 'Turks and Caicos Islands',
                'code' => 'TC',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            220 => 
            array (
                'id' => 221,
                'name' => 'Tuvalu',
                'code' => 'TV',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            221 => 
            array (
                'id' => 222,
                'name' => 'Uganda',
                'code' => 'UG',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            222 => 
            array (
                'id' => 223,
                'name' => 'Ukraine',
                'code' => 'UA',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            223 => 
            array (
                'id' => 224,
                'name' => 'United Arab Emirates',
                'code' => 'AE',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            224 => 
            array (
                'id' => 225,
                'name' => 'United Kingdom',
                'code' => 'GB',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            225 => 
            array (
                'id' => 226,
                'name' => 'United States',
                'code' => 'US',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            226 => 
            array (
                'id' => 227,
                'name' => 'United States Minor Outlying Islands',
                'code' => 'UM',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            227 => 
            array (
                'id' => 228,
                'name' => 'Uruguay',
                'code' => 'UY',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            228 => 
            array (
                'id' => 229,
                'name' => 'Uzbekistan',
                'code' => 'UZ',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            229 => 
            array (
                'id' => 230,
                'name' => 'Vanuatu',
                'code' => 'VU',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            230 => 
            array (
                'id' => 231,
                'name' => 'Venezuela',
                'code' => 'VE',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            231 => 
            array (
                'id' => 232,
                'name' => 'Vietnam',
                'code' => 'VN',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            232 => 
            array (
                'id' => 233,
                'name' => 'Virgin Islands, British',
                'code' => 'VG',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            233 => 
            array (
                'id' => 234,
                'name' => 'Virgin Islands, U.S.',
                'code' => 'VI',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            234 => 
            array (
                'id' => 235,
                'name' => 'Wallis and Futuna',
                'code' => 'WF',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            235 => 
            array (
                'id' => 236,
                'name' => 'Western Sahara',
                'code' => 'EH',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            236 => 
            array (
                'id' => 237,
                'name' => 'Yemen',
                'code' => 'YE',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            237 => 
            array (
                'id' => 238,
                'name' => 'Yugoslavia',
                'code' => 'YU',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            238 => 
            array (
                'id' => 239,
                'name' => 'Zambia',
                'code' => 'ZM',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
            239 => 
            array (
                'id' => 240,
                'name' => 'Zimbabwe',
                'code' => 'ZW',
                'created_at' => '2019-05-28 08:52:29',
                'updated_at' => '2019-05-28 08:52:29',
            ),
        ));
        
        
    }
}