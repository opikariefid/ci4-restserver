<?php namespace Config;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var array
	 */
	public $ruleSets = [
		\CodeIgniter\Validation\Rules::class,
		\CodeIgniter\Validation\FormatRules::class,
		\CodeIgniter\Validation\FileRules::class,
		\CodeIgniter\Validation\CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------

	public $users = [
		'uid'=> 'required',
		'displayName'=> 'required',
		'emailUser'=> 'required|valid_email'
	];

	public $users_errors = [
		'uid'=> [
            'required'  => 'UID Wajib diisi'
        ],
		'displayName'=> [
            'required'  => 'Nama Wajib diisi'
		],
		'emailUser'=> [
			'required'  => 'Email wajib diisi.',
			'valid_email'  => 'Email tidak valid.'
		]
	];

	public $kontrakan = [
		'namaKontrakan'           => 'required',
		'deskripsiKontrakan'      => 'required',
		'hargaKontrakan'          => 'required|numeric',
		'provinsi'                => 'required',
		'kotaKabupaten'           => 'required',
		'kelurahan'               => 'required',
		'kecamatan'               => 'required',
		'alamat'                  => 'required',
		'KT'                      => 'required|numeric',
		'KM'                      => 'required|numeric',
		'luasBangunan'            => 'required|decimal',
		'luasTanah'               => 'required|decimal',
		'namaPemilikKontrakan'    => 'required',
		'nomorPemilikKontrakan'   => 'required|numeric'
	];

	public $kontrakan_errors = [
		'namaKontrakan'           => [
			'required' => '{field} wajib diisi.'
		],
		'deskripsiKontrakan'      => [
			'required' => '{field} wajib diisi.'
		],
		'hargaKontrakan'          => [
			'required' => '{field} wajib diisi.',
			'numeric' => '{field} wajib angka.'
		],
		'provinsi'                => [
			'required' => '{field} wajib diisi.'
		],
		'kotaKabupaten'           => [
			'required' => '{field} wajib diisi.'
		],
		'kelurahan'               => [
			'required' => '{field} wajib diisi.'
		],
		'kecamatan'               => [
			'required' => '{field} wajib diisi.'
		],
		'alamat'                  => [
			'required' => '{field} wajib diisi.'
		],
		'KT'                      => [
			'required' => '{field} wajib diisi.',
			'numeric' => '{field} wajib angka.'
		],
		'KM'                      => [
			'required' => '{field} wajib diisi.',
			'numeric' => '{field} wajib angka.'
		],
		'luasBangunan'            => [
			'required' => '{field} wajib diisi.',
			'decimal' => '{field} wajib angka.'
		],
		'luasTanah'               => [
			'required' => '{field} wajib diisi.',
			'decimal' => '{field} wajib angka.'
		],
		'namaPemilikKontrakan'    => [
			'required' => '{field} wajib diisi.'
		],
		'nomorPemilikKontrakan'   => [
			'required' => '{field} wajib diisi.',
			'numeric' => '{field} wajib angka.'
		]
	];

	public $userfav = [
		'uid'           => 'required'
	];

	public $userfav_errors = [
		'uid'=> [
            'required'  => 'UID Wajib diisi'
        ]
	];
}
