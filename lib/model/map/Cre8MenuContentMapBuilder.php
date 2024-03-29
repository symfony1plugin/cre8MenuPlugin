<?php


/**
 * This class adds structure of 'cre8_menu_content' table to 'propel' DatabaseMap object.
 *
 *
 * This class was autogenerated by Propel 1.3.0-dev on:
 *
 * Tue Jun  2 04:40:01 2009
 *
 *
 * These statically-built map classes are used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    plugins.cre8MenuPlugin.lib.model.map
 */
class Cre8MenuContentMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'plugins.cre8MenuPlugin.lib.model.map.Cre8MenuContentMapBuilder';

	/**
	 * The database map.
	 */
	private $dbMap;

	/**
	 * Tells us if this DatabaseMapBuilder is built so that we
	 * don't have to re-build it every time.
	 *
	 * @return     boolean true if this DatabaseMapBuilder is built, false otherwise.
	 */
	public function isBuilt()
	{
		return ($this->dbMap !== null);
	}

	/**
	 * Gets the databasemap this map builder built.
	 *
	 * @return     the databasemap
	 */
	public function getDatabaseMap()
	{
		return $this->dbMap;
	}

	/**
	 * The doBuild() method builds the DatabaseMap
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function doBuild()
	{
		$this->dbMap = Propel::getDatabaseMap(Cre8MenuContentPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(Cre8MenuContentPeer::TABLE_NAME);
		$tMap->setPhpName('Cre8MenuContent');
		$tMap->setClassname('Cre8MenuContent');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addForeignKey('CRE8_MENU_TYPE_ID', 'Cre8MenuTypeId', 'INTEGER', 'cre8_menu_type', 'ID', true, null);

		$tMap->addColumn('NAME', 'Name', 'VARCHAR', true, 40);

		$tMap->addForeignKey('CRE8_CONTENT_TYPE_ID', 'Cre8ContentTypeId', 'INTEGER', 'cre8_content_type', 'ID', true, null);

		$tMap->addColumn('SLUG', 'Slug', 'VARCHAR', true, 60);

		$tMap->addColumn('META_TITLE', 'MetaTitle', 'VARCHAR', false, 70);

		$tMap->addColumn('META_DESCRIPTION', 'MetaDescription', 'LONGVARCHAR', false, null);

		$tMap->addColumn('META_KEYWORDS', 'MetaKeywords', 'LONGVARCHAR', false, null);

		$tMap->addColumn('TEMPLATE', 'Template', 'VARCHAR', false, 40);

		$tMap->addColumn('IS_ACTIVE', 'IsActive', 'BOOLEAN', false, null);

		$tMap->addColumn('IS_HIDDEN', 'IsHidden', 'BOOLEAN', false, null);

		$tMap->addColumn('RANK', 'Rank', 'INTEGER', true, null);

	} // doBuild()

} // Cre8MenuContentMapBuilder
