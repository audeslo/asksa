<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191205135923 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE commandeshow CHANGE credited_on credited_on DATETIME NOT NULL');
        $this->addSql('ALTER TABLE stockshowroom ADD sync TINYINT(1) NOT NULL');
        $this->addSql('DROP INDEX IDX_356D39D25D39DCF4 ON venteshowroom');
        $this->addSql('ALTER TABLE venteshowroom ADD modereglement VARCHAR(255) NOT NULL, DROP modereglement_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE commandeshow CHANGE credited_on credited_on DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE stockshowroom DROP sync');
        $this->addSql('ALTER TABLE venteshowroom ADD modereglement_id INT NOT NULL, DROP modereglement');
        $this->addSql('CREATE INDEX IDX_356D39D25D39DCF4 ON venteshowroom (modereglement_id)');
    }
}
