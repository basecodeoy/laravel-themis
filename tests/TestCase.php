<?php

declare(strict_types=1);

namespace Tests;

use BaseCodeOy\PackagePowerPack\TestBench\AbstractPackageTestCase;
use BaseCodeOy\Themis\Themis;
use Illuminate\Database\Schema\Blueprint;

/**
 * @internal
 */
abstract class TestCase extends AbstractPackageTestCase
{
    protected function getEnvironmentSetUp($app): void
    {
        $app['config']->set('database.default', 'testbench');

        $app['config']->set('database.connections.testbench', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);

        $app['db']->connection()->getSchemaBuilder()->create('users', function (Blueprint $table): void {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->string('email_verified_at');
            $table->string('remember_token');
            $table->timestamps();
        });

        $app['db']->connection()->getSchemaBuilder()->create(Themis::getPermissionsTableName(), function (Blueprint $table): void {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
        });

        $app['db']->connection()->getSchemaBuilder()->create(Themis::getRolesTableName(), function (Blueprint $table): void {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
        });

        $app['db']->connection()->getSchemaBuilder()->create(Themis::getModelHasPermissionsTableName(), function (Blueprint $table): void {
            $table->id();
            $table->foreignId(Themis::getPermissionIdColumnName())->constrained()->cascadeOnDelete();
            $table->morphs(Themis::getModelColumnName());
            $table->timestamps();

            $table->unique([
                Themis::getModelIdColumnName(),
                Themis::getModelTypeColumnName(),
                Themis::getPermissionIdColumnName(),
            ]);
        });

        $app['db']->connection()->getSchemaBuilder()->create(Themis::getModelHasRolesTableName(), function (Blueprint $table): void {
            $table->id();
            $table->foreignId(Themis::getRoleIdColumnName())->constrained()->cascadeOnDelete();
            $table->morphs(Themis::getModelColumnName());
            $table->timestamps();

            $table->unique([
                Themis::getModelIdColumnName(),
                Themis::getModelTypeColumnName(),
                Themis::getRoleIdColumnName(),
            ]);
        });
    }

    protected function getServiceProviderClass(): string
    {
        return \BaseCodeOy\Themis\ServiceProvider::class;
    }
}
