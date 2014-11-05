<?php namespace Joesama\Mandat\Processor;

use \Exception;
use \Schema;
use \Config;
use \Artisan;
use \Redirect;
use Symfony\Component\Console\Output\BufferedOutput;

class SetupProcessor{


	/**
	 * Process main page action
	 *
	 * @return void
	 * @author 
	 **/
	public function index($listener)
	{
		$data = array();
		$data['db'] = $this->checkSchema();

		return $listener->showSetup($data);
	}


	/**
	 * Start Runnning Migration For Packages
	 *
	 * @return void
	 * @author 
	 **/
	public function process($listener,$input)
	{
		try{

			$output = new BufferedOutput;

			Artisan::call('migrate', array('--force' => true , '--bench' => 'joesama/mandat'), $output);

			$migrate['migrate']['status'] = TRUE;
			$migrate['migrate']['data']['success'] = $output->fetch();

			return Redirect::to('data');

		}catch(Exception $e){

			$migrate['migrate']['status'] = FALSE;
            $migrate['migrate']['data']['error'] = $e->getMessage();

            Artisan::call('migrate:rollback');
            
            $data['db'] = $this->checkSchema();

            return $listener->showSetup(array_merge($data,$migrate));
		}

	}


	/**
     * Check database schemas.
     *
     * @return array
     */
    protected function checkSchema()
    {
        $schema = ['is' => true];
        ;
        try {
            $schema['name'] = \DB::connection()->getDatabaseName();

            $schemaList = Config::get('DataManager::schema.list');

            foreach ($schemaList as $name) {
        		$schema['table'][$name] = (!Schema::hasTable($name)) ? TRUE : FALSE;
            }
			
        } catch (PDOException $e) {
            $schema['is'] = false;
            $schema['data']['error'] = $e->getMessage();
        }

        return $schema;
    }

}
