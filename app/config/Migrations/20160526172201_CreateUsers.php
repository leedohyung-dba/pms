<?php
use Migrations\AbstractMigration;

class CreateUsers extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function up()
    {
	$table = $this->table('users');
    	$table->addColumn('username', 'string', [
        	'default' => null,
        	'null' => true,
    	]);
    	$table->addColumn('password', 'string', [
        	'default' => null,
        	'null' => true,
    	]);
    	$table->addColumn('name', 'string', [
        	'default' => null,
        	'null' => true,
    	]);
    	$table->addColumn('name_kana', 'string', [
        	'default' => null,
        	'null' => true,
   	]);
    	$table->addColumn('admin_flag', 'integer', [
        	'default' => null,
        	'null' => true,
    	]);
    	$table->addColumn('created', 'datetime', [
        	'default' => null,
        	'null' => true,
    	]);
    	$table->addColumn('modified', 'datetime', [
        	'default' => null,
       		'null' => true,
    	]);
   	 $table->addColumn('deleted', 'datetime', [
      	 	 'default' => null,
       	 	'null' => true,
   	 ]);
    	$table->create();
    }
   
   public function down()
   {
       $this->dropTable('users');
   }
}
