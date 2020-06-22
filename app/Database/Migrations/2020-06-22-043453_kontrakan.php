<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kontrakan extends Migration
{
	public function up()
	{		
		$this->forge->addField([
			'idKontrakan'      		=> [
				'type'              => 'INT',
				'constraint'        => 11
			],
			'namaKontrakan'    		=> [
				'type'              => 'VARCHAR',
				'constraint'        => '50'
			],
			'urlGambarKontrakan'	=> [
				'type'              => 'TEXT'
			],
			'deskripsiKontrakan'	=> [
				'type'              => 'TEXT'
			],
			'hargaKontrakan'   		=> [
				'type'              => 'INT',
				'constraint'        => 11
			],
			'provinsi'      		=> [
				'type'              => 'VARCHAR',
				'constraint'        => '50'
			],
			'kotaKabupaten'    		=> [
				'type'              => 'VARCHAR',
				'constraint'        => '50'
			],
			'kelurahan'  	  		=> [
				'type'              => 'VARCHAR',
				'constraint'        => '50'
			],
			'kecamatan'	    		=> [
				'type'              => 'VARCHAR',
				'constraint'        => '50'
			],
			'alamat'				=> [
				'type'              => 'TEXT'
			],
			'publishDate'			=> [
				'type'              => 'TIMESTAMP'
			],
			'KT'			   		=> [
				'type'              => 'INT',
				'constraint'        => 11
			],
			'KM'   					=> [
				'type'              => 'INT',
				'constraint'        => 11
			],
			'luasBangunan'   		=> [
				'type'              => 'DECIMAL',
				'constraint'        => 10.0
			],
			'luasTanah'				=> [
				'type'              => 'DECIMAL',
				'constraint'        => 10.0
			],
			'namaPemilikKontrakan'	=> [
				'type'              => 'VARCHAR',
				'constraint'        => '50'
			],
			'nomorPemilikKontrakan'	=> [
				'type'              => 'INT',
				'constraint'        => 10
			],
			'disimpanUser'			=> [
				'type'              => 'TEXT'
			],
			'status'				=> [
				'type'              => 'TINYINT',
				'constraint'        => 1
			],
			'publish'				=> [
				'type'              => 'TINYINT',
				'constraint'        => 1
			],
		]);
		$this->forge->addKey('idKontrakan', TRUE);
		$this->forge->createTable('kontrakan');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
