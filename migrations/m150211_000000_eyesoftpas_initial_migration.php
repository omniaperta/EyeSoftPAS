<?php
/**
 * OpenEyes
 *
 * (C) Moorfields Eye Hospital NHS Foundation Trust, 2008-2011
 * (C) OpenEyes Foundation, 2011-2013
 * This file is part of OpenEyes.
 * OpenEyes is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
 * OpenEyes is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with OpenEyes in a file titled COPYING. If not, see <http://www.gnu.org/licenses/>.
 *
 * @package OpenEyes
 * @link http://www.openeyes.org.uk
 * @author OpenEyes <info@openeyes.org.uk>
 * @copyright Copyright (c) 2008-2011, Moorfields Eye Hospital NHS Foundation Trust
 * @copyright Copyright (c) 2011-2013, OpenEyes Foundation
 * @license http://www.gnu.org/licenses/gpl-3.0.html The GNU General Public License V3.0
 */

class m150211_000000_eyesoftpas_initial_migration extends OEMigration
{
	public function up()
	{
		$this->createTable('eyesoftpas_assignment', array(
			'id' => "pk",
			'internal_id' => "integer NOT NULL",
			'external_id' => "string NOT NULL",
			'internal_type' => "string NOT NULL",
			'external_type' => "string NOT NULL",
			'missing_from_pas' => "boolean NOT NULL default 0",
			'created_user_id' => "integer NOT NULL default 1",
			'created_date' => "datetime NOT NULL",
			'last_modified_user_id' => "integer NOT NULL default 1",
			'last_modified_date' => "datetime NOT NULL"
		), 'ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');
		$this->createIndex('eyesoftpas_assignment_internal_key', 'eyesoftpas_assignment', 'internal_id, internal_type', true);
		$this->createIndex('eyesoftpas_assignment_external_key', 'eyesoftpas_assignment', 'external_id, external_type', true);
	}

	public function down()
	{
		$this->dropTable('eyesoftpas_assignment');
	}
}
