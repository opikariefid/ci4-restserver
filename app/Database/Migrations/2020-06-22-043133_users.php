<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'uid'           		=> [
				'type'              => 'VARCHAR',
				'constraint'        => '50'
			],
			'displayName'      		=> [
				'type'              => 'VARCHAR',
				'constraint'        => '50'
			],
			'emailUser'        		=> [
				'type'              => 'VARCHAR',
				'constraint'        => '50'
			],
			'transaksi'        		=> [
				'type'              => 'TEXT',
				'null'				=> TRUE
			],
		]);
		$this->forge->addKey('uid', TRUE);
		$this->forge->createTable('users');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
