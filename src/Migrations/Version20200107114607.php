<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200107114607 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE commandershow ADD capacite_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commandershow ADD CONSTRAINT FK_603333577C79189D FOREIGN KEY (capacite_id) REFERENCES capacite (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_603333577C79189D ON commandershow (capacite_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE commandershow DROP FOREIGN KEY FK_603333577C79189D');
        $this->addSql('DROP INDEX UNIQ_603333577C79189D ON commandershow');
        $this->addSql('ALTER TABLE commandershow DROP capacite_id');
    }
}
