<?php

/**
 * WordPress Core Installer - A Composer to install WordPress in a webroot subdirectory
 * Copyright (C) 2013    John P. Bloch
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
 */

namespace Tests\JohnPBloch\Composer\phpunit;

use Composer\Composer;
use Composer\Config;
use Composer\Installer\InstallationManager;
use Composer\IO\NullIO;
use johnpbloch\Composer\WordPressCorePlugin;
use PHPUnit\Framework\TestCase;

class WordPressCorePluginTest extends TestCase {

	public function testActivate() {
		$composer            = new Composer();
		$installationManager = new InstallationManager();
		$composer->setInstallationManager( $installationManager );
		$composer->setConfig( new Config() );

		$plugin = new WordPressCorePlugin();
		$plugin->activate( $composer, new NullIO() );

		$installer = $installationManager->getInstaller( 'wordpress-core' );

		$this->assertInstanceOf( '\johnpbloch\Composer\WordPressCoreInstaller', $installer );
	}

}
