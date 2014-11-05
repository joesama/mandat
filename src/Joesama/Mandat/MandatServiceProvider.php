<?php namespace Joesama\Mandat;

use Illuminate\Support\ServiceProvider;

class MandatServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{

		$path = realpath(__DIR__.'/../../');

		$this->package('joesama/mandat','DataManager',$path);

		require "{$path}/router.php";
		
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->registerPackages();
	}


	/**
	 * Registering All Routers , CPU Class
	 *
	 * @return void
	 * @author 
	 **/
	protected function registerPackages()
	{
		$router = $this->findRouter();
		$cpu = $this->findCpu();
		$modeller = $this->findModeller();

		$files = array_merge($router,$cpu,$modeller);

		foreach ($files as $class) {

			$this->app[strtolower($class)] = $this->app->share(function($app)
			{
			    return new $class;
			});

		}

	}


	/**
	 * Relist All Router File
	 *
	 * @return void
	 * @author 
	 **/
	protected function findRouter()
	{

		$router = glob('/workbench/joesama/mandat/src/Joesama/Mandat/Router/*.php');

		foreach ($router as $key => $route) {
			$router[$key] = basename($route,'.php');
		}

		return $router;
	}


	/**
	 * Relist All CPU File
	 *
	 * @return void
	 * @author 
	 **/
	protected function findCpu()
	{
		$processor = glob('/workbench/joesama/mandat/src/Joesama/Mandat/Processor/*.php');

		foreach ($processor as $key => $cpu) {
			$processor[$key] = basename($cpu,'.php');
		}

		return $processor;
	}


	/**
	 * Relist all Modeller Files
	 *
	 * @return void
	 * @author 
	 **/
	protected function findModeller()
	{
	    $dir ='/workbench/joesama/mandat/src/Joesama/Mandat/Modeller';

		$modulist = glob($dir . '/*');

		$model = array();

		for ($i = 0; $i < count($modulist); $i++) {

			if (is_dir($modulist[$i])) {

				$class2 = glob($modulist[$i]. '/*.php');

				foreach ($class2 as $value) {
					array_push($model, basename($value,'.php'));
				}
			}

		}

		return $model;
	}

	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	protected function bindContracts()
	{
		
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{

		$provider = array();

		$routers = $this->findRouter();

		foreach ($routers as $route) {
			array_push($provider, $route);
		}

		return $provider;
	}

}
