<?php
namespace PHPSTORM_META {

   /**
    * PhpStorm Meta file, to provide autocomplete information for PhpStorm
    * Generated on 2018-05-24 17:52:15.
    *
    * @author Barry vd. Heuvel <barryvdh@gmail.com>
    * @see https://github.com/barryvdh/laravel-ide-helper
    */
    override(new \Illuminate\Contracts\Container\Container, map([
        '' => '@',
        'db' => \Illuminate\Database\DatabaseManager::class,
        'config' => \Illuminate\Config\Repository::class,
        'db.factory' => \Illuminate\Database\Connectors\ConnectionFactory::class,
        'db.connection' => \Illuminate\Database\PostgresConnection::class,
        'Illuminate\Contracts\Queue\EntityResolver' => \Illuminate\Database\Eloquent\QueueEntityResolver::class,
        'events' => \Illuminate\Events\Dispatcher::class,
        'view' => \Illuminate\View\Factory::class,
        'view.finder' => \Illuminate\View\FileViewFinder::class,
        'view.engine.resolver' => \Illuminate\View\Engines\EngineResolver::class,
        'blade.compiler' => \Illuminate\View\Compilers\BladeCompiler::class,
        'files' => \Illuminate\Filesystem\Filesystem::class,
        'Illuminate\Contracts\Debug\ExceptionHandler' => \App\Exceptions\Handler::class,
        'Illuminate\Contracts\Console\Kernel' => \App\Console\Kernel::class,
        'Barryvdh\Debugbar\LaravelDebugbar' => \Barryvdh\Debugbar\LaravelDebugbar::class,
        'command.debugbar.clear' => \Barryvdh\Debugbar\Console\ClearCommand::class,
        'command.ide-helper.generate' => \Barryvdh\LaravelIdeHelper\Console\GeneratorCommand::class,
        'command.ide-helper.models' => \Barryvdh\LaravelIdeHelper\Console\ModelsCommand::class,
        'command.ide-helper.meta' => \Barryvdh\LaravelIdeHelper\Console\MetaCommand::class,
        'command.ide-helper.eloquent' => \Barryvdh\LaravelIdeHelper\Console\EloquentCommand::class,
        'cache' => \Illuminate\Cache\CacheManager::class,
        'cache.store' => \Illuminate\Cache\Repository::class,
        'memcached.connector' => \Illuminate\Cache\MemcachedConnector::class,
        'queue' => \Illuminate\Queue\QueueManager::class,
        'queue.connection' => \Illuminate\Queue\SyncQueue::class,
        'queue.worker' => \Illuminate\Queue\Worker::class,
        'queue.listener' => \Illuminate\Queue\Listener::class,
        'queue.failer' => \Illuminate\Queue\Failed\DatabaseFailedJobProvider::class,
        'migration.repository' => \Illuminate\Database\Migrations\DatabaseMigrationRepository::class,
        'migrator' => \Illuminate\Database\Migrations\Migrator::class,
        'migration.creator' => \Illuminate\Database\Migrations\MigrationCreator::class,
        'command.cache.clear' => \Illuminate\Cache\Console\ClearCommand::class,
        'command.cache.forget' => \Illuminate\Cache\Console\ForgetCommand::class,
        'command.auth.resets.clear' => \Illuminate\Auth\Console\ClearResetsCommand::class,
        'command.migrate' => \Illuminate\Database\Console\Migrations\MigrateCommand::class,
        'command.migrate.install' => \Illuminate\Database\Console\Migrations\InstallCommand::class,
        'command.migrate.fresh' => \Illuminate\Database\Console\Migrations\FreshCommand::class,
        'command.migrate.refresh' => \Illuminate\Database\Console\Migrations\RefreshCommand::class,
        'command.migrate.reset' => \Illuminate\Database\Console\Migrations\ResetCommand::class,
        'command.migrate.rollback' => \Illuminate\Database\Console\Migrations\RollbackCommand::class,
        'command.migrate.status' => \Illuminate\Database\Console\Migrations\StatusCommand::class,
        'command.queue.failed' => \Illuminate\Queue\Console\ListFailedCommand::class,
        'command.queue.flush' => \Illuminate\Queue\Console\FlushFailedCommand::class,
        'command.queue.forget' => \Illuminate\Queue\Console\ForgetFailedCommand::class,
        'command.queue.listen' => \Illuminate\Queue\Console\ListenCommand::class,
        'command.queue.restart' => \Illuminate\Queue\Console\RestartCommand::class,
        'command.queue.retry' => \Illuminate\Queue\Console\RetryCommand::class,
        'command.queue.work' => \Illuminate\Queue\Console\WorkCommand::class,
        'command.seed' => \Illuminate\Database\Console\Seeds\SeedCommand::class,
        'Illuminate\Console\Scheduling\ScheduleFinishCommand' => \Illuminate\Console\Scheduling\ScheduleFinishCommand::class,
        'Illuminate\Console\Scheduling\ScheduleRunCommand' => \Illuminate\Console\Scheduling\ScheduleRunCommand::class,
        'command.cache.table' => \Illuminate\Cache\Console\CacheTableCommand::class,
        'command.migrate.make' => \Illuminate\Database\Console\Migrations\MigrateMakeCommand::class,
        'command.queue.failed-table' => \Illuminate\Queue\Console\FailedTableCommand::class,
        'command.queue.table' => \Illuminate\Queue\Console\TableCommand::class,
        'command.seeder.make' => \Illuminate\Database\Console\Seeds\SeederMakeCommand::class,
        'composer' => \Illuminate\Support\Composer::class,
    ]));
    override(\Illuminate\Contracts\Container\Container::make(0), map([
        '' => '@',
        'db' => \Illuminate\Database\DatabaseManager::class,
        'config' => \Illuminate\Config\Repository::class,
        'db.factory' => \Illuminate\Database\Connectors\ConnectionFactory::class,
        'db.connection' => \Illuminate\Database\PostgresConnection::class,
        'Illuminate\Contracts\Queue\EntityResolver' => \Illuminate\Database\Eloquent\QueueEntityResolver::class,
        'events' => \Illuminate\Events\Dispatcher::class,
        'view' => \Illuminate\View\Factory::class,
        'view.finder' => \Illuminate\View\FileViewFinder::class,
        'view.engine.resolver' => \Illuminate\View\Engines\EngineResolver::class,
        'blade.compiler' => \Illuminate\View\Compilers\BladeCompiler::class,
        'files' => \Illuminate\Filesystem\Filesystem::class,
        'Illuminate\Contracts\Debug\ExceptionHandler' => \App\Exceptions\Handler::class,
        'Illuminate\Contracts\Console\Kernel' => \App\Console\Kernel::class,
        'Barryvdh\Debugbar\LaravelDebugbar' => \Barryvdh\Debugbar\LaravelDebugbar::class,
        'command.debugbar.clear' => \Barryvdh\Debugbar\Console\ClearCommand::class,
        'command.ide-helper.generate' => \Barryvdh\LaravelIdeHelper\Console\GeneratorCommand::class,
        'command.ide-helper.models' => \Barryvdh\LaravelIdeHelper\Console\ModelsCommand::class,
        'command.ide-helper.meta' => \Barryvdh\LaravelIdeHelper\Console\MetaCommand::class,
        'command.ide-helper.eloquent' => \Barryvdh\LaravelIdeHelper\Console\EloquentCommand::class,
        'cache' => \Illuminate\Cache\CacheManager::class,
        'cache.store' => \Illuminate\Cache\Repository::class,
        'memcached.connector' => \Illuminate\Cache\MemcachedConnector::class,
        'queue' => \Illuminate\Queue\QueueManager::class,
        'queue.connection' => \Illuminate\Queue\SyncQueue::class,
        'queue.worker' => \Illuminate\Queue\Worker::class,
        'queue.listener' => \Illuminate\Queue\Listener::class,
        'queue.failer' => \Illuminate\Queue\Failed\DatabaseFailedJobProvider::class,
        'migration.repository' => \Illuminate\Database\Migrations\DatabaseMigrationRepository::class,
        'migrator' => \Illuminate\Database\Migrations\Migrator::class,
        'migration.creator' => \Illuminate\Database\Migrations\MigrationCreator::class,
        'command.cache.clear' => \Illuminate\Cache\Console\ClearCommand::class,
        'command.cache.forget' => \Illuminate\Cache\Console\ForgetCommand::class,
        'command.auth.resets.clear' => \Illuminate\Auth\Console\ClearResetsCommand::class,
        'command.migrate' => \Illuminate\Database\Console\Migrations\MigrateCommand::class,
        'command.migrate.install' => \Illuminate\Database\Console\Migrations\InstallCommand::class,
        'command.migrate.fresh' => \Illuminate\Database\Console\Migrations\FreshCommand::class,
        'command.migrate.refresh' => \Illuminate\Database\Console\Migrations\RefreshCommand::class,
        'command.migrate.reset' => \Illuminate\Database\Console\Migrations\ResetCommand::class,
        'command.migrate.rollback' => \Illuminate\Database\Console\Migrations\RollbackCommand::class,
        'command.migrate.status' => \Illuminate\Database\Console\Migrations\StatusCommand::class,
        'command.queue.failed' => \Illuminate\Queue\Console\ListFailedCommand::class,
        'command.queue.flush' => \Illuminate\Queue\Console\FlushFailedCommand::class,
        'command.queue.forget' => \Illuminate\Queue\Console\ForgetFailedCommand::class,
        'command.queue.listen' => \Illuminate\Queue\Console\ListenCommand::class,
        'command.queue.restart' => \Illuminate\Queue\Console\RestartCommand::class,
        'command.queue.retry' => \Illuminate\Queue\Console\RetryCommand::class,
        'command.queue.work' => \Illuminate\Queue\Console\WorkCommand::class,
        'command.seed' => \Illuminate\Database\Console\Seeds\SeedCommand::class,
        'Illuminate\Console\Scheduling\ScheduleFinishCommand' => \Illuminate\Console\Scheduling\ScheduleFinishCommand::class,
        'Illuminate\Console\Scheduling\ScheduleRunCommand' => \Illuminate\Console\Scheduling\ScheduleRunCommand::class,
        'command.cache.table' => \Illuminate\Cache\Console\CacheTableCommand::class,
        'command.migrate.make' => \Illuminate\Database\Console\Migrations\MigrateMakeCommand::class,
        'command.queue.failed-table' => \Illuminate\Queue\Console\FailedTableCommand::class,
        'command.queue.table' => \Illuminate\Queue\Console\TableCommand::class,
        'command.seeder.make' => \Illuminate\Database\Console\Seeds\SeederMakeCommand::class,
        'composer' => \Illuminate\Support\Composer::class,
    ]));
    override(\Illuminate\Contracts\Container\Container::makeWith(0), map([
        '' => '@',
        'db' => \Illuminate\Database\DatabaseManager::class,
        'config' => \Illuminate\Config\Repository::class,
        'db.factory' => \Illuminate\Database\Connectors\ConnectionFactory::class,
        'db.connection' => \Illuminate\Database\PostgresConnection::class,
        'Illuminate\Contracts\Queue\EntityResolver' => \Illuminate\Database\Eloquent\QueueEntityResolver::class,
        'events' => \Illuminate\Events\Dispatcher::class,
        'view' => \Illuminate\View\Factory::class,
        'view.finder' => \Illuminate\View\FileViewFinder::class,
        'view.engine.resolver' => \Illuminate\View\Engines\EngineResolver::class,
        'blade.compiler' => \Illuminate\View\Compilers\BladeCompiler::class,
        'files' => \Illuminate\Filesystem\Filesystem::class,
        'Illuminate\Contracts\Debug\ExceptionHandler' => \App\Exceptions\Handler::class,
        'Illuminate\Contracts\Console\Kernel' => \App\Console\Kernel::class,
        'Barryvdh\Debugbar\LaravelDebugbar' => \Barryvdh\Debugbar\LaravelDebugbar::class,
        'command.debugbar.clear' => \Barryvdh\Debugbar\Console\ClearCommand::class,
        'command.ide-helper.generate' => \Barryvdh\LaravelIdeHelper\Console\GeneratorCommand::class,
        'command.ide-helper.models' => \Barryvdh\LaravelIdeHelper\Console\ModelsCommand::class,
        'command.ide-helper.meta' => \Barryvdh\LaravelIdeHelper\Console\MetaCommand::class,
        'command.ide-helper.eloquent' => \Barryvdh\LaravelIdeHelper\Console\EloquentCommand::class,
        'cache' => \Illuminate\Cache\CacheManager::class,
        'cache.store' => \Illuminate\Cache\Repository::class,
        'memcached.connector' => \Illuminate\Cache\MemcachedConnector::class,
        'queue' => \Illuminate\Queue\QueueManager::class,
        'queue.connection' => \Illuminate\Queue\SyncQueue::class,
        'queue.worker' => \Illuminate\Queue\Worker::class,
        'queue.listener' => \Illuminate\Queue\Listener::class,
        'queue.failer' => \Illuminate\Queue\Failed\DatabaseFailedJobProvider::class,
        'migration.repository' => \Illuminate\Database\Migrations\DatabaseMigrationRepository::class,
        'migrator' => \Illuminate\Database\Migrations\Migrator::class,
        'migration.creator' => \Illuminate\Database\Migrations\MigrationCreator::class,
        'command.cache.clear' => \Illuminate\Cache\Console\ClearCommand::class,
        'command.cache.forget' => \Illuminate\Cache\Console\ForgetCommand::class,
        'command.auth.resets.clear' => \Illuminate\Auth\Console\ClearResetsCommand::class,
        'command.migrate' => \Illuminate\Database\Console\Migrations\MigrateCommand::class,
        'command.migrate.install' => \Illuminate\Database\Console\Migrations\InstallCommand::class,
        'command.migrate.fresh' => \Illuminate\Database\Console\Migrations\FreshCommand::class,
        'command.migrate.refresh' => \Illuminate\Database\Console\Migrations\RefreshCommand::class,
        'command.migrate.reset' => \Illuminate\Database\Console\Migrations\ResetCommand::class,
        'command.migrate.rollback' => \Illuminate\Database\Console\Migrations\RollbackCommand::class,
        'command.migrate.status' => \Illuminate\Database\Console\Migrations\StatusCommand::class,
        'command.queue.failed' => \Illuminate\Queue\Console\ListFailedCommand::class,
        'command.queue.flush' => \Illuminate\Queue\Console\FlushFailedCommand::class,
        'command.queue.forget' => \Illuminate\Queue\Console\ForgetFailedCommand::class,
        'command.queue.listen' => \Illuminate\Queue\Console\ListenCommand::class,
        'command.queue.restart' => \Illuminate\Queue\Console\RestartCommand::class,
        'command.queue.retry' => \Illuminate\Queue\Console\RetryCommand::class,
        'command.queue.work' => \Illuminate\Queue\Console\WorkCommand::class,
        'command.seed' => \Illuminate\Database\Console\Seeds\SeedCommand::class,
        'Illuminate\Console\Scheduling\ScheduleFinishCommand' => \Illuminate\Console\Scheduling\ScheduleFinishCommand::class,
        'Illuminate\Console\Scheduling\ScheduleRunCommand' => \Illuminate\Console\Scheduling\ScheduleRunCommand::class,
        'command.cache.table' => \Illuminate\Cache\Console\CacheTableCommand::class,
        'command.migrate.make' => \Illuminate\Database\Console\Migrations\MigrateMakeCommand::class,
        'command.queue.failed-table' => \Illuminate\Queue\Console\FailedTableCommand::class,
        'command.queue.table' => \Illuminate\Queue\Console\TableCommand::class,
        'command.seeder.make' => \Illuminate\Database\Console\Seeds\SeederMakeCommand::class,
        'composer' => \Illuminate\Support\Composer::class,
    ]));
    override(\App::make(0), map([
        '' => '@',
        'db' => \Illuminate\Database\DatabaseManager::class,
        'config' => \Illuminate\Config\Repository::class,
        'db.factory' => \Illuminate\Database\Connectors\ConnectionFactory::class,
        'db.connection' => \Illuminate\Database\PostgresConnection::class,
        'Illuminate\Contracts\Queue\EntityResolver' => \Illuminate\Database\Eloquent\QueueEntityResolver::class,
        'events' => \Illuminate\Events\Dispatcher::class,
        'view' => \Illuminate\View\Factory::class,
        'view.finder' => \Illuminate\View\FileViewFinder::class,
        'view.engine.resolver' => \Illuminate\View\Engines\EngineResolver::class,
        'blade.compiler' => \Illuminate\View\Compilers\BladeCompiler::class,
        'files' => \Illuminate\Filesystem\Filesystem::class,
        'Illuminate\Contracts\Debug\ExceptionHandler' => \App\Exceptions\Handler::class,
        'Illuminate\Contracts\Console\Kernel' => \App\Console\Kernel::class,
        'Barryvdh\Debugbar\LaravelDebugbar' => \Barryvdh\Debugbar\LaravelDebugbar::class,
        'command.debugbar.clear' => \Barryvdh\Debugbar\Console\ClearCommand::class,
        'command.ide-helper.generate' => \Barryvdh\LaravelIdeHelper\Console\GeneratorCommand::class,
        'command.ide-helper.models' => \Barryvdh\LaravelIdeHelper\Console\ModelsCommand::class,
        'command.ide-helper.meta' => \Barryvdh\LaravelIdeHelper\Console\MetaCommand::class,
        'command.ide-helper.eloquent' => \Barryvdh\LaravelIdeHelper\Console\EloquentCommand::class,
        'cache' => \Illuminate\Cache\CacheManager::class,
        'cache.store' => \Illuminate\Cache\Repository::class,
        'memcached.connector' => \Illuminate\Cache\MemcachedConnector::class,
        'queue' => \Illuminate\Queue\QueueManager::class,
        'queue.connection' => \Illuminate\Queue\SyncQueue::class,
        'queue.worker' => \Illuminate\Queue\Worker::class,
        'queue.listener' => \Illuminate\Queue\Listener::class,
        'queue.failer' => \Illuminate\Queue\Failed\DatabaseFailedJobProvider::class,
        'migration.repository' => \Illuminate\Database\Migrations\DatabaseMigrationRepository::class,
        'migrator' => \Illuminate\Database\Migrations\Migrator::class,
        'migration.creator' => \Illuminate\Database\Migrations\MigrationCreator::class,
        'command.cache.clear' => \Illuminate\Cache\Console\ClearCommand::class,
        'command.cache.forget' => \Illuminate\Cache\Console\ForgetCommand::class,
        'command.auth.resets.clear' => \Illuminate\Auth\Console\ClearResetsCommand::class,
        'command.migrate' => \Illuminate\Database\Console\Migrations\MigrateCommand::class,
        'command.migrate.install' => \Illuminate\Database\Console\Migrations\InstallCommand::class,
        'command.migrate.fresh' => \Illuminate\Database\Console\Migrations\FreshCommand::class,
        'command.migrate.refresh' => \Illuminate\Database\Console\Migrations\RefreshCommand::class,
        'command.migrate.reset' => \Illuminate\Database\Console\Migrations\ResetCommand::class,
        'command.migrate.rollback' => \Illuminate\Database\Console\Migrations\RollbackCommand::class,
        'command.migrate.status' => \Illuminate\Database\Console\Migrations\StatusCommand::class,
        'command.queue.failed' => \Illuminate\Queue\Console\ListFailedCommand::class,
        'command.queue.flush' => \Illuminate\Queue\Console\FlushFailedCommand::class,
        'command.queue.forget' => \Illuminate\Queue\Console\ForgetFailedCommand::class,
        'command.queue.listen' => \Illuminate\Queue\Console\ListenCommand::class,
        'command.queue.restart' => \Illuminate\Queue\Console\RestartCommand::class,
        'command.queue.retry' => \Illuminate\Queue\Console\RetryCommand::class,
        'command.queue.work' => \Illuminate\Queue\Console\WorkCommand::class,
        'command.seed' => \Illuminate\Database\Console\Seeds\SeedCommand::class,
        'Illuminate\Console\Scheduling\ScheduleFinishCommand' => \Illuminate\Console\Scheduling\ScheduleFinishCommand::class,
        'Illuminate\Console\Scheduling\ScheduleRunCommand' => \Illuminate\Console\Scheduling\ScheduleRunCommand::class,
        'command.cache.table' => \Illuminate\Cache\Console\CacheTableCommand::class,
        'command.migrate.make' => \Illuminate\Database\Console\Migrations\MigrateMakeCommand::class,
        'command.queue.failed-table' => \Illuminate\Queue\Console\FailedTableCommand::class,
        'command.queue.table' => \Illuminate\Queue\Console\TableCommand::class,
        'command.seeder.make' => \Illuminate\Database\Console\Seeds\SeederMakeCommand::class,
        'composer' => \Illuminate\Support\Composer::class,
    ]));
    override(\App::makeWith(0), map([
        '' => '@',
        'db' => \Illuminate\Database\DatabaseManager::class,
        'config' => \Illuminate\Config\Repository::class,
        'db.factory' => \Illuminate\Database\Connectors\ConnectionFactory::class,
        'db.connection' => \Illuminate\Database\PostgresConnection::class,
        'Illuminate\Contracts\Queue\EntityResolver' => \Illuminate\Database\Eloquent\QueueEntityResolver::class,
        'events' => \Illuminate\Events\Dispatcher::class,
        'view' => \Illuminate\View\Factory::class,
        'view.finder' => \Illuminate\View\FileViewFinder::class,
        'view.engine.resolver' => \Illuminate\View\Engines\EngineResolver::class,
        'blade.compiler' => \Illuminate\View\Compilers\BladeCompiler::class,
        'files' => \Illuminate\Filesystem\Filesystem::class,
        'Illuminate\Contracts\Debug\ExceptionHandler' => \App\Exceptions\Handler::class,
        'Illuminate\Contracts\Console\Kernel' => \App\Console\Kernel::class,
        'Barryvdh\Debugbar\LaravelDebugbar' => \Barryvdh\Debugbar\LaravelDebugbar::class,
        'command.debugbar.clear' => \Barryvdh\Debugbar\Console\ClearCommand::class,
        'command.ide-helper.generate' => \Barryvdh\LaravelIdeHelper\Console\GeneratorCommand::class,
        'command.ide-helper.models' => \Barryvdh\LaravelIdeHelper\Console\ModelsCommand::class,
        'command.ide-helper.meta' => \Barryvdh\LaravelIdeHelper\Console\MetaCommand::class,
        'command.ide-helper.eloquent' => \Barryvdh\LaravelIdeHelper\Console\EloquentCommand::class,
        'cache' => \Illuminate\Cache\CacheManager::class,
        'cache.store' => \Illuminate\Cache\Repository::class,
        'memcached.connector' => \Illuminate\Cache\MemcachedConnector::class,
        'queue' => \Illuminate\Queue\QueueManager::class,
        'queue.connection' => \Illuminate\Queue\SyncQueue::class,
        'queue.worker' => \Illuminate\Queue\Worker::class,
        'queue.listener' => \Illuminate\Queue\Listener::class,
        'queue.failer' => \Illuminate\Queue\Failed\DatabaseFailedJobProvider::class,
        'migration.repository' => \Illuminate\Database\Migrations\DatabaseMigrationRepository::class,
        'migrator' => \Illuminate\Database\Migrations\Migrator::class,
        'migration.creator' => \Illuminate\Database\Migrations\MigrationCreator::class,
        'command.cache.clear' => \Illuminate\Cache\Console\ClearCommand::class,
        'command.cache.forget' => \Illuminate\Cache\Console\ForgetCommand::class,
        'command.auth.resets.clear' => \Illuminate\Auth\Console\ClearResetsCommand::class,
        'command.migrate' => \Illuminate\Database\Console\Migrations\MigrateCommand::class,
        'command.migrate.install' => \Illuminate\Database\Console\Migrations\InstallCommand::class,
        'command.migrate.fresh' => \Illuminate\Database\Console\Migrations\FreshCommand::class,
        'command.migrate.refresh' => \Illuminate\Database\Console\Migrations\RefreshCommand::class,
        'command.migrate.reset' => \Illuminate\Database\Console\Migrations\ResetCommand::class,
        'command.migrate.rollback' => \Illuminate\Database\Console\Migrations\RollbackCommand::class,
        'command.migrate.status' => \Illuminate\Database\Console\Migrations\StatusCommand::class,
        'command.queue.failed' => \Illuminate\Queue\Console\ListFailedCommand::class,
        'command.queue.flush' => \Illuminate\Queue\Console\FlushFailedCommand::class,
        'command.queue.forget' => \Illuminate\Queue\Console\ForgetFailedCommand::class,
        'command.queue.listen' => \Illuminate\Queue\Console\ListenCommand::class,
        'command.queue.restart' => \Illuminate\Queue\Console\RestartCommand::class,
        'command.queue.retry' => \Illuminate\Queue\Console\RetryCommand::class,
        'command.queue.work' => \Illuminate\Queue\Console\WorkCommand::class,
        'command.seed' => \Illuminate\Database\Console\Seeds\SeedCommand::class,
        'Illuminate\Console\Scheduling\ScheduleFinishCommand' => \Illuminate\Console\Scheduling\ScheduleFinishCommand::class,
        'Illuminate\Console\Scheduling\ScheduleRunCommand' => \Illuminate\Console\Scheduling\ScheduleRunCommand::class,
        'command.cache.table' => \Illuminate\Cache\Console\CacheTableCommand::class,
        'command.migrate.make' => \Illuminate\Database\Console\Migrations\MigrateMakeCommand::class,
        'command.queue.failed-table' => \Illuminate\Queue\Console\FailedTableCommand::class,
        'command.queue.table' => \Illuminate\Queue\Console\TableCommand::class,
        'command.seeder.make' => \Illuminate\Database\Console\Seeds\SeederMakeCommand::class,
        'composer' => \Illuminate\Support\Composer::class,
    ]));
    override(\app(0), map([
        '' => '@',
        'db' => \Illuminate\Database\DatabaseManager::class,
        'config' => \Illuminate\Config\Repository::class,
        'db.factory' => \Illuminate\Database\Connectors\ConnectionFactory::class,
        'db.connection' => \Illuminate\Database\PostgresConnection::class,
        'Illuminate\Contracts\Queue\EntityResolver' => \Illuminate\Database\Eloquent\QueueEntityResolver::class,
        'events' => \Illuminate\Events\Dispatcher::class,
        'view' => \Illuminate\View\Factory::class,
        'view.finder' => \Illuminate\View\FileViewFinder::class,
        'view.engine.resolver' => \Illuminate\View\Engines\EngineResolver::class,
        'blade.compiler' => \Illuminate\View\Compilers\BladeCompiler::class,
        'files' => \Illuminate\Filesystem\Filesystem::class,
        'Illuminate\Contracts\Debug\ExceptionHandler' => \App\Exceptions\Handler::class,
        'Illuminate\Contracts\Console\Kernel' => \App\Console\Kernel::class,
        'Barryvdh\Debugbar\LaravelDebugbar' => \Barryvdh\Debugbar\LaravelDebugbar::class,
        'command.debugbar.clear' => \Barryvdh\Debugbar\Console\ClearCommand::class,
        'command.ide-helper.generate' => \Barryvdh\LaravelIdeHelper\Console\GeneratorCommand::class,
        'command.ide-helper.models' => \Barryvdh\LaravelIdeHelper\Console\ModelsCommand::class,
        'command.ide-helper.meta' => \Barryvdh\LaravelIdeHelper\Console\MetaCommand::class,
        'command.ide-helper.eloquent' => \Barryvdh\LaravelIdeHelper\Console\EloquentCommand::class,
        'cache' => \Illuminate\Cache\CacheManager::class,
        'cache.store' => \Illuminate\Cache\Repository::class,
        'memcached.connector' => \Illuminate\Cache\MemcachedConnector::class,
        'queue' => \Illuminate\Queue\QueueManager::class,
        'queue.connection' => \Illuminate\Queue\SyncQueue::class,
        'queue.worker' => \Illuminate\Queue\Worker::class,
        'queue.listener' => \Illuminate\Queue\Listener::class,
        'queue.failer' => \Illuminate\Queue\Failed\DatabaseFailedJobProvider::class,
        'migration.repository' => \Illuminate\Database\Migrations\DatabaseMigrationRepository::class,
        'migrator' => \Illuminate\Database\Migrations\Migrator::class,
        'migration.creator' => \Illuminate\Database\Migrations\MigrationCreator::class,
        'command.cache.clear' => \Illuminate\Cache\Console\ClearCommand::class,
        'command.cache.forget' => \Illuminate\Cache\Console\ForgetCommand::class,
        'command.auth.resets.clear' => \Illuminate\Auth\Console\ClearResetsCommand::class,
        'command.migrate' => \Illuminate\Database\Console\Migrations\MigrateCommand::class,
        'command.migrate.install' => \Illuminate\Database\Console\Migrations\InstallCommand::class,
        'command.migrate.fresh' => \Illuminate\Database\Console\Migrations\FreshCommand::class,
        'command.migrate.refresh' => \Illuminate\Database\Console\Migrations\RefreshCommand::class,
        'command.migrate.reset' => \Illuminate\Database\Console\Migrations\ResetCommand::class,
        'command.migrate.rollback' => \Illuminate\Database\Console\Migrations\RollbackCommand::class,
        'command.migrate.status' => \Illuminate\Database\Console\Migrations\StatusCommand::class,
        'command.queue.failed' => \Illuminate\Queue\Console\ListFailedCommand::class,
        'command.queue.flush' => \Illuminate\Queue\Console\FlushFailedCommand::class,
        'command.queue.forget' => \Illuminate\Queue\Console\ForgetFailedCommand::class,
        'command.queue.listen' => \Illuminate\Queue\Console\ListenCommand::class,
        'command.queue.restart' => \Illuminate\Queue\Console\RestartCommand::class,
        'command.queue.retry' => \Illuminate\Queue\Console\RetryCommand::class,
        'command.queue.work' => \Illuminate\Queue\Console\WorkCommand::class,
        'command.seed' => \Illuminate\Database\Console\Seeds\SeedCommand::class,
        'Illuminate\Console\Scheduling\ScheduleFinishCommand' => \Illuminate\Console\Scheduling\ScheduleFinishCommand::class,
        'Illuminate\Console\Scheduling\ScheduleRunCommand' => \Illuminate\Console\Scheduling\ScheduleRunCommand::class,
        'command.cache.table' => \Illuminate\Cache\Console\CacheTableCommand::class,
        'command.migrate.make' => \Illuminate\Database\Console\Migrations\MigrateMakeCommand::class,
        'command.queue.failed-table' => \Illuminate\Queue\Console\FailedTableCommand::class,
        'command.queue.table' => \Illuminate\Queue\Console\TableCommand::class,
        'command.seeder.make' => \Illuminate\Database\Console\Seeds\SeederMakeCommand::class,
        'composer' => \Illuminate\Support\Composer::class,
    ]));
    override(\resolve(0), map([
        '' => '@',
        'db' => \Illuminate\Database\DatabaseManager::class,
        'config' => \Illuminate\Config\Repository::class,
        'db.factory' => \Illuminate\Database\Connectors\ConnectionFactory::class,
        'db.connection' => \Illuminate\Database\PostgresConnection::class,
        'Illuminate\Contracts\Queue\EntityResolver' => \Illuminate\Database\Eloquent\QueueEntityResolver::class,
        'events' => \Illuminate\Events\Dispatcher::class,
        'view' => \Illuminate\View\Factory::class,
        'view.finder' => \Illuminate\View\FileViewFinder::class,
        'view.engine.resolver' => \Illuminate\View\Engines\EngineResolver::class,
        'blade.compiler' => \Illuminate\View\Compilers\BladeCompiler::class,
        'files' => \Illuminate\Filesystem\Filesystem::class,
        'Illuminate\Contracts\Debug\ExceptionHandler' => \App\Exceptions\Handler::class,
        'Illuminate\Contracts\Console\Kernel' => \App\Console\Kernel::class,
        'Barryvdh\Debugbar\LaravelDebugbar' => \Barryvdh\Debugbar\LaravelDebugbar::class,
        'command.debugbar.clear' => \Barryvdh\Debugbar\Console\ClearCommand::class,
        'command.ide-helper.generate' => \Barryvdh\LaravelIdeHelper\Console\GeneratorCommand::class,
        'command.ide-helper.models' => \Barryvdh\LaravelIdeHelper\Console\ModelsCommand::class,
        'command.ide-helper.meta' => \Barryvdh\LaravelIdeHelper\Console\MetaCommand::class,
        'command.ide-helper.eloquent' => \Barryvdh\LaravelIdeHelper\Console\EloquentCommand::class,
        'cache' => \Illuminate\Cache\CacheManager::class,
        'cache.store' => \Illuminate\Cache\Repository::class,
        'memcached.connector' => \Illuminate\Cache\MemcachedConnector::class,
        'queue' => \Illuminate\Queue\QueueManager::class,
        'queue.connection' => \Illuminate\Queue\SyncQueue::class,
        'queue.worker' => \Illuminate\Queue\Worker::class,
        'queue.listener' => \Illuminate\Queue\Listener::class,
        'queue.failer' => \Illuminate\Queue\Failed\DatabaseFailedJobProvider::class,
        'migration.repository' => \Illuminate\Database\Migrations\DatabaseMigrationRepository::class,
        'migrator' => \Illuminate\Database\Migrations\Migrator::class,
        'migration.creator' => \Illuminate\Database\Migrations\MigrationCreator::class,
        'command.cache.clear' => \Illuminate\Cache\Console\ClearCommand::class,
        'command.cache.forget' => \Illuminate\Cache\Console\ForgetCommand::class,
        'command.auth.resets.clear' => \Illuminate\Auth\Console\ClearResetsCommand::class,
        'command.migrate' => \Illuminate\Database\Console\Migrations\MigrateCommand::class,
        'command.migrate.install' => \Illuminate\Database\Console\Migrations\InstallCommand::class,
        'command.migrate.fresh' => \Illuminate\Database\Console\Migrations\FreshCommand::class,
        'command.migrate.refresh' => \Illuminate\Database\Console\Migrations\RefreshCommand::class,
        'command.migrate.reset' => \Illuminate\Database\Console\Migrations\ResetCommand::class,
        'command.migrate.rollback' => \Illuminate\Database\Console\Migrations\RollbackCommand::class,
        'command.migrate.status' => \Illuminate\Database\Console\Migrations\StatusCommand::class,
        'command.queue.failed' => \Illuminate\Queue\Console\ListFailedCommand::class,
        'command.queue.flush' => \Illuminate\Queue\Console\FlushFailedCommand::class,
        'command.queue.forget' => \Illuminate\Queue\Console\ForgetFailedCommand::class,
        'command.queue.listen' => \Illuminate\Queue\Console\ListenCommand::class,
        'command.queue.restart' => \Illuminate\Queue\Console\RestartCommand::class,
        'command.queue.retry' => \Illuminate\Queue\Console\RetryCommand::class,
        'command.queue.work' => \Illuminate\Queue\Console\WorkCommand::class,
        'command.seed' => \Illuminate\Database\Console\Seeds\SeedCommand::class,
        'Illuminate\Console\Scheduling\ScheduleFinishCommand' => \Illuminate\Console\Scheduling\ScheduleFinishCommand::class,
        'Illuminate\Console\Scheduling\ScheduleRunCommand' => \Illuminate\Console\Scheduling\ScheduleRunCommand::class,
        'command.cache.table' => \Illuminate\Cache\Console\CacheTableCommand::class,
        'command.migrate.make' => \Illuminate\Database\Console\Migrations\MigrateMakeCommand::class,
        'command.queue.failed-table' => \Illuminate\Queue\Console\FailedTableCommand::class,
        'command.queue.table' => \Illuminate\Queue\Console\TableCommand::class,
        'command.seeder.make' => \Illuminate\Database\Console\Seeds\SeederMakeCommand::class,
        'composer' => \Illuminate\Support\Composer::class,
    ]));

    override(\Illuminate\Support\Arr::add(0), type(0));
    override(\Illuminate\Support\Arr::except(0), type(0));
    override(\Illuminate\Support\Arr::first(0), elementType(0));
    override(\Illuminate\Support\Arr::last(0), elementType(0));
    override(\Illuminate\Support\Arr::get(0), elementType(0));
    override(\Illuminate\Support\Arr::only(0), type(0));
    override(\Illuminate\Support\Arr::prepend(0), type(0));
    override(\Illuminate\Support\Arr::pull(0), elementType(0));
    override(\Illuminate\Support\Arr::set(0), type(0));
    override(\Illuminate\Support\Arr::shuffle(0), type(0));
    override(\Illuminate\Support\Arr::sort(0), type(0));
    override(\Illuminate\Support\Arr::sortRecursive(0), type(0));
    override(\Illuminate\Support\Arr::where(0), type(0));
    override(\array_add(0), type(0));
    override(\array_except(0), type(0));
    override(\array_first(0), elementType(0));
    override(\array_last(0), elementType(0));
    override(\array_get(0), elementType(0));
    override(\array_only(0), type(0));
    override(\array_prepend(0), type(0));
    override(\array_pull(0), elementType(0));
    override(\array_set(0), type(0));
    override(\array_sort(0), type(0));
    override(\array_sort_recursive(0), type(0));
    override(\array_where(0), type(0));
    override(\head(0), elementType(0));
    override(\last(0), elementType(0));
    override(\with(0), type(0));
    override(\tap(0), type(0));

}
